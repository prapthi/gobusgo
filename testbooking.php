<?php ob_start();
session_start();
include('header.php');
 	
		
		echo $fromStationId = $_REQUEST['origin'];
		echo $toStationId = $_REQUEST['destination'];
		echo $travelDate = $_REQUEST['depart'];

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$result5=$client->ProcessRequest("javaapitest","testing", "71","72", "25/01/2014", "717ZPYI13XC36135","Sakthivel", "9944206992", "sakthivel@prapthi.com", "2", "test comment"); 
  
$arr=$result5->pickUpPointList; 
//$arrs=$result5->toStationId; 
//$result=$result5->pickUpPointList; 
?>
 
 
<div class="section">
   <div class="print chart">
    
	 
    <form>
	<div id="p1">
	 
    <?php
	 
    var_dump($result5);
										echo $arr=$result5->status->code;
										echo $arr1=$result5->status->message;
										exit;
										   var_dump($frid);
										 exit;
										   foreach ( $frid as $trip ) { 
											 echo $arrivalTime = $trip->arrivalTime;
											 echo '<br>';
											  echo $availableSeats = $trip->availableSeats;
											 echo '<br>';
											
										  echo $departureTime = $trip->departureTime;
											  echo '<br>';
											  echo $fare = $trip->fare;
											

											echo $check  = $term->pickUpPointList;
											var_dump($check);
											 echo '<br>';
											  echo $provider = $trip->provider;
											   echo '<br>';
											  echo $scheduleId = $trip->scheduleId;
											   echo '<br>';
											  echo $ticketType = $trip->ticketType;
											   echo '<br>';
											  echo $type = $trip->type;

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