<?php 

$hostName = "localhost";
$userName = "good-game";
$password = "123qwerty";

$connected = mysqli_connect($host, $username, $password);

if(!$connected)
  die("Failed to connect" . mysqli_connect_error());

echo "Connected succesfully";
?>