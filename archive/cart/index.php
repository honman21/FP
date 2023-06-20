<?php

include_once '../demo/config.php';
include_once '../includes/function.inc.php';
include_once '../demo/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta naam="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../demo/style.css">
   <link rel="stylesheet" href="style.css">
   <title>Producten </title>
</head>
<body>

<section class="display-product-table">
   <table>
      <thead>
         <th>Image</th>
         <th>Naam</th>
         <th>Prijs</th>
         <th>action</th>
      </thead>
      <body>

         <?php
              
            $select_artikel = mysqli_query($connect, "SELECT * FROM `artikel`");
            if(mysqli_num_rows($select_artikel) > 0){
               while($row = mysqli_fetch_assoc($select_artikel)){ 
                  
         ?>

         <tr>
            <td><img src="../image/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['naam']; ?></td>
            <td> &euro;<?php echo $row['prijs']; ?></td>
            <td><?php echo $row['omschrijving']; ?></td>
            <td>
               <a href="index.php?delete=<?php echo $row['idartikel']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
               <!-- <a href="index.php?edit=<?php echo $row['idartikel']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a> -->
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </body>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($connect, "SELECT * FROM `artikel` WHERE idartikel = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <!-- <form action="" method="post" enctype="multipart/form-data">
      <img src="../image/uploaded_img/<?php echo $fetch_edit['image']; ?>" height="100" alt="">
      <input type="hidden" naam="update_p_id" value="<?php echo $fetch_edit['idartikel']; ?>">
      <input type="text" class="box" naam="update_p_naam" value="<?php echo $fetch_edit['naam']; ?>">
      <input type="number" min="0" class="box" naam="update_p_prijs" value="<?php echo $fetch_edit['prijs']; ?>">
      <input type="file" class="box" naam="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update product" naam="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn"> -->
   </form>
   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>
</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>