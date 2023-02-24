<?php
// Update the details below with your MySQL details
//$DATABASE_HOST = "sql7.freesqldatabase.com";
//$DATABASE_USER = "sql7583456";
//$DATABASE_PASS = "gjXWE9H8YW";
//$DATABASE_NAME = "sql7583456";
$servername = "localhost";//localhost used instead
$username = "root";
$password = "root";
$dbname = 'book_library';

$conn = new mysqli($servername, $username, $password,$dbname); // Create connection

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);

public function select()
}
//echo "Connection Successful";
