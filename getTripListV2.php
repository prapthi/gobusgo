<?php
include('header.php');
include('username.php');
?>

<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/detailstyle.css" />
<link rel="stylesheet" type="text/css" href="css/boarding_lightbox.css" />


<style type="text/css">
.ui-datepicker {
   background: #333;
   border: 1px solid #555;
   color: #EEE;
 }
</style>

<link  href="css/datepicker/jquery-ui.css" rel="stylesheet" type="text/css" />

<script src="js/datepicker/jquery.min.js"></script>
<script src="js/datepicker/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {

$("#depart").datepicker({
		defaultDate: "+1w",
		dateFormat:"dd/mm/yy",
		changeMonth: true,
		changeYear: true,
		minDate: 0,
onSelect: function(dateText, inst) {
	var date = $(this).val();
	var time = $('#time').val();
   $("#modate").val(date);
}
});
});
</script>

<?php 
if($_POST){
	$originid = $_POST['originid'];
	$destiid = $_POST['destiid'];
	$depart = $_POST['depart'];
	$origname = $_POST['origname'];
	$destiname = $_POST['destiname'];	
	$date = $_POST['date'];
	$month = $_POST['month'];	
	$monthName = $_POST['monthName'];
	$year = $_POST['year'];	
}elseif($_SESSION){
	$originid = $_SESSION['originid'];
	$destiid = $_SESSION['destiid'];
	$depart = $_SESSION['depart'];
	$depardata = explode('/',$depart);  
	$date = $depardata[0];  
	$month = $depardata[1];
	$year = $depardata[2]; 
	$monthName = date('M', mktime(0, 0, 0, $month, 1, 2000));
	$origname = $_SESSION['origname'];
	$destiname = $_SESSION['destiname'];
}
$getTripList=$client->GetTripListV2($username,$password,$originid,$destiid,$depart); 
$status=$getTripList->status;
$failCode= $status->code;

$list = $getTripList->tripList;

$result5=$client->getStationList($username,$password); 
$arr=$result5->stationList; 


?>
<div class="section">
			<div>
				<div class="destime">
					<span class="lispan"><?php echo $origname;?></span>	To	
					<span class="lispan"><?php echo $destiname;  ?></span>
					Departure :<span class="lispan"><?php echo $date. ' ' .$monthName. ' '. $year;  ?></span>
				</div>
				<div class="modsch">
				<a href="javascript:void(0);" onclick="modify('3')" class="deslink"><h4>Modify Your Search</h4></a>
				</div>
			</div><!-- -->
			
			<div id="2" style="display:none; min-height:130px;">
				<div style="float:left; width:33%; border-right:1px solid #CCC; min-height:130px;">
					<table border="0" cellpadding="0" cellspacing="0"  width="100%">
						<tr>
							<td height="26" colspan="4" style="padding-left:10px;">  </td>
						</tr>
					</table>
				</div>
			</div>
			
			<div id="1" style="display:none;"></div>
			<div id="3" style="display:none;"> 
				<form action="busLoad.php" name="findbus" method="post">
					<table> <tr> <td><span class="lispan">From</span>
						<select id="originid" title="Origin" name="originid" onchange="document.getElementById('orig').value=this.value">
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
	<option  value="<?php echo $fromid.'|'.$Fromname; ?>" <?php echo($Fromname==$origname)?'selected':''?>><?php echo $Fromname; ?></option></br>

	 
								<?php }?>
							</select>
							<input id='orig' type='hidden' name="orig" value=''>
					</td><td><span class="lispan">To</span>
						<select id="destiid" title="Desti" name="destiid" onchange="document.getElementById('desti').value=this.value">
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
								
	<option  value="<?php echo $toid.'|'.$Toname; ?>" <?php echo($Toname==$destiname)?'selected':''?>><?php echo $Toname; ?></option>								<?php }?>
							</select>
							<input id='desti' type='hidden' name="desti" value=''>
					</td><td>Date 0f Journey <input  name="depart" value="<?php echo $depart;?>" id="depart" class="depart" >	
						<input type="hidden" id="modate" class="modate" value='' />	
						<input type="hidden" name="search" value="search"/></td>
						<td><input type="submit" name="search1" value="Search" class="subt"></td>
						</tr>
					</table>
					<div style="clear:both"></div>
				</form>
			</div><!--- 3--->
<?php
function error(){
$errors = array (
	1 => "Ticket not confirmed. Please contact with booking id, or book different Seat...",
	2 => "Your payment is not successfull... Please try again with your booking"
	
);


if (isset($_GET['err'])) {
	$error_id = $_GET['err'];
	return $errors[$error_id];
}
}
?>		
		<div style="color:#FF0000;"><?php echo error(); ?></div>

		<div>
		<table width="100%" height="25" cellspacing="0" cellpadding="0" border="0" class="prex">
			<tbody>
				<tr>
					<td width="300" align="left">
						<form method="post" action="busLoad.php">
							<input type="hidden" name="originid" value="<?php echo $originid;  ?>" />
							<input type="hidden" name="destiid" value="<?php echo $destiid;  ?>" />
							
							<input type="hidden" name="origname" value="<?php echo $origname;  ?>" />
							<input type="hidden" name="destiname" value="<?php echo $destiname;  ?>" />
							
							<input type="hidden" name="depart" value="<?php echo $depart;  ?>" />
							<input type="hidden" name="previous" value="previous"/>
							<a class="button2 dark_gray" onclick="$(this).parents('form').submit()" href="javascript:void(0);">Previous Day</a>
						</form>
					</td>
					<td width="343" align="center" style="font-family: Verdana,Geneva,sans-serif; font-size: 16px; font-weight: bold; color:#000000;">
					<?php echo $date. ' ' .$monthName. ' '. $year;  ?></td>
					<td width="388" align="right">
						<form method="post" action="busLoad.php">
							<input type="hidden" name="originid" value="<?php echo $originid;  ?>" />
							<input type="hidden" name="destiid" value="<?php echo $destiid;  ?>" />
							
							<input type="hidden" name="origname" value="<?php echo $origname;  ?>" />
							<input type="hidden" name="destiname" value="<?php echo $destiname;  ?>" />
							
							<input type="hidden" name="depart" value="<?php echo $depart;  ?>" />
							
							<input type="hidden" name="next" value="next"/>
							<a class="button2 dark_gray" onclick="$(this).parents('form').submit();" href="javascript:void(0);">Next Day</a>
						</form>
					</td>
				</tr>
			</tbody>
		</table>
<?php if ($failCode== "402" ){   ?>
		<div style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;"> No tickets were found for this route.... Please contact us from the details mentioned on the home page... We will assist you...</div>
	  <?php }else{ ?>
		<table id="my-table-sorter" class="tablesorter" cellpadding="0" cellspacing="0"> 
			<thead>
				<tr>  
					<th class="sp1">Travels<img src="images/sort_icons.png" alt=""></th>  
					<th class="sp2">Bus Type</th>  
					<th class="sp3">Departure</th>  
					<th class="sp4">Arrival</th>  
					<th class="sp5">Seats</th>  
					<th class="sp6">Fare</th>  
				</tr>  
			</thead>
			<tbody>
		<?php if($list!=''){
		foreach ($list as $Triplist) {   
		
			$arrivalTime = $Triplist->arrivalTime; 
			$availableSeats = $Triplist->availableSeats; 
			$departtime = $Triplist->departureTime; 
			$fare = $Triplist->fare; 
			$pickUpPointList = $Triplist->pickUpPointList; 
			
			$provider = $Triplist->provider; 
			$scheduleId = $Triplist->scheduleId; 
			$ticketType = $Triplist->ticketType; 
			$type = $Triplist->type; 
			
/*	onsubmit='return submitForm();*/		
			
			//<input type='hidden' value='ticketgoose' class='apitype'>  ?>
			<tr><td colspan="6" class="result">
			
			<table id="myTable" class="tablesorter" width="100%" cellspacing="0" cellpadding="0" border="0">
								<tr height="60">
									
								    <td class="sp1" ><?php echo $provider; ?></td>
								    <td class="sp2"><?php echo $type;?></td>
								    <td class="sp3">
								<?php echo $departtime; ?>

											
											

									</td>
								    <td width=""  class="sp4"><?php echo $arrivalTime	;?></td>
								    <td width="" class="sp5" ><?php echo $availableSeats;?></td>
								    <td width="" class="sp6">
									<div ><img width="11" height="11" src="images/rupee.png">&nbsp;<span><?php echo $fare;?></span></div>
									<form class="book_form" method="post" action="javascript:void(0);">
										<input type="hidden" value= "<?php echo $provider;?>" class="provider">
										<input type="hidden" value="<?php echo $type;?>"  class="type">
									
										<input type="hidden" value="<?php echo $fare;?>" class="netprice">
										<input type="hidden" value="<?php echo $scheduleId;?>" class="scheduleId">
										<input type="hidden" value="<?php echo $depart;?>" class="depart">
										<input type="hidden" value="<?php echo $originid;?>" class="originid">
										<input type="hidden" value="<?php echo $departtime;?>" class="dept_time">
										<input type="hidden" value="<?php echo  $arrivalTime;?>" class="arriv_time">
										<input type="hidden" value="<?php echo $destiid;?>" class="destiid">
										<input type="hidden" value="<?php echo $origname;?>" class="origname">
											<input type="hidden" value="<?php echo $destiname;?>" class="destiname">
										<?php if($availableSeats!=0){  ?>
										<input type="submit" value="View Seats" class="button2" id="Available">
										<?php }?>
									</form>
								    </td>
								   
								</tr>
								<tr><td colspan="12"><div class="bus_seat"> </div></td></tr>
							
							</table>
				
			</td></tr>
						   
	<?php } } ?> 
</tbody>
		</table>
			<?php }?>
	</div>
	</div>
	
<script type="text/javascript">
$(function(){
	$('.book_form').submit(function(){	
	

		var provider=$(this).find('.provider').val();
		var type=$(this).find('.type').val();
		var netprice=$(this).find('.netprice').val();
		var selling_price=$(this).find('.selling_price').val();
		var bording_points=$(this).find('.bording_points').val();
		var scheduleId=$(this).find('.scheduleId').val();
		var departtime=$(this).find('.departtime').val();
		var originid=$(this).find('.originid').val();
		 var destiid=$(this).find('.destiid').val();
		var depart=$(this).find('.depart').val();
		var arriv_time=$(this).find('.arriv_time').val();
		var apitype = $(this).find('.apitype').val();
		var cancel_policy = $(this).find('.get_cancel').val();
		var origname=$(this).find('.origname').val();
		var destiname=$(this).find('.destiname').val();
		
		$('.bus_seat').html('');
		$load=$(this).parents('.result').find('.bus_seat');
		$load.empty().html('<div style="text-align:center"><img src="images/loader.gif" height="80px" width="80px"></div>');
		$.post('seatAvailability.php',{
			'provider':provider, 
			'type':type,
			'cancel_p':cancel_policy,
			'scheduleId':scheduleId, 
			'departtime':departtime, 
			'originid':originid,
			'destiid':destiid,
			'depart':depart,
			'netprice':netprice,
			'selling_price':selling_price,
			'bording_points':bording_points,
			'arrival_time':arriv_time,
			'origname':origname,
			'destiname':destiname
		  },function(data){
			$load.html(data);
		});
		
	});	
	});

    
</script>
<!--<script src="js/table_sort/jquery.tablesorter.min.js" type="text/javascript"></script> 
<script src="js/table_sort/jquery.tablesorter.js.patch" type="text/javascript"></script> 



<script type="text/javascript">
$(document).ready(function() {
  $("#my-table-sorter").tablesorter();
});
</script> -->

<script type="text/javascript">
function modify(id)
{		
var curr_open='';
if(document.getElementById('curr_open') != null)
{
	curr_open=document.getElementById('curr_open').value;
}
	   
if(curr_open != '' && curr_open != id)
{
	if(document.getElementById(curr_open) != null)
	{
	var subNavDiv = document.getElementById(id);
	for (var i=1; i<=3; i++)
	{
		if(subNavDiv != i)
		{
		var x= i;
		document.getElementById(x).style.display='none';
		}
	}
	document.getElementById(curr_open).style.display='none';
	}
}
	   
if(document.getElementById(id) != null)
{
	if(document.getElementById(id).style.display == 'none')
	{
	var subNavDiv = document.getElementById(id);
	for (var i=1; i<=3; i++)
	{
		if(subNavDiv != i)
		{
		var x=i;
		document.getElementById(x).style.display='none';
		}
	}
	document.getElementById(id).style.display='block';
	}
	else
	document.getElementById(id).style.display='none';
			
	document.getElementById('curr_open').value=id;
}
}

</script>


<?php
include('footer.php');
?>
