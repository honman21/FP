<?php
include_once '../includes/function.inc.php';

?>

      <br>
      <link rel="stylesheet" href="../demo/style.css">
      <link rel="stylesheet" href="../admin/style.css">
      <link rel="stylesheet" href="../cart/style.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <section class="login">
        <H2>Login admin</H2>
        <br>
        <form action="includes/medewerkerI.inc.php" method="POST">
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
