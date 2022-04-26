<?php 

$host = "localhost";
$userName = "yourname";
$password = "password";
$database = "pcware";

$conn = mysqli_connect($host, $userName, $password, $database);

if(!$conn)
  die("Failed to connect" . mysqli_connect_error());

?>