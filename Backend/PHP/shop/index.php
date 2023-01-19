<?php
session_start();
// Include functions and connect to the database using PDO MySQL
include 'functions.php';
$dbcon = connect_mysql();
$page = isset($_GET['page']) && file_exists($_GET['page']. 'php') ? $_GET['page'] : 'home' && template_header('Home') ;
// Include and show the requested page

?>