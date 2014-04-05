<?php ob_start();
session_start(); 
include('username.php');
	$provider = $_POST['provider'];
	$type = $_POST['type'];
	$scheduleId = $_POST['scheduleId'];
	$depart = $_POST['depart'];
	
	$origname = $_POST['origname'];
	$destiname = $_POST['destiname'];
	$netprice = $_POST['netprice'];
	
	$originid = $_POST['originid'];
	$destiid = $_POST['destiid'];
	$netprice = $_POST['netprice'];
	
	 
	$_SESSION['originid']=$originid; 
	$_SESSION['destiid']=$destiid; 	
	$_SESSION['scheduleId']=$scheduleId; 		
	$_SESSION['depart']=$depart; 
	
	$_SESSION['origname']=$origname; 
	$_SESSION['destiname']=$destiname; 	
	

$getTripDet=$client->GetTripDetailsV2($username,$password,$originid,$destiid ,$depart,$scheduleId); 
$resTripDet=$getTripDet->tripDetails; 
$boardingpoints =$resTripDet->boardingPointList;
$busLayoutList =$resTripDet->busLayoutList; 
function object_2_array($getTripDet)
{
    $array = array();
    foreach ($getTripDet as $key=>$value)
    {
        if (is_object($value))
        {
            $array[$key]=object_2_array($value);
        }
        elseif (is_array($value))
        {
            $array[$key]=object_2_array($value);
        }
        else
        {
            $array[$key]=$value;
        }
    }
    return $array;
} 

$tripDetails =object_2_array($getTripDet->tripDetails);
$boarding = $tripDetails['boardingPointList'];
$busLayoutList = $tripDetails['busLayoutList'];
$seatDetailList = $tripDetails['seatDetailList']; 


foreach($busLayoutList as $key => $value){
$ssl= $value['seatDetailsList'];
	foreach ($ssl as $key2 => $value1) {
		$rows[$value1['columnNbr']][$value1['rowNbr']] = $value1;
		//$rows[$value1['rowNbr']][$value1['columnNbr']] = $value1;
	}
formTable($rows,$seatDetailList);

	
} 	
		?>
<div class="seability">
<table width="" height="" cellspacing="2" cellpadding="0" border="0" class="tabouter">
	<tr>
		<td class="boardtab">
			<ul class="board">
			<h2>Boarding Points</h2>
			<li>
				<?php 
					foreach ( $boardingpoints as $boarding  ) {  
						$boardingid = $boarding->boardingPointId; 
						$boardingname = $boarding->boardingPointName; 
						$boardingtime = $boarding->time;?>
						<li class="bordli"><?php echo $boardingname.' ' .$boardingtime; ?></li>
				<?php } ?>
			</li>
			</ul>
		</td>
		<td>
			<?php 
			
				
			function formTable($rows,$seatDetailList){
			ksort($rows);
			
			?>
			<div>
				<table width="595" height="199" cellspacing="2" cellpadding="0" border="0">
				  <tbody>
				    <tr>
					  <td width="229" valign="top" align="left"> </td>
					  <td width="71" valign="top" align="left"> </td>
					  <td width="67" valign="top" align="left"> </td>
					  <td width="57" valign="top" align="left"> </td>
					  <td valign="top" align="right"></td>
					</tr>
					<tr>
					  <td id="seat_set" valign="top" align="left" colspan="4">Hint: click on seat to select/deselect</td>
					  <td width="131" valign="top" align="left"> </td>
					</tr>
					<tr>
					  <td valign="top" align="right" rowspan="6" colspan="3">
					    <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" align="center" class="tabseat"><!-- start of tabseat -->
					      <tbody>
					        <tr>
					          <td>
							    <table width="100%" height="40%" border="0" align="left" class="tabinseat"><!-- start of tabinseat -->
							      <tbody>
									<tr>
									  <td width="30" valign="top" height="30" rowspan="6">
										<img src="images/steering.jpg">
										<br>
									  </td>
										<!--<td width="30" height="30" align="center">-->
										<?php
										//echo "<table width='400' height='199' border='0'>";
										
										
										foreach($rows as $keyrows => $valrows){
										
										  for($i=0;$i <= 12;$i++){
										  
										 		$seatNbr= $valrows[$i]['seatNbr'];
												$cellType= $valrows[$i]['cellType'];
										 
										    if(array_key_exists($i,$valrows)){ ?>
												<?php 
												$seatNbr= $valrows[$i]['seatNbr'];
												$cellType= $valrows[$i]['cellType'];
												//echo "<td class='seat'>";
												
												
												
												if($seatNbr!=''){
												
												
												  foreach ($seatDetailList as $key3=>$value ) {
												  $slNbs = $value['seatNbr'];
												  if ($seatNbr== $slNbs){
													  $status = $value['seatStatus'];
													  $seat   = $value['seatNbr'];
													  $fare   = $value['fare'];
													if($status== 'A'){
														if($cellType=='Seat'){
															echo "<td class='seat' id='seat'>";
															echo "<img src='images/Seat.jpg' rel=$seatNbr title=$fare alt=$fare >";
															echo "<img src='images/Seat-availed.jpg' style='display:none' title=$seatNbr rel=$seatNbr alt=$seatNbr>";
														}elseif($cellType=='Berth'){
															echo "<td class='seat' id='seat'>";
															echo "<img src='images/Sleeper.jpg' rel=$seatNbr title=$fare alt=$fare >";
															echo "<img src='images/Sleeper-availed.jpg' style='display:none' title=$seatNbr rel=$seatNbr alt=$seatNbr>";
														}
															echo "<input type='hidden' value=$fare name=fare id=fare />";
															echo "<input type='hidden' value=$seatNbr name=seatNbr id=seatNbr />";
															echo "<input type='hidden' value=$status name=status id=status />";
													} elseif($status == 'M'){
														if($cellType=='Seat'){	
															echo "<td class='seat' id='seat'>";	
															echo "<img src='images/Seat-male.jpg' rel=$seatNbr title=$fare alt=$fare>";
															echo "<img src='images/Seat-availed.jpg' style='display:none' title=$seatNbr rel=$seatNbr alt=$seatNbr>";
														}elseif($cellType=='Berth'){
															echo "<td class='seat' id='seat'>";	
															echo "<img src='images/Sleeper-male.jpg' rel=$seatNbr title=$fare alt=$fare>";
															echo "<img src='images/Sleeper-availed..jpg' style='display:none' title=$seatNbr rel=$seatNbr alt=$seatNbr>";
														}
															echo "<input type='hidden' value=$fare name=fare id=fare />";
															echo "<input type='hidden' value=$seatNbr name=seatNbr id=seatNbr />";
															echo "<input type='hidden' value=$status name=status id=status />";
													} elseif($status == 'F'){
														if($cellType=='Seat'){	
														 	echo "<td class='seat' id='seat'>";	
															echo "<img src='images/Seat-female.jpg' rel=$seatNbr title=$fare alt=$fare>";
															echo "<img src='images/Seat-availed.jpg' style='display:none'  title=$seatNbr rel=$seatNbr alt=$seatNbr>";
														}elseif($cellType=='Berth'){
															echo "<td class='seat' id='seat'>";	
															echo "<img src='images/Sleeper-female.jpg' rel=$seatNbr title=$fare alt=$fare>";
															echo "<img src='images/Sleeper-availed.jpg' style='display:none'  title=$seatNbr rel=$seatNbr alt=$seatNbr>";
														
														}
															echo "<input type='hidden' value=$fare name=fare id=fare />";
															echo "<input type='hidden' value=$seatNbr name=seatNbr id=seatNbr />";
															echo "<input type='hidden' value=$status name=status id=status />";
													}elseif($status == 'B'){
															echo "<td>";
															if($cellType=='Seat'){	
																echo "<img src='images/Seat-booked.jpg' title=$seatNbr rel=$seatNbr alt=$seatNbr name=$seatNbr>";
															}elseif($cellType=='Berth'){
																echo "<img src='images/Sleeper-booked.jpg' title=$seatNbr rel=$seatNbr alt=$seatNbr name=$seatNbr>";
															}
													}  
													  //end of if
												  }
											  }// end of foreach
										        }else{
													echo "<td>";	
													echo "&nbsp;";
												}// end of if
										    }	// end of if
												echo "</td>"; 
										  } //end of for
											echo "</tr>";
										}  // end of foreach
										//echo "</table>";  
										
								?>		
						</tbody>
					  </table><!---end of tabinseat---->
					</td> 
				  </tr>
			  </tbody>
			</table><!---end of tabseat---->
		   </td>
<?php } // end function?>
	<td valign="top" align="right">
		<img src="images/Seat.jpg">
	</td>
	<td  valign="top" align="left">
		Available seat
	</td>
	<tr>
		<td valign="top" align="right">
			<img src="images/Seat-female.jpg">
		</td>
		<td  valign="top" align="left">
			Reserved for Female
		</td>
	</tr>
	<tr>
		<td valign="top" align="right">
			<img src="images/Seat-male.jpg">
		</td>
		<td  valign="top" align="left">
			Reserved for Male
		</td>
	</tr>
	<tr>
		<td valign="top" align="right">
			<img src="images/Seat-availed.jpg">
		</td>
		<td valign="top" align="left">
			Selected seat
		</td>
	</tr>
	<tr>
		<td valign="top" align="right">
			<img src="images/Seat-booked.jpg" >
		</td>
		<td valign="top" align="left">
			Booked seat
		</td>
	</tr>
		
					</tbody>
					</table>
		<div>
			Seats:		
			<span id="showseatnos"></span>
		</div>
		<div>
			Amounts:
			   <span id="showprice" style="font-size:11px; font-family:Arial, Helvetica, sans-serif; text-align:left; font-weight:bold; padding-left:5px; line-height:18px; color:#333;"></span>
		</div>
<form action="busbookings.php" method="post"  name="myForm" onSubmit="return board();">
<input id="TotalSeatPrice" type="hidden" name="TotalSeatPrice" value="">
<input id="individualSeatPrice" type="hidden" name="individualSeatPrice" value="">

	<div style="clear:both; width:100%; height:5px;"></div>
	<table width="" cellspacing="0" cellpadding="0" border="0" align="center" style="margin:0 auto; font-size: 11px; font-weight: bold;text-align: left;">
		<tbody>
			<tr>
				<td width="380">
					<span style="float:left;padding-right:10px;">BoardingPoint Name</span>
					<select id="boardpoint" name="bordingpointname" onChange="document.getElementById('boardname').value=this.value">
						<option selected="selected" value="">--- Select Boarding Points ---</option>
							<?php 
							foreach ( $boardingpoints as $boarding ) {  
								$boardingid = $boarding->boardingPointId; 
								$boardingname = $boarding->boardingPointName; 
								$boardingtime = $boarding->time;
							?> 
								<option  value="<?php echo $boardingid. '|'.$boardingname. ' - '   . $boardingtime; ?>"><?php echo $boardingname. ' - ' .$boardingtime;  ?></option> 
							<?php }?>
					</select>
				</td>
				<td width="415" colspan="2">
					<input id="origname" type="hidden" name="origname" value="<?php echo $origname;?>">
					<input id="destiname" type="hidden" name="destiname" value="<?php echo $destiname;?>">
					<input id='boardname' type='hidden' name="boardname" value=''>
					<input id='seatname' type='hidden' name='seatname' value=''>
					<input id="scheduleId" type="hidden" name="scheduleId" value="<?php echo $scheduleId;?>">
					<input id="depart" type="hidden" name="depart" value="<?php echo $depart;?>">
					<input id="netprice" type="hidden" name="netprice" value="<?php echo $netprice;?>">
					<input id="provider" type="hidden" name="provider" value="<?php echo $provider;?>">
					<input id="type" type="hidden" name="type" value="<?php echo $type;?>">
					<input class="button2 dark_gray" name="submit2" value="Book Now" type="Submit" >
					<input type="hidden" value="bookrequest" name="submit">
				</td>
			</tr>
		</tbody>
	</table>
	<div style="clear:both; width:100%; height:5px;"></div>
</form>
</td></tr>
</table> <!---end of tablouter --->
</div>

<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript">
$(function(){
	$('.seat').click(function(){
		$nseat=$(this).find('img').attr('rel');	//new seat
	    $fare=$(this).find('img').attr('title');	//fare 
	    $altfare=$(this).find('img').attr('alt');	//fare
		$(this).find('img').toggle();
	    $totalPrice=$('#TotalSeatPrice').val();	//totalprice
	    $selSeat=$('#seatname').val();	//consecutive seatname
	    $selPrice =$('#individualSeatPrice').val();	//consecutive price
		$splitSeatnr=$selSeat.split(',');	//consecutive seatname  
	    $selPrice=$selPrice.split(',');	//consecutive price  
		if(jQuery.inArray($nseat,$splitSeatnr)!=-1){
			jQuery.each($splitSeatnr,function(index,$splitSeatnr){
				if($splitSeatnr==$nseat)
				$length=index;
			});
			$splitSeatnr.splice($length,1);
			$newSeatJoin=$splitSeatnr.join(',');
			$('#seatname').val($newSeatJoin);
			jQuery.each($selPrice,function($index,$selPrice){
				if($selPrice==$altfare)
				$length=$index;
			});
			$selPrice.splice($length,1);
			$SelPriceJoin=$selPrice.join(',');
			$('#individualSeatPrice').val($SelPriceJoin);
			$totalPrice=parseInt($totalPrice) - parseInt($fare);
			$('#TotalSeatPrice').val($totalPrice);
	    } else {
			$selPrice[$selPrice.length]=$altfare; 
			$SelPriceJoin=$selPrice.join(',');
			$('#individualSeatPrice').val($SelPriceJoin=$selPrice);
			$splitSeatnr[$splitSeatnr.length]=$nseat; 
			$newSeatJoin=$splitSeatnr.join(',');
			$('#seatname').val($newSeatJoin);
			if($totalPrice ==''){
				$totalPrice=$fare;
				$('#TotalSeatPrice').val($fare);
			}else{

				$totalPrice=parseInt($fare)+parseInt($totalPrice);
				$('#TotalSeatPrice').val($totalPrice);
			}
	    }
	
					
	    $("#showseatnos").html('');
	    $("#showprice").html('');		
	    jQuery.each($splitSeatnr,function($index,$splitSeatnr){
			if($splitSeatnr!=''){
				$("#showseatnos").append("<font color='red' size='1'>"+$splitSeatnr+","+"</font>");
				$("#showprice").html($totalPrice);
			}
	    });
	});	
});

</script>

