<?php ob_start();
session_start();
include('header.php');
 	
		
		echo $fromStationId = $_REQUEST['origin'];
		echo $toStationId = $_REQUEST['destination'];
		echo $travelDate = $_REQUEST['depart'];

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
$result5=$client->GetFromToStationIdList("javaapitest","testing"); 
  
$arr=$result5->fromToStationList; 
//$arrs=$result5->toStationId; 
//$result=$result5->pickUpPointList; 
?>
 
 
<div class="section">
   <div class="print chart">
    Easy pay:Pay online towards any gobusgo booking.Please enter your Booking Id and Contact number or Email Id given at the time of booking of proceed. 
	 
    <form>
	<div id="p1">
	 
    <?php
	 
	 foreach ( $arr as $term ) {   
										 echo $frid = $term->fromStationId;
										 echo'<br>';
										 $tofrid  = $term->toStationId;
										 

										foreach ($tofrid as $key => $value) {
											  echo "$value\n";
										}
										   
										 
										 
										 
	}

	 
	 									 
 
	?>
	</div>
	 

	</form>
	</div>
</div>
<?php
include('footer.php');
	 
?>