<?php

$key = strval($_GET['key']);
$fields = strval($_GET['fields']);
//DO NOT EDIT

include('db.php');

if($fields == "all fields"){
	$mydata = $mysqli->query("SELECT * FROM `project` WHERE name_of_project LIKE '%".$key."%' OR description LIKE '%".$key."%' OR looking_at LIKE '%".$key."%' ORDER BY datetime DESC;");
}
else{
	$mydata = $mysqli->query("SELECT * FROM `project` WHERE looking_at LIKE '%".$key."%' ORDER BY datetime DESC;");
}
$num_row = $mydata->num_rows;

?>

<?php

//FIXME: EDIT THE STYLE OF THIS

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
