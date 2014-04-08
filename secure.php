<?php
include('header.php');
include('username.php');
?>
<?php
ob_start();
session_start();
?>
<?php
$mode= "TEST";
$accountId= "5880";
$amount = $_POST['netprice'];	
$reference_no= "45454545";
$return_url= "http://www.gobusgo.in/response.php?DR=GBG";
$hash = "ebskey"."|".$accountId."|".$amount."|".$reference_no."|".$return_url."|".$mode;

$secure_hash = md5($hash);

$name= $_POST['contactname'];
$address= $_POST['address'];
$country= $_POST['country'];
$state= $_POST['state'];
$city= $_POST['city'];
$code = $_POST['pincode'];
$email= $_POST['email'];
$phone= $_POST['phone'];
//$scheduleId= $_POST['scheduleId'];

$description= "Seats";
$submit = $_POST['continuebooking'];

if($submit= "Continue Booking"){
$originid = $_SESSION['originid'];
$destiid = $_SESSION['destiid'];
$scheduleId = $_SESSION['scheduleId'];
$depart = $_SESSION['depart'];
$repdate = str_replace('/', '-', $depart);
$joudate =date('Y-m-d', strtotime($repdate));

$boardid= $_POST['boardid'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$city= $_POST['city'];
$addr= $_POST['address'];
$address = addslashes($addr);
$state= $_POST['state'];
$country= $_POST['country'];
$contactname= $_POST['contactname'];
$origname= $_POST['origname'];
$destiname= $_POST['destiname'];
$provider= $_POST['provider'];
$type= $_POST['type'];
$boardame= $_POST['boardame'];

$seatsNbr= $_POST['seats'];

$totalSeats= $_POST['totalSeats'];
$netprice= $_POST['netprice'];

$pincode = $_POST['pincode'];
$netprice= $_POST['netprice'];
$TotalSeatPrice= $_POST['TotalSeatPrice'];
$Bookingstatus= "Booked";
$tbl_name="gobusgo_passdetails";
$gobusgo = "GB";
$rand = mt_rand(10000000,999999999);
$cust_book_id = $gobusgo .$rand;
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
