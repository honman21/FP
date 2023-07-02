<?php

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_from = 'honwerk@gmail.com';
$email_subject = "Nieuwe formulier verzonden";
$email_body = "Naam gebruiker: $name.\n".
    "Gebruikers email: $visitor_email.\n".
    "Gebruikers bericht: $message.\n";

$to = "2113792@talnet.nl";

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email\r\n";

mail($to, $email_subject, $email_body, $headers);

header("Location: contact.php");

?>