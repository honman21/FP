<?php
include_once 'header.php';

?>


      <section class="loginlogout">
        <H2>Sign up</H2>
        <form class="signuppage" action="db/klant.php" method="POST">
          <input type="text" name="voornaam" placeholder="Voornaam" required>
          <br>
          <input type="text" name="tussenvoegsel" placeholder="Tussenvoegsel">
          <br>
          <input type="text" name="achternaam" placeholder="Achternaam" required>
          <br>
          <input type="text" name="adres" placeholder="Adres" required>
          <br>
          <input type="text" name="postcode" placeholder="Postcode" required>
          <br>
          <input type="text" name="huisnummer" placeholder="Huisnummer" required>
          <br>
          <input type="text" name="telefoonnummer" placeholder="Telefoonnummer" required>
          <br>
          <input type="text" name="email" placeholder="Email" required>
          <br>
          <button type="submit">Sign up</button>
        </form>
      </section>


<?php
include_once 'footer.php';
?>