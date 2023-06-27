<?php
include "../demo/config.php";
include "../demo//header.php";

if(!isset($_SESSION['klant'])) {
    header ("location: ../demo/signupacc.php");
  }

if(isset($_POST['update_profile'])){

    $naam = $_POST['voornaam'];
    $tussen = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $huisnummer = $_POST['huisnummer'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoonnummer'];
    $geboortedatum = $_POST['geboortedatum'];

    $sql = "UPDATE klant SET voornaam = '$naam', tussenvoegsel = '$tussen', achternaam = '$achternaam', adres = '$adres', huisnummer = '$huisnummer', plaats = '$plaats', postcode = '$postcode',
        telefoon = '$telefoon', geboortedatum = '$geboortedatum' WHERE idklant = $idklant";

    if ($connect->query($sql) === TRUE) {
        echo "<h3>Profiel updated</h3>";
    } else {
        echo "Error updating record: " . $connect->error;
    }


}

$select_klant = mysqli_query($connect, "SELECT * FROM klant WHERE idklant = $idklant");
    while ($row = mysqli_fetch_array($select_klant)){
        $name = $row['voornaam'];
        $tussen = $row['tussenvoegsel'];
        $achternaam = $row['achternaam'];
        $adres = $row['adres'];
        $huisnummer = $row['huisnummer'];
        $plaats = $row['plaats'];
        $postcode = $row['postcode'];
        $telefoon = $row['telefoon'];
        $geboortedatum = $row['geboortedatum'];
    }


?>

<div class="wrapper">
    <form method="post">
        <br>
        <p>Voornaam</p>
        <input type="text" name="voornaam" value="<?php echo $name ?> ">
        <p>Tussenvoegsel</p>
        <input type="text" name="tussenvoegsel" value="<?php echo $tussen ?> ">
        <p>Achternaam</p>
        <input type="text" name="achternaam" value="<?php echo $achternaam ?> ">
        <p>Adres</p>
        <input type="text" name="adres"  value="<?php echo $adres ?> ">
        <p>Huisnummer</p>
        <input type="text" name="huisnummer"  value="<?php echo $huisnummer ?> ">
        <p>Plaats</p>
        <input type="text" name="plaats"  value="<?php echo $plaats ?> ">
        <p>Postcode</p>
        <input type="text" name="postcode"  value="<?php echo $postcode ?> ">
        <p>Telefoonnummer</p>
        <input type="tel" name="telefoonnummer"  value="<?php echo $telefoon ?> ">
        
        <p>Geboortedatum</p>
        <input type="date" name="geboortedatum" value="<?php echo $geboortedatum ?> ">

        <input type="submit" class="product-button"  value="Update profile" name="update_profile">
    </form>
</div>


<?php
include_once "../demo/footer.php";
?>