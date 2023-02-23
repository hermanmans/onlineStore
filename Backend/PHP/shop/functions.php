<?php
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
        <link href="/CSS/stylesheet.css" type="text/css" media="all" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
        <title>$title</title>
    </head>
    <body>
        <header id='top'>
            <div class="content-wrapper">
                <h1>The Bookshop</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                    <a href="index.php?page=about_us">About Us</a>
                    <a href="login.php?">Log Out</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>
                        <span>$num_items_in_cart</span>
                    </a>
                </div>
            </div>
            <div class="back">
                <a href="#top" class="backLink" aria-label="Scroll to Top"><i class="fi fi-br-up"></i></a>
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