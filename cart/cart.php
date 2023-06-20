
<?php 
include_once '../demo/header.php'; 


?>

<div class="cart-items">
  <table class="table my-3">
    <thead>
          <tr>
            <th colspan="2">Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
    </thead>
    <form action="">
      <body>
        <?php
        if (isset($_SESSION['cart'])) :
          $i = 1;
          foreach ($_SESSION['cart'] as $cart) :
        ?>

            <tr class="text-center">
              <td><?php echo $i; ?> </td>

                  <?php 
                      $image = $cart['idcart'];
                      $intotaal = 0;

                      $select_artikelimg = mysqli_query($connect, "SELECT `image` FROM artikel WHERE idartikel = '$image'");
                        if(mysqli_num_rows($select_artikelimg) > 0){
                        while($assoc_image = mysqli_fetch_assoc($select_artikelimg)){
                  ?>

                    <td><img src="../image/<?php echo $assoc_image['image'];?>" height="100"></td>
                  
                  <?php
                  }
                }
                      $select_artikelnaam = mysqli_query($connect, "SELECT naam FROM artikel WHERE idartikel = '$image'");
                        if(mysqli_num_rows($select_artikelnaam) > 0){
                        while($assoc_naam = mysqli_fetch_assoc($select_artikelnaam)){
                  ?>
                    <td><?php echo $assoc_naam['naam'];?></td>
                </tr>

                <tr class="text-center">
                  <td> Product <?= $cart['idcart']; ?></td>
                  <td>
                      <form action="../includes/cart.inc/update.php" method="post">
                        <input type="number" value="<?= $cart['aantal']; ?>" name="aantal" min="1">
                        <input type="hidden" name="upid" value="<?= $cart['idcart']; ?>">
                  </td>
                  <td>
                        <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
                      </form>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-danger" href="../includes/cart.inc/removecartitem.php?idcart=<?= $cart['idcart']; ?>">Remove</a>
                  </td>
                </tr>

                <?php                  
                  }
                }
            
                    $i++;
                  endforeach;
                endif;
                ?>
        
                  <td>
                    <a class="delete_all" href="../includes/cart.inc/emptycart.php?" onclick="return confirm('remove item from cart?')">Delete all</a>
                  </td>
                  <td>
                  <div class="checkout-btn">
                    <a href="checkout.php" class="btn <?= ($intotaal > 1)?'':'disabled'; ?>">proceed to checkout</a>
                  </div>
                  </td>
            </tr>
      </body>
    </form>
  </table>
</div>

<?php
 include 'footer.php'; 
?>