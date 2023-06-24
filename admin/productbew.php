<?php
include_once '../admin/header.php';
include_once '../demo/config.php';

if (isset($_GET['id'])) {
  $proid = $_GET['id'];
  $delete = mysqli_query($connect,"DELETE FROM `artikel` WHERE `idartikel`='$proid'");
}
$sql = "select * from artikel";
$query = mysqli_query($connect, $sql);
if(isset($_POST['update_item'])) {
  $artikel_id = $_POST['idartikel'];
  $artikel_naam = $_POST['naam'];
  $artikel_prijs = $_POST['prijs'];
  $artikel_omschrijving = $_POST['omschrijving'];
  $artikel_opslag = $_POST['opslag'];

  $sql = "UPDATE artikel SET  naam = '$artikel_naam', omschrijving = '$artikel_omschrijving', prijs = '$artikel_prijs', opslag = '$artikel_opslag' WHERE idartikel = $artikel_id";

  if ($connect->query($sql) === TRUE) {

      header("Refresh: 0");

  } else {
      echo "Error updating record: " . $connect->error;
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Producten</title>
</head>
<br>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Naam</th>
        <th>Prijs</th>
        <th>Opslag</th>
        <th>Omschrijving</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
        $rows = mysqli_num_rows($query);
        if ($rows > 0){
            while ($assoc_artikel = mysqli_fetch_assoc($query)){
                echo "
                <tr>
<style> 

textarea {
  width: 100%;
  height: 100px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}

input {
  margin-right: 30px;
}

</style>

  <form method='POST'>
      <td>".$assoc_artikel['idartikel']."</td>
      <input hidden name='idartikel' value='".$assoc_artikel['idartikel']."'>

      <td>
      <img src='../image/".$assoc_artikel['image']."'height='100'>
      </td>

      <td>
      <input type='textc' name='naam' value='".$assoc_artikel['naam']."'>
      </td>

      <td>
      <input type='textc' name='prijs' value='".$assoc_artikel['prijs']."'>
      </td>

      <td>
      <input type='textc' name='opslag' value='".$assoc_artikel['opslag']."'>
      </td>

      <td>
      <textarea name='omschrijving'>".$assoc_artikel['omschrijving']."</textarea>
      </td>

      <td> 
          <input type='submit' class='product-button' value='Update item' name='update_item'>
      </td>
  </form>

      <td> 
          <a href='productbew.php?id=".$assoc_artikel['idartikel']."' ><button>Delete</button></a>
      </td>
    </tr>
  ";
          }
        }
    ?>