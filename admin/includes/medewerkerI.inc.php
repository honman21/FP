<?php


if(isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

require_once '../../demo/config.php';
require_once '../../includes/function.inc.php';


  if (emptyInputLogin($email, $pwd) !== false) {
    header ("location: ../index.php?error=emptyinput");
    exit();
    }

loginMedewerker($connect, $email, $pwd);
header ("location: ../../admin/adminpage.php");
}

else {
  header("location: ../../admin/index.php");
}