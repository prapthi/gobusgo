<?php
print "<pre>";
print_r($_POST);
print "</pre>";
$detlist =object_2_array($_POST);
print_r($detlist):
?>


<div class="section bookno">


<div class="mailcon"> Check your mail for your booking Id sent by us </div>
<h1>Please Confirm Your Ticket</h1>
<form method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">
<input name="account_id" type="hidden" value="<?php echo $accountId; ?>">
<input name="return_url" type="hidden" size="60" value="http://www.gobusgo.in/response.php?DR=J4" />
<input name="mode" type="hidden" size="60" value="<?php echo $mode; ?>" />
<input name="reference_no" type="hidden" value="45454545" />
<input name="amount" type="hidden" value="480" />
<input name="description" type="hidden" value="<?php echo $description; ?>" />
<input name="name" type="hidden" maxlength="255" value="<?php echo $name; ?>" />
<input name="address" type="hidden" maxlength="255" value="<?php echo $address; ?>" />
<input name="city" type="hidden" maxlength="255" value="<?php echo $city; ?>" />
<input name="state" type="hidden" maxlength="255" value="<?php echo $state; ?>" />
<input name="postal_code" type="hidden" maxlength="255" value="<?php echo $code; ?>" />
<input name="country" type="hidden" maxlength="255" value="<?php echo $country; ?>" />
<input name="phone" type="hidden" maxlength="255" value="<?php echo $phone; ?>" />
<input name="email" type="hidden" size="60" value="<?php echo $email; ?>" />

<input name="secure_hash" type="hidden" size="60" value="<?php echo $secure_hash; ?>" />
<input name="submitted" value="Submit" type="submit" />
</form>
</div>

<script>
function validate(){


}
</script>
