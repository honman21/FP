<?php

if(isset($_POST['update'])){
  $update_voornaam = $_POST['update_voornaam'];
  $update_tussenvoegsel = $_POST['update_tussenvoegsel'];
  $update_achternaam = $_POST['update_achternaam'];
  $update_adres = $_POST['update_adres'];
  $update_huisnummer = $_POST['update_huisnummer'];
  $update_plaats = $_POST['update_plaats'];
  $update_postcode = $_POST['update_postcode'];
  $update_telefoon = $_POST['update_telefoon'];
  $update_geboortedatum = $_POST['update_geboortedatum'];


  $update_profile = mysqli_query($connect, "UPDATE `klant` SET voornaam = '$update_voornaam', tussenvoegsel = '$update_tussenvoegsel', achternaam = '$update_achternaam'");
  // -- , adres = '$update_adres', huisnummer = '$update_huisnummer', plaats = '$update_plaats', postcode = '$update_postcode', telefoon = '$update_telefoon'
  // -- , geboortedatum = '$update_geboortedatum'");

  if($update_profile){
     move_uploaded_file($update_p_image_tmp_naam, $update_p_image_folder);
     $message[] = 'Profiel updated succesfully';
     header('location:../cart/index.php');
  }else{
     $message[] = 'Profiel could not be updated';
     header('location:../index.php');
  }

}


if(isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

require_once '../demo/config.php';
require_once 'function.inc.php';


  if (emptyInputLogin($email, $pwd) !== false) {
    header ("location: ../demo/login.php?error=emptyinput");
    exit();
    }

  updateklant($connect, $email, $pwd);
}

else {
  header("location: ../demo/login.php");
}
