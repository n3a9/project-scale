<?php

include('db.php');
$mydata = $mysqli->query("SELECT * from account WHERE uid = '".$_COOKIE['uid']."'");
$row = $mydata->fetch_assoc();
$username = $row['username'];
$name_of_project = $_POST['name_of_project'];
$description = $_POST['description'];
$looking_at = $_POST['looking_at'];
$id = $_POST['id'];
$category = $_POST['categories'];

echo $category;



$dt = new DateTime();

if($id == 0){
	// create a new row
	$mydata = $mysqli->query("INSERT INTO `project` (`id`, `name_of_project`, `description`, `looking_at`, `username`, `datetime`,`category`) VALUES (NULL, '".$name_of_project."', '".$description."', '".$looking_at."', '".$username."', '".($dt->format('Y-m-d H:i:s'))."','".$category."')");
	header("location: /DavisHack_2017/the-network-master/main_page.php");
}
else{
	//modify an existing project
	$mydata = $mysqli->query("UPDATE project SET name_of_project = '".$name_of_project."',  description = '".$description."', looking_at= '".$looking_at."' WHERE id='".$id."'");
}



?>