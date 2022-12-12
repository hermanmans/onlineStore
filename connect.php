<?php
// Storing our mysqli class parameters in variables
$servername = "sql7.freesqldatabase.com";
$username = "sql7583456";
$password = "gjXWE9H8YW";
$dbname = "sql7583456";

// Using the above variables as parameter values
$conn = new mysqli($servername, $username, $password,$dbname); // Create connection
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>