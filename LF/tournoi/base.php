<?php
//Variables:
include '../param.php';
$nb = $_POST['Nb'];
$name = $_POST['Name'];
$ar = $_POST['ar'];

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

$sql = $mysqli->query("INSERT INTO tournoi (nom_tournoi, nombre_tournoi, type_match, login) VALUES ('$name','$nb','$ar','$login');");

for ($i = 1; $i <= $nb; $i++) {
    $joueur = $_POST["joueur$i"];
    $equipe = $_POST["equipe$i"];
    $sql = $mysqli->query("INSERT INTO joueur (nom_tournoi, joueur, equipe, id_equipe, login) VALUES ('$name','$joueur','$equipe','$i','$login');");
    $sql = $mysqli->query("INSERT INTO classement (nom_tournoi, mj_classement, equipe, position, victoire, nul, defaite, bp, bc, diff, points, login) VALUES ('$name',0,'$equipe','$i',0,0,0,0,0,0,0,'$login');");
}
header("Refresh: 0;URL=tableau.php?name=$name");
