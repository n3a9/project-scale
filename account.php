<html>
<head>


<link rel="stylesheet" type="text/css" href="style.css">

 <script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>
    <script src="creds/creds.js"></script>
    <script>firebase.initializeApp(config);</script>
    <script src="https://cdn.firebase.com/libs/firebaseui/1.0.0/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/1.0.0/firebaseui.css" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="js/custom.js"></script>
    <link rel="stylesheet" href="css/main.css"/>

    <script src="js/authvar.js"></script>

</head>
<body>
<div class="sup">
<ul>
	<li><a href="main_page.php" style="color: #FFF; font-size: 1.2rem;">Explore</a></li>
	<li><a href="create_project.php" style="color: #FFF; font-size: 1.2rem;">Create</a></li>
	<li><a href="account.php" style="color: #FFF; font-size: 1.2rem;">Profile</a></li>
</ul>
</div>

<div style="width:80%; margin: 0 auto; padding-top: 1em;">
	<img class="shadow" id="profile_pic" src="/profile.jpg" width="300" height="300">
<br>
	<div style="padding-top: 2em;">
		<h2>Name : <span><!--<?php echo $username; ?>--></span></h2><br>
		<h2 style="margin-top: -1em;">email: <span><!--<?php echo $row['email']?>--></span></h2><br>
		<p style="font-size: .8em; font-weight: normal; margin-top: -1em;">this is where the bio will be</p>
	</div>
</div>

<!--<?php
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

?>-->
</body>
</html>
