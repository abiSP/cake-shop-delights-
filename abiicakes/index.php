<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Delights | Order Cakes Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="homepage">
    <?php include('header.php'); ?>

    <main class="container">
        <h1>Discover Delicious Cakes</h1>
        <div class="cakes">
            <?php
            $cakes = [
                ['id' => 1, 'name' => 'Chocolate Cake', 'price' => 20, 'image' => 'assets/choclate.jpg'],
                ['id' => 2, 'name' => 'Vanilla Cake', 'price' => 18, 'image' => 'assets/vennila.jpg'],
                ['id' => 3, 'name' => 'Red Velvet Cake', 'price' => 25, 'image' => 'assets/redvelvet.jpg'],
                ['id' => 4, 'name' => 'strawberry Cake', 'price' => 22, 'image' => 'assets/strawberry.jpg'],
            ];

            foreach ($cakes as $cake) {
                echo "<div class='cake'>
                        <img src='{$cake['image']}' alt='{$cake['name']}'>
                        <h3>{$cake['name']}</h3>
                        <p>\${$cake['price']}</p>
                        <form method='POST' action='index.php'>
                            <input type='hidden' name='cake_id' value='{$cake['id']}'>
                            <input type='hidden' name='cake_name' value='{$cake['name']}'>
                            <input type='hidden' name='cake_price' value='{$cake['price']}'>
                            <button type='submit' name='add_to_cart' class='btn'>Add to Cart</button>
                        </form>
                      </div>";
            }
            ?>
        </div>
    </main>

    <?php
    if (isset($_POST['add_to_cart'])) {
        $cake_id = $_POST['cake_id'];
        $cake_name = $_POST['cake_name'];
        $cake_price = $_POST['cake_price'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $_SESSION['cart'][] = [
            'id' => $cake_id,
            'name' => $cake_name,
            'price' => $cake_price
        ];

        echo "<script>alert('{$cake_name} added to cart!');</script>";
    }
    ?>

    <?php include('footer.php'); ?>
</body>
</html>
