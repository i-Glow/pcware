<?php 

$host = "localhost";
$userName = "good-game";
$password = "123qwerty";
$database = "pcware";

$conn = mysqli_connect($host, $userName, $password, $database);

if(!$conn)
  die("Failed to connect" . mysqli_connect_error());

?>