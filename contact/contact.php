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
    
}

input {
  margin-right: 30px;
}

iframe {
  width: 50%;
  background-color: #E1E1E3;
  margin-top: 10px;
  margin-left: 10px;
  margin-bottom: 10px;
  display:inline-block;


}


</style>
<div class="contact">
            <main>
                <b id="titel_contactpagina">VERSTUUR E-MAIL</b>
                <form class="contact-form" action="contact-form-handler.php" method="POST">
                    <input type="text" name="naam" placeholder="Volledige naam">
                    <br>
                    <input type="text" name="mail" placeholder="Uw e-mail adres">
                    <br>
                    <input type="text" name="onderwerp" placeholder="Onderwerp">
                    <br>
                    <textarea name="message" placeholder="Bericht"></textarea>
                    <br><br>
                    <button type="submit" name="submit">Verzend e-mail</button>
                </form>
            </main>
            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77913.24032171846!2d5.124926497265627!3d52.392379600000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617c1dcedf6af%3A0xb7e60f149191e0f!2sMBO%20College%20Almere%20-%20ROC%20van%20Flevoland!5e0!3m2!1snl!2snl!4v1687351941298!5m2!1snl!2snl" height="400" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
</body>
</html>