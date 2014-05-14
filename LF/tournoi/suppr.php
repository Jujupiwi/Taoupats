<?php
//Variables:
include '../param.php';

$name = $_POST['name'];
$mysqli = new mysqli($serv, $user, $pwd, $data);
if ($mysqli->connect_errno) {
    $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

session_start();
$login = $_SESSION['login'];
$res = $mysqli->query('SELECT valide FROM membre WHERE login="' . $login . '"');
$row = $res->fetch_array();

if (!isset($login) || $row[0] == 0) {
    header('Location: ../index.php?enreg=E');
    exit();
}

$res = $mysqli->query("select mode from tournoi WHERE nom_tournoi = '$name' and login = '$login';");
$row = $res->fetch_array();
if ($row[0] == 'coupe') {
    $sql = $mysqli->query("DELETE from quarts WHERE nomTournoi = '$name' and login = '$login';");
    $sql = $mysqli->query("DELETE from huitiemes WHERE nomTournoi = '$name' and login = '$login';");
} else {
    $sql = $mysqli->query("DELETE from classement WHERE nom_tournoi = '$name' and login = '$login';");
    $sql = $mysqli->query("DELETE from resultats WHERE nom_tournoi = '$name' and login = '$login';");
    $sql = $mysqli->query("DELETE from joueur WHERE nom_tournoi = '$name' and login = '$login';");
}
$sql = $mysqli->query("DELETE from tournoi WHERE nom_tournoi = '$name' and login = '$login';");

header("Refresh: 0;URL=membre.php");

