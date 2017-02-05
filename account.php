<html>
<head>
<link rel="icon" href="logo.png" sizes="16x16 32x32" type="image/png">
<?php
 $uid = $_COOKIE['uid'];
 include('db.php');
 $mydata = $mysqli->query("SELECT * FROM `account` WHERE uid = '".$uid."'");
 $row = $mydata->fetch_assoc();
 $username = $row['username'];
?>
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>

</head>
<body>
<div class="sup">
<ul>
	<li><a href="main_page.php" style="color: #FFF; font-size: 1.2rem;">Explore</a></li>
	<li><a href="create_project.php" style="color: #FFF; font-size: 1.2rem;">Create</a></li>
	<li><a href="account.php" style="color: #FFF; font-size: 1.2rem;">Profile</a></li>
  <li><a href="#" id="signout" style="color: #FFF; font-size: 1.2rem;">Sign Out</a></li>
</ul>
</div>

<div class="profile">
	<img class="shadow" id="profile_pic" src="<?php echo $row['photourl'];?>" width="300" height="300">
<br>
	<div style="padding-top: 2em;">
		<h2><?php echo $username; ?></h2><br>
		<h5 style="margin-top: -1em;"><?php echo $row['email']?></h5><br>
		<?php
		if ($uid != $_COOKIE['uid']){
			echo "<p style='font-size: .8em; font-weight: normal; margin-top: -1em;'>".$row['bio']."</p>";
		}
		else{
			echo "
			<form method='post' action='edit_profile.php'>
			<div class='col-lg-9'>
			<div class='input-group'>
			<input type='text' name='bio' style='margin-left:-12' class='form-control' placeholder='Write here your bio...' value='".$row['bio']."'>
				  <span class='input-group-btn'>
					<button class='btn btn-primary' type='submit'><i class='fa fa-pencil' aria-hidden='true'></i></button>
				  </span>
				</div>
			  </div>
			</div>
			</form>";
		}
		?>

</div>

<script>
var previous_id_box  = "0";
var turned_off = false;
function showsetting(id_setting_box){
	if (previous_id_box != "0"){
		$("#"+previous_id_box).css({"opacity":"0"});
	}
	$("#"+id_setting_box).css({"opacity":"1"});
	if(previous_id_box == id_setting_box){
		if (turned_off == false){
			turned_off = true;
			$("#"+id_setting_box).css({"opacity":"0"});
		}
		else{
			turned_off = false;
		}
	}
	previous_id_box = id_setting_box;
	
}

function edit_post(){
	
}	

function comment(pid) {

		var text = document.getElementById(pid).value;
		document.getElementById(pid).value = "";

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("commenting").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","comment.php?pid="+pid+"&text="+text,true);
        xmlhttp.send();
}

</script>

<div class="container-fluid projects-block" style="position:absolute; width:65%; margin-top:32px;right:0;">
<?php
include('db.php');
$mydata = $mysqli->query("SELECT * FROM `project` WHERE username = '".$username."' ORDER BY datetime DESC;");
$num_row = $mydata->num_rows;
?>
<?php

//FIXME: EDIT THE STYLE OF THIS
echo "<div class='row projects' >";
for($i = 0; $i < $num_row; $i++){
	$row = $mydata->fetch_assoc();
	echo "<div  class='col-md-4 project-item shadow'>";
	
	//FIXME: control if the user is the one which logged in
	if(1){
		echo 	"<button onClick=\"showsetting('setting_box_".$i."')\" class='down_arrow'><i class='fa fa-angle-down' aria-hidden='true'></i></button>
				<div class='setting_box shadow' id='setting_box_".$i."' style='opacity:0'>
				<div class='part_setting_box' onClick=\"edit_post()\">Edit</div>
				<a href=\"delete_project.php?id_project=".$row['id']."\" style='color:black;text-decoration:none'><div class='part_setting_box'>Delete</div></a>
				</div>";}
	echo "	<div class='picture'>
				<h5>
                <a href='#'>".$row['name_of_project']."</a>
				</h5>
              <div style='height:57px;font-size:0.8em;overflow:hidden;text-overflow:ellipsis;'>";
	echo $row['description'];
	echo "</div><br>Looking for: ";
	echo $row['looking_at'];
	echo "<br><i class='tags'>#".$row['category']."</i>
		</div>";

	echo "
	<!-- Button trigger modal -->
<button type='button' class='lateral' data-toggle='modal' data-target='#myModal".$row['id']."'>
  <i class='fa fa-expand' aria-hidden='true'></i>
</button>

<!-- Modal -->
<div class='modal fade' id='myModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel".$row['id']."'>".$row['name_of_project']."</h5>".$row['username']."
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'><p>".$row['description']."</p>
	  <p>Looking for ".$row['looking_at']."</p>
	  </div>
	  <div class='modal-body'>";
	  $mydata2 = $mysqli->query("SELECT * FROM `comments`,account WHERE account.uid = comments.uid AND pid = '".$row['id']."'ORDER BY datetime ASC;");
	  $num_row2 = $mydata2->num_rows;
	  ?>
<div id='commenting'>
<?php
for($c = 0; $c < $num_row2; $c++){
	$row2 = $mydata2->fetch_assoc();
	echo "<hr>";
	echo "<font color='gray'>".$row2['username']."</font> : ".$row2['text']."";
}
?>
</div>
<?php
	  echo"

      </div>
      <div class='modal-footer'>

	  <div class='col-lg-12'>
		<div class='input-group'>
		  <input type='text' class='form-control' placeholder='write a comment...' name='".$row['id']."' id='".$row['id']."'>
		  <span class='input-group-btn'>
			<button class='btn btn-primary' onClick=\"comment('".$row['id']."')\"> send </button>
		  </span>
		</div>
	  </div>

      </div>
    </div>
  </div>
</div>";

echo "</div>";
}
echo "</div>";
?>
</div>
</body>
</html>
