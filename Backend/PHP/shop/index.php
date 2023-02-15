<?php
session_start();
// Include functions and connect to the database using PDO MySQL
include 'connect.php';
include 'functions.php';
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
print_r($page);
// Include and show the requested page
include $page . '.php';
$arrayKeys = array_keys($_SESSION['cart']);
$keys = $arrayKeys[0];
//echo $keys;
$product_id = intval($_SESSION['product_id']);
$quantity = intval($_SESSION['quantity']);
//print_r($_SESSION['cart'][$product_id]);
print_r($_SESSION['cart']);
//print_r($_SESSION['cart'][$product_id]);
print_r($product_id);
print_r($quantity);
?>