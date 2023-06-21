<?php
include_once '../demo/header.php';

?>

      <br>
      <section class="login">
        <H2>Login medewerker</H2>
        <br>
        <form action="../includes/login.inc/login.inc.med.php" method="POST">
          <input type="text" name="email" placeholder="Email" >
          <br>
          <input type="password" name="pwd" placeholder="Wachtwoord" >
          <br>
          <button type="submit" name="submit">Login</button>
        </form>

        <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Vul alle gegevens in</p>";
          }
          else if ($_GET["error"] == "wronglogin") {
            echo "<p>Inloggegevens kloppen niet</p>";
          }
        }
      ?>

      </section>

<?php
include_once '../demo/footer.php';
?>