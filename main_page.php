<html>
<head>
<link rel="icon" href="logo.png" sizes="16x16 32x32" type="image/png">
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
		<script src="js/custom.js"></script>
		<link rel="stylesheet" href="css/main.css"/>

		<script src="js/authvar.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
		<div class="sup">
		<ul>
			<li><a href="main_page.php" style="color: #FFF; font-size: 1.2rem;">Explore</a></li>
			<li><a href="create_project.php" style="color: #FFF; font-size: 1.2rem;">Create</a></li>
			<li><a href="account.php" style="color: #FFF; font-size: 1.2rem;">Profile</a></li>
		</ul>
		</div>

<form method='post'>


<label class="custom-control custom-radio">
  <input id="radio1" name="fields" type="radio" value="all fields" checked class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Search all projects</span>
</label>
<label class="custom-control custom-radio">
  <input id="radio2" name="fields" type="radio" value="category" class="custom-control-input">
  <span class="custom-control-indicator"></span>
  <span class="custom-control-description">Search a category (example: designer)</span>
</label>
<br>
<div class="col-lg-6">
    <div class="input-group">
      <input type="text" class="form-control" name="search" id="search" placeholder="Search for..."></form>
      <span class="input-group-btn">
        <button onClick="search()" class="btn btn-secondary" ><i class="fa fa-search" aria-hidden="true"></i></button>
      </span>
    </div>
  </div>

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
                document.getElementById("commenting"+pid).innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","comment.php?pid="+pid+"&text="+text,true);
        xmlhttp.send();
}

</script>
<div id='commenting'></div>
<div id="results" >

<div class="container-fluid projects-block" style="width: 90%;">


<?php

include('db.php');

if (isset($_POST['search'])){
	if($_POST['search'] != ""){
		$key = $_POST['search'];
		if($_POST['fields'] == "all fields"){
	$mydata = $mysqli->query("SELECT * FROM `project` WHERE name_of_project LIKE '%".$key."%' OR description LIKE '%".$key."%' OR looking_at LIKE '%".$key."%' ORDER BY datetime DESC;");
}
else{
	$mydata = $mysqli->query("SELECT * FROM `project` WHERE looking_at LIKE '%".$key."%' ORDER BY datetime DESC;");
}
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
echo "<div class='row projects' >";
for($i = 0; $i < $num_row; $i++){
	$row = $mydata->fetch_assoc();
	echo "<div  class='col-md-4 project-item shadow'>
			<div class='picture'>
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
	  $mydata2 = $mysqli->query("SELECT * FROM `comments`,account WHERE account.uid = comments.uid AND pid = '".$row['id']."'ORDER BY datetime DESC;");
	  $num_row2 = $mydata2->num_rows;

for($c = 0; $c < $num_row2; $c++){
	$row2 = $mydata2->fetch_assoc();
	echo "<b>".$row2['username']."</b>: ".$row2['text']."<br>";
}
	  
	  echo"
        
      </div>
      <div class='modal-footer'>
        <div class='comment_div'><input type='text' placeholder='write a comment' name='".$row['id']."' id='".$row['id']."'>
		<button onClick=\"comment('".$row['id']."')\"> send </button></div>
      </div>
    </div>
  </div>
</div>";

echo "</div>";
}
echo "</div>";
?>

</div>
</div>
<div id="user_ridirect"></div>
</body>
</html>