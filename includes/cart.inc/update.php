<?php
session_start();

if ($_POST['update']) {
  $upid = $_POST['upid'];
  $acol = array_column($_SESSION['cart'], 'artikelid');
  if (in_array($_POST['upid'], $acol)) {
    $_SESSION['cart'][$upid]['aantal'] = $_POST['aantal'];
  } else {
    $item = [
      'artikelid' => $upid,
      'aantal' => 1
    ];
    $_SESSION['cart'][$upid] = $item;
  }
  header("location: ../../cart/cart.php");
}
