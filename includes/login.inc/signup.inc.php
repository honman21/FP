<?php

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $rppwd = $_POST["rppwd"];

  require_once '../../demo/config.php';
  require_once '../function.inc.php';

  if (emptyInputSignup($email, $pwd, $rppwd)!== false) {
    header ("location: ../../demo/signupacc.php?error=emptyinput");
    exit();
    }

  if (invalidemail($email)!== false) {
    header ("location: /...php?error=invalidemail");
    exit();
    }

  // if (pwdlength($pwd, $rppwd)!== false) {
  //   header ("location: /...php?error=pwdlength");
  //   exit();
  //   }

  if (pwdmatch($pwd, $rppwd)!== false) {
    header ("location: /...php?error=pwdnotmatch");
    exit();
    }

    if (klantExists($connect, $email)!== false) {
      header ("location: /...php?error=Account_bestaat_al");
      exit();
      }

  createKlant($connect, $email, $pwd);
}
else {
    header ("location: /...php");
    exit();
     }