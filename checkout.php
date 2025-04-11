<?php
@include 'connection.php';

if (isset($_POST['order_btn'])) {
    if (isset($_POST['name'], $_POST['phone_number'], $_POST['city'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $number = mysqli_real_escape_string($conn, $_POST['phone_number']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        
        // Fetch cart items from the correct table
        $cart_query = mysqli_query($conn, "SELECT * FROM `shop1`");
        $price_total = 0;
        $product_details = [];

        if (mysqli_num_rows($cart_query) > 0) {
            while ($product_item = mysqli_fetch_assoc($cart_query)) {
                if (isset($product_item['product_name'], $product_item['quantity'], $product_item['price'])) {
                    $product_name = $product_item['product_name'] . ' (' . $product_item['quantity'] . ')';
                    $product_description = isset($product_item['description']) ? $product_item['description'] : 'No description available';
                    $product_price = $product_item['price'] * $product_item['quantity'];
                    $price_total += $product_price;

                    // Store product details
                    $product_details[] = $product_name . ' - ' . $product_description;
                } else {
                    echo "<div class='error-message'>Product data is incomplete.</div>";
                }
            }
        } else {
            echo "<div class='display-order'><span>Your cart is empty!</span></div>";
        }

        $total_product = implode(', ', $product_details);
        
        // Prepare statement
        $stmt = $conn->prepare("INSERT INTO `shop2` (name, phone_number, city, total_product, total_price) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssd", $name, $number, $city, $total_product, $price_total);
        $detail_query = $stmt->execute();

        if ($detail_query) {
            echo "
            <script>
            document.addEventListener('DOMContentLoaded', function() {
                const progressBar = document.getElementById('progressBar');
                progressBar.style.width = '100%'; // Set width to 100% on completion
                progressBar.textContent = 'Order Completed!'; // Optional text
            });
            </script>
            <div class='order-message-container'>
                <div class='message-container'>
                    <h3>Thank you for shopping!</h3>
                    <div class='order-detail'>
                        <span>" . htmlspecialchars($total_product) . "</span>
                        <span class='total'> Total: $" . number_format($price_total, 2) . "/-</span>
                    </div>
                    <div class='customer-details'>
                        <p>Your name: <span>" . htmlspecialchars($name) . "</span></p>
                        <p>Your number: <span>" . htmlspecialchars($number) . "</span></p>
                    </div>
                    <a href='index567.php' class='btn'>HOME</a>
                </div>c
            </div>
            ";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<div class='error-message'>Please fill in all fields.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Heading */
        .heading {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            color: #007BFF;
        }

        /* Progress Bar Styles */
        .progress-container {
            width: 100%;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            margin: 20px 0;
        }

        .progress-bar {
            height: 20px;
            width: 0; /* Initial width is 0 */
            background-color: #4caf50; /* Green color */
            text-align: center; /* Centered text */
            line-height: 20px; /* Centering text vertically */
            color: white; /* Text color */
            transition: width 0.4s ease; /* Smooth transition */
        }

        /* Form Styles */
        .checkout-form {
            padding: 20px;
        }

        /* Display Order */
        .display-order {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .price {
            font-weight: bold;
            color: #28a745;
        }

        /* Grand Total */
        .grand-total {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Input Styles */
        .inputBox {
            margin: 10px 0;
        }

        .inputBox span {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .inputBox input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Button Styles */
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Message Styles */
        .order-message-container {
            background-color: #e9ffe9;
            border: 1px solid #b2f2b2;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .flex {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <section class="checkout-form">
        <h1 class="heading">Complete Your Order</h1>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>

        <form action="" method="post">
            <div class="display-order">
            <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM `shop1`");
                $grand_total = 0;

                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total += $total_price;
            ?>
            <div class="order-item">
                <span><?= htmlspecialchars($fetch_cart['product_name']); ?> (<?= $fetch_cart['quantity']; ?>) - <?= htmlspecialchars($fetch_cart['description']); ?></span>
                <span class="price">$<?= number_format($total_price, 2); ?></span>
            </div>
            <?php
                    }
                } else {
                    echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                }
            ?>
            <span class="grand-total">Grand Total: $<?= number_format($grand_total, 2); ?>/-</span>
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Your Name</span>
                    <input type="text" placeholder="Enter your full name" name="name" required>
                </div>
                <div class="inputBox">
                    <span>Your Number</span>
                    <input type="number" placeholder="Enter your number" name="phone_number" required>
                </div>
                <div class="inputBox">
                    <span>City</span>
                    <input type="text" placeholder="e.g. Mumbai" name="city" required>
                </div>
            </div>

            <input type="submit" value="Order Now" name="order_btn" class="btn">
        </form>
    </section>
</div>
<script src="js/script.js"></script>
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to update the progress bar
    function updateProgressBar() {
        const progressBar = document.getElementById('progressBar');
        progressBar.style.width = '100%'; // Set width to 100% on completion
        progressBar.textContent = 'Order Completed!'; // Optional text
    }

    // Call this function when the order is successfully processed
    <?php if (isset($detail_query) && $detail_query): ?>
        updateProgressBar();
    <?php endif; ?>
});
</script>