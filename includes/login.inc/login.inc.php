<?php

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

  require_once '../../demo/config.php';
  require_once '../function.inc.php';


  if (emptyInputLogin($email, $pwd) !== false) {
    header ("location: ../../demo/login.php?error=emptyinput");
    exit();
    }
    
  if (invalidemail($email)!== false) {
    header ("location: /...php?error=invalidemail");
    exit();
    }


loginklant($connect, $email, $pwd);

}

else {
  header("location: ../../demo/login.php");
}
