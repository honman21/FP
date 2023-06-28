<?php
include_once '../admin/header.php';
include_once '../demo/config.php';

if (isset($_GET['medeid'])) {
  $medeid = $_GET['medeid'];
  $delete = mysqli_query($connect,"DELETE FROM `medewerker` WHERE `idmedewerker`='$medeid'");
}
$sql = "select * from medewerker";
$query = mysqli_query($connect, $sql);
if(isset($_POST['update_medewerker'])) {

  $medewerker_id = $_POST['idmedewerker'];
  $medewerker_email = $_POST['email'];
  $medewerker_voornaam = $_POST['voornaam'];
  $medewerker_tussenvoegsel = $_POST['tussenvoegsel'];
  $medewerker_achternaam = $_POST['achternaam'];

  $sql = "UPDATE medewerker SET  email = '$medewerker_email', voornaam = '$medewerker_voornaam', tussenvoegsel = '$medewerker_tussenvoegsel', achternaam = '$medewerker_achternaam' WHERE idmedewerker = $medewerker_id";

  if ($connect->query($sql) === TRUE) {

      header("Refresh: 0");

  } else {
      echo "Error updating record: " . $connect->error;
  }

}

?>



<head>
  <title>Medewerkers bewerken</title>
</head>
<br>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php
        $rows = mysqli_num_rows($query);
        if ($rows > 0){
            while ($assoc_medewerker = mysqli_fetch_assoc($query)){
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
      <td>".$assoc_medewerker['idmedewerker']."</td>
      <input hidden name='idmedewerker' value='".$assoc_medewerker['idmedewerker']."'>

      <td>
      <input type='textc' name='email' value='".$assoc_medewerker['email']."'>
      </td>

      <td>
      <input type='textc' name='voornaam' value='".$assoc_medewerker['voornaam']."'>
      </td>

      <td>
      <input type='textc' name='tussenvoegsel' value='".$assoc_medewerker['tussenvoegsel']."'>
      </td>

      <td>
      <input type='textc' name='achternaam' value='".$assoc_medewerker['achternaam']."'>
      </td>

      <td> 
          <input type='submit' value='Update item' name='update_medewerker'>
      </td>
  </form>

      <td> 
          <a href='medewerkerbew.php?medeid=".$assoc_medewerker['idmedewerker']."'><button>Delete</button></a>
      </td>
    </tr>
  ";
          }
        }
    ?>