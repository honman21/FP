<?php
include '../admin/header.php';
include_once '../includes/function.inc.php';

$factuurid = $_SESSION['factuurid'];
$intotaal = 0;
$select_klant = mysqli_query($connect, "SELECT * FROM klant INNER JOIN factuur ON klant.idklant = factuur.idklant WHERE factuurid = '$factuurid'");
$assoc_klant = mysqli_fetch_assoc($select_klant);

if(isset($_POST['update_status'])){
    $afgehaald = isset($_POST['afgehaald']) ? $_POST['afgehaald'] : 0;
    $insert_afgehaald = mysqli_query($link, "UPDATE factuur SET afgehaald ='$afgehaald' WHERE factuurid = '$factuurid'");

}
?>
<body>
<header>
    <h1>Bestelling</h1>
</header>
<div class="container">
<table>
    <div>
        <h3><?php echo $assoc_klant['email']?></h3>
        <h3><?php echo $assoc_klant['voornaam'].$assoc_klant['tussenvoegsel'].$assoc_klant['achternaam']?></h3>
    </div>
    <h2>Bestelling: <?php
        $select_afgehaald = mysqli_query($connect, "SELECT afgehaald FROM factuur WHERE factuurid = '$factuurid'");
        $fetch_bool = mysqli_fetch_assoc($select_afgehaald);
        if($fetch_bool['afgehaald'] == 0){

        }else{
            echo "afgehaald";
        }


        ?></h2>
    <tr>
        <th>id</th>
        <th>image</th>
        <th>naam</th>
        <th>aantal</th>
        <th>prijs</th>
        <th>Totaal prijs</th>

    </tr>
    <?php

    $select_product = "SELECT * from artikel_has_factuur INNER JOIN artikel ON artikel_has_factuur.artikel_idartikel = artikel.idartikel WHERE factuur_factuurid = '$factuurid'";
    //$select = "select * from factuur";
    $query = mysqli_query($link, $select_product);
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        while ($result = mysqli_fetch_assoc($query)) {



            echo "
                <tr>
                    <td>
                    " . $result['idartikel'] . "
                    </td>
                    <td>
                    <img src='../admin/".$result['image']."' height='100' width='100'>
                    </td>
                    <td>
                    ".$result['naam']."
                    </td>
                    <td>
                    ".$result['qty']."
                    </td>
                    <td>
                    ".$result['prijs']."
                    </td>
                    <td>
                    ".$sub_total = $result['prijs'] * $result['qty']."
                    </td>
                    

                </tr>
                
                ";
            $intotaal += $sub_total;
        }

    }

    ?>
    <tr class="table-bottom">

        <td colspan="4"></td>
        <td>Grand total:</td>
        <td>€<?php echo $intotaal; ?>/-</td>
    </tr>
</table>

<a href="bestellinglijst.php">Terug</a>
<div class="afgehaald">
<form method="post">
    <input type="checkbox" name="afgehaald" value="1"><label>Afgehaald?</label><br><br>
    <input type="submit" name="update_status" value="update">
</form>
</div>
</div>
</body>