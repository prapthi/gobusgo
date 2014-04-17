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
	echo $bookingId = $_SESSION['bookingId'];
	echo $depart = $_SESSION['depart'];
	foreach( $response as $value) {
			echo $ResponseMessage = $value->ResponseMessage;
			echo $PaymentID = $value->PaymentID;
			echo $MerchantRefNo = $value->MerchantRefNo;
			echo $Amount = $value->Amount;
	}
	
	
?>
