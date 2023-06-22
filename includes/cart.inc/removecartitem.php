<?php
session_start();

if (isset($_GET['pro_id'])) {
  $proid = $_GET['pro_id'];
  unset($_SESSION['cart'][$proid]);
  header("location: ../../cart/cart.php");
}
