<?php
include '../demo/header.php';



if (isset($_GET['pro_id'])) {
  $proid = $_GET['pro_id'];

  if (!empty($_SESSION['cart'])) {
    $acol = array_column($_SESSION['cart'], 'pro_id');

    if (in_array($proid, $acol)) {
      $_SESSION['cart'][$proid]['qty'] += 1;
    } else {

      $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1
      ];
      $_SESSION['cart'][$proid] = $item;
    }
  } else {

    $item = [
      'pro_id' => $_GET['pro_id'],
      'qty' => 1
    ];
    $_SESSION['cart'][$proid] = $item;
  }
}

?>
<head>
    <title>Cart
    </title>
    <link rel="stylesheet" href="../cart/style.css">
  </head>

<div class="cart">

  <form action="" method="POST">
    <?php

      $select_artikel = mysqli_query($connect, "SELECT * FROM artikel");
        if(mysqli_num_rows($select_artikel) > 0){
          while($assoc_artikel = mysqli_fetch_assoc($select_artikel)){

    ?>
        <form action="" method="POST">
          <div class="items">
            <h2><?php echo $assoc_artikel['naam'];?></h2>
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
              <a class="add" href="index.php?pro_id=<?php echo $assoc_artikel['idartikel'];?>" type="button">Add to Cart</a>
            </div>
        </form>
        <br>

        <?php 
          }
        }
        ?>

    </div>
  </form>
</div>


<?php 
include 'footer.php'; ?>