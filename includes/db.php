<?php
$servername = "cosc360.ok.ubc.ca";
$username = "85707669";
$password = "85707669";
$name = "db_85707669";

// Create connection
$con = new mysqli($servername, $username, $password, $name);
$con -> set_charset("utf8");

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>