<?php

include_once '../demo/config.php';

// if(isset($_POST['update_update_btn'])){
//    $update_value = $_POST['update_quantity'];
//    $update_id = $_POST['update_quantity_id'];
//    $update_quantity_query = mysqli_query($connect, "UPDATE `cart` SET aantal = '$update_value' WHERE idcart = '$update_id'");
//    if($update_quantity_query){
//       header('location:cart.php');
//    };
// };

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($connect, "DELETE FROM `cart` WHERE idcart = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($connect, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>


   <!-- custom css file link  -->
   <link rel="stylesheet" href="../demo/style.css">

</head>
<body>

<?php include '../demo/header.php'; ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($connect, "SELECT * FROM cart");
         $intotaal = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <form action="" method="post">
            <td><img src="../image/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['naam']; ?></td>
            <td>$<?php echo number_format($fetch_cart['prijs']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['idcart']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['aantal']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>$<?php echo $subtotaal = number_format($fetch_cart['prijs'] * $fetch_cart['aantal']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['idcart']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> remove</a></td>
         </tr>
         <?php
           $intotaal += $subtotaal;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">Intotaal</td>
            <td>$<?php echo $intotaal; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn">delete all </a></td>
         </tr>
         </form>
      </tbody>
   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($intotaal > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>