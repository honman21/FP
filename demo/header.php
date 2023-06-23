<?php 
session_start(); 
include_once '../demo/config.php';

if (isset($_SESSION["klant"])) {
  $idklant = $_SESSION["idklant"];
}

?>

<html>
  <head>
    <title>Flower Power</title>
    <link rel="stylesheet" href="../demo/style.css">
    <link rel="stylesheet" href="../cart/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  </head>
  <body>

  <div class="scrollbar" id="scroll">
    </div>

    
      <div class="bar">
        <!-- <img   src="../image/logotran.png" class="logo"> -->
        <li><a href="../demo/index.php">Home</a></li>
        <li><a href="../contact/contact.php">Contact</a></li>
        <li><a href="../cart/index.php">Shop</a></li>


        </script>
        <?php
          if (isset($_SESSION["klant"]) || isset($_SESSION["medewerker"])) {
            echo "<li><a href='../includes/login.inc/logout.inc.php'>Logout</a></li>";
          }

          else{
            echo "<li><a href='../demo/signupacc.php'>Signup</a></li>";
            echo "<li><a href='../demo/login.php'>Login</a></li>";
              }     
        ?>
        <?php
         if (isset($_SESSION["medewerker"])) {
          echo "<li><a href='../admin/index.php'>Producten</a></li>";
        }  

          if (isset($_SESSION["klant"])) {
          echo "<li><a href='../profile/profile.php'>Profiel</a></li>";
          echo "<li><a href='../cart/cart.php'>Cart</a></li>";
        }
        else {
          echo "<li><a href='../cart/cart.php'>Cart</a></li>";
        }
        ?>
        <?php
          if (isset($_SESSION['cart'])) : ?>
            <?php echo count($_SESSION['cart']);; ?>
          <?php endif; ?>
        
          
      </div>
  </body>
</html>
