<?php ob_start();
session_start();
include('header.php');
include('username.php');


if(isset($_POST['submit'])){

	$bookingId = $_POST['bookingId'];
	$pmail =$_POST['pmail'];
	$ptel =$_POST['ptel'];
print $selectqry    = "SELECT * FROM gobusgo_passdetails WHERE bookingId = '$bookingId'";
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

print "<pre>";
print_r($seatArray);
print "</pre>";


$cancelTickets=$client->CancelTicket('javaapitest','testing',$seatArray); 
print "<pre>";
print_r($cancelTickets);
print "</pre>";


exit();
$failcode = $cancelTickets->status->code;

if($failcode=='401'){
echo "if";
	header('location:cancel.php?err=1');
	//header('location:cancel.php');
}elseif($failcode=='200'){
	$cancellationCharges =$cancelTickets->cancellationChargeDetailsList;
	echo "else";

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

	if ($code2 == "200") {
		echo "if second";
		header('location:cancel.php?err=3');
		
	 }elseif($code2!="200") { 
			echo "else second";
		header('location:cancel.php?err=2');
		
	 }

}else{
	echo "elsecss";
	header('location:cancel.php?err=2');	
	
}

 ?>
<?php include('footer.php'); ?>
