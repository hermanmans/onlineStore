<?php
include 'connect.php';
//include "functions.php";
// The amounts of products to show on each page
$num_products_on_each_page = 4;
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page =isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $conn->prepare('SELECT * FROM shop ORDER BY book_id ASC LIMIT ?,?');
// bindValue will allow us to use integer in the SQL statement, we need to use for LIMIT
$limitA = 1;
$calc = (($current_page - $limitA)*$num_products_on_each_page);
$stmt->bind_param("ii",$calc, $num_products_on_each_page);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$result  = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);
//print_r($products);
// Get the total number of products
$total_products = 23;
template_header('Products');
//print_r($product['book_id']);
//print_r($products[0]['image']);
print_r ($total_products);
print_r(($current_page * $num_products_on_each_page));
?>

<div class="products content-wrapper">
    <h1>Products</h1>
    <p><?=$total_products?> Products</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
            <?$product['book_id']?>
        <a href="index.php?page=product&book_id=<?=$product['book_id']?>" class="product">
            <img src="/Images/<?=$product['image']?>" style='border-radius:10%' width="150" height="180" alt="<?=$product['book_name']?>">
            <span class="name"><?=$product['book_name']?></span>
            <span class="price">
                &#82;<?=$product['price']?>
                <?php if ($product['retail_price'] > 0): ?>
                <span class="rrp">&#82;<?=$product['retail_price']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <button type="button" >Next
            <?php if ($current_page > 1): ?>
            <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
            <?php endif; ?>
        </button>
        <button type="button" >
            <?php if ($total_products > ($current_page * $num_products_on_each_page)): ?>
            <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
            <?php endif; ?>
        </button>
    </div>

<?=template_footer()?>


