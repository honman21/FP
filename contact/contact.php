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
<style> 

textarea {
  width: 40%;
  height: 100px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}

p {
    font-weight: bold;
}

input {
  margin-right: 30px;
}

</style>
<div class="contact">
            <main>
                <p id="titel_contactpagina">VERSTUUR E-MAIL</p>
                <form class="contact-form" action="contactform.php" method="POST">
                    <input type="text" name="naam" placeholder="Volledige naam">
                    <br>
                    <input type="text" name="mail" placeholder="Uw e-mail adres">
                    <br>
                    <input type="text" name="onderwerp" placeholder="onderwerp">
                    <br>
                    <textarea name="message" placeholder="Bericht"></textarea>
                    <br><br>
                    <button type="submit" name="submit">Verzend e-mail</button>
                </form>
            </main>
        </div>
</body>
</html>