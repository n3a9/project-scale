<html>


<a href="create_project.php">create_project</a>
<a href="account.php">my account</a><br>
<form method='post'>
<input type="text" id="search" name="search">
<input type="radio" name="fields" value="all fields" checked> Search all projects
<input type="radio" name="fields" value="category"> Search a category (example: designer)

</form>
<button onClick="search()">search</button>


<script>

function search() {
	
		var keytext = document.forms[0].search.value;
		var fields = document.forms[0].fields.value;
	
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("results").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","results.php?key="+keytext+"&fields="+fields,true);
        xmlhttp.send();
}
</script>
<div id="results">
<?php
include('db.php');

if (isset($_POST['search'])){
	if($_POST['search'] != ""){
		$key = $_POST['search'];
		$mydata = $mysqli->query("SELECT * FROM `project` WHERE name_of_project LIKE '%".$key."%' OR description LIKE '%".$key."%' OR looking_at LIKE '%".$key."%' ORDER BY datetime DESC;");
	}
	else{
		$mydata = $mysqli->query("SELECT * FROM `project` ORDER BY datetime DESC;");
	}
}
else{
	$mydata = $mysqli->query("SELECT * FROM `project` ORDER BY datetime DESC;");
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
</div>
<div id="user_ridirect"></div>
</html>