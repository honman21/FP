<?php
include_once 'header.php';
?>

      <br>
      <section class="signup">
        <H2>Sign up</H2>
        <br>
        <form class="acc" action="../includes/login.inc/signup.inc.php" method="POST">
          <input type="text" name="email" placeholder="Email" >
          <br>
          <input type="password" name="pwd" placeholder="Wachtwoord" >
          <br>
          <input type="password" name="rppwd" placeholder="Herhaal wachtwoord" >
          <br>
          <button type="submit" name="submit">Sign up</button>
        </form>
        <br>

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
            echo "<p>Account bestaat al</p>";
          }
          else if ($_GET["error"] == "none") {
            echo "<p>Uw account is aangemaakt</p>";
          }
        }
      ?>

      </section>

