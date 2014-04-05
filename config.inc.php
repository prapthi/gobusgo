<?php

$host="ap-cdbr-azure-east-c.cloudapp.net"; // Host name
$username="b1004ffd6cd3ef"; // Mysql username
$password="e2fb48ee"; // Mysql password

// Connect to server and select database.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");

 // $db= mysql_select_db('gobusgo', $con);

$db= mysql_select_db('gobusgoAEOpitgTf', $con);

//Database=gobusgoAEOpitgTf;Data Source=ap-cdbr-azure-east-c.cloudapp.net;User Id=b1004ffd6cd3ef;Password=e2fb48ee


?> 
