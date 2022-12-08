<?php
// Storing our mysqli class parameters in variables
$servername = "sql7583456";
$username = "sql7583456";
$password = "gjXWE9H8YW";

// Using the above variables as parameter values
$conn = new mysqli($servername, $username, $password); // Create connection

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Hello World";
?>