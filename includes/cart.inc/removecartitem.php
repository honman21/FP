<?php
session_start();

if (isset($_GET['idcart'])) {
  $cartid = $_GET['idcart'];
  unset($_SESSION['cart'][$cartid]);
  header("location: ../../cart/cart.php");
}
