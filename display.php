<?php
@include 'connection.php';

// Fetch all orders
$order_query = mysqli_query($conn, "SELECT * FROM `shop2` ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>
    .btn1{
        text-decoration: none;
        background:blue;
        border: radius 10px;;
        color: white;
    }
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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
        .heading {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            color: #007BFF;
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
        .grand-total {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 10px;
        }
        .btn{
            text-decoration: none;
            background: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="heading">Order Details</h1>

    <?php
    if (mysqli_num_rows($order_query) > 0) {
        while ($order = mysqli_fetch_assoc($order_query)) {
            echo "<div class='order-item'>";
            echo "<span><strong>Name:</strong> " . htmlspecialchars($order['name']) . "</span>";
            echo "<span><strong>Phone:</strong> " . htmlspecialchars($order['phone_number']) . "</span>";
            echo "<span><strong>City:</strong> " . htmlspecialchars($order['city']) . "</span>";
            echo "</div>";

            echo "<div class='order-item'>";
            echo "<span><strong>Products:</strong> " . htmlspecialchars($order['total_product']) . "</span>";
            echo "<span class='price'><strong>Total Price:</strong> $" . number_format($order['total_price'], 2) . "</span>";
            echo "</div>";
        }
    } else {
        echo "<p>No orders found.</p>";
    }
    ?>
    
    <a href="index567.php" class="btn1">Home</a>
    <a href="upload.php" class="btn1">UPLOAD PRODUCT</a>
<a href="message.php" class="btn1">COMMENTS</a>

</div>
</body>
</html>