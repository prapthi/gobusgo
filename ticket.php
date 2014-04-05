<?php
include('header.php');
?>
<div class="section">
   <div class="print">
    <form>
	<div class="pitem"><img src="images/printhead.png" alt="" required=""></div>
	<div class="pitem">PNR No. or Ticket No.<input type="text" name="pno" value="" required=""></div>
	<div class="pitem">Email<input type="email" name="pmail" value="" required=""></div>
	<div class="pitem">Phone<input type="tel" name="ptel" value="" required=""></div>
	<div class="pclick"><input type="Submit" name="pclick" value="Submit"></div>
	</form>
	</div>
</div>
<?php
include('footer.php');
?>