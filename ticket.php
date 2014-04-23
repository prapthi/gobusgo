<?php 
include('header.php');
include('username.php');
?>
<style>
.print a {
    color: #00FF33;
}
</style>
<?php
if(isset($_POST['pclick'])){
	$ticket_no = $_POST['ticket_no'];	
	$selqry = mysql_query("SELECT payment_status, ticket_status, bookingId FROM gobusgo_passdetails WHERE bookingId='$ticket_no' ");
	$details = mysql_fetch_assoc($selqry);
		$paymentStatus = $details['payment_status'];
		$ticketStatus = $details['ticket_status'];
		$ticketno = $details['bookingId'];	
		if($ticketStatus== 'Success' && $ticketno!= ''){?>
			<div style=" padding-left: 472px;">
$file = './fpdf/'.$ticket_no.'.pdf';
$filename = $ticket_no.'.pdf'; /* Note: Always use .pdf at the end. */

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

readfile($file); 
			<?php //$printTicket= 'To Print Your Ticket..<a href="fpdf/'.$ticketno.'.pdf" target="_blank">Click Here</a>'; ?>
			</div>
		<?php }else{
			$printTicket = 'Your ticket no is wrong';
		}
		
		
}
?>
<div class="section">
 <div style="color:#EB001E;"> <?php echo isset($printTicket)?$printTicket:''; ?> </div>
   <div class="print">
  

    <form action="" method="post">
		<div class="pitem"><img src="images/printhead.png" alt="" required=""></div>
		<div class="pitem">PNR No. or Ticket No.<input type="text" name="ticket_no" value="<?php echo isset($ticketno)?$ticketno:''; ?>" required=""></div>
	<!--	<div class="pitem">Email<input type="email" name="pmail" value="" required=""></div>
		<div class="pitem">Phone<input type="tel" name="ptel" value="" required=""></div>-->
		
		<div class="pclick"><input type="Submit" name="pclick" value="Submit"></div>
	</form>

	</div>
</div>


<?php
include('footer.php');
?>
