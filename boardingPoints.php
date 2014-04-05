<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" language="javascript">
function createboardingbox(){
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block'
}
function closeboardingbox(){
	document.getElementById('light').style.display='none';
	document.getElementById('fade').style.display='none'
}
</script>



<?php
$scheduleId =  $_POST['scheduleId'];
$depart =  $_POST['depart'];
$fromStationId =  $_POST['originid'];
$toStationId =  $_POST['destiid'];

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
//$getTripDet=$client->GetTripDetailsV2("javaapitest","testing","71","100","25/02/2014","7BA1YI13XC85135"); 
$getTripDet=$client->GetTripDetailsV2("javaapitest","testing",$fromStationId,$toStationId ,$depart,$scheduleId); 



$resTripDet=$getTripDet->tripDetails; 
$boarding = $resTripDet->boardingPointList;  ?>
<div>
	
	
		<div id="dumpBordingPoints" class="boardlist">
			<?php
			foreach ($boarding as $boarding ) {  
					$boardingid = $boarding->boardingPointId; 
					$boardingname = $boarding->boardingPointName; 
					$boardingtime = $boarding->time;    ?>
							<li style='margin-bottom:8px; list-style:none;'><?php echo  $boardingname. '   -    ' .$boardingtime; ?></li>
			<?php }?>
		</div>	
	
</div>
					
			
	
		


