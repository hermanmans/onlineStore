<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT*FROM shop ORDER BY book_id ASC LIMIT 4;');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=
require_once ('functions.php');
template_header('Home');
?>

<div class="featured">
    <h2>Gadgets</h2>
    <p>Essential gadgets for everyday use</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&book_id=<?=$product['book_id']?>" class="product">
            <img src="/Images/<?=$product['image']?>" width="200" height="200" alt="<?=$product['book_name']?>">
            <span class="name"><?=$product['book_name']?></span>
            <span class="price">
                 &#82;<?=$product['price']?>
                <?php if ($product['retail_price'] > 0): ?>
                <span class="rrp">	&#82;<?=$product['retail_price']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>