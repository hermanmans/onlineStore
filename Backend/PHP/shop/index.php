<?php
//$message = htmlentities($_POST['message']);
///$user = htmlentities($_POST['user']);
//echo $user." ".$message;
session_start();
// Include functions and connect to the database using PDO MySQL
include 'connect.php';
include 'functions.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';

?>