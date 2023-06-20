<?php
include_once "../config.php";

      $Voornaam = $_POST['voornaam'];
      $Tussenvoegsel = $_POST['tussenvoegsel'];
      $Achternaam = $_POST['achternaam'];
      $Adres = $_POST['adres'];
      $Postcode = $_POST['postcode'];
      $Huisnummer = $_POST['huisnummer'];
      $Telefoonnummer = $_POST['telefoonnummer'];
      $Email = $_POST['email'];

      include_once "db/db.php";
      include_once "db/functie.php";

      


      $sql = "INSERT INTO klant (voornaam, tussenvoegsel, achternaam, adres, postcode, huisnummer, telefoonnummer, email) 
      VALUES ('$Voornaam', '$Tussenvoegsel', '$Achternaam', '$Adres', '$Postcode', '$Huisnummer', '$Telefoonnummer', '$Email');";
      mysqli_query($connect, $sql);


    ?>