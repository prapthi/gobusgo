<?php
include('header.php');
include('username.php');
?>

<script language="javascript">
function confirmSubmission(){
	if (confirm("Are you sure you want to submit this information?")){
		return true;
	}else{
		return false;
	}
}

</script>
<?php
function error(){
$errors = array (
	1 => "PNR No is not a valid number!",
	2 => "Some Internal Error.. Please try again later",
	3 => "Your ticket has been cancelled"
);
$error_id = $_GET['err'];

if (isset($_GET['err'])) {
	return $errors[$error_id];
}
}
?>

<div class="section">
<div style="color:#FF0000;"><?php echo error(); ?></div>
	<div class="print">
		<form name="cancelform" id="cancelform" method="post" action="cancelprocess.php" onsubmit="return confirmSubmission();">
			<div class="pitem"><img src="images/.png" alt="" required=""></div>
			<div class="pitem">PNR No. or Ticket No.<input type="text" id="bookingId" name="bookingId" value="" required=""></div>
			<div class="pitem">Email<input type="email" name="pmail" id="pmail" value="" required=""></div>
			<div class="pitem">Phone<input type="tel" name="ptel" id="ptel"  value="" required=""></div>
			<div class="pclick"><input type="Submit" name="submit" value="Submit" id="submit">
			<input type="hidden" name="confirm_delete" id="confirm_delete" value="0" >
			</div>
		</form>
	</div>
</div>




<?php include('footer.php'); ?>



<?php
/*print "<pre>";
print_r($cancelTickets);
print "</pre>";
*/?>
