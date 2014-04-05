<?php
include('header.php');
?>
<div class="section">
   <div class="print chart">
    <form>
	<div id="det">
    <div class="pay"><span>Name</span> : <input type="text" name="paycus" value="" required=""></div>
    <div class="pay"><span>Contact No</span> : <input type="tel" name="payno" value="" required=""></div>
	<div class="pay"><span>City</span> : <input type="text" name="paytot" value="" required=""></div>
	<div class="pay"><span>Pin Code</span> : <input type="text" name="paytot" value="" required=""></div>
	<!-- <div class="payclick"><input type="submit" name="paynec" value="Next"></div> -->
	<div class="pay"><span>Mail Id</span> : <input type="text" name="paymail" value="" required=""></div>

    <div class="pay"><span>Username</span> : <input type="text" name="payamt" value="" required=""></div>
	<div class="pay"><span>Password</span> : <input type="text" name="paygate" value="" required=""></div>
	<div class="payclick"><input type="submit" name="paynec" value="Go"></div>
	</div>

	</form>
	</div>
</div>
<?php
include('footer.php');
?>