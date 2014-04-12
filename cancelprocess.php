<?php
include('header.php');
include('username.php');
?>
<?php 
ob_start();
session_start();
?>
<?php
if(isset($_POST['submit'])){
	$bookingId = $_POST['bookingId'];
	$pmail =$_POST['pmail'];
	$ptel =$_POST['ptel'];
	$selectqry    = "SELECT * FROM gobusgo_passdetails WHERE bookingId = '$bookingId'";
	$sql = mysql_query($selectqry);
	$fetchseat = mysql_fetch_assoc($sql);
	$seatnum= $fetchseat['pass_name'];
	$parSeat = json_decode('['.$seatnum.']');
	$seatArray = array();
	foreach($parSeat as $value=>$vals){
		$seatToCancel=$vals->seats;
		$seatArray[] = $seatToCancel;
	}
}
?>
<?php
$cancelTickets=$client->CancelTicket($username,$password,$bookingId,$seatArray); 
print "<pre>";
	print_r($username);
	print_r($password);
	print_r($bookingId);
	print_r($seatArray);
	print "</pre>";
$failcode = $cancelTickets->status->code;
if($failcode=='500'){
	header('location:cancel.php?err=1');
}else{
	$cancellationCharges =$cancelTickets->cancellationChargeDetailsList;
	
	
	$status1= $cancelTickets->status;
	$code1= $status1->code;
	foreach($cancellationCharges as $values){
		$cancellationCharge =$values->cancellationCharge;
		$seatFare =$values->seatFare;
		$seatNbr =$values->seatNbr;
	}
	$confirmcancel=$client-> confirmTicketCancellation($username,$password,$bookingId,$seatArray); 
	$refundAmount= $confirmcancel->refundAmount;
	$status2= $confirmcancel->status;
	$code2= $status2->code;

if ($code2 == "200") {  ?>
	<div class="success" id="success" style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;"> Tickets has been cancelled.... </div>
	
<?php }elseif($code2!="200") { ?>
	<div class="success" id="success" style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;"> Please try again.... </div>
	
<?php }

} ?>
<?php include('footer.php'); ?>
