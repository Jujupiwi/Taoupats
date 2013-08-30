<?php
include 'param.php';
// on se connecte � MySQL et a la base
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$com = checkaddslashes($_POST[commentary]);
$nomCom = checkaddslashes($_POST[name]);
// on cr�e la requ�te SQL
$sql = "INSERT INTO `commentaires`(`comment`, `match`, `name`) VALUES ('$com','$commentMatch','$nomCom');";


// on envoie la requ�te
$req = $mysqli->query($sql);
$sujet = 'Vote effectue par : ';
$sujet .= $_SERVER['REMOTE_ADDR'];
$message = 'Commentaire effectue : ';
$message .= $_POST['commentary'];
$message .= ' de : ';
$message .= $_POST['name'];
$destinataire = 'julien_guerrin@yahoo.fr';
$headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
if (mail($destinataire, $sujet, $message, $headers)) {
} else {
    echo "Une erreur c'est produite lors de l'envois de l'email.";
}

function checkaddslashes($str)
{
    if (strpos(str_replace("\'", "", " $str"), "'") != false)
        return addslashes($str);
    else
        return $str;
}

header("Refresh: 1;URL=/sondage.php");