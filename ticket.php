<?php ob_start();
session_start();
include('header.php');
include('username.php');
?>
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
			<?php $printTicket= 'Print Your Ticket..<a href="fpdf/'.$ticketno.'.pdf" target="_blank">Click Here</a>'; ?>
			</div>
		<?php }else{
			$printTicket = 'Your ticket no is wrong';
		}
		
		
}
?>
<div class="section">
   <div class="print">
    <form action="" method="post">
		<div class="pitem"><img src="images/printhead.png" alt="" required=""></div>
		<div class="pitem">PNR No. or Ticket No.<input type="text" name="ticket_no" value="<?php echo $ticketno; ?>" required=""></div>
	<!--	<div class="pitem">Email<input type="email" name="pmail" value="" required=""></div>
		<div class="pitem">Phone<input type="tel" name="ptel" value="" required=""></div>-->
		
		<div class="pclick"><input type="Submit" name="pclick" value="Submit"></div>
	</form>
	<div> <?php echo $printTicket; ?> </div>
	</div>
</div>


<?php
include('footer.php');
?>
