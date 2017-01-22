<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<div class="sup">
<table width="100%">
	<tr>
		<td width="33.33%">
			<center>
			<a href="create_project.php"><div class="button shadow">NEW PROJECT</div></a>
			</center>
		</td>
		<td width="33.33%">
			<center>
			<a href="main_page.php"><div class="button shadow">HOME</div></a>
			</center>
		</td>
		<td  width="33.33%">
			<center>
			<a href="account.php"><div class="button shadow">MY ACCOUNT</div></a>
			</center>
		</td>
	</TR>
</TABLE>
</div>

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
	echo "<div class = 'projects shadow'>";
	echo "<p style='text-align:center'><b>".$row['name_of_project']."</b></p>";
	echo $row['description'];
	echo "<br>Looking for: ";
	echo $row['looking_at'];
	echo "<br>Username:";
	echo $row['username'];
	echo "</div>";
}

?>
</div>
<div id="user_ridirect"></div>
</html>