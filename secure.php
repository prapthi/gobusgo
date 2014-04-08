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

for($i=0;$i<$totalSeats;$i++){
$data_array['passname'] = $_POST['passname'][$i];
$data_array['age'] = $_POST['age'][$i];
$data_array['gender'] = $_POST['gender'][$i];
$data_array['seats'] = $_POST['seats'][$i];
$details = array_slice($data_array,0);	
$encodevalue= json_encode($details);
$list[] = $encodevalue;
}
$pass_name= implode($list, ',');
$parsed = json_decode('['.$pass_name.']');

$passdetails= new stdClass;
foreach($parsed as $value){
    $passdetails= new stdClass;
$name=$value->passname ;
$age=$value->age;
$gender=$value->gender;
$seats=$value->seats;
$passdetails->age=$age;
$passdetails->sex=$gender;
$passdetails->name=$name;
$passdetails->extraSeatFlagNotFound=true;
$passdetails->seatNbr=$seats;
$passDetailsArray[] = $passdetails;
}

$blockseats=$client->blockSeatsForBooking($username,$password,$scheduleId,$depart,$originid,$destiid,$boardid,$email,$phone,$address,$passDetailsArray);
print_r($blockseats);
echo $bookingId= $blockseats->bookingId;
$_SESSION['bookingId']=$bookingId;
$cancellationDescList= $blockseats->cancellationDescList;
$expireTime= $blockseats->expireTime;
$status= $blockseats->status;
echo $failCode= $status->code;

if($failCode=='200' && $bookingId){	
     print "testif"; exit();
$result = mysql_query("INSERT INTO $tbl_name(cust_book_id,contact_name,pass_name,address,country, state ,city, pin_code,mobile,email,fromStation,
toStation,journey_date, scheduleId, provider,bus_type,boarding_name, bookingId,noOfSeats, netprice, totalFare, Bookingstatus)VALUES('$cust_book_id', '$contactname', '$pass_name', '$address', '$country', '$state' ,'$city', '$pincode', '$phone', '$email', '$origname', '$destiname','$joudate', '$scheduleId', '$provider', '$type', '$boardame', '$bookingId', '$totalSeats', '$netprice','$TotalSeatPrice' , '$Bookingstatus')");
}else{
    print "testelse";
    header("Location:getTripListV2.php");
}
}
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
