<?php
include 'connect.php';
ini_set('display_errors', 1);
// Check to make sure the id parameter is specified in the URL
$book_id = intval($_GET['book_id']);
//print_r($book_id);
if (isset($book_id)) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $conn->prepare('SELECT * FROM shop WHERE book_id = ?');
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    // Fetch the product from the database and return the result as an Array
    $result  = $stmt->get_result();
    $product = $result->fetch_array(); 
    print_r($product);
    echo gettype($book_id);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Id not specified!');
}
template_header('Product');
?>

<div class="product content-wrapper">
    <img src="/Images/<?=$product['image']?>" width="300" height="300" alt="<?=$product['book_name']?>">
    <div>
        <h1 class="name"><?=$product['book_name']?></h1>
        <span class="price">
            &#82;<?=$product['price']?>
            <?php if ($product['retail_price'] > 0): ?>
            <span class="rrp">&#82;<?=$product['retail_price']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['book_id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['description']?>
        </div>
    </div>
</div>

<?=template_footer()?>