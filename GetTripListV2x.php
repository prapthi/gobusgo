<?php ob_start();
session_start();
include('header.php');
 	
		
		echo $fromStationId = $_REQUEST['origin'];
		echo $toStationId = $_REQUEST['destination'];
		echo $travelDate = $_REQUEST['depart'];

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$result5=$client->GetTripListV2("javaapitest","testing", "71","100", "01/02/2014"); 
  
$arr=$result5->pickUpPointList; 
//$arrs=$result5->toStationId; 
//$result=$result5->pickUpPointList; 
?>
 
 
<div class="section">
   <div class="print chart">
    
	 
    <form>
	<div id="p1">
	 
    <?php
	 
   
										 echo $frid=$result5->tripList;
										   var_dump($frid);
										 
										   
										   
										 
		
 							 
										 
 

	 
	 									 
 
	?>
	</div>
	 

	</form>
	</div>
</div>
<?php
include('footer.php');
	 
?>