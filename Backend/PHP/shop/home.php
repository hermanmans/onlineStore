<?php
// Get the 4 most recently added products

$sql='SELECT * FROM shop ORDER BY book_id ASC LIMIT 4;';
$result = $conn->query($sql);
if ($result) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  };
$recently_added_products = $result -> fetch_all(MYSQLI_ASSOC);
template_header('Home');
?>

<div class="featured">
    <h2>The Bookshop</h2>
    <p>Books that everyone should read</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Products on Special</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&book_id=<?=$product['book_id']?>" class="product">
            <img src="/Images/<?=$product['image']?>" style='border-radius:10%' width="150" height="180" alt="<?=$product['book_name']?>">
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