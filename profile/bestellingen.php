<?php
include '../demo/header.php';

if(isset($_POST['factuur'])){
    $_SESSION['factuurid'] = $_POST['factuurid'];
    header("location: factuur.php");
}

?>
<br>

<div class="container">
    <h3>Bestellingen</h3>
</div>
<div class="container">
    <table class="table my-3">
        <thead>
        <tr class="text-center">
            <th>Bestelling nummer</th>
            <th>Bestelt op</th>
            <th>Meer</th>
        </tr>
        </thead>
        <?php
        $select = "select * from factuur INNER JOIN klant ON factuur.idklant = klant.idklant WHERE klant.idklant ='$idklant'";

        $query = mysqli_query($connect, $select);
        $row = mysqli_num_rows($query);
        if ($row > 0) {
            while ($result = mysqli_fetch_assoc($query)) {
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
                    <input type='submit' value='Meer info' name='factuur'>
                    </td>
                    </form>
                </tr>
                
                ";
            }

        }
        ?>
    </table>
</div>

<div class="terug">
<a type="submit" href="menu.php">Terug</a>
</div>

<?php
include "../demo/footer.php";
?>
