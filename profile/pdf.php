<?php
session_start();
require_once '../demo/config.php';
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;

$factuurid = $_SESSION['factuurid'];

$select_klant = mysqli_query($connect, "SELECT * FROM klant INNER JOIN factuur ON klant.idklant = factuur.idklant WHERE factuurid = '$factuurid'");
$assoc_klant = mysqli_fetch_assoc($select_klant);
$select_factuur = mysqli_query($connect, "SELECT * FROM factuur WHERE factuurid = '$factuurid'");
$assoc_factuur = mysqli_fetch_assoc($select_factuur);
$intotaal = 0;

$body = '<html>
<head>
    <title>factuur</title>
</head>

    

<body>
    <img src="../image/flowermain.jpg"  height="100" >
        <h3>'.$assoc_klant["voornaam"].$assoc_klant["tussenvoegsel"].$assoc_klant["achternaam"].'</h3>
        <h3> Bestelling geplaatst op: '.$assoc_factuur["datum"].'</h3>
    <div>
    <h2>Factuur van uw bestelling</h2>
    <h3>#'.$assoc_factuur["factuurid"].'</h3>
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <br>
            <th>Product naam</th>
            <br>
            <th>Prijs per stuk</th>
            <br>
            <th>Aantal</th>
            <br>
            <th>Totaal</th>
            <br>
        </tr>
        </thead>
        <tbody>';
        
$select_artikel = "SELECT * from artikel_has_factuur INNER JOIN artikel ON artikel_has_factuur.artikel_idartikel = artikel.idartikel WHERE factuur_factuurid = '$factuurid'";

$query = mysqli_query($connect, $select_artikel);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($result = mysqli_fetch_assoc($query)) {

                $body .= '<tr>
                    <td>
                    ' . $result['idartikel'] . '
                    </td>
                    <br>
                    <td>
                    '.$result['naam'].'
                    </td>
                    <br>
                    <td>
                    &euro;'.$result['prijs'].'
                    </td>
                    <br>
                    <td>
                    '.$result['qty'].'
                    </td>
                    <br>
                    <td>
                    &euro;'.$subtt = $result['prijs'] * $result['qty'].'
                    </td>
                </tr>';
                $intotaal += $subtt;
    }

}




$body .= '</tbody>
        <tr>
            <th colspan="7">Totaal bedrag</th>
            <th colspan="7">&euro;'.$intotaal.'</th>
        </tr>
    </table>
</body>
</html>';



$dompdf = new Dompdf;
$dompdf->loadHtml($body);
$dompdf->setPaper('A4','portrait');
ob_end_clean();
$dompdf->render();
$dompdf->stream('factuur#'.$assoc_factuur["factuurid"].'.pdf', array('Attachment' => 0));
?>