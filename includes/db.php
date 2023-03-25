<?php
$servername = "localhost";
$username = "root";
$password = "";
$name = "cosc360";

// Create connection
$con = new mysqli($servername, $username, $password, $name);
$con -> set_charset("utf8");

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
?>