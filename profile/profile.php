<?php
include "../demo/config.php";
include "../demo//header.php";


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
    $email = $_POST['email'];

    $sql = "UPDATE klant SET voornaam = '$naam', tussenvoegsel = '$tussen', achternaam = '$achternaam', adres = '$adres', huisnummer = '$huisnummer', plaats = '$plaats', postcode = '$postcode',
        telefoon = '$telefoon', geboortedatum = '$geboortedatum', email = '$email' WHERE idklant = $idklant";

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
        $email = $row['email'];
    }


?>

<div class="wrapper">
    <form method="POST">
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
        <p>Email</p>
        <input type="text" name="email" value="<?php echo $email ?> ">
        <br>
        <button class="acc" type="submit" name="update_profile">Update Profile</button>
        
    </form>
</div>

