<?php
$pid = strval($_GET['pid']);
$text = strval($_GET['text']);

if($text != ""){

	$uid = $_COOKIE['uid'];

	include('db.php');

	$dt = new DateTime();

		$mydata = $mysqli->query("INSERT INTO `comments` (`id`, `text`, `pid`, `datetime`, `uid`) VALUES (NULL, '".$text."', '".$pid."', '".($dt->format('Y-m-d H:i:s'))."', '".$uid."')");
		
		$mydata2 = $mysqli->query("SELECT * FROM `comments`,account WHERE account.uid = comments.uid AND pid = '".$pid."'ORDER BY datetime ASC;");
		$num_row2 = $mydata2->num_rows;

	for($c = 0; $c < $num_row2; $c++){
		$row2 = $mydata2->fetch_assoc();
		echo "<hr>";
		echo "<font color='gray'>".$row2['username']."</font> : ".$row2['text']."";
	}
}
?>