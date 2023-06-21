<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../productimg/upload.css">
  <link rel="stylesheet" href="../demo/style.css">
  <title>Product Toevoegen</title>
</head>
<body>
  <?php
    include_once '../demo/config.php';
    include_once 'index.php';
    

  ?>
  <section id="uploadCon">
    <form action="../includes/upload.inc.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="naam" id="naam" placeholder="Product naam" >
      <input type="text" name="prijs" id="prijs" placeholder="Product prijs" >
      <input type="text" name="omschrijving" id="omschrijving" placeholder="Product omschrijving">
      <input type="file" name="image" id="image">
      <input type="submit" value="upload" name="submit">
    </form>

    <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Vul alle gegevens in</p>";
          }
          else if ($_GET["error"] == "invalidimg") {
            echo "<p>Img formaat klopt niet</p>";
          }
          else if ($_GET["error"] == "knownimg") {
            echo "<p>Img bestaat al</p>";
          }
        }
      ?>
  </section>
</body>
</html>