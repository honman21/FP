<?php
require_once '../demo/header.php';
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
$factuurid = $_SESSION['factuurid'];

$select_klant = mysqli_query($connect, "SELECT * FROM klant INNER JOIN factuur ON klant.idklant = factuur.idklant WHERE factuurid = '$factuurid'");
$assoc_klant = mysqli_fetch_assoc($select_klant);
$select_factuur = mysqli_query($connect, "SELECT * FROM factuur WHERE factuurid = '$factuurid'");
$assoc_factuur = mysqli_fetch_assoc($assoc_factuur);
$intotaal = 0;

$html = '<html>
<link rel="stylesheet" href="factuur.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, klant-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>factuur</title>
</head>

    

<body>
    <img src="../image/holdinflower2.jpg" width="100" height="100" >
        <h3> '.$assoc_klant["voornaam"].$assoc_klant["tussenvoegsel"].$assoc_klant["achternaam"].'</h3>
        <h3> '.$assoc_factuur["datum"].'</h3>
    <div>
    <h2>factuur</h2>
    <h3>#'.$assoc_factuur["factuurid"].'</h3>
    </div>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>product naam</th>
            <th>prijs</th>
            <th>aantal</th>
            <th>totaal</th>
        </tr>
        </thead>
        <tbody>';
        
$select_product = "SELECT * from artikel_has_factuur INNER JOIN artikel ON artikel_has_factuur.artikel_idartikel = artikel.idartikel WHERE factuur_factuurid = '$factuurid'";

$query = mysqli_query($connect, $select_product);
$num = mysqli_num_rows($query);
if ($num > 0) {
    while ($result = mysqli_fetch_assoc($query)) {

                $html .= '<tr>
                    <td>
                    ' . $result['idartikel'] . '
                    </td>
                    <td>
                    '.$result['naam'].'
                    </td>
                    <td>
                    &euro;'.$result['prijs'].'
                    </td>
                    <td>
                    '.$result['qty'].'
                    </td>
                    <td>
                    &euro;'.$subtt = $result['prijs'] * $result['qty'].'
                    </td>
                </tr>';

    }

}
$intotaal += $subtt;



$html = '</tbody>
        <tr>
            <th colspan="4" class="my-table">Totaal bedrag</th>
            <th>€'.$intotaal.' </th>
        </tr>
    </table>
</body>
</html>';

$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream('factuur.pdf');
?>