<?php 
ob_start();
session_start();
include('username.php');
$result5=$client->getStationList($username,$password); 
$arr=$result5->stationList;
?>

<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">-->
<html>
  <head>
    <title>GoBusGo</title>
	  <meta name="Generator" content="EditPlus">
	  <meta name="Author" content="">
	  <meta name="Keywords" content="">
	  <meta name="Description" content="">
	  <link rel="stylesheet" href="css/style.css" type="text/css">
	<style type="text/css">
		.ui-datepicker 
	{
		background: #333;
		border: 1px solid #555;
		color: #EEE;
	}
	</style>
<link  href="css/datepicker/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/datepicker/jquery.min.js"></script>
<script src="js/datepicker/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
<script>
  $(document).ready(function() {
    $("#depart").datepicker({
			showButtonPanel: false,
			defaultDate: d,
			dateFormat:"dd/mm/yy",
			changeMonth: true,
			changeYear: true,
			minDate: 0
	});
	
	 $("#inputField1").datepicker({
			defaultDate: d,
			dateFormat:"dd/MM/yy",
			changeMonth: true,
			changeYear: true,
			minDate: 0
	});
	
	
  });
</script>
 </head>
  <body>
	<div class="feedback">
		<a href="#" id="feed"><img src="images/feedback.png" alt=""/></a>
	</div><!---end of div feedback --->
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
			<label for="code">Write the code below><span id="txtCaptchaDiv" style="color:#FF0000;font-weight:600;"></span><!-- this is where the script will place the generated code --> 
			<input type="hidden" id="txtCaptcha" /></label><!-- this is where the script will place a copy of the code for validation: this is a hidden field -->
			<input type="text" name="txtInput" id="txtInput" size="30" required=""/>
			<input type="submit" name="submit" value="submit">
			<div style="clear:both"></div>
		</form>
	</div><!---end of div feedback --->
	<div class="main bg">
		<div class="header">
			<div class="logo">
				<img src="images/logo.png" alt="">
			</div>
			<div class="icon">
				<div>
				<?php if(isset($_SESSION['uname'])){ ?>
					Welcome, <b><?php echo $_SESSION['uname'];?>!</b> <a href="signout.php">Signout</a>	
				<?php }else{ ?>
					<a href="signin.php">Signin</a>|<a href="agent.php">Signup</a>
				<?php } ?>
					</div>
					<span>Ride with us:</span>
					<a href=""><img src="images/f-icon.png" alt=""></a>
					<a href=""><img src="images/ticon.png" alt=""></a>
					<a href=""><img src="images/icon.png" alt=""></a>
					<b>+ 1800 - 400 - 80800</b>
				</div>
				<ul class="menu">
					<li id="index"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<?php if(isset($_SESSION['uname'])){ ?>
					<li><a href="view.php">View Account</a></li>
					<?php }?>
					<li><a href="ticket.php">Print Ticket</a></li>
					<li><a href="cancel.php">Cancellation</a></li>
					<li><a href="contact.php">Contact US</a></li>
				</ul>
			</div>
			<div style="clear:both"></div>
			<div class="section">
				<div class="aside">
					<img src="images/banner.png" alt="">
				</div>
				<div class="article" id="proc1">
					<div class="book"><a href="#" id="book"><img src="images/02.png" alt=""></a></div>
					<form action="busLoad.php" name="findbus" method="post" onSubmit="return check();">
					
						<div class="fild lenhead"><h3>Find Your Bus</h3></div>
						<div class="fild proc">From
							<select id="originid" class="bus_input" title="Origin" name="originid">
								<option selected="selected" value="">--- I'am Leaving From ---</option>
									<option value="298|Ahmedabad">Ahmedabad</option>
									<option value="76|Bangalore">Bangalore</option>
									<option value="71|Chennai">Chennai</option>
									<option value="72|Madurai">Madurai</option>
									<option value="100|Trichy">Trichy</option>
									<option value="75|Coimbatore">Coimbatore</option>
									<option value="303|Delhi">Delhi</option>
									<option value="251|Goa">Goa</option>
									<option value="84|Hyderabad">Hyderabad</option>
									<option disabled="disabled" value="0">---------</option>
								
								<?php 
									foreach ( $arr as $term ) {  
									$fromid = $term->stationId; 
									$fromname = $term->stationName; 
									$Fromname = ucwords($fromname);
								?> 
								<option  value="<?php echo $fromid.'|'.$Fromname; ?>"><?php echo $Fromname; ?></option> 
								<?php }?>
							</select>
						
						</div>
						<div class="fild proc">To
						<select id="destiid"class="w400"title="destiid" name="destiid">
								<option selected="selected" value="">--- Reaching To ---</option>
<option value="298|Ahmedabad">Ahmedabad</option>
<option value="76|Bangalore">Bangalore</option>
<option value="71|Chennai">Chennai</option>
<option value="72|Madurai">Madurai</option>
<option value="100|Trichy">Trichy</option>
<option value="75|Coimbatore">Coimbatore</option>
<option value="303|Delhi">Delhi</option>
<option value="251|Goa">Goa</option>
<option value="84|Hyderabad">Hyderabad</option>
<option disabled="disabled" value="0">---------</option>
								
								<?php   
									foreach ( $arr as $term ) {  
									$toid = $term->stationId; 
									$toname = $term->stationName; 
									$Toname = ucwords($toname);
								?> 
								<option  value="<?php echo $toid.'|'.$Toname ; ?>"><?php echo $Toname; ?></option> 
								<?php }?>
							</select>
								
						</div>
						<div class="fild proc">Date 0f Journey <input  name="depart" value="" id="depart" class="depart" readonly='true'></div>
						<input type="hidden" name="submit" value="Submit">
						<div class="click proc"><input type="submit" name="submit" value="Submit"></div>
						<div style="clear:both"></div>
					</form>
				</div>
				<div class="article" id="proc2">
					<div class="bus"><a href="#" id="bus"><img src="images/01.png" alt=""></a></div>
						<!-- <span>TICKET</span>Online Booking / Bus Rental Services.
						<div style="border:1px solid #FFF;"></div> -->
					<form>
						<!-- <div class="radio">
						<input type="radio" name="one" value="">One Way
						<input type="radio" name="round" value="">Round Trip
						<input type="radio" name="rent" value="">Bus Rental
						</div> -->
						<div class="fild lenhead"><h3>Book Your Full Journey</h3></div>
						<div class="fild">From<input type="text" name="from" value=""></div>
						<div class="fild">To<input type="text" name="to" value=""></div>
						<div class="fild">Name<input type="text" name="name" value=""></div>
						<div class="fild">Date 0f Journey <input type="date" name="up" value="" id="inputField1" readonly='true'></div> 
						<div class="fild">Email<input type="text" name="email" value=""></div>
						<div class="fild">Contact Number<input type="text" name="" value=""></div>
						<div class="fild len">Bus Type
							<select name="" value="">
								<option>Normal</option>
								<option>Luxury</option>
								<option>Sleeper</option>
								<option>SemiSleeper</option>
							</select>
						</div>
						<div class="click"><input type="submit" name="submit" value="Submit"></div>
					</form>
					<div style="clear:both"></div>
				</div>
				<div class="botas">
				<img src="images/ban2.png" alt="">
				</div>
				<div class="botart">
				<h3>TOP ROUTES</h3>
					<ul class="ptp">
						<li> Chennai - Bangalore<li>
						<li>Chennai - Coimbatore<li>
						<li>Chennai - Madurai<li>
						<li>Bangalore - Chennai<li>
						<li>Bangalore - Hyderabad<li>
						<li>Bangalore - Goa<li>
						<li>Bangalore - Pune<li>
					</ul>   
					<ul class="ptp">
						<li>Bangalore - Ernakulam<li>
						<li>Hyderabad - Bangalore<li>
						<li>Hyderabad - Vijayawada<li>
						<li>Hyderabad - Visakapatnam<li>
						<li>Hyderabad - Mumbai<li>
						<li>Pune - Nagpur<li>
						<li>Pune - Indore <li>
					</ul>
					<ul class="ptp" style="margin-right:0;">
						<li>Bangalore - Ernakulam<li>
						<li>Hyderabad - Bangalore<li>
						<li>Hyderabad - Vijayawada<li>
						<li>Hyderabad - Visakapatnam<li>
						<li>Hyderabad - Mumbai<li>
						<li>Pune - Nagpur<li>
						<li>Pune - Indore<li>
					</ul>
					<div style="clear:both"></div>
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
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
	
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
include('footer.php');
?>
