<?php ob_start();
session_start();
$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl");

$arr7= new stdClass;
//$arr7=$result4->
//passengerDetails;
$arr7->age=24;
$arr7->sex='Male';
$arr7->name='sakthi';
$arr7->extraSeatFlagNotFound=true;
$arr7->seatNbr='K1,K2';
$temp_array = array();
$temp_array[0]=$arr7;

$result5=$client->blockSeatsForBooking("javaapitest","testing","TGE2SK81079","28/02/2014","71","100","SP4_2","bgbhuvana@prapthi.com","9940379373","Chennai",$temp_array);

print "<pre>";
print_r($result5);
print "</pre>";

echo $arr=$result5->bookingId ."</br>";
echo $arr1=$result5->status->message."</br>";
$result2=$client->bookTicket('javaapitest','testing',$arr);
echo $arrr=$result5->travelsPhoneNbr."</br>";
echo $arr=$result5->status->code."</br>";
echo $arr1=$result5->status->message."</br>";

print "<pre>";
print_r($blockSeats);
print "</pre>";


$result2=$client->bookTicket('javaapitest','testing',$arr);
/*echo $arrr=$result5->travelsPhoneNbr;
echo $arr=$result5->status->code;
echo $arr1=$result5->status->message;*/

//$arr=$blockSeats->stationList; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<title>GoBusGo</title>
	<meta name="Generator" content="EditPlus">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_rtl.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"depart",			dateFormat:"%d/%m/%Y"

		});
		new JsDatePick({
			useMode:2,
			target:"inputField1",
			dateFormat:"%d/%m/%Y"
		});
	};
</script>
	</head>
	<body>
		<div class="feedback">
    <a href="#" id="feed"><img src="images/feedback.png" alt=""/></a>
	</div>
	<div class="feedform">
	<form method="post" action="mail.php" class="sercon"  id="feedout">
				<h3>Your Feedback</h3>
				 <a href="#" id="close"><img src="images/x.png" alt=""/></a>
                <p>Your feedback helps us to improve our service</p>
			    
			    <input type="text" name="name" value="" placeholder="Name" required="">
				<input type="text" name="cname" value="" placeholder="Company Name" required="">
				<input type="email" name="mail" value="" placeholder="Email ID" required="">
				<input type="tel" name="phone" value="" placeholder="Phone number" required="">
				<textarea name="detail" value="" cols="24" rows="5" placeholder="Your comments" required=""></textarea>
				<label for="code">Write the code below > <span id="txtCaptchaDiv" style="color:#FF0000;font-weight:600;"></span><!-- this is where the script will place the generated code --> 
                               <input type="hidden" id="txtCaptcha" /></label><!-- this is where the script will place a copy of the code for validation: this is a hidden field -->
                                    <input type="text" name="txtInput" id="txtInput" size="30" required=""/>
				<input type="submit" name="submit" value="submit">
				<div style="clear:both"></div>
     </form>
	
	</div>
		<div class="main bg">
			<div class="header">
				<div class="logo">
				<img src="images/logo.png" alt="">
				</div>
				<div class="icon">
				<div>
				     <a href="signin.php">Signin</a>|<a href="signup.php">Signup</a></div>
					<span>Ride with us:</span>
					<a href=""><img src="images/f-icon.png" alt=""></a>
					<a href=""><img src="images/ticon.png" alt=""></a>
					<a href=""><img src="images/icon.png" alt=""></a>
					<b>+ 1800 - 400 - 80800</b>
			   </div>
				<ul class="menu">
					<li id="index"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="ticket.php">Print Ticket</a></li>
                    <li><a href="agent.php">Payment</a></li>
                    <li><a href="cancel.php">Cancellation</a></li>
					<li><a href="contact.php">Contact US</a></li>
				</ul>
			</div>
			<div style="clear:both"></div>
			<div class="section">
					<div class="aside">
					<img src="images/banner.png" alt="">
					</div>
					<div class="botart" style="color:#FFFFFF;">
						
<?php 						
$bookId=$blockSeats->bookingId; 
$canceList=$blockSeats->cancellationDescList;
$expireTime=$blockSeats->expireTime;
print "<pre>";
print_r($blockSeats);
print "</pre>";

?>				
								
						
						
						
						 
						
					</div>
			</div>
<script>
function checkform(theform){
		var why = "";
		 
		if(theform.txtInput.value == ""){
			why += "- Security code should not be empty.\n";
		}
		if(theform.txtInput.value != ""){
			if(ValidCaptcha(theform.txtInput.value) == false){
				why += "- Security code did not match.\n";
			}
		}
		if(why != ""){
			alert(why);
			return false;
		}
	}
 

//Generates the captcha function    
	var a = Math.ceil(Math.random() * 9)+ '';
	var b = Math.ceil(Math.random() * 9)+ '';       
	var c = Math.ceil(Math.random() * 9)+ '';  
	var d = Math.ceil(Math.random() * 9)+ '';  
	var e = Math.ceil(Math.random() * 9)+ '';  
	  
	var code = a + b + c + d + e;
	document.getElementById("txtCaptcha").value = code;
	document.getElementById("txtCaptchaDiv").innerHTML = code;	

// Validate the Entered input aganist the generated security code function   
function ValidCaptcha(){
	var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
	var str2 = removeSpaces(document.getElementById('txtInput').value);
	if (str1 == str2){
		return true;	
	}else{
		return false;
	}
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
	return string.split(' ').join('');
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $("#feedout").hide();
    $("#proc2").hide();
	$("#feed").click(function(){
    $("#feedout").show();
});
	$("#close").click(function(){
    $("#feedout").hide();
});
	$("#book").click(function(){
    $("#proc2").show();
	$("#proc1").hide();
});
	$("#bus").click(function(){
    $("#proc1").show();
	$("#proc2").hide();
});

});
</script>
<?php
include('footer.php')
?>