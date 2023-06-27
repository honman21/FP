<?php
include '../demo/header.php';
include_once '../includes/function.inc.php';

if(isset($_POST['factuurpdf'])){
    header("location:factuur/pdf.php");
}

$factuurid = $_SESSION['factuurid'];
$intotaal = 0;
$select_klant = mysqli_query($connect, "SELECT * FROM klant INNER JOIN factuur ON klant.idklant = factuur.idklant WHERE factuurid = '$factuurid'");
$assoc_klant = mysqli_fetch_assoc($select_klant);

if(isset($_POST['update_status'])){
    $afgehaald = isset($_POST['afgehaald']) ? $_POST['afgehaald'] : 0;
    $insert_afgehaald = mysqli_query($connect, "UPDATE factuur SET afgehaald ='$afgehaald' WHERE factuurid = '$factuurid'");

}
?>
<div class="container">
<h2>Bestellingnummer: <?php echo $factuurid?></h2>
</div>
<div class="container">
<table class="table my-3">
    <thead>
<tr class="text-center">
    <th>id</th>
    <th>image</th>
    <th>naam</th>
    <th>aantal</th>
    <th>prijs</th>
    <th>Totaal prijs</th>
    </thead>
</tr>
<?php

$select_artikel = "SELECT * from artikel_has_factuur INNER JOIN artikel ON artikel_has_factuur.artikel_idartikel = artikel.idartikel WHERE factuur_factuurid = '$factuurid'";
//$select = "select * from factuur";
$query = mysqli_query($connect, $select_artikel);
$row = mysqli_num_rows($query);
if ($row > 0) {
    while ($assoc_factuur = mysqli_fetch_assoc($query)) {



        echo "
                <tr>
                    <td>
                    " . $assoc_factuur['idartikel'] . "
                    </td>
                    <td>
                    <img src='../image/".$assoc_factuur['image']."' height='100' width='100'>
                    </td>
                    <td>
                    ".$assoc_factuur['naam']."
                    </td>
                    <td>
                    ".$assoc_factuur['qty']."
                    </td>
                    <td>
                    ".$assoc_factuur['prijs']."
                    </td>
                    <td>
                    ".$subtt = $assoc_factuur['prijs'] * $assoc_factuur['qty']."
                    </td>
                
                ";
                $intotaal += $subtt;
    }

}

?>
    <form method="POST">
<tr class="table-bottom">
    <td></td>
    <td><input type="submit" value="factuur downloaden(pdf)" name="factuurpdf"> </td>
    <td class="bedrag">Totale bedrag:</td>
    <td class="bedrag">&euro;<?php echo $intotaal; ?></td>
</tr>
    </form>
</table>
</div>
<div class="terug">
<a type="submit" href="bestellingen.php">Terug</a>
</div>
<?php
include "../demo/footer.php";
?>