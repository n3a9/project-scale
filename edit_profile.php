<?php
$uid = $_COOKIE['uid'];
$bio = $_POST['bio'];

include('db.php');
$mydata = $mysqli->query("UPDATE `account` SET `bio` = '".$bio."' WHERE `account`.`uid` = '".$uid."'");
header("location: /DavisHack_2017/project-scale-master3/account.php");
?>