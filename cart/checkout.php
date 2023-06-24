<?php
include '../demo/header.php';
include_once '../includes/function.inc.php';

if (emptyinputcart($artikelid) !== false) {
   header ("location: cart.php?error=emptyinput");
   }

if(isset($_SESSION["klant"])){


    $id = $_SESSION["idklant"];

    $sql = "INSERT INTO factuur (datum, idklant, idwinkel, afgehaald, idmedewerker) VALUE (CURRENT_DATE, '$id', '1', false, '0')";
    if ($connect->query($sql) === true) {

        $rowsql = mysqli_query($connect, "SELECT MAX(factuurid) AS max FROM factuur") ;
        $row = mysqli_fetch_array($rowsql);
        $factuurid = $row['max'];


    } else {
        header ("location: ../cart/cart.php?error=Somethingwentwrong");
    }
   if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $cart) {
           $artikelid = $cart['pro_id'];
           $qty = $cart['qty'];

            $sql = "INSERT INTO `artikel_has_factuur` (artikel_idartikel, factuur_factuurid, qty) VALUE ($artikelid, $factuurid, $qty)";

            if ($connect->query($sql) === true) {

                unset($_SESSION['cart']);

            } else {
                header ("location: ../demo/signupacc.php?error=Somethingwentwrong");
            }
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order is</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="card col-md-4 bg-white shadow-md p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Thank You !</h1>
                    <p>Lorem ipsum dolor sit,lorem lorem. Lorem ipsum dolor sit,lorem lorem </p>
                    <a href="index.php" class="btn btn-outline-success">Terug</a>
                </div>
            </div>
    </body>

</html> 

