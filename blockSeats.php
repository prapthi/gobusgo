<?php
include('header.php');

?>
<?php ob_start();
session_start();

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
$address= $_POST['address']; 
$state= $_POST['state']; 
$country= $_POST['country']; 
$age= $_POST['age']; 
$gender= $_POST['gender']; 
$name= $_POST['firstname']; 
$origname= $_POST['origname']; 
$destiname= $_POST['destiname']; 
$provider= $_POST['provider']; 
$type= $_POST['type']; 
$boardame= $_POST['boardame']; 

$seats= $_POST['seats']; 
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



$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$passdetails= new stdClass;
$passdetails->age=$age;
$passdetails->sex=$gender;
$passdetails->name=$name;
$passdetails->extraSeatFlagNotFound=true;
$passdetails->seatNbr=$seats;
$passDetailsArray = array();
$passDetailsArray[0]=$passdetails;

$blockseats=$client->blockSeatsForBooking("javaapitest","testing",$scheduleId,$depart,$originid,$destiid,$boardid,$email,$phone,$address,$passDetailsArray);


print "<pre>";
print_r($blockseats);
print_r($_POST);
print "</pre>";

$bookingId= $blockseats->bookingId;
$_SESSION['bookingId']=$bookingId; 
$cancellationDescList= $blockseats->cancellationDescList;
$expireTime= $blockseats->expireTime;
$status= $blockseats->status;
$failCode= $status->code;
$result = mysql_query("INSERT INTO $tbl_name(cust_book_id,first_name,age,gender,address,country, state ,city, pin_code,mobile,email,fromStation,
toStation,journey_date, scheduleId, provider,bus_type,boarding_name, bookingId,seatNbr,noOfSeats,netprice, totalFare, Bookingstatus)VALUES('$cust_book_id', '$name', '$age', '$gender', '$address',  '$country', '$state' ,'$city', '$pincode', '$phone', '$email', '$origname', '$destiname','$joudate', '$scheduleId', '$provider', '$type', '$boardame', '$bookingId', '$seats', '$totalSeats','$netprice','$TotalSeatPrice' , '$Bookingstatus')"); 
?>

<?php
include('footer.php');
?>
