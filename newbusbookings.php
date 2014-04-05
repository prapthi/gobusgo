<?php
include('header.php');
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
$totalSeats = count(explode(",", $seats));		
$price = trim($individualSeatPrice,",");  


?>
<style>
.outtab
{ 
padding:10px 20px 15px 12px; 
width:414px;
float:left;
margin: 0 10px;
font-weight: 600;
background:url(images/bus.png)no-repeat bottom;
}
.oumon
{
background:url(images/money.png)no-repeat bottom;
}
.headname{
background:#566DD2;
padding:15px 0;
border-radius: 4px;
color: #FFFFFF;
text-align:center;
font-size:15px;
font-weight:600;
margin-bottom:20px;
}

.subhead{
padding:2px 4px 13px;
float:left;
width:150px;
}
.colon{
float:left;
padding:0 5px;
}
.details{
float:left;
}
.details >span
{
color:#FF0000;
}
.bookli
{
clear:both;
}
.cbbutton{
clear:both;
text-align:center;
padding: 65px 0 0;
}
.continuebooking {
    background-color: #566DD2;
    border-radius: 12px;
    color: #FFFFFF;
    height: 41px;
    width: 150px;
	cursor: pointer;
}
</style>
<link type="text/css" rel="stylesheet" href="css/lightbox.css">
<div class="section">
	<div class="outtab">
		<div class="headname">Journey Details</div>


		<div class="bookli"><div class="subhead">Rider</div><div class="colon">: </div><div class="details"> <?php echo $provider; ?> </div></div>

		<div class="bookli"><div class="subhead">Journey</div><div class="colon">: </div> <div class="details">From <span ><?php echo $origname;?></span> to <span><?php echo $destiname; ?></span> </div></div>

		<div class="bookli"><div class="subhead">Rider Type</div><div class="colon">: </div> <div class="details"> <?php echo $type; ?> </div></div>

		<div class="bookli"><div class="subhead">Boading Point </div><div class="colon">: </div> <div class="details"> <?php echo $boardame; ?> </div></div>
	</div>


	<div class="outtab oumon">
	      <div class="headname">Fare Details</div>


		<div class="bookli"><div class="subhead">No of Passengers </div><div class="colon">: </div><div class="details"> <?php echo $totalSeats; ?></div></div>
		
		<div class="bookli"><div class="subhead">Seats</div><div class="colon">: </div> <div class="details"> <?php echo $seats; ?></div></div>
		
		<div class="bookli"><div class="subhead">Fare </div><div class="colon">: </div> <div class="details"> <?php echo "Rs." . $netprice; ?> </div></div>
		
		<div class="bookli"><div class="subhead">Total Fare </div><div class="colon">: </div> <div class="details"> <?php echo "Rs." . $TotalSeatPrice;?> </div></div>
		
		
		
	</div>
		<div class="cbbutton">
			<input type='button' value="Continue Booking" name='continuebooking' id="continuebooking" class="continuebooking"/>
		</div>
	</div>



<!-- <script language="javascript">
$(document).ready(function(){


	$("#passenger").validate();


$('#continuebooking').click(function(e){ // if a user clicks on the "delete" image
e.preventDefault(); //prevent the default browser behavior when clicking   
/*var row_id =     $(this).attr('id');
var parent =   $(this).parent().parent();*/

		$('#confirmation_dialog').dialog({ /*Initialising a confirmation dialog box (with  cancel/OK button)*/
				   
					autoOpen: false,
					width: 600,
					heigth: 1000,
					buttons: {
						"Ok": function() { //If the user choose to click on "OK" Button
                       if(( $('#firstname').val() != '') && ($('#age').val() != '')){
						$(this).dialog('close'); // Close the Confirmation Box
               
						$.post('blockSeats.php', $('#passenger').serialize(), function(result){
								$("#passenger").submit();
								//  $("button").html(result);
							  
						}); 
						}
						}, 
						"Cancel": function() { //if the User Clicks the button "cancel"
						$(this).dialog('close');
						} 
					}
				});
                    
                    

 $('#confirmation_dialog').dialog('open');//Dispplay confirmation Dialogue when user clicks on "delete Image"
        
        
        
        
        	return false;
           
        });
});

</script> -->
<script language="javascript">
 $(document).ready(function () {
     $("#continuebooking").click(function () {
		$("#confirmation_dialog").show();
     });
	$("#formclose").click(function () {
		$("#confirmation_dialog").hide();
     });
 });
 </script>
 
 <script language="javascript">
 $(document).ready(function() {
	$('#submit').click(function () {
		alert('test');
		$.post('blockSeats.php', $('#passenger').serialize(), function(result){
		$("#passenger").submit();
		//  $("button").html(result);
		
		});  
		
		
		return false;
	});
});


  
 </script>
 
    <link rel="stylesheet" href="css/lightbox/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
   <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	<!--<script src="js/jquery1.js"></script> -->
<script src="js/validate.js"></script>
</head>
<body>

<div id="confirmation_dialog" title="Passenger Details" style="display:none;" class="dialog-form"> 
<form name="register" id="passenger" action="secure.php" method="post" onSubmit="return sub();" >
<input name="origname" type="hidden" id="origname" value="<?php echo $origname ?>"  />
<input name="destiname" type="hidden" id="destiname" value="<?php echo $destiname?>"  />
<input name="scheduleId" type="hidden" id="scheduleId"  value="<?php echo $scheduleId?>"  />
<input name="depart" type="hidden" id="depart" value="<?php echo $depart?>"  />
<input name="provider" type="hidden" id="provider" value="<?php echo $provider?>"  />
<input name="type" type="hidden" id="type" value="<?php echo $type?>"  />
<input name="boardame" type="hidden" id="boardame" value="<?php echo $boardame?>"  />
<input name="boardid" type="hidden" id="boardid" value="<?php echo $boardid?>"  />
<input name="seats" type="hidden" id="seats" value="<?php echo $seats?>"  />
<input name="TotalSeatPrice" type="hidden" id="TotalSeatPrice" value="<?php echo $TotalSeatPrice?>"  />
<input name="netprice" type="hidden" id="netprice" value="<?php echo $netprice?>"  />
<input name="returnUrl" type="hidden" id="returnUrl" value="<?php echo $_SERVER['HTTP_HOST'].'/gobusgo/makePayment.php' ?>"  />
 <table class="adminform">
		<tbody>			
            <tr class="pased">
			<td><h2 style="color:#000">Passeger Details</h2></td>
			</tr>
			<tr>

				<td>NAME:</td>
				<td><input name="firstname" type="text" style="width:150px;" id="firstname" title="Firstname" value=""/></td>
				
				<td>AGE:</td>
				<td><input name="age" id="age" type="text" style="width:150px;" title="Age" value=""></td>
				<!--<td>LASTNAME:</td>
				<td><input name="lastname" id="lastname" type="text" style="width:150px;"    title="Lastname" value=""></td>-->
			</tr>
			<tr>
				<td>GENDER:</td>
				<td><input type="radio" name="gender" value="male">Male</input>
					<input type="radio" name="gender" value="female">Female</input></td>
					
				<td>ADDRESS: </td>
				<td><input name="address" type="text"  id="address"  style="width:150px;" title="Address" value=""/></td>
			</tr>
			<tr>
				<td>COUNTRY: </td>
				<td><input name="country" type="text"  id="country"  style="width:150px;" title="Country" value="INDIA"/></td>
				
				<td>STATE: </td>
				<td><input name="state" type="text" id="state"   style="width:150px;" title="State" value=""/></td>
			</tr>
			<tr>
				<td>CITY: </td>
				<td><input name="city" type="text"  id="city"  style="width:150px;" title="City" value=""/></td>
				
				<td>ZIP/POSTAL CODE: </td>
				<td><input name="pincode" type="text" id="pincode"   style="width:150px;" title="Pincode" value="" maxlength="6"/></td>
			</tr>
			<tr>
				<td>MOBILE NO: </td>
				<td><input name="phone" type="text" id="mobile"   style="width:150px;" title="Mobile Number" value="" maxlength="12"/></td>
				
				<td>EMAIL ID: </td>
				<td><input name="email" type="text"   id="email" style="width:150px;" title="Email-id" value=""/></td>
			</tr>
            <tr class="formsub">
			<td></td>
				<td class="pased"><input name="submit" type="submit" id="mobile" class="submit"  id="submit"  style="width:75px;" title="submit" value="submit"/></td>
				
				<td><a href="#" id="formclose">Cancel</a></td>
			</tr>
		</tbody>
	</table>
</form> 
 
 
<!--      var rules = {
         firstname: {
             required: true
         }
     };
     var messages = {
         firstname: {
             required: "Please enter name"
         }
     };
     $("#passenger").validate({
         rules: rules,
         messages: messages
     }); -->
</div><!-- section -->
</body>
</html>

<?php
include('footer.php');
?>