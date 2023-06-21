<?php
include_once '../demo/header.php'; 
include_once '../includes/function.inc.php';
?>

<br>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="contact">
            <main>
                <p id="titel_contactpagina">VERSTUUR E-MAIL</p>
                <form class="contact-form" action="contactform.php" method="post">
                    <input type="text" name="naam" placeholder="Volledige naam">
                    <input type="text" name="mail" placeholder="Uw e-mail adres">
                    <input type="text" name="onderwerp" placeholder="onderwerp">
                    <textarea name="message" placeholder="Bericht"></textarea>
                    <button type="submit" name="submit">Verzend e-mail</button>
                </form>
            </main>
        </div>
</body>
</html>