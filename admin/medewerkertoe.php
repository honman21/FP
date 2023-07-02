<?php
include_once '../admin/header.php';
?>

      <br>
      <section class="signupmed">
        <H1>Medewerker toevoegen</H1>
        <br>
        <form action="includes/medewerkerS.inc.php" method="POST">
          <input class="textbox" type="text" name="email" placeholder="Email" >
          <br>
          <input class="textbox" type="text" name="voornaam" placeholder="Voornaam">
          <br>
          <input class="textbox" type="text" name="tussenvoegsel" placeholder="Tussenvoegsel" >
          <br>
          <input class="textbox" type="text" name="achternaam" placeholder="Achternaam">
          <br>
          <input type="password" name="pwd" placeholder="Wachtwoord" >
          <br>
          <input type="password" name="rppwd" placeholder="Herhaal wachtwoord" >
          <br>
          <button type="submit" name="submit">Toevoegen</button>
        </form>

        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Vul alle gegevens in</p>";
          }
          else if ($_GET["error"] == "invalidemail") {
            echo "<p>Email klopt niet</p>";
          }
          else if ($_GET["error"] == "pwdnotmatch") {
            echo "<p>Wachtwoord matched niet</p>";
          }
          else if ($_GET["error"] == "Account_bestaat_al") {
            echo "<p>Account bestaat al!</p>";
          }
          else if ($_GET["error"] == "none") {
            echo "<p>Medewerker toegevoegd!</p>";
          }
        }
      ?>

      </section>

