 <?php
require_once '../admin/header.php';
require_once '../includes/function.inc.php';

if(isset($_POST['pro_id'])){
    $_SESSION['factuurid'] = $_POST['factuurid'];
    header("location: editbestelling.php");
}

if(isset($_POST['medewerkeradd'])){
    $medewerker = $_POST['name'];
    $factuurid = $_POST['factuurid'];

    $select_medewerker = "SELECT voornaam FROM medewerker WHERE voornaam = '$medewerker'";
    $resulten = mysqli_query($connect, $select_medewerker);
    if($resulten->num_rows == 0){
        echo "Deze werknemer staat niet geregistreerd!";
    } else {
        $select_id = mysqli_query($connect, "SELECT idmedewerker FROM medewerker WHERE voornaam = '$medewerker'");

        if(mysqli_num_rows($select_id) > 0){
            $assoc_id = mysqli_fetch_assoc($select_id);
            $id = $assoc_id['idmedewerker'];

            $add_medewerker = mysqli_query($connect, "UPDATE factuur SET idmedewerker = '$id' WHERE factuurid = '$factuurid'");


        } 
        echo "werknemer aangepast";
        
    }

}

?>
<body>
<header>
    <br>
    <h1>Bestellijst</h1>
</header>
<div class="container">
<table class="bestelling">

    <tr>
        <th>ID</th>
        <th>Datum</th>
        <th>Medewerker</th>
        <th>Afgehaald</th>
        <th>Update</th>
        <th>Meer</th>
    </tr>
    <?php

    $select = "select * from factuur INNER JOIN medewerker ON factuur.idmedewerker = medewerker.idmedewerker ORDER BY factuurid DESC";
    $query = mysqli_query($connect, $select);
    $rows = mysqli_num_rows($query);
    if ($rows > 0) {
        while ($result = mysqli_fetch_assoc($query)) {
            if($result['afgehaald'] == 1){
                $check = "ja";
            } else {
                $check = "nee";
                
            }



            echo "
                <tr>
                <form method='POST'>
                    <td>
                    " . $result['factuurid'] . "
                    <input hidden value='" . $result['factuurid'] . "' name='factuurid'>
                    </td>
                    <td>
                    " . $result['datum'] . "
                    </td>
                    
                    <td>
                    <input type='text' name='name' value='".$result['voornaam']."'>
                    </td>
                    <td>
                    ".$check."
                    </td>
                    <td>
                    <input type='submit' value='update medewerker' name='medewerkeradd'>
                    </td>
                    <td>
                    <input type='submit' value='Meer' name='pro_id'>
                    </td>
                    </form>

                </tr>
                
                ";
        }

    }
    ?>
</table>

</div>
<a href="bestelpage.php">Terug</a>
</body>