<?php
include('header.php');

?>
<?php ob_start();
session_start();
?>

<?php
$bookingId = $_POST['bookingId'];

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$bookTickets= $client->BookTicket("javaapitest","testing",$bookingId);
$cancellist = $bookTickets->cancellationDescList;

$travelsPhoneNbr = $bookTickets->travelsPhoneNbr;

$status = $bookTickets->status;
$code= $status->code;

if($code= "200"){  ?>
	<form name="contactdet" id="contactdet" action="success.php" method="post" />
			<table >
					<th align="center">CANCELLATION POLICY</th>
					<tr><td>
							<?php
								foreach($cancellist as $value){
								echo "<li style='margin-bottom:8px; list-style: circle inside;'>".$value."</li>" ;
								}
							?>
					</td></tr>
			</table>
			
			<div style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;">THANK YOU FOR BOOKING.... HAPPY JOURNEY
			IF YOU HAVE ANY QUERIES PLEASE CONTACT OUR TRAVELS AT <?PHP echo $travelsPhoneNbr; ?>
			
			</div>
			
	</form>

<?php

unset($_SESSION); // will delete just the name data
session_destroy();
}else{ 
print_r($_SESSION);
?>

<div style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;"> TRY AGAIN......</div>

<?php

unset($_SESSION); // will delete just the name data
session_destroy();

 }?>

<?php
include('footer.php');
?>
