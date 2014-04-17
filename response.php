<?php 
ob_start();
session_start();
include('username.php');
include_once('phpToPDF.php');
include('header.php');
?>
<?php
	 $secret_key = "ebskey";	 // Your Secret Key
if(isset($_GET['DR'])) {
	 require('Rc43.php');
	 $DR = preg_replace("/\s/","+",$_GET['DR']);

	 $rc4 = new Crypt_RC4($secret_key);
 	 $QueryString = base64_decode($DR);
	 $rc4->decrypt($QueryString);
	 $QueryString = split('&',$QueryString);

	 $response = array();
	 foreach($QueryString as $param){
	 	$param = split('=',$param);
		$response[$param[0]] = urldecode($param[1]);
	 }
}
?>
<?php
	$bookingId = $_SESSION['bookingId'];
	$depart = $_SESSION['depart'];
	$ResponseCode = $response['ResponseCode'];
	$ResponseMessage = $response['ResponseMessage'];
	$PaymentID = $response['PaymentID'];
	$MerchantRefNo = $response['MerchantRefNo'];
	$Amount = $response['Amount'];
if($ResponseMessage == 'Transaction Successful' && $PaymentID!=''){
$query = mysql_query("UPDATE gobusgo_passdetails set payment_id='$PaymentID', payment_status='Paid', merchant_ref_no='$MerchantRefNo'  WHERE bookingId = '$bookingId'");

$selectqry    = "SELECT * FROM gobusgo_passdetails WHERE bookingId = '$bookingId' ";
	$sql = mysql_query($selectqry) or die(mysql_error());
	$fetchseat = mysql_fetch_assoc($sql);
	
	
	$name = $fetchseat['contact_name'] ;
	$pass_name = $fetchseat['pass_name'] ;
	$age = $fetchseat['age'] ;
	$gender = $fetchseat['gender'] ;
	$address = $fetchseat['address'] ;
	$country = $fetchseat['country'] ;
	$state = $fetchseat['state'] ;
	$city = $fetchseat['city'] ;
	$pincode = $fetchseat['pin_code'] ;
	$mobile = $fetchseat['mobile'] ;
	$email = $fetchseat['email'] ;
	$cust_book_id = $fetchseat['cust_book_id'] ;
	
	$noOfSeats = $fetchseat['noOfSeats'] ;
	$netprice = $fetchseat['netprice'] ;
	$totalFare = $fetchseat['totalFare'] ;
	
	$fromStation = $fetchseat['fromStation'] ;
	$toStation = $fetchseat['toStation'] ;
	$journeyDate = $fetchseat['journey_date'] ;
	$provider = $fetchseat['provider'] ;
	$bus_type = $fetchseat['bus_type'] ;
	$boarding_name = $fetchseat['boarding_name'] ;
	$seatsbooked = $fetchseat['seatNbr'] ;
	$bookingId = $fetchseat['bookingId'] ;
	
	$bookTickets= $client->BookTicket('javaapitest','testing',$bookingId);
	print "<pre>";
	print_r($bookTickets);
	print "</pre>";
	$cancellist = $bookTickets->cancellationDescList;
	$extraSeatList = $bookTickets->extraSeatInfoList;
	
	foreach($extraSeatList as $extrainfo){
		$extraSeatInfo =$extrainfo->extraSeatInfo;
		$seatNbr       =$extrainfo->seatNbr;
	}	
	$travelsPhoneNbr = $bookTickets->travelsPhoneNbr;
	echo $bookingId;
	$status = $bookTickets->status;
	echo $code= $status->code;
	
	
		if($code== '200'){
		
			$qry = mysql_query("UPDATE gobusgo_passdetails SET Bookingstatus='Booked',ticket_status='Success' WHERE bookingId = '$bookingId'");
			if($qry){
				echo "success";
			}else{
			
				mysql_error();
			}
			require_once('PHPMailer/class.phpmailer.php');
			
			$mail             = new PHPMailer(); // defaults to using php "mail()"
			$mail->IsSendmail(); // telling the class to use SendMail transport
			$body .= '<html><head><title>GoBusGo Details</title></head>
							<body>
								<table width="750" border="0" align="center" cellpadding="0" cellspacing="10">
									<tr><td style="border:1px solid #666666;">
										<table>
											<tr><td>
												<table width="500px" border="0" align="center" cellpadding="0" cellspacing="0">
													<tr><td>Booking Id</td><td>:</td><td>'.$bookingId.'</td></tr>
												</table>
											</td></tr>
										</table>
									</td></tr>
								</table>
							</body>
						</html>';
			$mail->SetFrom('bgbhuvana@gmail.com.com');
			$mail->AddReplyTo("bhuvaneswarib@embossdesignstudio.com");
			/*$mail->AddReplyTo("bgbhuvana@gmail.com");*/
			$address = "bgbhuvana@gmail.com";
			$mail->AddAddress($address);
			$mail->Subject    = " PFA the GoBusGo- Details";
			$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			$mail->MsgHTML($body);
			$mail->AddAttachment("fpdf/".$fetchseat['bookingId'].".pdf");     // attachment
			
			if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Message sent!";
			}
			
			
		}else{
			header('location:getTripListV2.php?err=1');
		}



}	
?>
