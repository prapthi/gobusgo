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


		foreach( $response as $value) {
			$ResponseMessage = $value->ResponseMessage;
			$PaymentID = $value->PaymentID;
			$MerchantRefNo = $value->MerchantRefNo;
			$Amount = $value->Amount;
			
			
			
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
	$cancellist = $bookTickets->cancellationDescList;
	$extraSeatList = $bookTickets->extraSeatInfoList;
	
	foreach($extraSeatList as $extrainfo){
		$extraSeatInfo =$extrainfo->extraSeatInfo;
		$seatNbr       =$extrainfo->seatNbr;
	}	
		
		
	$seat= $status->seatNbr;
	$travelsPhoneNbr = $bookTickets->travelsPhoneNbr;
	
	$status = $bookTickets->status;
	$code= $status->code;
	if($code== '200'){
		// update qery for  ticket status 
		
		$qry = mysql_query("UPDATE gobusgo_passdetails SET operator_id= $extraSeatInfo, ticket_status= $status  WHERE bookingId = '$bookingId'");
		
		//mail function
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
			}?>
			
			
			<?php 
			$html ='';
    // Assign html code into php variable:-
	$html.= 
'<link type="text/css" rel="stylesheet" href="css/lightbox.css">
<style>
	.outtab{
		background-color: rgb(224, 224, 224); 
		/*padding:10px 20px 15px 12px; */
		width:814px;
		margin: 16px 67px;
		border-style:outset;
	}
	.printts{
		float: right;
		padding-right: 75px;
		padding-top: 36px;
	}
	.pdf{
		padding-top: 34px;
		padding-left: 810px;
	}
	table{
		margin:21px 11px 26px 55px;
	}
	.det {
    width: 215px;
}

</style>

<script language="javascript">
function printPage(printContent) {
	var display_setting="toolbar=yes,menubar=yes,";
	display_setting+="scrollbars=yes,width=650, height=600, left=50, top=25";
	
	
	var printpage=window.open("","printer",display_setting);
	
	printpage.document.open();
	printpage.document.write("<html><head><title>Confirmation Details</title></head><body style="font-family:verdana; font-size:12px;">");
	
	printpage.document.write(printContent);
	printpage.document.write("</body></html>");
	printpage.print();
	printpage.document.close();
	printpage.focus();

		
}</script>

<link rel="stylesheet" type="text/css" media="print" href="print.css" />
<style type="text/css">
        @media print {
            body * {
                visibility:hidden;
            } 
            #printable, #printable * {
                visibility:visible;
            }
            #printable { /* aligning the printable area */
                position:absolute;
                left:40;
                top:40;
            }
        }
</style>
<body>
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		
		<tr><th style="font:26px Arial,tahoma,sans-serif; padding:10px 20px;">'.$provider.'</th></tr>
		<tr><td style="font:18px Arial,tahoma,sans-serif; padding:5px 20px;">CANCELLATION POLICY</td></tr>
		<tr><td>'; 
		
		foreach( $cancellist as $value ){
			$html .= '<li style="margin:3px 25px 15px;list-style-type:square;">'.$value.'</li>';
		
			}
	$html.='</td></tr>

	<tr><td width="100%">
	
	<div class="outtab">
		 
			<table id="cont" cellpadding="0" cellspacing="0" border="0>
				<tr><th colspan="3">PASSENGER  DETAILS</th></tr>
				
				<tr><td>Operator PNR</td><td class="colon">:</td><td> <div style ="font:26px Arial,tahoma,sans-serif;">'.$extraSeatInfo.'</div></td></tr>
				<tr><td>Contact Name</td><td class="colon">:</td><td><div style ="font:26px Arial,tahoma,sans-serif;">'.$name.'</div></td></tr>';
					$parsed = json_decode('['.$pass_name.']');
					foreach($parsed as $value){  
						$html.=' <tr><td>Passenger</td><td class="colon">:</td><td>'.$value->passname.'</td></tr>
						<tr><td>Age</td><td class="colon">:</td><td>'.$value->age.' </td></tr>
						<tr><td>Gender</td><td class="colon">:</td><td>'.$value->gender.'</td></tr>
						<tr><td>Seat</td><td class="colon">:</td><td>'.$value->seats.'</td></tr>';
					}  
				
				
				$html.='<tr><td>Address</td><td class="colon">:</td><td>'.$address.', '.$city.', '.$pincode.' </td></tr>
				<tr><td>State</td><td class="colon">:</td><td> '.$state.'</td></tr>
				<tr><td>Mobile</td><td class="colon">:</td><td> '.$mobile.'</td></tr>
				<tr><td>Email</td><td class="colon">:</td><td> '.$email.' </td></tr>
				<tr><td>From</td><td class="colon">:</td><td> '.$fromStation.' </td></tr>
				<tr><td>To</td><td class="colon">:</td><td>'.$toStation.' </td></tr>
				<tr><td>Journey Date</td><td class="colon">:</td><td> '.$journeyDate.'</td></tr>
				<tr><td>Provider</td><td class="colon">:</td><td>'.$provider.'</td></tr>
				<tr><td>Provider Type</td><td class="colon">:</td><td> '.$bus_type.'</td></tr>
				<tr><td>Boarding Point</td><td class="colon">:</td><td> '.$boarding_name.'</td></tr>
				<tr><td>TicketGoose PNR</td><td class="colon">:</td><td>'.$bookingId.'</td></tr>
				<tr><td>Booking Id</td><td class="colon">:</td><td>'.$cust_book_id.'</td></tr>
				<tr><td>Total Seats</td><td class="colon">:</td><td>'.$noOfSeats.'</td></tr>
				<tr><td>Total Price</td><td class="colon">:</td><td>'.$totalFare.'</td></tr>
				<tr><td  colspan="3">&nbsp;</td></tr>
				<tr><th colspan="3">CONTACT DETAILS</th></tr>
				<tr><td colspan="3" style="word-wrap:break-word;">'.$travelsPhoneNbr.'</td></tr>
			</table>  
	 

</div></td></tr></table>';

?>
<div class="printts">
	<a href="javascript:void(0);" onClick="printPage(printsection.innerHTML)"><img src="images/printer.jpg" /></a>	
</div>
<div class="pdf">
<?php phptopdf_html($html,'pdf/',$fetchseat['bookingId'].'.pdf');

echo '<a href="fpdf/'.$fetchseat['bookingId'].'.pdf" target="_blank"><img src="images/pdf.png"></a>'; 
//echo "<a href='pdf/$fetchseat['cust_book_id'].pdf'><img src='images/pdf.png'></a>";
//echo "<a href='downloads/$fetchseat['cust_book_id'] .'_'. $fetchseat['contact_name'] . '.pdf' target='_blank'><img src='images/pdf.png'></a>";
 ?>
</div>
<?php 
  if($code= "200"){  ?>
	<div id="printsection">
		<form name="contactdet" id="contactdet" action="" method="post" />
				<table>
						<th>CANCELLATION POLICY</th>
						<th style="font:26px Arial,tahoma,sans-serif; padding:8px 88px;"><?php echo $provider; ?></th>
						<tr><td>
								<?php
									foreach($cancellist as $value){
									echo "<li style='margin:3px 25px 15px;list-style-type:square;'>".$value."</li>" ;
									}
								?>
						</td></tr>
				</table>
		</form>
	
	<div class="outtab">
		<form name="contactdet" id="contactdet" action="" method="post" />
			<input type="hidden" name="bookingId" id="contactdet" value="<?php echo $bookingId; ?>" />
			<table id="cont">
				<th> PASSENGER DETAILS</th>
				<tr><td>Operator PNR</td><td class="colon">:</td><td><?php echo "<div style ='font:26px Arial,tahoma,sans-serif;'>$extraSeatInfo</div>" ?></td></tr>
				<tr><td>Contact Name</td><td class="colon">:</td><td><?php echo "<div style ='font:26px Arial,tahoma,sans-serif;'>$name</div>"; ?></td></tr>
				<?php  
					$parsed = json_decode('['.$pass_name.']');
					foreach($parsed as $value){  ?>
					<tr><td>Passenger</td><td class="colon">:</td><td><?php echo $value->passname; ?></td></tr>
					<tr><td>Age</td><td class="colon">:</td><td><?php echo $value->age; ?></td></tr>
					<tr><td>Gender</td><td class="colon">:</td><td><?php echo $value->gender; ?></td></tr>
					<tr><td>Seat</td><td class="colon">:</td><td><?php echo $value->seats; ?></td></tr>
				<?php	}  ?>
				
				
				<tr><td>Address</td><td class="colon">:</td><td><?php echo $address. ', '. $city . ', '.$pincode ; ?></td></tr>  
				<tr><td>State</td><td class="colon">:</td><td><?php echo $state; ?></td></tr>
				<tr><td>Mobile</td><td class="colon">:</td><td><?php echo $mobile; ?></td></tr>
				<tr><td>Email</td><td class="colon">:</td><td><?php echo $email; ?></td></tr>
				<tr><td>From</td><td class="colon">:</td><td><?php echo $fromStation; ?></td></tr>
				<tr><td>To</td><td class="colon">:</td><td><?php echo $toStation; ?></td></tr>
				<tr><td>Journey Date</td><td class="colon">:</td><td><?php echo $journeyDate; ?></td></tr>
				<tr><td>Provider</td><td class="colon">:</td><td><?php echo $provider; ?></td></tr>
				<tr><td>Provider Type</td><td class="colon">:</td><td><?php echo $bus_type; ?></td></tr>
				<tr><td>Boarding Point</td><td class="colon">:</td><td><?php echo $boarding_name; ?></td></tr>
				<tr><td>Booking Id</td><td class="colon">:</td><td><?php echo $cust_book_id; ?></td></tr>
				<tr><td>TicketGoose PNR</td><td class="colon">:</td><td><?php echo $bookingId; ?></td></tr>
				<tr><td>Total Seats</td><td class="colon">:</td><td><?php echo $noOfSeats; ?></td></tr>
				<tr><td>Total Price</td><td class="colon">:</td><td><?php echo $totalFare; ?></td></tr>
				<tr><td></td></tr>
				<th>CONTACT DETAILS</th>
				<tr><td colspan=3><?php echo $travelsPhoneNbr; ?></td></tr>
			</table> 
		</form>
	</div>

</div>
	<?php
	}// success 		
}else{   //code200 success
	echo "booking failed";
	}
				
	?>		

	
<?php
		
		
		
		}else{
			echo "Payment is failed";
		}
} //foreach
?>		
	
</html>
