<?php
include 'param.php';
// on envoie la requ�te
$sujet = 'Contact : ';
$sujet .= $_SERVER['REMOTE_ADDR'];
$message = 'Contact de : ';
$message .= $_POST['from'];
$message .= ' contenu : ';
$message .= $_POST['message'];
$destinataire = 'julien_guerrin@yahoo.fr';
$headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
if (mail($destinataire, $sujet, $message, $headers)) {
} else {
    echo "Une erreur c'est produite lors de l'envois de l'email.";
}

header("Refresh: 1;URL=../contact.php");
?>

