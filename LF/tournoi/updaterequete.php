<?php
//Variables:
include '../param.php';

$name = $_POST['name'];
$nb = $_POST['nb'];
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
for ($i = 1; $i < $nb; $i++) {
    $res = $mysqli->query('update joueur set joueur="' . $_POST[$i] . '" WHERE login="' . $login . '" and nom_tournoi="' . $name . '" and id_equipe="' . $i . '"');
}

header('Refresh: 0;URL=tableau.php?name=' . $name . '');

