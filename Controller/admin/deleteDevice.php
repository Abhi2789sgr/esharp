<?php 
session_start();
require '../connection.php';
if( isSession("uid") && isSession("pass") )
{
$uid  = session("uid");
$pass = session("pass");
}
else
header("Location: index.php");

$sql = "SELECT id FROM login where uname='{$uid}' and pass='{$pass}' and type='1' and active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	$row = $result->fetch_assoc();
	
	$imei   = "imei";
	
	if( isPost($imei) )
	{
		$imei   = post($imei);
	
		$sql = "DELETE from _f_device WHERE dev_id='{$imei}'";
		if ($conn->query($sql) === TRUE)
			echo "1";
		else
			echo "2";
	
	}
}
else
{
session_unset();
session_destroy();
header("Location: ../Views/index.php?err");
}
?>