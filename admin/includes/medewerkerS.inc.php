<?php
  require_once '../../demo/config.php';
  require_once '../../includes/function.inc.php';

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $voornaam = $_POST["voornaam"];
  $tussenvoegsel = $_POST["tussenvoegsel"];
  $achternaam = $_POST["achternaam"];
  $pwd = $_POST["pwd"];
  $rppwd = $_POST["rppwd"];


  if (MedewerkerExistsM($connect, $email)!== false) {
    header ("location: ../medewerkertoe.php?error=Account_bestaat_al");
    exit();
    }

  if (emptyInputSignupM($email, $voornaam, $achternaam, $pwd, $rppwd)!== false) {
    header ("location: ../medewerkertoe.php?error=emptyinput");
    exit();
    }

  if (invalidemailM($email)!== false) {
    header ("location: ../medewerkertoe.php?error=invalidemail");
    exit();
    }

  if (pwdmatchM($pwd, $rppwd)!== false) {
    header ("location: ../medewerkertoe.php?error=pwdnotmatch");
    exit();
    }


  voegmedewerker($connect, $email, $voornaam, $tussenvoegsel, $achternaam, $pwd);
  header ("location: ../medewerkertoe.php?error=none");
}
else {
    header ("location: ../medewerkertoe.php");
    exit();
     }