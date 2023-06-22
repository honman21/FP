<?php

  require_once '../productimg/upload.php';
  require_once '../demo/config.php';
  require_once '../includes/function.inc.php';


  if (isset($_POST["submit"])) {

    $naam = $_POST["naam"];
    $omschrijving = $_POST["omschrijving"];
    $prijs = $_POST["prijs"];

    $image = $upload_dir.$_FILES["image"]["name"];

    $upload_dir = "../image/";
    // $upload_dir.$_FILES["image"]["name"];
    // $upload_file = $upload_dir.basename($_FILES["image"]["name"]);
    $imagetype = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $check = $_FILES["image"]["size"];
  
    $sql = "INSERT INTO artikel (naam, omschrijving, prijs, `image`) VALUES ( '$naam', '$omschrijving', '$prijs', '$image');";


    // if(fileexists($upload_file) !== false) {
    //   header ("location: ../productimg/upload.php?error=knownimg");
    //   exit();

    // if (imagefile($imagetype)!== false) {
    //   header ("location: ../productimg/upload.php?error=invalidimg");
    //   exit();
    //   }

    // if ($check !== false) {
    //   header ("location: ../productimg/upload.php?error=invalidimg");
    //   exit();
    //   }

    if (emptyinput($naam, $omschrijving, $prijs, $image)!== false) {
        header ("location: ../productimg/upload.php?error=emptyinput");
        exit();
        }
      
    // if($naam != "" && $prijs != "") {
    //   move_uploaded_file($_FILES["image"]["tmp_name"], $upload_file);
    // }

    if ($connect->query($sql) === true) {
      header ("location: ../productimg/upload.php");
    }

        addproduct($connect, $naam, $omschrijving, $prijs, $image);
        header ("location: ../productimg/upload.php");
        echo "<p>Artikel toegevoegd</p>";
  }
  else {
    header ("location:../productimg/upload.php");
    exit();
       }
      
      