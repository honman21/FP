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

  </head>
  <body>

  <div class="scrollbar" id="scroll">
    </div>

    
      <div class="bar">
        <!-- <img   src="../image/logotran.png" class="logo"> -->
        <li><a href="../demo/index.php">Home</a></li>
        <li><a href="../demo/index.php">News</a></li>
        <li><a href="../cart/index.php">Shop</a></li>

        <?php
          if (isset($_SESSION["klant"]) || isset($_SESSION["medewerker"])) {
            echo "<li><a href='../profile/profile.php'>Profiel</a></li>";
            echo "<li><a href='../includes/login.inc/logout.inc.php'>Logout</a></li>";
          }

          else{
            echo "<li><a href='../demo/signupacc.php'>Signup</a></li>";
            echo "<li><a href='../demo/login.php'>Login</a></li>";
              }     
        ?>
        <?php
         if (isset($_SESSION["medewerker"])) {
          echo "<li><a href='../productimg/index.php'>Producten</a></li>";
        }  

        
        ?>

          <li><a href="../cart/cart.php">Cart 
          <?php if (isset($_SESSION['cart'])) : ?>
            <?php echo count($_SESSION['cart']);; ?>
          <?php endif; ?>
          </a></li>
      </div>
  </body>
</html>
