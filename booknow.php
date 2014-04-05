<?php
include('header.php');

?>
<?php ob_start();
session_start();

?>
<?php
$netprice= $_POST['netprice']; 
$name= $_POST['firstname']; 
$address= $_POST['address']; 
$country= $_POST['country']; 
$state= $_POST['state']; 
$city= $_POST['city']; 
$code = $_POST['pincode'];
$email= $_POST['email']; 
$phone= $_POST['phone']; 

?>
<?
$hash = "ebskey"."|".$_POST['account_id']."|".$_POST['amount']."|".$_POST['reference_no']."|".$_POST['return_url']."|".$_POST['mode'];

$secure_hash = md5($hash);


?>
<div class="section bookno">
<h1>Please Confirm Your Ticket</h1>
<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">
<input name="account_id" type="hidden" value="<?echo $_POST['account_id'] ?>">
     
 <input name="return_url" type="hidden" size="60" value="<? echo $_POST['return_url'] ?>" />
 <input name="mode" type="hidden" size="60" value="<? echo $_POST['mode']?>" />
  <input name="reference_no" type="hidden" value="<? echo  $_POST['reference_no'] ?>" />
  <input name="amount" type="hidden" value="<? echo $netprice?>"/>
  <input name="description" type="hidden" value="<? echo $_POST['description'] ?>" /> 
 <input name="name" type="hidden" maxlength="255" value="<? echo $name ?>" />
<input name="address" type="hidden" maxlength="255" value="<? echo $address ?>" />
<input name="city" type="hidden" maxlength="255" value="<? echo $city ?>" />
<input name="state" type="hidden" maxlength="255" value="<? echo $state ?>" />
<input name="postal_code" type="hidden" maxlength="255" value="<? echo $code ?>" />
<input name="country" type="hidden" maxlength="255" value="<? echo $country ?>" />
 <input name="phone" type="hidden" maxlength="255" value="<? echo $phone ?>" />
   <input name="email" type="hidden" size="60" value="<? echo $email?>" />
<input name="ship_name" type="hidden" maxlength="255" value="<? echo $_POST['ship_name'] ?>" />
<input name="ship_address" type="hidden" maxlength="255" value="<? echo $_POST['ship_address'] ?>" />
<input name="ship_city" type="hidden" maxlength="255" value="<? echo $_POST['ship_city'] ?>" />
<input name="ship_state" type="hidden" maxlength="255" value="<? echo $_POST['ship_state'] ?>" />
<input name="ship_postal_code" type="hidden" maxlength="255" value="<? echo $_POST['ship_postal_code'] ?>" />
<input name="ship_country" type="hidden" maxlength="255" value="<? echo $_POST['ship_country'] ?>" />
 <input name="ship_phone" type="hidden" maxlength="255" value="<? echo $_POST['ship_phone'] ?>" />
    <input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
 <input name="submitted" value="Submit" type="submit" />
 
</form>
</div>
<script>
function validate(){


}
</script>
<?php
include('footer.php');
?>