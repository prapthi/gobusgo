<?php ob_start();
session_start();
include('header.php');
include('username.php');


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
$cancelTickets=$client->CancelTicket($username,$password,$bookingId,$seatArray); 
$failcode = $cancelTickets->status->code;

if($failcode=='401'){

	header('location:cancel.php?err=1');
	//header('location:cancel.php');
}elseif($failcode=='200'){
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

	if ($code2 == "200") {
			
		$qry = mysql_query("UPDATE gobusgo_passdetails SET Bookingstatus='Cancelled' WHERE bookingId = '$bookingId'");
	
		if($qry){
			header('location:cancel.php?err=3');
		}
	 }elseif($code2!="200") { 

		header('location:cancel.php?err=2');
		
	 }

}else{

	header('location:cancel.php?err=2');	
	
}

 ?>
<?php include('footer.php'); ?>
