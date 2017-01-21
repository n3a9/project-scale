<?php
$username = "try1";
$name_of_project = $_POST['name_of_project'];
$description = $_POST['description'];
$looking_at = $_POST['looking_at'];
$id = $_POST['id'];

include('db.php');

$dt = new DateTime();

if($id == 0){
	// create a new row
	$mydata = $mysqli->query("INSERT INTO `project` (`id`, `name_of_project`, `description`, `looking_at`, `username`, `datetime`) VALUES (NULL, '".$name_of_project."', '".$description."', '".$looking_at."', '".$username."', '".($dt->format('Y-m-d H:i:s'))."')");
	header("location: /DavisHack_2017/main_page.php");
}
else{
	//modify an existing project
	$mydata = $mysqli->query("UPDATE project SET name_of_project = '".$name_of_project."',  description = '".$description."', looking_at= '".$looking_at."' WHERE id='".$id."'");
}



?>