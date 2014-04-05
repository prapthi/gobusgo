<?php
include('header.php');

?>
<?php ob_start();
session_start(); ?>
<link type="text/css" rel="stylesheet" href="css/lightbox.css">
<style>
.outtab{
	background-color: rgb(224, 224, 224); 
	/*padding:10px 20px 15px 12px; */
	width:814px;
	margin: 26px;
	border-style:outset;
}
.printts{
	float: right;
    padding-right: 75px;
    padding-top: 36px;
}
.pdf{
	padding-top: 34px;
    padding-left: 810px;
}
table{
	margin-left: 70px;
}

</style>

<script language="javascript">
function printPage(printContent) {
	var display_setting="toolbar=yes,menubar=yes,";
	display_setting+="scrollbars=yes,width=650, height=600, left=100, top=25";
	
	
	var printpage=window.open("","printer",display_setting);
	
	printpage.document.open();
	printpage.document.write('<html><head><title>Confirmation Details</title></head><body style="font-family:verdana; font-size:12px;">');
	
	printpage.document.write(printContent);
	printpage.document.write('</body></html>');
	printpage.print();
	printpage.document.close();
	printpage.focus();

		
}</script>

<link rel="stylesheet" type="text/css" media="print" href="print.css" />
<style type="text/css">
        @media print {
            body * {
                visibility:hidden;
            } 
            #printable, #printable * {
                visibility:visible;
            }
            #printable { /* aligning the printable area */
                position:absolute;
                left:40;
                top:40;
            }
        }
</style>
 



<?php

$bookingId = $_SESSION['bookingId'];
$depart = $_SESSION['depart'];
if(isset($bookingId)){
	
	$selectqry    = "SELECT * FROM gobusgo_passdetails WHERE bookingId = '$bookingId' ";
	
	$sql = mysql_query($selectqry) or die(mysql_error());
	$fetchseat = mysql_fetch_assoc($sql);
	$name = $fetchseat['first_name'] ;
	$age = $fetchseat['age'] ;
	$gender = $fetchseat['gender'] ;
	$address = $fetchseat['address'] ;
	$country = $fetchseat['country'] ;
	$state = $fetchseat['state'] ;
	$city = $fetchseat['city'] ;
	$pincode = $fetchseat['pin_code'] ;
	$mobile = $fetchseat['mobile'] ;
	$email = $fetchseat['email'] ;
	$cust_book_id = $fetchseat['cust_book_id'] ;
	
	$noOfSeats = $fetchseat['noOfSeats'] ;
	$netprice = $fetchseat['netprice'] ;
	$totalFare = $fetchseat['totalFare'] ;
	
	$fromStation = $fetchseat['fromStation'] ;
	$toStation = $fetchseat['toStation'] ;
	$journeyDate = $fetchseat['journey_date'] ;
	$provider = $fetchseat['provider'] ;
	$bus_type = $fetchseat['bus_type'] ;
	$boarding_name = $fetchseat['boarding_name'] ;
	$seatsbooked = $fetchseat['seatNbr'] ;
	
	
	$bookingId = $fetchseat['bookingId'] ;
	
	$client = new SoapClient("http://dev.ticketgoose.com/bookbustickets/services/TGSWS?wsdl"); 
	$bookTickets= $client->BookTicket("javaapitest","testing",$bookingId);
	$cancellist = $bookTickets->cancellationDescList;
	$seat= $status->seatNbr;
	$travelsPhoneNbr = $bookTickets->travelsPhoneNbr;
	
	$status = $bookTickets->status;
	$code= $status->code;
?>
<body>
<div class="printts">
	<a href="javascript:void(0);" onClick="printPage(printsection.innerHTML)"><img src="images/printer.jpg" /></a>	
</div>
<div class="pdf">
	<a href="<?php echo $fetchseat['cust_book_id'] .'_'. $fetchseat['first_name'] . '.pdf';?>" target="_blank"><img src="images/pdf.png"></a>
	
</div>
<?php 
  if($code= "200"){  ?>
	<div id="printsection">
		<form name="contactdet" id="contactdet" action="" method="post" />
				<table>
						<th>CANCELLATION POLICY</th>
						<tr><td>
								<?php
									foreach($cancellist as $value){
									echo "<li style='margin:38px 26px 42px;list-style-type:square;'>".$value."</li>" ;
									}
								?>
						</td></tr>
				</table>
		</form>
	
	<div class="outtab">
		<form name="contactdet" id="contactdet" action="" method="post" />
			<input type="hidden" name="bookingId" id="contactdet" value="<?php echo $bookingId; ?>" />
			<table id="cont">
				<th> <?php echo $name; ?>  DETAILS</th>
				<tr><td class="det">Operator PNR</td><td class="colon">:</td><td><?php echo "<div style ='font:26px Arial,tahoma,sans-serif;'>$cust_book_id</div>" ?></td></tr>
				<tr><td>Name</td><td class="colon">:</td><td><?php echo "<div style ='font:26px Arial,tahoma,sans-serif;'>$name</div>"; ?></td></tr>
				<tr><td>Age</td><td class="colon">:</td><td><?php echo $age; ?></td></tr>
				<tr><td>Gender</td><td class="colon">:</td><td><?php echo $gender; ?></td></tr>
				<tr><td>Address</td><td class="colon">:</td><td><?php echo $address. ', '. $city . ', '.$pincode ; ?></td></tr>  
				<tr><td>State</td><td class="colon">:</td><td><?php echo $state; ?></td></tr>
				<tr><td>Mobile</td><td class="colon">:</td><td><?php echo $mobile; ?></td></tr>
				<tr><td>Email</td><td class="colon">:</td><td><?php echo $email; ?></td></tr>
				<tr><td>From</td><td class="colon">:</td><td><?php echo $fromStation; ?></td></tr>
				<tr><td>To</td><td class="colon">:</td><td><?php echo $toStation; ?></td></tr>
				<tr><td>Journey Date</td><td class="colon">:</td><td><?php echo $journeyDate; ?></td></tr>
				<tr><td>Provider</td><td class="colon">:</td><td><?php echo $provider; ?></td></tr>
				<tr><td>Provider Type</td><td class="colon">:</td><td><?php echo $bus_type; ?></td></tr>
				<tr><td>Boarding Point</td><td class="colon">:</td><td><?php echo $boarding_name; ?></td></tr>
				<!--<tr><td>Booking PNR:</td><td><?php //echo $bookingId; ?></td></tr>-->
				<tr><td>Seat Numbers</td><td class="colon">:</td><td><?php echo $seatsbooked; ?></td></tr>
				<tr><td>Total Seats</td><td class="colon">:</td><td><?php echo $noOfSeats; ?></td></tr>
				<tr><td>Total Price</td><td class="colon">:</td><td><?php echo $totalFare; ?></td></tr>
				<tr><td></td></tr>
				<th>CONTACT DETAILS</th>
				<tr><td colspan=3><?php echo $travelsPhoneNbr; ?></td></tr>
			</table> 
		</form>
	</div>

</div>
<?php
	unset($_SESSION);
	session_destroy();
}else{  ?>
<div style="padding:20px 10px 15px 11px;margin:145px; font-size:22px; line-height:1.3cm; color:#244255;"> TRY AGAIN......</div>
<?php
	unset($_SESSION); // will delete just the name data
	session_destroy();
}
}?>


<link rel="stylesheet" type="text/css" media="print" href="print.css" />
<style type="text/css">
        @media print {
            body * {
                visibility:hidden;
            } 
            #printable, #printable * {
                visibility:visible;
            }
            #printable { /* aligning the printable area */
                position:absolute;
                left:40;
                top:40;
            }
        }
</style>
 



 <?php 
 

date_default_timezone_set('UTC');
require('fpdf/fpdf.php');

class PDF_result extends FPDF {
	function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
		$this->FPDF($orientation, $unit, $format);
		$this->SetTopMargin($margin);
		$this->SetLeftMargin($margin);
		$this->SetRightMargin($margin); 
		$this->SetAutoPageBreak(true, $margin);
	}
	
	function Header () {
	    // $this->Image('images/alpsciti.jpg',60,15,472,53);

	//	$this->SetFont('Arial', 'B', 20);
	//	$this->SetFillColor(36, 96, 84);
	//	$this->SetTextColor(225);
	//	$this->Cell(0, 30, "YouHack MCQ Results", 0, 1, 'C', true);
	}
	
 function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Generated at Sakthivel',0,0,'C');
}

	
function Generate_Table($subjects, $marks) {
	$this->SetFont('Arial', 'B', 12);
	$this->SetTextColor(0);
//	$this->SetFillColor(94, 188, z);
$this->SetFillColor(94, 188, 225);
	$this->SetLineWidth(1);
	$this->Cell(427, 25, "Subjects", 'LTR', 0, 'C', true);
	$this->Cell(100, 25, "Marks", 'LTR', 1, 'C', true);
	 
	$this->SetFont('Arial', '');
	$this->SetFillColor(238);
	$this->SetLineWidth(0.2);
	$this->Ln();
	$fill = false;
	
	for ($i = 0; $i < count($subjects); $i++) {
		$this->Cell(427, 20, $subjects[$i], 1, 0, 'L', $fill);
		$this->Cell(100, 20,  $marks[$i], 1, 1, 'R', $fill);
		$fill = !$fill;
	}
	$this->SetX(367);
	//$this->Cell(100, 20, "Total", 1);
//	$this->Cell(100, 20,  array_sum($marks), 1, 1, 'R');
}
	
	
}

$pdf = new PDF_result();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->SetMargins(0,0);
$pdf->SetAutoPageBreak(false);
$pdf->Cell(10,30,"CANCELLATION POLICY");
$pdf->Ln();

foreach ( $cancellist as $value ) {
	
	$pdf->Cell(100, 30, $value);
$pdf->Ln();

}

$pdf->Ln();

$pdf->Text(10,250,"PASSENGER DETAILS");


$pdf->Text(10,280,"Operator PNR");
$pdf->Text(150,280,":");
$pdf->SetFont('Arial','B',24);
$pdf->Text(160,280,$cust_book_id);

$pdf->SetFont('Arial','B',14);
$pdf->Text(10, 300,"Name");
$pdf->Text(150, 300,":");
$pdf->SetFont('Arial','B',24);
$pdf->Text(160,300,$name);

$pdf->SetFont('Arial','B',14);
$pdf->Text(10,320,"Age");
$pdf->Text(150,320,":");
$pdf->Text(160,320,$age);

$pdf->Text(10,340,"Gender");
$pdf->Text(150,340,":");
$pdf->Text(160,340,$gender);


$pdf->Text(10,360,"Address");
$pdf->Text(150, 360,":");
$pdf->Text(160,360,$address. ","." " .$city.",". " ".$pincode);

$pdf->Text(10,380,"State");
$pdf->Text(150, 380,":");
$pdf->Text(160,380,$state);

$pdf->Text(10,400,"Mobile");
$pdf->Text(150,400,":");
$pdf->Text(160,400,$mobile);

$pdf->Text(10,420,"Email");
$pdf->Text(150,420,":");
$pdf->Text(160,420,$email);

$pdf->Text(10,440,"From");
$pdf->Text(150, 440,":");
$pdf->Text(160,440,$fromStation);

$pdf->Text(10,460,"To");
$pdf->Text(150, 460,":");
$pdf->Text(160,460,$toStation);

$pdf->Text(10,480,"Journey Date");
$pdf->Text(150,480,":");
$pdf->Text(160,480,$journeyDate);

$pdf->Text(10,500,"Provider");
$pdf->Text(150,500,":");
$pdf->Text(160,500,$provider);

$pdf->Text(10,520,"Provider Type");
$pdf->Text(150, 520,":");
$pdf->Text(160,520,$bus_type);

$pdf->Text(10,540,"Boarding Point");
$pdf->Text(150, 540,":");
$pdf->Text(160,540,$boarding_name);


$pdf->Text(10,560,"Seat Numbers");
$pdf->Text(150, 560,":");
$pdf->Text(160,560,$seatsbooked);

$pdf->Text(10,580,"Total Seats:");
$pdf->Text(150, 580,":");
$pdf->Text(160,580,$noOfSeats);

$pdf->Text(10,600,"Total Price");
$pdf->Text(150,600,":");
$pdf->Text(160,600,$totalFare);

$pdf->Text(10,650,"CONTACT DETAILS");
$pdf->Text(10,680,$travelsPhoneNbr, 1);

//$pdf->Text(10,680,$travelsPhoneNbr);

$pdf->Ln(100);
$pdf->Output($cust_book_id.'_'.$name.'.pdf', 'F');

?>

</body>
<?php
	include('footer.php');
?>
