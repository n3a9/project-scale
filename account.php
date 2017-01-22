<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="sup">
			<table width="100%">
				<tr>
					<td width="33.33%">
						<center>
						<a href="create_project.php" style="color: #000;"><div class="button shadow">NEW PROJECT</div></a>
						</center>
					</td>
					<td width="33.33%">
						<center>
						<a href="main_page.php" style="color: #000;"><div class="button shadow">HOME</div></a>
						</center>
					</td>
					<td  width="33.33%">
						<center>
						<a href="account.php" style="color: #000;"><div class="button shadow">MY ACCOUNT</div></a>
						</center>
					</td>
				</tr>
			</table>
		</div>

<div style="width:80%; margin: 0 auto; padding-top: 1em;">
	<img class="shadow" id="profile_pic" src="/profile.jpg" width="300" height="300">
<br>
	<div style="padding-top: 2em;">
		<h2>Name : <span><?php echo $username; ?></span></h2><br>
		<h2 style="margin-top: -1em;">email: <span><?php echo $row['email']?></span></h2><br>
		<p style="font-size: .8em; font-weight: normal; margin-top: -1em;">this is where the bio will be</p>
	</div>
</div>

<?php
 $uid = $_COOKIE['uid'];
 include('db.php');
 $mydata = $mysqli->query("SELECT * FROM `account` WHERE uid = '".$uid."'");
 $row = $mydata->fetch_assoc();
 $username = $row['username'];
?>



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
</body>
</html>
