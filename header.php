<?php
ob_start();
session_start();
?>
<?php 
include "config.inc.php"; 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	<title>GoBusGo</title>
	<meta name="Generator" content="EditPlus">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<link rel="stylesheet" href="css/style.css" type="text/css">

	</head>
	<body>

		<div class="main">
			<div class="header">
				<div class="logo">
				<img src="images/logo.png" alt="">
				</div>
				<div class="icon">
					<div>
						<?php if(isset($_SESSION['uname'])){ ?>
							Welcome, <b><?php echo $_SESSION['uname'];?>!</b> <a href="signout.php">Signout</a>	
						<?php }else{ ?>
							<a href="signin.php">Signin</a>|<a href="agent.php">Signup</a>
						<?php } ?>
					</div>
					<span>Ride with us:</span>
					<a href=""><img src="images/f-icon.png" alt=""></a> 
					<a href=""><img src="images/ticon.png" alt=""></a>
					<a href=""><img src="images/icon.png" alt=""></a>
					<b>&nbsp;094869 30955</b>
			   </div>
				<ul class="menu">
					<li id="index"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<?php if(isset($_SESSION['uname'])){ ?>
					<li><a href="view.php">View Account</a></li>
					<?php }?>
					<li><a href="ticket.php">Print Ticket</a></li>
                    <li><a href="cancel.php">Cancellation</a></li>
					<li><a href="contact.php">Contact Us</a></li>
				</ul>
			</div>
			<div style="clear:both"></div>


