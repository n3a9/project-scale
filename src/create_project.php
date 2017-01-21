<html>
<?php
//when you access this page from 'edit', id is equal to the id of the post
//when you access this page from 'create', id is 0
//$id = $_POST['edit_id'];
$id =0;
?>
<body>
<a href="main_page.php">main page</a>
<form action='post.php' method='post'>
<input type="hidden" name='id' value="<?php echo $id; ?>">
Name_of_project<input type='text' name='name_of_project'>
description<input type='text' name='description'>
looking_at<input type='text' name='looking_at'>
<input type='submit'>
</form>
</body>
</html>