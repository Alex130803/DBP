<?php
$servername = "localhost";  
$username = "ib8671";
$password = "Theurgy7+alleviate";
$dbname = "ib8671";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


