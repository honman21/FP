<?php
session_start();
include_once '../demo/config.php';
?>

<html>
  <head>
    <title>Flower Power</title>
    <link rel="stylesheet" href="../demo/style.css">
    <link rel="stylesheet" href="../cart/style.css">
  </head>

  <body>
    <div class="bar">
      <li><a href="product.php">Producten</a></li>
      <li><a href="medewerker.php">Medewerkers</a></li>
      <li><a href="bestelpage.php">Bestellingen</a></li>
      <li><a href="logout.php">Logout</a></li>
    </div>
  </body>
</html>
