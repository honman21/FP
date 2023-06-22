<?php
session_start();

if (isset($_GET['artikelid'])) {
  $cartid = $_GET['artikelid'];
  unset($_SESSION['cart'][$cartid]);
  header("location: ../../cart/cart.php");
}
