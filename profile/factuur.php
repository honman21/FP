<?php
require_once '../demo/header.php';
require_once '../includes/function.inc.php';

if(isset($_POST['factuurpdf'])){
    header("location: pdf.php");
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
    <br>
<h2>Bestelnummer: <?php echo $factuurid?></h2>
</div>
<div class="container">
<table class="table my-3">
    <thead>
<tr class="text-center">
    <th>ID</th>
    <th>Image</th>
    <th>Naam</th>
    <th>Aantal</th>
    <th>Prijs per stuk</th>
    <th>Intotaal</th>
    </thead>
</tr>
<?php

        $select_artikel = "SELECT * from artikel_has_factuur INNER JOIN artikel ON artikel_has_factuur.artikel_idartikel = artikel.idartikel WHERE factuur_factuurid = '$factuurid'";
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
                // $intotaal += $subtt;
                }

            }

        ?>
    <form method="POST">
        <tr class="table-bottom">
            <td></td>
            <td><input type="submit" value="factuur downloaden (pdf)" name="factuurpdf"> </td>
            <td class="bedrag">Totale bedrag:</td>
            <td class="bedrag">&euro;<?php echo $intotaal; ?></td>
        </tr>
    </form>
</table>
</div>

<div class="terug">
<a type="submit" href="bestellingen.php">Terug</a>
</div>
