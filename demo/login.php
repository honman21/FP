<?php
include_once '../demo/header.php';

?>

  <section class="login">
    <br>
    <H2>Login</H2>
    <br>
    <form class="acc" action="../includes/login.inc/login.inc.php" method="POST">
      <input type="text" name="email" placeholder="Email" >
      <br>
      <input type="password" name="pwd" placeholder="Wachtwoord" >
      <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <p>Inloggen als admin?<a href="../medewerker/login.php" style="color:dodgerblue"><br>Klik hier</a></p>
    <br>
    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Vul alle gegevens in</p>";
      }
      else if ($_GET["error"] == "wronglogin") {
        echo "<p>Inloggegevens kloppen niet</p>";
      }
      else if ($_GET["error"] == "invalidemail") {
        echo "<p>Email klopt niet</p>";
      }
    }
  ?>
  </section>
<?php
include_once 'footer.php';
?>