<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Searching Busess.............</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

<style type="text/css">
body{ font-family:Arial, Helvetica, sans-serif;}
#load{
position:absolute;
z-index:1;
border:3px double #999;
background:#f7f7f7;
width:50px;
height:50px;
margin-top:-50px;
margin-left:-50px;
top:55%;
left:50%;
text-align:center;
line-height:300px;
font-size:18pt;
}
.style1 {color: #000000}
.cover{ border:#666 4px solid; border-radius:20px; -moz-border-radius:20px; -webkit-border-radius:20px; -khtml-border-radius:20px; margin-top:50px; box-shadow:0 0 10px #ccc;}
.bus_details{border-radius:15px; -moz-border-radius:15px; -webkit-border-radius:15px; -khtml-border-radius:15px; border-collapse:collapse; border:1px solid #666; overflow:hidden;}
.bus_details tr th{ background:#666; font-weight:bold; color:#fff;}
.bus_details tr td{ border:1px solid #ccc;}
</style>
</head>
<script type="text/javascript">
function loadajax(){
	document.loadform.submit();
}

</script>

<?php  
session_start();
// store session data
/*$originid = $_POST['originid'];
$oridata = explode('|',$_POST['originid']);  
$origid = $oridata[0];  
$origname = $oridata[1]; 


$destiid = $_POST['destiid'];
$destdata = explode('|',$_POST['destiid']);  
$destid = $destdata[0];  
$destiname = $destdata[1]; 

$depart = $_POST['depart'];*/


if($_POST['previous']=='previous'){
	$originid = $_POST['originid'];
	$destiid = $_POST['destiid'];
	$depart = $_POST['depart'];
	$ddp = str_replace('/', '-', $depart);
	$previous_date = date('d-m-Y', strtotime($ddp .' -1 day'));
	$depart = str_replace('-', '/', $previous_date);
	$depardata = explode('/',$depart);  
	$date = $depardata[0];  
	$month = $depardata[1];
	$year = $depardata[2];  
	$monthName = date('M', mktime(0, 0, 0, $month, 1, 2000));
	$origname = $_POST['origname'];
	$destiname = $_POST['destiname'];

}elseif($_POST['next']=='next'){


$originid = $_POST['originid'];
$origname = $_POST['origname'];
$destiid = $_POST['destiid'];
$destiname = $_POST['destiname'];

	$depart = $_POST['depart'];
	
	$ddn = str_replace('/', '-', $depart);
	$next_date = date('d-m-Y', strtotime($ddn .' +1 day'));
	$depart = str_replace('-', '/', $next_date);
	
	
	$depardata = explode('/',$depart);  
	$date = $depardata[0];  
	$month = $depardata[1];
	$year = $depardata[2]; 
	$monthName = date('M', mktime(0, 0, 0, $month, 1, 2000));
}elseif($_POST['submit']=='Submit'){
		
		//$originid = $_POST['originid'];
		$oriwitname	=$_POST['originid'];
		$oridata = explode('|',$_POST['originid']);  
		$originid = $oridata[0];  
		$origname = $oridata[1]; 
		
		$destiwitname	=$_POST['destiid'];
		//$destiid = $_POST['destiid'];
		$destdata = explode('|',$_POST['destiid']);  
		$destiid = $destdata[0];  
		$destiname = $destdata[1]; 
		
		$depart = $_POST['depart'];
		$depardata = explode('/',$depart);  
		$date = $depardata[0];  
		$month = $depardata[1];
		$year = $depardata[2];  
		$monthName = date('M', mktime(0, 0, 0, $month, 1, 2000));

}elseif($_POST['search']=='search'){
		
	$oridata = explode('|',$_POST['originid']);  
	$originid = $oridata[0];  
	$origname = $oridata[1]; 
	//$destiid = $_POST['destiid'];
	$destdata = explode('|',$_POST['destiid']);  
	$destiid = $destdata[0];  
	$destiname = $destdata[1]; 
	$depart = $_POST['depart'];
	$depardata = explode('/',$depart);  
	$date = $depardata[0];  
	$month = $depardata[1];
	$year = $depardata[2];  
	$monthName = date('M', mktime(0, 0, 0, $month, 1, 2000));
}
?>
<body onload="loadajax()">
<div id="load" style="display:none;"> </div>
<form name="loadform" action="getTripListV2.php" method="post">
	<input type="hidden" name="originid" value="<?php echo $originid;  ?>" />
	<input type="hidden" name="destiid" value="<?php echo $destiid;  ?>" />
	<input type="hidden" name="depart" value="<?php echo $depart;  ?>" />
	<input type="hidden" name="oridata" value="<?php echo $oriwitname;  ?>" />
	<input type="hidden" name="destdata" value="<?php echo $destiwitname;  ?>" />
	<input type="hidden" name="origname" value="<?php echo $origname;  ?>" />
	<input type="hidden" name="destiname" value="<?php echo $destiname;  ?>" />
	<input type="hidden" name="date" value="<?php echo $date;  ?>" />
	<input type="hidden" name="month" value="<?php echo $month;  ?>" />
	<input type="hidden" name="year" value="<?php echo $year;  ?>" />
	<input type="hidden" name="monthName" value="<?php echo $monthName;  ?>" />
</form>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td>&nbsp;</td>
    <td align="center" valign="middle"><table width="689" border="0" cellpadding="0" cellspacing="0" class="cover">
      <tr>
        <td height="10" align="center" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="42" align="center" valign="middle"><img src="images/logo.png" width="211" height="88"/></td>
      </tr>
      <tr>
        <td height="10" align="center" valign="baseline" class="underline">&nbsp;</td>
      </tr>
      <tr>
        <td height="5" align="center" valign="baseline" bgcolor="#eee" class="text1 style1" style="font-size:13px; padding:10px 0; font-weight: bold;font-family: Arial, Helvetica, sans-serif;">SEARCH IN PROGRESS...........PLEASE WAIT...........</td>
      </tr>
      <tr>
        <td height="15" align="center" valign="middle"><img src="images/loading.gif" /></td>
      </tr>
      <tr>
        <td height="15" align="center" valign="baseline">
        <!-- contents are here -->
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="bus_details">
				<tr align="center" height="3">
					<th width="34%"  class="text">Origin </th>
					<th width="36%"  class="text">Destination </th>
					<th width="30%"  class="text">Departure Date</th>
				</tr>
	          <tr align="center" height="30">
		          
				
				<td  class="textBlack"><?php echo $origname;  ?></td>
				<td  class="textBlack"><?php echo $destiname;  ?></td>
				<td  class="textBlack"><?php echo $depart;  ?></td>
			</tr>
        </table>
        </td>
      </tr>
      <tr>
        <td height="3" align="center" valign="baseline">&nbsp;</td>
      </tr>
      <tr>
        <td height="3" align="center" valign="baseline"> </td>
      </tr>
       <tr>
              
     </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
