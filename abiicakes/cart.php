<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart | Cake Delights</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="cartpage">
    <?php include('header.php'); ?>

    <main class="container">
        <h1>Your Cart</h1>
        <div class="cart-items">
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $total = 0;
                foreach ($_SESSION['cart'] as $index => $item) {
                    echo "<div class='cart-item'>
                            <h3>{$item['name']}</h3>
                            <p>Price: \${$item['price']}</p>
                            <form method='POST' action='cart.php'>
                                <input type='hidden' name='remove_index' value='{$index}'>
                                <button type='submit' name='remove_from_cart' class='btn'>Remove</button>
                            </form>
                          </div>";
                    $total += $item['price'];
                }
                echo "<div class='total'>
                        <h2>Total: \${$total}</h2>
                        <button class='btn'>Proceed to Checkout</button>
                      </div>";
            } else {
                echo "<p>Your cart is empty.</p>";
            }
            ?>

            <?php
            if (isset($_POST['remove_from_cart'])) {
                $remove_index = $_POST['remove_index'];
                unset($_SESSION['cart'][$remove_index]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "<script>window.location.href = 'cart.php';</script>";
            }
            ?>
        </div>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
