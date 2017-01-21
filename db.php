<?php
 
  $mysqli = new mysqli("localhost", "root", "", "the-network");
 
  if ($mysqli->connect_errno) {
 
    echo "MySQL Error # ".$mysqli->connect_errno.": ".$mysqli->connect_error;
 
    exit;
  }
?>