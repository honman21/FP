<?php
include '../demo/header.php';


// Check if product is coming or not
if (isset($_GET['idcart'])) {
  $idcart = $_GET['idcart'];
  // If session cart is not empty
  if (!empty($_SESSION['cart'])) {
    // Using "array_column() function" we get the product id existing in session cart array
    $acol = array_column($_SESSION['cart'], 'idcart');
    // now we compare whther id already exist with "in_array() function"
    if (in_array($idcart, $acol)) {
      // Updating quantity if item already exist
      $_SESSION['cart'][$idcart]['aantal'] += 1;
    } else {

      $item = [
        'idcart' => $_GET['idcart'],
        'aantal' => 1
      ];
      $_SESSION['cart'][$idcart] = $item;
    }
  } else {

    $item = [
      'idcart' => $_GET['idcart'],
      'aantal' => 1
    ];
    $_SESSION['cart'][$idcart] = $item;
  }
}

?>
<head>
    <title>Cart
    </title>
    <link rel="stylesheet" href="../cart/style.css">
  </head>

<div class="cart">
  <?php

      $select_artikel = mysqli_query($connect, "SELECT * FROM artikel");
      if(mysqli_num_rows($select_artikel) > 0){
      while($assoc_artikel = mysqli_fetch_assoc($select_artikel)){

  ?>

  <form action="" method="post">
    <div class="items">
      <h2>
        <?php echo $assoc_artikel['naam'];?>
      </h2>
      <input type="hidden" name="artikel_naam" value="<?php echo $assoc_artikel['naam']?>">

      <div>
        <?php echo $assoc_artikel['omschrijving'];?>
      </div>
      <input type="hidden" name="artikel_omschrijving" value="<?php echo $assoc_artikel['omschrijving']?>">

      <th>
        <?php echo $assoc_artikel['prijs'];?>
      </th>
      
      <input type="hidden" name="artikel_prijs" value="<?php echo $assoc_artikel['prijs']?>">

      <img src="../image/<?php echo $assoc_artikel['image'];?>" height="100">

      <div class="add_cart">
        <a href="../cart/index.php?idcart=<?php echo $assoc_artikel['idartikel']?>" type="button">Add to Cart</a>
      </div>

        <?php 
          }
        }
        ?>

    </div>
  </form>
</div>


<?php 
include 'footer.php'; ?>