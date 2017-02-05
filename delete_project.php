<?php

$id = strval($_GET['id_project']);

include('db.php');
$mydata = $mysqli->query("SELECT * from account WHERE uid = '".$_COOKIE['uid']."'");
$row = $mydata->fetch_assoc();
$username = $row['username'];

$mydata = $mysqli->query("DELETE FROM `project` WHERE `project`.`id` = ".$id."");
header("location: /DavisHack_2017/project-scale-master3/account.php");


?>