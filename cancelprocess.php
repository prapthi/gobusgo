<?php
include('header.php');
include('username.php');
?>
<?php ob_start();
session_start();
?>
<?php
if(isset($_POST['submit'])){
	$bookingId = $_POST['bookingId'];
	$pmail =$_POST['pmail'];
	$ptel =$_POST['ptel'];
	$selectqry    = "SELECT * FROM gobusgo_passdetails WHERE bookingId = '$bookingId' ";
	$sql = mysql_query($selectqry);
	$fetchseat = mysql_fetch_row($sql);
	print_r($sql); print_r($fetchseat);exit();
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
?>
<?php 

    if ($code2 == "200") {  ?>
     <div class="success" id="success" style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255; " >
	Your tickets has been cancelled.... 
</div>

 <?php   }elseif($code2!="200") { ?>
 <div class="success" id="success" style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;">
	Please try again....
</div>

<?php } ?>
