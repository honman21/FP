<?php

include_once '../demo/config.php';
include_once '../includes/function.inc.php';

if(isset($_POST['add_to_cart'])){

   $naam = $_POST['naam'];
   $prijs = $_POST['prijs'];
   $image = $_POST['image'];
   $aantal = 1;
 
   $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE naam = '$naam'");
 
   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($connect, "INSERT INTO `cart`(naam, prijs, `image`, aantal) VALUES('$naam', '$prijs', '$image', '$aantal')");
      $message[] = 'product added to cart succesfully';
   }
 
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>

   <title>products</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../demo/style.css">
</head>
<body>

<?php include '../demo/header.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($connect, "SELECT * FROM `artikel`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){

      ?>

      <form action="" method="post">
         <div class="box">
            <img style="width: 150px ; height: 150px" src="../image/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['naam']; ?></h3>
            <div class="price">$<?php echo $fetch_product['prijs']; ?>/-</div>
            <input type="hidden" name="naam" value="<?php echo $fetch_product['naam']; ?>">
            <input type="hidden" name="prijs" value="<?php echo $fetch_product['prijs']; ?>">
            <input type="hidden" name="omschrijving" value="<?php echo $fetch_product['omschrijving']; ?>">
            <input type="hidden" name="image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>