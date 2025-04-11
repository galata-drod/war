<?php
include 'connection.php';

if (isset($_POST['update_update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];

    // Update the quantity in the database
    $update_quantity_query = mysqli_query($conn, "UPDATE `shop1` SET quantity = '$update_value' WHERE id = '$update_id'");
    if ($update_quantity_query) {
        header('Location: cart2.php');
        exit(); // Important to stop further execution
    }
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `shop1` WHERE id = '$remove_id'");
    header('Location: cart2.php');
    exit();
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `shop1`");
    header('Location: cart2.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Button Styles */
        .btn {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            color: red;
            text-decoration: none;
        }

        /* Table Bottom Styles */
        .table-bottom {
            font-weight: bold;
        }

        /* Checkout Button */
        .checkout-btn {
            text-align: center;
            margin-top: 20px;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <section class="shopping-cart">
        <h1 class="heading">Shopping Cart</h1>

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $select_cart = mysqli_query($conn, "SELECT * FROM `shop1`");
                $grand_total = 0;
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $price = floatval($fetch_cart['price']);
                        $quantity = intval($fetch_cart['quantity']);
                        $sub_total = $price * $quantity;
                        $grand_total += $sub_total;
                ?>
                <tr>
                <td><img src="img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                    <td><?= htmlspecialchars($fetch_cart['product_name']); ?> (<?= htmlspecialchars($fetch_cart['description']); ?>)</td>
                    <td>$<?= number_format($price, 2); ?>/-</td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="update_quantity_id" value="<?= $fetch_cart['id']; ?>">
                            <input type="number" name="update_quantity" min="1" value="<?= $fetch_cart['quantity']; ?>" style="width: 60px;">
                            <input type="submit" value="Update" name="update_update_btn">
                        </form>   
                    </td>
                    <td>$<?= number_format($sub_total, 2); ?>/-</td>
                    <td><a href="cart2.php?remove=<?= $fetch_cart['id']; ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"><i class="fas fa-trash"></i> Remove</a></td>
                </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='table-bottom'>Your cart is empty!</td></tr>";
                }
                ?>
                <tr class="table-bottom">
                    <td><a href="index567.php" class="btn" style="margin-top: 0;">Back to Home</a></td>
                    <td colspan="3">Grand Total</td>
                    <td>$<?= number_format($grand_total, 2); ?>/-</td>
                    <td><a href="cart2.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"><i class="fas fa-trash"></i> Delete All</a></td>
                </tr>
            </tbody>
        </table>

        <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
        </div>
    </section>
</div>
<script src="js/script.js"></script>
</body>
</html>