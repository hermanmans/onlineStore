<?php
session_start();
// Include functions and connect to the database using PDO MySQL
include 'connect.php';
include 'functions.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
// Include and show the requested page
include $page . '.php';
print_r($_SESSION);
?>