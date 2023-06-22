<?php
include "include/database.php";
include "include/header.php";

if(isset($_POST['update_profile'])){

    $naam = $_POST['voornaam'];
    $tussen = $_POST['tussenvoegsel'];
    $achternaam = $_POST['achternaam'];
    $adres = $_POST['adres'];
    $huisnummer = $_POST['huisnummer'];
    $plaats = $_POST['plaats'];
    $postcode = $_POST['postcode'];
    $telefoon = $_POST['telefoonnummer'];
    $gdatum = $_POST['geboortedatum'];

    $sql = "UPDATE klant SET voornaam = '$naam', tussenvoegsel = '$tussen', achternaam = '$achternaam', adres = '$adres', huisnummer = '$huisnummer', plaats = '$plaats', postcode = '$postcode',
        telefoon = '$telefoon', geboortedatum = '$gdatum' WHERE idklant = $id";

    if ($link->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $link->error;
    }


}

$select_klant = mysqli_query($link, "SELECT * FROM klant WHERE idklant = $id");
while ($row = mysqli_fetch_array($select_klant)){
    $name = $row['voornaam'];
    $tussen = $row['tussenvoegsel'];
    $achternaam = $row['achternaam'];
    $adres = $row['adres'];
    $huisnummer = $row['huisnummer'];
    $plaats = $row['plaats'];
    $postcode = $row['postcode'];
    $tel = $row['telefoon'];
    $g_datum = $row['geboortedatum'];
}





?>
<div class="wrapper">
    <form method="post">
        <label>Voornaam</label>
        <input type="text" name="voornaam" value="<?php echo $name ?> ">
        <label>Tussenvoegsel</label>
        <input type="text" name="tussenvoegsel" value="<?php echo $tussen ?> ">
        <label>Achternaam</label>
        <input type="text" name="achternaam" value="<?php echo $achternaam ?> ">
        <label>Adres</label>
        <input type="text" name="adres"  value="<?php echo $adres ?> ">
        <label>Huisnummer</label>
        <input type="text" name="huisnummer"  value="<?php echo $huisnummer ?> ">
        <label>Plaats</label>
        <input type="text" name="plaats"  value="<?php echo $plaats ?> ">
        <label>Postcode</label>
        <input type="text" name="postcode"  value="<?php echo $postcode ?> ">
        <label>Telefoonnummer</label>
        <input type="tel" name="telefoonnummer"  value="<?php echo $tel ?> ">
        <label>Geboortedatum</label>
        <input type="date" name="geboortedatum" value="<?php echo $g_datum ?> ">

        <input type="submit" class="product-button"  value="Update profile" name="update_profile">
    </form>
</div>




<?php

include "include/footer.php";

?>