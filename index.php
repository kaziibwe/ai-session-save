<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic Data Insertion</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <!-- Your HTML content goes here -->


<!-- cart to serve data -->

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the form is submitted

    // Product information
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Initialize the cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the product to the cart
    $_SESSION['cart'][] = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price
    );

    echo "Product added to cart.";
}
?>
<form method="post" action="">
    <input type="hidden" name="product_id" value="1">
    <input type="hidden" name="product_name" value="Product Name">
    <input type="hidden" name="product_price" value="19.99">
    <input type="submit" value="Add to Cart">
</form>



<?php
// Display cart contents
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    echo "<h2>Shopping Cart</h2>";
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>{$item['name']} - \${$item['price']}</li>";
    }
    echo "</ul>";
} else {
    echo "Your cart is empty.";
}
?>


<?php
// Clear the entire cart
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    echo "Cart cleared.";
}
?>
<form method="post" action="">
    <input type="submit" name="clear_cart" value="Clear Cart">
</form>




</body>
</html>
