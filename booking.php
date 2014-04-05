<?php ob_start();
session_start();
include('header.php');
 	
		
		 

$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 

$getTripDet=$client->BookTicket("javaapitest","testing","TGE36K81732");  
var_dump($getTripDet);
 
?>
 
 
<div class="section">
   <div class="print chart">
    
	 
    <form>
	<div id="p1">
	 
    <?php

										  	  
		
 							 
										 
 

	 
	 									 
 
	?>
	</div>
	 

	</form>
	</div>
</div>
<?php
include('footer.php');
	 
?>