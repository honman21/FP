<?php
include_once "config.php";
?>

<DOCTYPE html>

<html>
  <head>
    <title>Add Product</title>
  </head>
  <body>

  <form action="db/artikel.php" method="POST">
    <!-- //<input type="text" name="Naam" placeholder="Naam">//
    //<br> -->
    <input type="text" name="Omschrijving" placeholder="Omschrijving">
    <br>
    <input type="text" name="Prijs" placeholder="Prijs">
    <br>
    <button type="submit" name="Submit"> Toevoegen</button>
  </form>

  </body>
</html>