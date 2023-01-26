<?php
include 'connect.php';
include "functions.php";
// The amounts of products to show on each page
$num_products_on_each_page = 4;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $conn->prepare('SELECT * FROM shop ORDER BY book_id ASC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$limitA = 1;
$limitB = 2;
$stmt->bind_param("ii",$limitA, (($current_page - $limitA) * $num_products_on_each_page));
$stmt->bind_param("ii",$limitB, $num_products_on_each_page);

$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll();
// Get the total number of products
$total_products = $conn->query('SELECT * FROM shop')->rowCount();

template_header('Products');
?>

<div class="products content-wrapper">
    <h1>Products</h1>
    <p><?=$total_products?> Products</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&book_id=<?=$product['book_id']?>" class="product">
            <img src="/Images/<?=$product['image']?>" width="200" height="200" alt="<?=$product['book_name']?>">
            <span class="name"><?=$product['book_name']?></span>
            <span class="price">
                &#82;<?=$product['price']?>
                <?php if ($product['retail_price'] > 0): ?>
                <span class="rrp">&#82;;<?=$product['retail_price']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=
include "functions.php";
template_footer();
?>


