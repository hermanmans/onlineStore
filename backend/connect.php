<?php
// Storing our mysqli class parameters in variables
$servername = "localhost";
$username = "root";
$password = "root";

// Using the above variables as parameter values
$conn = new mysqli($servername, $username, $password); // Create connection

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Hello World";
?>