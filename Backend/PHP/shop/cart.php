<?php
include "connect.php";

// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity'],$_POST['book']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $_SESSION['product_id']=$_POST['product_id'];////////// session was added here///////////
    $_SESSION['quantity']=$_POST['quantity'];
    $_SESSION['book_name']=$_POST['book'];
    $product_id = intval($_SESSION['product_id']);
    $quantity = intval($_SESSION['quantity']);

   
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $conn->prepare('SELECT * FROM shop WHERE book_id = ?');
    $stmt->bind_param("i", $product_id );
    $stmt->execute();
    // Fetch the product from the database and return the result as an Array
    $result  = $stmt->get_result();
    $item = $result->fetch_array();

    // Check if the product exists (array is not empty)
    if ($item && $quantity > 0) {/////////////////// error here somewhere //////////////
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            }else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            };
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
           
            
        };
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
    
}

// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
$keys = array_keys($products_in_cart);
$values = array_values($products_in_cart);
// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $param = implode('', array_fill(0, count($products_in_cart), 'i'));
    $stmt = $conn->prepare('SELECT * FROM shop WHERE book_id IN (' . $array_to_question_marks . ')');
    $stmt->bind_param($param, ...$keys);
    $stmt->execute();
    // Fetch the products from the database and return the result as an Array
    $res  = $stmt->get_result();
    $products = $res->fetch_all(MYSQLI_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['book_id']];
    }
    
}
//Create a cart class for adding products to database
    class Cart{
        private $id;
        private $amount;
        private $username;
        private $book;

        public function __construct($username,$book,$id,$amount){
            $this->username=$username;
            $this->id=$id;
            $this->book=$book;
            $this->amount=$amount;
        }
        public function getID(){
            return $this->id;
        }
        public function getBook(){
            return $this->book;
        }
        public function getUser(){
            return $this->username;
        }
        public function getAmount(){
            return $this->amount;
        }
    
    };
?>
<!--Creating shopping cart template-->
<?=template_header('Cart');
$obj = new Cart($_SESSION['username'],$_SESSION['book_name'],$keys,$values,);
    $valueUsername = $obj->getUser();
    $valueBook = $obj->getBook();
    $valueID= end($obj->getID());
    $valueQuantity = end($obj->getAmount());
    $test = "INSERT INTO cart(username,book_name,book_id,quantity) VALUES ('$valueUsername','$valueBook','$valueID','$valueQuantity')";
    $checkGroup = $conn->query("SELECT * FROM cart WHERE book_name = '$valueBook' AND quantity = '$valueQuantity'");
    $check = $conn->query("SELECT * FROM cart WHERE book_name = '$valueBook'");
    $checkrows = mysqli_num_rows($check);
    $checkAll = mysqli_num_rows($checkGroup);
    if($checkrows != $checkAll) {
        $conn->query("DELETE FROM cart WHERE book_name = '$valueBook'");
        $newCart =$conn->query($test);
        echo "book already in cart";
     } else if($checkrows>0 && $checkrows = $checkAll) {
        echo "book already in cart";
     } else {
        $newCart =$conn->query($test);
     }; 
?>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&book_id=<?=$product['book_id']?>">
                            <img src="/Images/<?=$product['image']?>"style='margin-left:10px;border-radius:10%' width="150" height="180" alt="<?=$product['book_name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&book_id=<?=$product['book_id']?>"><?=$product['book_name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['book_id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&#82;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['book_id']?>" value="<?=$products_in_cart[$product['book_id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&#82;<?=$product['price'] * $products_in_cart[$product['book_id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&#82;<?=$subtotal?></span>
        </div>
        <div class="cartButtons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>

<?=
template_footer();
?>