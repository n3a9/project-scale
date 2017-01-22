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
	<li><a href="main_page.php" style="font-size: 1.2rem;">Explore</a></li>
	<li><a href="create_project.php" style="color: #D8D8D8 !important; font-size: 1.2rem;">Create</a></li>
	<li><a href="account.php" style="font-size: 1.2rem;">Profile</a></li>
</ul>
</div>

<?php
//when you access this page from 'edit', id is equal to the id of the post
//when you access this page from 'create', id is 0
//$id = $_POST['edit_id'];
$id =0;
?>

		<div style="padding-top: 2em; width: 90%; margin: 0 auto;">
			<center>
				<form action='post.php' method='post'>
					<input type="hidden" name='id' value="<?php echo $id; ?>">
					<h1 style="font-size:1.5em; margin-bottom: -.2em;">Name of Project</h1><br>
					<input type='text' name='name_of_project'  style="width: 500px; height: 30px;"><br>
					<h1 style="font-size:1.5em; margin-bottom: -.2em; padding-top: 1em;">Description</h1>
					<textarea name='description' style="width: 600px; height: 250px; font-size:14px"></textarea>
					<h1 style="font-size:1.5em; margin-bottom: -.2em; padding-top: 1em;">Looking For</h1>
					<input type='text' name='looking_at' style="width: 500px; height: 50px;">
					<select name="categories">
						<option value="Art/Design">Art/Design</option>
						<option value="Computer Science" checked>Computer Science</option>
						<option value="Engineering">Engineering</option>
						<option value="Humanities">Humanities</option>
						<option value="Math">Math</option>
						<option value="Science">Science</option>
						<option value="Other">O</option>
					</select>
					<input type='submit' style="border: none; background-color: #FFF; margin-top: 2em; width: 75px; height: 30px;">
				</form>
			</center>
		</div>
		
	</body>
</html>
