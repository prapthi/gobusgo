<?php
include('header.php');
include('username.php');
?>
<?php ob_start();
session_start();
?>

<div class="section">
	<div class="print">
		<form action="cancelprocess.php" name="cancelform" id="cancelform" method="post">
			<div class="pitem"><img src="images/.png" alt="" required=""></div>
			<div class="pitem">PNR No. or Ticket No.<input type="text" name="bookingId" value="" required=""></div>
			<div class="pitem">Email<input type="email" name="pmail" value="" required=""></div>
			<div class="pitem">Phone<input type="tel" name="ptel" value="" required=""></div>
			<div class="pclick"><input type="Submit" name="submit" value="Submit" id="submit"></div>
		</form>
	</div>
</div>
<div class="success" id="success" style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255; display:none;" >
	Your tickets has been cancelled.... 
</div>



<?php include('footer.php'); ?>



<?php
/*print "<pre>";
print_r($cancelTickets);
print "</pre>";
*/?>