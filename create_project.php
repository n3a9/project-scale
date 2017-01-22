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
					<input type='text' name='description' style="width: 600px; height: 250px;">
					<h1 style="font-size:1.5em; margin-bottom: -.2em; padding-top: 1em;">Looking For</h1>
					<input type='text' name='looking_at' style="width: 500px; height: 50px;">
					<input type='submit' style="border: none; background-color: #FFF; margin-top: 2em; width: 75px; height: 30px;">
				</form>
			</center>
		</div>
		
	</body>
</html>
