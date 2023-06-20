<?php
include_once '../demo/header.php';
include_once '../demo/config.php';
include_once '../includes/function.inc.php';

?>
 <?php
    if(isset($_SESSION["klant"])) {  
    if(isset($_SESSION["medewerker"])) { 
    if(isset($_SESSION["voornaam"])) {  
    if(isset($_SESSION["tussenvoegsel"])) {  
    if(isset($_SESSION["achternaam"])) {  

?>
    <h1>Your Profile</h1>

    <div class="profile">
      Voornaam: <?php echo $_SESSION['voornaam'];?> <br>
      Tussenvoegsel: <?php echo $_SESSION['tussenvoegsel'];?> <br>
      Achternaam: <?php echo $_SESSION['achternaam'];?> <br>
      Email: <?php echo $_SESSION['klant'];?> <br>
      <div>
        <a href="updateprofile.php">Update Profiel</a>
      </div>
    </div>

<?php
        }
      }
    }
  }
}
?>
