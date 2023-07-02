<link rel="stylesheet" href="style.css">

<?php
require_once '../demo/header.php';


$product = ($_GET['idartikel']);

$sql = "SELECT * FROM artikel WHERE idartikel = '$product'";
$result = $connect->query($sql);

if ($result && $result->num_rows > 0) {

    $product = $result->fetch_assoc();

    echo '
        <br>
    <main class="container">

        <div class="left-column">
            <img src="../image/' . $product['image'] . ' " height= "250px">
        </div>
        </div>

        <div class="right-column">
            <div class="product-description">
                <h1 class="titel"> ' . $product['naam'] . '</h1>
                <p class="omschrijving"> Omschrijving: ' . $product['omschrijving'] . '</p>
                <p>
                In vel ultrices dui. Nunc feugiat lacus urna, et vehicula turpis sollicitudin in. 
                Ut eu tortor a purus dignissim convallis quis quis odio. Nullam vel aliquet nibh. 
                </p>
            </div>
        </div>

            <div class="product-price"> 
                <b> Prijs: &euro;' . $product['prijs'] . '
            </div>
            </div> 
            <br>
        ';

        ?>
        
        <a class="add" href="index.php?pro_id=<?php echo $product['idartikel'];?>" type="button">Add to Cart</a>
        <?php
        } else {
            echo "Error:" . $sql . "<br>" . $connect->error;
        }
