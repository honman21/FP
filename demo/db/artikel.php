<?php
include_once "../config.php";

      $naam = $_POST['naam'];
      $omschrijving = $_POST["omschrijving"];
      $prijs = $_POST["prijs"];
      $image = $_POST["image"];



      $sql = "INSERT INTO artikel (omschrijving, prijs) VALUES ( '$Omschrijving', '$Prijs');";
      mysqli_query($connect, $sql);
if ($connect->query($sql) === true) {
    echo "Artikel toegevoegd";

    }
else {
    echo "Error:" .$sql. "<br>" .$connect->error;
}


