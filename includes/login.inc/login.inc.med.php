<?php


if(isset($_POST["submit"])) {

  $email = $_POST["email"];
  $pwd = $_POST["pwd"];

require_once '../../demo/config.php';
require_once '../function.inc.php';


  if (emptyInputLogin($email, $pwd) !== false) {
    header ("location: ../../medewerker/login.php?error=emptyinput");
    exit();
    }

loginMedewerker($connect, $email, $pwd);

}

else {
  header("location: ../../medewerker/login.php");
}
