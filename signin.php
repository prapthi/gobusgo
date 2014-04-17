<?php
include('header.php');
include('config.inc.php');
?>
<div class="section">
   <div class="print">
    <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform" >
	<div class="pitem"><img src="images/.png" alt="" required=""></div>
	<div class="pitem">Username<input type="text" name="username" value="" required=""></div>
	<div class="pitem">Password<input type="password" name="password" value="" required=""></div>
	<div class="pclick"><input type="submit" name="signin" value="Signin"></div>
	</form>
	</div>
</div>
<?php

if($_POST['signin']== 'Signin' ){
	$username= $_POST['username'];
	$password= $_POST['password'];
	$result = mysql_query("SELECT * FROM gobusgo_agentdetails WHERE username = '$username'");
	$row = mysql_fetch_array($result);
	
	if($row["username"]==$username && $row["password"]==$password){
		session_start();
		$_SESSION['username']=$row["username"];
		header("location:index.php");
	}else{
		echo "Invalid username or password!";
	}
}
	
?>	



<?php
include('footer.php');
?>
