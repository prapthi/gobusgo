<?php
include('header.php');
include('username.php');
?>
<?php ob_start();
session_start();

$origname = $_POST['origname'];
$destiname = $_POST['destiname'];
$scheduleId = $_POST['scheduleId'];
$depart = $_POST['depart'];
$netprice = $_POST['netprice'];
$provider = $_POST['provider'];
$type = $_POST['type'];
$boardnamedata = explode('|',$_POST['boardname']);  
	$boardid = $boardnamedata[0];  
	$boardame = $boardnamedata[1]; 
$seatname = $_POST['seatname'];
$TotalSeatPrice = $_POST['TotalSeatPrice'];
$netprice = $_POST['netprice'];
$seats = trim($seatname,",");  
$indiSeats = explode(",", $seats);	
$totalSeats = count(explode(",", $seats));		
$price = trim($individualSeatPrice,",");  


?>

<link type="text/css" rel="stylesheet" href="css/lightbox.css">
<div class="section">
	<div class="outtab">
		<div class="headname">JOURNEY DETAILS</div>
		<div style="border-left:1px solid #828177; height:130px;border-right:1px solid #828177;border-bottom:1px solid black;">
			<div class="bookli"><div class="subhead">Rider</div><div class="colon">: </div><div class="details"> <?php echo $provider; ?> </div></div>
	
			<div class="bookli"><div class="subhead">Journey</div><div class="colon">: </div> <div class="details">From <span ><?php echo $origname;?></span> to <span><?php echo $destiname; ?></span> </div></div>
	
			<div class="bookli"><div class="subhead">Rider Type</div><div class="colon">: </div> <div class="details"> <?php echo $type; ?> </div></div>
	
			<div class="bookli"><div class="subhead">Boading Point </div><div class="colon">: </div> <div class="details"> <?php echo $boardame; ?> </div></div>
		</div>
	</div>


	<div class="outtab oumon">
        <div class="headname">FARE DETAILS</div>
		<div style="border-left:1px solid black; height:130px;border-right:1px solid black;border-bottom:1px solid black;">
			<div class="bookli"><div class="subhead">No of Passengers </div><div class="colon">: </div><div class="details"> <?php echo $totalSeats; ?></div></div>
			<div class="bookli"><div class="subhead">Seats</div><div class="colon">: </div> <div class="details"> <?php echo $seats; ?></div></div>
			<div class="bookli"><div class="subhead">Fare </div><div class="colon">: </div> <div class="details"> <?php echo "Rs." . $netprice; ?> </div></div>
			<div class="bookli"><div class="subhead">Total Fare </div><div class="colon">: </div> <div class="details"> <?php echo "Rs." . $TotalSeatPrice;?> </div></div>
		</div>
	</div>
		<!--<div class="cbbutton">
			<input type='button' value="Continue Booking" name='continuebooking' id="continuebooking" class="continuebooking"  />
		</div>-->
</div>


	<link rel="stylesheet" href="css/lightbox/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<script src="js/validate.js"></script>
</head>
<div class="passdetails">
<form id="passenger" method="POST" onsubmit="return validation();" name="passenger" action="secure.php">
<input name="origname" type="hidden" id="origname" value="<?php echo $origname; ?>"  />
<input name="destiname" type="hidden" id="destiname" value="<?php echo $destiname;?>"  />
<input name="scheduleId" type="hidden" id="scheduleId"  value="<?php echo $scheduleId;?>"  />
<input name="depart" type="hidden" id="depart" value="<?php echo $depart;?>"  />
<input name="provider" type="hidden" id="provider" value="<?php echo $provider;?>"  />
<input name="type" type="hidden" id="type" value="<?php echo $type;?>"  />
<input name="boardame" type="hidden" id="boardame" value="<?php echo $boardame;?>"  />
<input name="boardid" type="hidden" id="boardid" value="<?php echo $boardid;?>"  />
<input name="seats" type="hidden" id="seats" value="<?php echo $seats;?>"  />
<input name="totalSeats" type="hidden" id="totalSeats" value="<?php echo $totalSeats;?>"  />
<input name="TotalSeatPrice" type="hidden" id="TotalSeatPrice" value="<?php echo $TotalSeatPrice;?>"  />
<input name="netprice" type="hidden" id="netprice" value="<?php echo $netprice;?>"  />
<!--<input name="returnUrl" type="hidden" id="returnUrl" value="<?php //echo 'http://www.gobusgo.in/response.php?DR=GBG' ?>"  />
--><input name="account_id" type="hidden" id="account_id" value="<?php echo '14384'?>"  />
<input name="description" type="hidden" id="description" value="<?php echo 'bookings'; ?>"  />





<fieldset><legend style="color:#FF0000; font-weight:bold;">Details</legend>
	<table class="passnamedet">
		<tr><td style="color:#566DD2;font-weight:bold;">PASSENGER DETAILS</th></tr>
		<tr>
			<td class="tdwid">Name<span class="mandatory">*</span></td><td class="tdwid">Gender<span class="mandatory">*</span></td><td class="tdwid">Age<span class="mandatory">*</span></td><td class="tdwid">Seats<span class="mandatory">*</span></td>
		</tr>

		<?php for($n=0; $n<$totalSeats; $n++){ ?>
		<tr>
			<td class="tabwid"><input name="passname[]" type="text" style="width:255px;" id="passname[]" title="Passname" value="" maxlength="60"/></td>
			<td class="tabwid"><input type="radio" name="gender[<?php echo $n;?>]" value="male">M</input><input type="radio" name="gender[<?php  echo $n;?>]" value="female">F</input></td>
			<td class="tabwid"><input name="age[]" id="age" type="text" style="width:50px;" align="cemter" title="Age" value="" maxlength="2">
					<input name="seats[]" id="seats" type="hidden" style="width:150px;" title="Seats" value="<?php echo $indiSeats[$n]; ?>"></td>
			<td class="tabwid"><?php echo $indiSeats[$n]; ?></td>
		</tr>
		<?php } ?>
		<tr><td colspan="2" style="padding-top:30px; color:#566DD2;font-weight:bold;">CONTACT DETAILS</th></tr>
		<tr><td>
			<table cols="2">
				<tr>
					<td class="tabwid">Contact Name:<span class="mandatory">*</span></td>
					<td><input name="contactname" type="text" style="width:150px;" id="contactname" title="Contactname" value="" maxlength="60"  /></td>
				
					<td class="tabwid">Mobile:<span class="mandatory">*</span></td>
					<td><input name="phone" type="text" id="phone" style="width:150px;" title="Mobile Number" value="" maxlength="13"/></td>
				</tr>
				<tr>
					<td class="tabwid">Email:<span class="mandatory">*</span></td>
					<td><input name="email" type="text"   id="email" style="width:150px;" title="Email-id" value="" maxlength="40"/></td>
				
					<td class="tabwid">Address:<span class="mandatory">*</span> </td>
					<td><input name="address" type="text"  id="address"  style="width:150px;" title="Address" value="" maxlength="60"/></td>
				</tr>
				<tr>
					<td class="tabwid">City:<span class="mandatory">*</span> </td>
					<td><input name="city" type="text"  id="city"  style="width:150px;" title="City" value="" maxlength="30"/></td>
					
					<td class="tabwid">State:<span class="mandatory">*</span> </td>
					<td><input name="state" type="text" id="state"   style="width:150px;" title="State" value="" maxlength="30"/></td>
				</tr>
				<tr>	
					<td class="tabwid">Zip/Postal Code:<span class="mandatory">*</span> </td>
					<td><input name="pincode" type="text" id="pincode"   style="width:150px;" title="Pincode" value="" maxlength="6"/></td>
				
					<td class="tabwid">Country:<span class="mandatory">*</span> </td>
					<td><input name="country" type="text"  id="country"  style="width:150px;" title="Country" value="IN" maxlength="30"/></td>
				</tr>
				<tr><td></td></tr>	
			</table>
		</td></tr>
	</table>
</fieldset>
			<div style="padding:20px 304px;"><input type="submit" value="Continue Booking" name="continuebooking" id="continuebooking"/></div>
</form>
</div>
</html>
<script type="text/javascript">
function validation(){
		var total = <?php echo $totalSeats; ?>;
		var nameInput = document.getElementsByName('passname[]');
		var ageInput = document.getElementsByName('age[]');
		var seatInput = document.getElementsByName('seats[]');
		var contactname = document.passenger.contactname.value;
		var phone = document.passenger.phone.value; 
		var email = document.passenger.email.value; 
		var address = document.passenger.address.value; 
		var city = document.passenger.city.value;
		var state = document.passenger.state.value;  
		var pincode = document.passenger.pincode.value;  
		var country = document.passenger.country.value;   
		
		for (i=0; i<total; i++){
			var seat= seatInput[i].value;
			if (nameInput[i].value == ""){
			 	 alert('Enter the passenger name for seat ' + "" + seat);		 
				 nameInput[i].focus;
				 nameInput[i].select;
			 	 return false;
			} 
			if (ageInput[i].value == ""){
			 	 alert('Enter the passenger age for seat  ' + "" + seat);
				 ageInput[i].focus;
				 ageInput[i].select;		 
			 	 return false;
			}
			if((ageInput[i].value!='') && isNaN(ageInput[i].value.substr(0,10))){
				alert('Enter only number in passenger age for the seat' + "" + seat);
				ageInput[i].select();
				ageInput[i].focus();
				return false;
		 	}
		}
		 
		if(contactname==''){
			alert('Please enter Contact Name');
			return false;
		}
		if(phone==''){
			alert('Please enter Phone Number');
			return false;
		}
		if((phone!='') && isNaN(phone.substr(0,10))){
			alert("Enter only number in mobile no");
			return false;
		}
		if(email==''){
			alert('Please enter email');
			return false;
		}
	
		if ((email==null)||(email=="")){
			alert("Please Enter your Email ID")
			return false
		}
		if (echeck(email)==false){
			alert("E-mail you entered is incorrect");
			return false;
		}
		
		if(address==''){
			alert('Please enter Address');
			return false;
		}
		if(city==''){
			alert('Please enter City');
			return false;
		}
		if(state==''){
			alert('Please enter State');
			return false;
		}
		if(country==''){
			alert('Please enter Country');
			return false;
		}
		if(pincode==''){
			alert('Please enter Pin Code');
			return false;
		}
		if((pincode!='') && isNaN(pincode.substr(0,10))){
			alert("Enter only number in pincode");
			
			return false;
		}
		if (pincode.length < 6){
			alert("pincode should be 6 digit!");
			
			return false
		}
			function echeck(str) {
				at = str.indexOf("@");
				dot = str.lastIndexOf(".");
				lengt = str.length;
				con1 = str.substring(0,at);
				con2 = str.substring(at+1,dot);
				con3 = str.substring(dot+1,lengt);
			
				if(con1=='' || con2=='' || con3=='') return false;
			
				if(str.indexOf("  ") > -1 || str.indexOf("..") > -1 || str.indexOf("__") > -1 || str.indexOf("--") > -1) return false;
				
				if(at==-1 || dot==-1) return false;
			
				x = con1.substring(0,1);
				if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;
			
				x = con1.substring((con1.length)-1,(con1.length));
				if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;
			
				x = con1.substring(1,(con1.length)-1);
				for(i=0, y=0; i<con1.length-2; i++, y=x.substring(i, i+1)) if ((y < "a" || "z" < y) && (y < "A" || "Z" < y) && isNaN(y) && y!='.' && y!='_' && y!='-') return false;
				
				x = con2.substring(0,1);
				if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;
			
				x = con2.substring((con2.length)-1,(con2.length));
				if ((x < "a" || "z" < x) && (x < "A" || "Z" < x) && isNaN(x)) return false;
				
				x = con2.substring(1,(con2.length)-1);
				for(i=0, y=0; i<con2.length-2; i++, y=x.substring(i, i+1)) if ((y < "a" || "z" < y) && (y < "A" || "Z" < y) && isNaN(y) && y!='.' && y!='_' && y!='-') return false;		
				
				for(i=0, x=0; i<con3.length; i++, x = con3.substring(i, i+1)) if ((x < "a" || "z" < x) && (x < "A" || "Z" < x)) return false;
				if ((con3.length)<2 || (con3.length)>4)  return false;
			}
	}

</script>

<?php
include('footer.php');
?>

