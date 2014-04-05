<?php
include('header.php');
?>
<?php ob_start();
session_start();
$originid = $_SESSION['originid'];
$destiid = $_SESSION['destiid'];
$scheduleId = $_SESSION['scheduleId'];
$depart = $_SESSION['depart'];
$boardid= $_POST['boardid']; 
$email= $_POST['email']; 
$phone= $_POST['phone']; 
$city= $_POST['city']; 
$age= $_POST['age']; 
$gender= $_POST['gender']; 
$firstname= $_POST['firstname']; 
$lastname= $_POST['lastname']; 
$name= $firstname. " " . $lastname;
$seats= $_POST['seats']; 
$pincode = $_POST['pincode']; 
$netprice= $_POST['netprice']; 
$tbl_name="gobusgo_passdetails";

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$passdetails= new stdClass;

$passdetails->age=$age;
$passdetails->sex=$gender;
$passdetails->name=$name;
$passdetails->extraSeatFlagNotFound=true;
$passdetails->seatNbr=$seats;
$passDetailsArray = array();
$passDetailsArray[0]=$passdetails;

$blockseats=$client->blockSeatsForBooking("javaapitest","testing",$scheduleId,$depart,$originid,$destiid,$boardid,$email,$phone,$city,$passDetailsArray);
$bookingId= $blockseats->bookingId;
$cancellationDescList= $blockseats->cancellationDescList;
$expireTime= $blockseats->expireTime;
$status= $blockseats->status;
$failCode= $status->code;
print "<pre>";
//print_r($blockseats);
print "</pre>";

print "<pre>";
//print_r($cancellationDescList);
print "</pre>";
if($blockseats){
	$result=mysql_query("INSERT INTO $tbl_name(first_name,last_name,age,gender,city, pin_code,mobile,email,bookingId,seatNbr,totalFare)VALUES('$firstname', '$lastname', '$age', '$gender', '$city', '$pincode', '$phone', '$email', '$bookingId', '$seats', '$netprice')"); 			

}


?>
<style>
.outtab{
	background-color: rgb(224, 224, 224); 
	padding:10px 20px 15px 12px; 
	width:814px;
	margin: 26px;
	border-style:outset;
}

.headname{
	background:#566D7E;
	padding:20px 12px 15px 310px;
	border-radius: 4px;
	color: #FFFFFF;
}

.subhead{
	margin:23px 10px 3px; 
	padding:2px 4px 13px;
	float:left;
	width:152px;
}
.colon{
	margin:25px;
	float:left;
	/*padding:0px 5px;*/
}
.details{
	padding:25px;
}

</style>
<link type="text/css" rel="stylesheet" href="css/lightbox.css">

<div class="outtab">
	<div class="headname">CONTACT DETAILS</div>
	
	
	<div class="subhead">NAME</div>
	<div class="colon">: </div> 
	<div class="details"> <?php echo $name; ?> </div>
	
	<div class="subhead">EMAIL</div>
	<div class="colon">: </div> 
	<div class="details"> <?php echo $email; ?> </div>
	
	<div class="subhead">PHONE NUMBER</div>
	<div class="colon">: </div> 
	<div class="details"> <?php echo $phone; ?> </div>
	
	
	<div class="subhead">CANCELLATION POLICY</div>
	<div class="colon">: </div> 
	<div class="details"> 
		<?php 
		foreach($cancellationDescList as $cancellationpolicy){
			//echo "<li style='margin-bottom:8px; list-style: circle inside;'>".$cancellationpolicy."</li>" ;
		
		} ?>
	</div>

</div>

<div style="padding:12px 65px 16px 410px;"><input type="submit" class="bookticket" id="bookticket" value="BOOK" /> 
</div>

<?php
include('footer.php');
?>