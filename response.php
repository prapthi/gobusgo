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
	print "<pre>";
	//print_r($response);
	print "</pre>";
	echo $test = $response['ResponseCode'];
	echo $test1 = $response['ResponseMessage'];
	echo $test2 = $response['PaymentID'];
	echo $test3 = $response['MerchantRefNo'];
	echo $test4 = $response['Amount'];

	
	exit();
	

	
	
?>
