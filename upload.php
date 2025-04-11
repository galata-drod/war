<?php

$conn = mysqli_connect('localhost','root','','nama') or die('connection failed');

if(isset($_POST['add_product'])){
   $p_name = $_POST['product_name'];
   $p_price = $_POST['price'];
   $p_image = $_FILES['image']['name'];
   $p_image_tmp_name = $_FILES['image']['tmp_name'];
   $p_image_folder = 'img/'.$p_image;
   $p_description = $_POST['description'];

   $insert_query = mysqli_query($conn, "INSERT INTO `upload`(product_name, price, image,description) VALUES('$p_name', '$p_price', '$p_image','$p_description')") or die('query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product add succesfully';
   }else{
      $message[] = 'could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `upload` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:upload.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:upload.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['id'];
   $update_p_name = $_POST['product_name'];
   $update_p_price = $_POST['price'];
   $update_p_image = $_FILES['image']['item_name'];
   $update_p_image_tmp_name = $_FILES['image']['tmp_name'];
   $update_p_image_folder = 'img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `upload` SET product_name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'product updated succesfully';
      header('location:upload.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:upload.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<a href="index567.php" class="btn">Back to Home</a>
<style>
   .btn{
      text-decoration: none;
      background: blue;
      color: white;
   }
</style>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="assets/css/stylew.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

   

</header>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a new product</h3>
   <input type="text" name="product_name" placeholder="enter the product name" class="box" required>
   <input type="number" name="price" min="0" placeholder="enter the product price" class="box" required>
   <input type="file" name="image" accept="uploaded_img/png, uploaded_img/jpg, uploaded_img/jpeg" class="box" required>
   <input type="text" name="description" placeholder="enter description" class="box" required>
   <input type="submit" value="add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `upload`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['product_name']; ?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td>
               <a href="upload.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
<!-- <a href="admin.php?edit=<" class="option-btn"> <i class="fas fa-edit"></i> update </a> -->
<!-- ?php echo $row['id']; ?> -->
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `upload` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="upload.php" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image_path']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['product_name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>
<style>


</style>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>