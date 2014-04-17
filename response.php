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
	
	$bookTickets= $client->BookTicket($username,$password,$bookingId);
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
		if($status== 'Success'){
		echo "succes";
			$qry = mysql_query("UPDATE gobusgo_passdetails SET ticket_status='$status'  WHERE bookingId = '$bookingId'");
		}else{
		echo "else";
		}



}	
?>
