<?php
  require_once '../../demo/config.php';
  require_once '../../includes/function.inc.php';

if (isset($_POST["submit"])) {

  $email = $_POST["email"];
  $voornaam = $_POST["voornaam"];
  $tussenvoegsel = $_POST["tussenvoegsel"];
  $achternaam = $_POST["achternaam"];


  if (MedewerkerExistsM($connect, $email)!== false) {
    header ("location: ../medewerker.php?error=Account_bestaat_al");
    exit();
    }

  if (emptyInputSignupM($email, $voornaam, $achternaam)!== false) {
    header ("location: ../medewerker.php?error=emptyinput");
    exit();
    }

  if (invalidemailM($email)!== false) {
    header ("location: ../medewerker.php?error=invalidemail");
    exit();
    }


  voegmedewerker($connect, $email, $voornaam, $tussenvoegsel, $achternaam);
  header ("location: ../medewerker.php?error=none");
}
else {
    header ("location: ../../admin/medewerker.php");
    exit();
     }