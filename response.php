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
}	
?>
