<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    //$DATABASE_HOST = "sql7.freesqldatabase.com";
    //$DATABASE_USER = "sql7583456";
    //$DATABASE_PASS = "gjXWE9H8YW";
    //$DATABASE_NAME = "sql7583456";
    $servername = "sql7.freesqldatabase.com";
    $username = "sql7583456";
    $password = "gjXWE9H8YW";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=sql7583456", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    } catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
    //phpinfo();
    //mysql_ping();
    }

}
function template_header($title) {
    // Get the amount of items in the shopping cart, this will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/CSS/stylesheet.css" media="all" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <title>$title</title>
    </head>
    <body>
        <header>
            <div class="content-wrapper">
                <h1>Shopping Cart System</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
                    </a>
                </div>
            </div>
        </header>
        <main>
EOT;
};
    // Template footer
    function template_footer() {
    $year = date('Y');
    echo <<<EOT
            </main>
            <footer>
                <div class="content-wrapper">
                    <p>&copy; $year, Shopping Cart System</p>
                </div>
            </footer>
        </body>
</html>
EOT;
}
?>