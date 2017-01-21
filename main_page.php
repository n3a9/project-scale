<html>
<a href="create_project.php">create_project</a><br>
<?php
include('db.php');

$mydata = $mysqli->query("SELECT * FROM `project` ORDER BY datetime DESC;");
$num_row = $mydata->num_rows;


for($i = 0; $i < $num_row; $i++){
	$row = $mydata->fetch_assoc();
	echo "Name of project:";
	echo $row['name_of_project'];
	echo "<br>Description: ";
	echo $row['description'];
	echo "<br>Looking for: ";
	echo $row['looking_at'];
	echo "<br>Username:";
	echo $row['username'];
	echo "<br><br>";
}

?>

</html>