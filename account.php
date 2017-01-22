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
<?php
 $uid = $_COOKIE['uid'];
 include('db.php');
 $mydata = $mysqli->query("SELECT * FROM `account` WHERE uid = '".$uid."'");
 $row = $mydata->fetch_assoc();
 $username = $row['username'];
?>

<div>
<center>
<img class="shadow" id="profile_pic" src="<?php echo $row['photourl']; ?>" width="200" height="200">
</center>
Nome : <span><?php echo $username; ?></span><br>
email: <span><?php echo $row['email']?></span><br>
</div>
<br>

<?php

include('db.php');

$mydata = $mysqli->query("SELECT * FROM `project` WHERE username = '".$username."' ORDER BY datetime DESC;");
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

</html>