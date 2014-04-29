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
<style>
select {
    border: 1px solid #B5BEC5;
    border-radius: 5px;
    padding: 3px 5px;
    width: 162px;
}
option{
width: 162px;
}
</style>

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
					<td><select name="country" id="country">
      <option value="Select Country" selected="">Select Country</option>
      <option value="ABW">Aruba</option>
      <option value="AFG">Afghanistan</option>
      <option value="AGO">Angola</option>
      <option value="AIA">Anguilla</option>
      <option value="ALA">Åland Islands</option>
      <option value="ALB">Albania</option>
      <option value="AND">Andorra</option>
      <option value="ANT">Netherlands Antilles</option>
      <option value="ARE">United Arab Emirates</option>
      <option value="ARG">Argentina</option>
      <option value="ARM">Armenia</option>
      <option value="ASM">American Samoa</option>
      <option value="ATA">Antarctica</option>
      <option value="ATF">French Southern Territories</option>
      <option value="ATG">Antigua and Barbuda</option>
      <option value="AUS">Australia</option>
      <option value="AUT">Austria</option>
      <option value="AZE">Azerbaijan</option>
      <option value="BDI">Burundi</option>
      <option value="BEL">Belgium</option>
      <option value="BEN">Benin</option>
      <option value="BFA">Burkina Faso</option>
      <option value="BGD">Bangladesh</option>
      <option value="BGR">Bulgaria</option>
      <option value="BHR">Bahrain</option>
      <option value="BHS">Bahamas</option>
      <option value="BIH">Bosnia and Herzegovina</option>
      <option value="BLM">Saint Barthélemy</option>
      <option value="BLR">Belarus</option>
      <option value="BLZ">Belize</option>
      <option value="BMU">Bermuda</option>
      <option value="BOL">Bolivia</option>
      <option value="BRA">Brazil</option>
      <option value="BRB">Barbados</option>
      <option value="BRN">Brunei Darussalam</option>
      <option value="BTN">Bhutan</option>
      <option value="BVT">Bouvet Island</option>
      <option value="BWA">Botswana</option>
      <option value="CAF">Central African Republic</option>
      <option value="CAN">Canada</option>
      <option value="CCK">Cocos (Keeling) Islands</option>
      <option value="CHE">Switzerland</option>
      <option value="CHL">Chile</option>
      <option value="CHN">China</option>
      <option value="CIV">Côte d`Ivoire</option>
      <option value="CMR">Cameroon</option>
      <option value="COD">Congo, the Democratic Republic of the</option>
      <option value="COG">Congo</option>
      <option value="COK">Cook Islands</option>
      <option value="COL">Colombia</option>
      <option value="COM">Comoros</option>
      <option value="CPV">Cape Verde</option>
      <option value="CRI">Costa Rica</option>
      <option value="CUB">Cuba</option>
      <option value="CXR">Christmas Island</option>
      <option value="CYM">Cayman Islands</option>
      <option value="CYP">Cyprus</option>
      <option value="CZE">Czech Republic</option>
      <option value="DEU">Germany</option>
      <option value="DJI">Djibouti</option>
      <option value="DMA">Dominica</option>
      <option value="DNK">Denmark</option>
      <option value="DOM">Dominican Republic</option>
      <option value="DZA">Algeria</option>
      <option value="ECU">Ecuador</option>
      <option value="EGY">Egypt</option>
      <option value="ERI">Eritrea</option>
      <option value="ESH">Western Sahara</option>
      <option value="ESP">Spain</option>
      <option value="EST">Estonia</option>
      <option value="ETH">Ethiopia</option>
      <option value="FIN">Finland</option>
      <option value="FJI">Fiji</option>
      <option value="FLK">Falkland Islands (Malvinas)</option>
      <option value="FRA">France</option>
      <option value="FRO">Faroe Islands</option>
      <option value="FSM">Micronesia, Federated States of</option>
      <option value="GAB">Gabon</option>
      <option value="GBR">United Kingdom</option>
      <option value="GEO">Georgia</option>
      <option value="GGY">Guernsey</option>
      <option value="GHA">Ghana</option>
      <option value="GIN">N Guinea</option>
      <option value="GIB">Gibraltar</option>

      <option value="GLP">Guadeloupe</option>
      <option value="GMB">Gambia</option>
      <option value="GNB">Guinea-Bissau</option>
      <option value="GNQ">Equatorial Guinea</option>
      <option value="GRC">Greece</option>
      <option value="GRD">Grenada</option>
      <option value="GRL">Greenland</option>
      <option value="GTM">Guatemala</option>
      <option value="GUF">French Guiana</option>
      <option value="GUM">Guam</option>
      <option value="GUY">Guyana</option>
      <option value="HKG">Hong Kong</option>
      <option value="HMD">Heard Island and McDonald Islands</option>
      <option value="HND">Honduras</option>
      <option value="HRV">Croatia</option>
      <option value="HTI">Haiti</option>
      <option value="HUN">Hungary</option>
      <option value="IDN">Indonesia</option>
      <option value="IMN">Isle of Man</option>
      <option value="IND">India</option>
      <option value="IOT">British Indian Ocean Territory</option>
      <option value="IRL">Ireland</option>
      <option value="IRN">Iran, Islamic Republic of</option>
      <option value="IRQ">Iraq</option>
      <option value="ISL">Iceland</option>
      <option value="ISR">Israel</option>
      <option value="ITA">Italy</option>
      <option value="JAM">Jamaica</option>
      <option value="JEY">Jersey</option>
      <option value="JOR">Jordan</option>
      <option value="JPN">Japan</option>
      <option value="KAZ">Kazakhstan</option>
      <option value="KEN">Kenya</option>
      <option value="KGZ">Kyrgyzstan</option>
      <option value="KHM">Cambodia</option>
      <option value="KIR">Kiribati</option>
      <option value="KNA">Saint Kitts and Nevis</option>
      <option value="KOR">Korea, Republic of</option>
      <option value="KWT">Kuwait</option>
      <option value="LAO">Lao People`s Democratic Republic</option>
      <option value="LBN">Lebanon</option>
      <option value="LBR">Liberia</option>
      <option value="LBY">Libyan Arab Jamahiriya</option>
      <option value="LCA">Saint Lucia</option>
      <option value="LIE">Liechtenstein</option>
      <option value="LKA">Sri Lanka</option>
      <option value="LSO">Lesotho</option>
      <option value="LTU">Lithuania</option>
      <option value="LUX">Luxembourg</option>
      <option value="LVA">Latvia</option>
      <option value="MAC">Macao</option>
      <option value="MAF">Saint Martin (French part)</option>
      <option value="MAR">Morocco</option>
      <option value="MCO">Monaco</option>
      <option value="MDA">Moldova</option>
      <option value="MDG">Madagascar</option>
      <option value="MDV">Maldives</option>
      <option value="MEX">Mexico</option>
      <option value="MHL">Marshall Islands</option>
      <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
      <option value="MLI">Mali</option>
      <option value="MLT">Malta</option>
      <option value="MMR">Myanmar</option>
      <option value="MNE">Montenegro</option>
      <option value="MNG">Mongolia</option>
      <option value="MNP">Northern Mariana Islands</option>
      <option value="MOZ">Mozambique</option>
      <option value="MRT">Mauritania</option>
      <option value="MSR">Montserrat</option>
      <option value="MTQ">Martinique</option>
      <option value="MUS">Mauritius</option>
      <option value="MWI">Malawi</option>
      <option value="MYS">Malaysia</option>
      <option value="MYT">Mayotte</option>
      <option value="NAM">Namibia</option>
      <option value="NCL">New Caledonia</option>
      <option value="NER">Niger</option>
      <option value="NFK">Norfolk Island</option>
      <option value="NGA">Nigeria</option>
      <option value="NIC">Nicaragua</option>
      <option value="NOR">R Norway</option>
      <option value="NIU">Niue</option>
      <option value="NLD">Netherlands</option>
      <option value="NPL">Nepal</option>
      <option value="NRU">Nauru</option>
      <option value="NZL">New Zealand</option>
      <option value="OMN">Oman</option>
      <option value="PAK">Pakistan</option>
      <option value="PAN">Panama</option>
      <option value="PCN">Pitcairn</option>
      <option value="PER">Peru</option>
      <option value="PHL">Philippines</option>
      <option value="PLW">Palau</option>
      <option value="PNG">Papua New Guinea</option>
      <option value="POL">Poland</option>
      <option value="PRI">Puerto Rico</option>
      <option value="PRK">Korea, Democratic People`s Republic of</option>
      <option value="PRT">Portugal</option>
      <option value="PRY">Paraguay</option>
      <option value="PSE">Palestinian Territory, Occupied</option>
      <option value="PYF">French Polynesia</option>
      <option value="QAT">Qatar</option>
      <option value="REU">Réunion</option>
      <option value="ROU">Romania</option>
      <option value="RUS">Russian Federation</option>
      <option value="RWA">Rwanda</option>
      <option value="SAU">Saudi Arabia</option>
      <option value="SDN">Sudan</option>
      <option value="SEN">Senegal</option>
      <option value="SGP">Singapore</option>
      <option value="SGS">South Georgia and the South Sandwich Islands</option>
      <option value="SHN">Saint Helena</option>
      <option value="SJM">Svalbard and Jan Mayen</option>
      <option value="SLB">Solomon Islands</option>
      <option value="SLE">Sierra Leone</option>
      <option value="SLV">El Salvador</option>
      <option value="SMR">San Marino</option>
      <option value="SOM">Somalia</option>
      <option value="SPM">Saint Pierre and Miquelon</option>
      <option value="SRB">Serbia</option>
      <option value="STP">Sao Tome and Principe</option>
      <option value="SUR">Suriname</option>
      <option value="SVK">Slovakia</option>
      <option value="SVN">Slovenia</option>
      <option value="SWE">Sweden</option>
      <option value="SWZ">Swaziland</option>
      <option value="SYC">Seychelles</option>
      <option value="SYR">Syrian Arab Republic</option>
      <option value="TCA">Turks and Caicos Islands</option>
      <option value="TCD">Chad</option>
      <option value="TGO">Togo</option>
      <option value="THA">Thailand</option>
      <option value="TJK">Tajikistan</option>
      <option value="TKL">Tokelau</option>
      <option value="TKM">Turkmenistan</option>
      <option value="TLS">Timor-Leste</option>
      <option value="TON">Tonga</option>
      <option value="TTO">Trinidad and Tobago</option>
      <option value="TUN">Tunisia</option>
      <option value="TUR">Turkey</option>
      <option value="TUV">Tuvalu</option>
      <option value="TWN">Taiwan, Province of China</option>
      <option value="TZA">Tanzania, United Republic of</option>
      <option value="UGA">Uganda</option>
      <option value="UKR">Ukraine</option>
      <option value="UMI">United States Minor Outlying Islands</option>
      <option value="URY">Uruguay</option>
      <option value="USA">United States</option>
      <option value="UZB">Uzbekistan</option>
      <option value="VAT">Holy See (Vatican City State)</option>
      <option value="VCT">Saint Vincent and the Grenadines</option>
      <option value="VEN">Venezuela</option>
      <option value="VGB">Virgin Islands, British</option>
      <option value="VIR">Virgin Islands, U.S.</option>
      <option value="VNM">Viet Nam</option>
      <option value="VUT">Vanuatu</option>
      <option value="WLF">Wallis and Futuna</option>
      <option value="WSM">Samoa</option>
      <option value="YEM">Yemen</option>
      <option value="ZAF">South Africa</option>
      <option value="ZMB">Zambia</option>
      <option value="ZWE">Zimbabwe</option>
    </select></td>
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
		
		
		
		var e = document.getElementById("country");
		var strCountry = e.options[e.selectedIndex].value;
		
		var strUser1 = e.options[e.selectedIndex].text;
		if(strCountry=="Select Country")
		{
		alert("Please select a Country");
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

