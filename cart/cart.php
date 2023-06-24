
<?php 
include_once '../demo/header.php'; 
$intotaal = 0;

if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<h3>Geen artikelen in cart</h3>";
  }
}
?>

<div class="cart-items">
  <table>
    <thead>
          <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Aantal</th>
          </tr>
    </thead>

      <tbody>
        <?php
          if (isset($_SESSION['cart'])) :
            $i = 1;
            foreach ($_SESSION['cart'] as $cart) :
        ?>

            <tr class="text">
              <td><?php echo $i; ?> </td>

                  <?php 
                    $image = $cart['pro_id'];

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

                  <?php
                      }
                    }

                    $select_artikelomschrijving = mysqli_query($connect, "SELECT omschrijving FROM artikel WHERE idartikel = '$image'");
                      if(mysqli_num_rows($select_artikelomschrijving) > 0){
                        while($assoc_omschrijving = mysqli_fetch_assoc($select_artikelomschrijving)){
                  ?>

                  <td><?php echo $assoc_omschrijving['omschrijving'];?></td>

                  <td>
                    <form action="../includes/cart.inc/update.php" method="POST">
                      <input type="number" value="<?=$cart['qty'];?>" name="qty" min="1">
                      <input type="hidden" name="upid" value="<?= $cart['pro_id'];?>">
                      <input type="submit" name="update" value="Update" class="update">
                    </form>
                  </td>

                  <?php
                      }
                    }

                    $select_artikelprijs = mysqli_query($connect,"SELECT prijs FROM artikel WHERE idartikel = '$image'");
                      if(mysqli_num_rows($select_artikelprijs) > 0){
                      while ($assoc_prijs = mysqli_fetch_assoc($select_artikelprijs)){
                  ?>
                  <td>
                    &euro;<?php echo $assoc_prijs['prijs']?>
                  </td>
                  <td>
                    &euro;<?php echo $subtt = $assoc_prijs['prijs'] * $cart['qty'];?>
                  </td>
                  <?php
                      $intotaal += $subtt;
                  ?>
                  <br>
                  <td>
                    <a class="remove" href="../includes/cart.inc/removecartitem.php?pro_id=<?= $cart['pro_id']; ?>">Remove</a>
                  </td>
                  <?php
                      }
                    }            
                      $i++;
                    endforeach;
                  endif;

                  ?>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  <td class="bedrag">Totaal bedrag:</td>
                  <td class="bedrag">&euro;<?php echo $intotaal; ?></td>
                  </tr>
                  <td>
                    <a class="delete_all" href="../includes/cart.inc/emptycart.php" onclick="return confirm('remove item from cart?')">Delete all</a>
                  </td>
                  <td>
                    <a class="order" href="checkout.php" class="btn <?= ($intotaal > 1)?'':'disabled'; ?>">Order now</a>
                  </td>
            </tr>
      </tbody>
  </table>
</div>

<?php
 include 'footer.php'; 
?>