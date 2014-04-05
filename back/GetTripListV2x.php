<?php ob_start();
session_start();
include('header.php');
 	
		
		echo $fromStationId = $_REQUEST['origin'];
		echo $toStationId = $_REQUEST['destination'];
		echo $travelDate = $_REQUEST['depart'];

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$result5=$client->GetTripListV2("javaapitest","testing", "71","100", "29/01/2014"); 
  
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
										 
										   foreach ( $frid as $trip ) { 
											 echo $arrivalTime = $trip->arrivalTime;
											 echo '<br>';
											  echo $availableSeats = $trip->availableSeats;
											 echo '<br>';
											
										  echo $departureTime = $trip->departureTime;
											  echo '<br>';
											  echo $fare = $trip->fare;
											
  echo '<br>sakthi';
											 echo $trip->pickUpPointList->provider;
											   echo '<br>sakthi';
											 
											

										// var_dump($pickUpPointList);
											  
										  } 
										 
										//echo $tofrid=$arr->provider;
										  
										// echo $tofrid1=$arr->type;
										 
										// echo $tofrid2=$arr->fare;
										  
										//echo  $tofrid3=$arr->departureTime;
										 
										//echo $tofrid4=$arr->ticketType;
										echo $arr=$result5->status->code;
										echo $arr1=$result5->status->message;

										//foreach ($tofrid as $key => $value) {
										//	  echo "$value\n";
										//}
										   
										 
		
 							 
										 
 

	 
	 									 
 
	?>
	</div>
	 

	</form>
	</div>
</div>
<?php
include('footer.php');
	 
?>