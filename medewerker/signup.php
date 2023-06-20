<?php
include_once '../demo/header.php';
?>


      <section class="signupmed">
        <H2>Sign up Medewerker</H2>
        <form action="../includes/login.inc/signup.inc.med.php" method="POST">
          <input type="text" name="email" placeholder="Email" >
          <br>
          <input type="password" name="pwd" placeholder="Wachtwoord" >
          <br>
          <input type="password" name="rppwd" placeholder="Herhaal wachtwoord" >
          <br>
          <button type="submit" name="submit">Sign up</button>
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
            echo "<p>Wachtwoord </p>";
          }
          else if ($_GET["error"] == "Account_bestaat_al") {
            echo "<p>Account bestaat al</p>";
          }
          else if ($_GET["error"] == "none") {
            echo "<p>Account is gemaakt!</p>";
          }
        }
      ?>

      </section>


<?php
include_once '../demo/footer.php';
?>