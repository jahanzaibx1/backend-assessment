<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "rishtonschool";

//Now Creating connections
$conn = new mysqli($servername, $username, $password, $dbname);

// Now Checking for connections
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
