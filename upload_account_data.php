<?php

$uid = strval($_GET['uid']);
$username = strval($_GET['username']);
$email = strval($_GET['email']);
$photourl = strval($_GET['photourl']);


include('db.php');
	// create a new row
	$mydata = $mysqli->query("INSERT INTO `account` (`uid`, `username`, `email`, `photourl`) VALUES ('".$uid."', '".$username."', '".$email."', '".$photourl."')");
	

?>