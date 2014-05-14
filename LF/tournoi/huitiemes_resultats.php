<?php
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


$req = "update huitiemes set
huitieme1J1 = '$_POST[huitieme1J1]'
,huitieme1J1Aller = '$_POST[huitieme1J1Aller]'
,huitieme1J1Retour = '$_POST[huitieme1J1Retour]'
,huitieme1J2 = '$_POST[huitieme1J2]'
,huitieme1J2Aller = '$_POST[huitieme1J2Aller]'
,huitieme1J2Retour = '$_POST[huitieme1J2Retour]'
,huitieme2J1 = '$_POST[huitieme2J1]'
,huitieme2J1Aller = '$_POST[huitieme2J1Aller]'
,huitieme2J1Retour = '$_POST[huitieme2J1Retour]'
,huitieme2J2 = '$_POST[huitieme2J2]'
,huitieme2J2Aller = '$_POST[huitieme2J2Aller]'
,huitieme2J2Retour = '$_POST[huitieme2J2Retour]'
,huitieme3J1 = '$_POST[huitieme3J1]'
,huitieme3J1Aller = '$_POST[huitieme3J1Aller]'
,huitieme3J1Retour = '$_POST[huitieme3J1Retour]'
,huitieme3J2 = '$_POST[huitieme3J2]'
,huitieme3J2Aller = '$_POST[huitieme3J2Aller]'
,huitieme3J2Retour = '$_POST[huitieme3J2Retour]'
,huitieme4J1 = '$_POST[huitieme4J1]'
,huitieme4J1Aller = '$_POST[huitieme4J1Aller]'
,huitieme4J1Retour = '$_POST[huitieme4J1Retour]'
,huitieme4J2 = '$_POST[huitieme4J2]'
,huitieme4J2Aller = '$_POST[huitieme4J2Aller]'
,huitieme4J2Retour = '$_POST[huitieme4J2Retour]'
,huitieme5J1 = '$_POST[huitieme5J1]'
,huitieme5J1Aller = '$_POST[huitieme5J1Aller]'
,huitieme5J1Retour = '$_POST[huitieme5J1Retour]'
,huitieme5J2 = '$_POST[huitieme5J2]'
,huitieme5J2Aller = '$_POST[huitieme5J2Aller]'
,huitieme5J2Retour = '$_POST[huitieme5J2Retour]'
,huitieme6J1 = '$_POST[huitieme6J1]'
,huitieme6J1Aller = '$_POST[huitieme6J1Aller]'
,huitieme6J1Retour = '$_POST[huitieme6J1Retour]'
,huitieme6J2 = '$_POST[huitieme6J2]'
,huitieme6J2Aller = '$_POST[huitieme6J2Aller]'
,huitieme6J2Retour = '$_POST[huitieme6J2Retour]'
,huitieme7J1 = '$_POST[huitieme7J1]'
,huitieme7J1Aller = '$_POST[huitieme7J1Aller]'
,huitieme7J1Retour = '$_POST[huitieme7J1Retour]'
,huitieme7J2 = '$_POST[huitieme7J2]'
,huitieme7J2Aller = '$_POST[huitieme7J2Aller]'
,huitieme7J2Retour = '$_POST[huitieme7J2Retour]'
,huitieme8J1 = '$_POST[huitieme8J1]'
,huitieme8J1Aller = '$_POST[huitieme8J1Aller]'
,huitieme8J1Retour = '$_POST[huitieme8J1Retour]'
,huitieme8J2 = '$_POST[huitieme8J2]'
,huitieme8J2Aller = '$_POST[huitieme8J2Aller]'
,huitieme8J2Retour = '$_POST[huitieme8J2Retour]'
,quart1J1 = '$_POST[quart1J1]'
,quart1J1Aller = '$_POST[quart1J1Aller]'
,quart1J1Retour = '$_POST[quart1J1Retour]'
,quart1J2 = '$_POST[quart1J2]'
,quart1J2Aller = '$_POST[quart1J2Aller]'
,quart1J2Retour = '$_POST[quart1J2Retour]'
,quart2J1 = '$_POST[quart2J1]'
,quart2J1Aller = '$_POST[quart2J1Aller]'
,quart2J1Retour = '$_POST[quart2J1Retour]'
,quart2J2 = '$_POST[quart2J2]'
,quart2J2Aller = '$_POST[quart2J2Aller]'
,quart2J2Retour = '$_POST[quart2J2Retour]'
,quart3J1 = '$_POST[quart3J1]'
,quart3J1Aller = '$_POST[quart3J1Aller]'
,quart3J1Retour = '$_POST[quart3J1Retour]'
,quart3J2 = '$_POST[quart3J2]'
,quart3J2Aller = '$_POST[quart3J2Aller]'
,quart3J2Retour = '$_POST[quart3J2Retour]'
,quart4J1 = '$_POST[quart4J1]'
,quart4J1Aller = '$_POST[quart4J1Aller]'
,quart4J1Retour = '$_POST[quart4J1Retour]'
,quart4J2 = '$_POST[quart4J2]'
,quart4J2Aller = '$_POST[quart4J2Aller]'
,quart4J2Retour = '$_POST[quart4J2Retour]'
,demi1J1 = '$_POST[demi1J1]'
,demi1J1Aller = '$_POST[demi1J1Aller]'
,demi1J1Retour = '$_POST[demi1J1Retour]'
,demi1J2 = '$_POST[demi1J2]'
,demi1J2Aller = '$_POST[demi1J2Aller]'
,demi1J2Retour = '$_POST[demi1J2Retour]'
,demi2J1 = '$_POST[demi2J1]'
,demi2J1Aller = '$_POST[demi2J1Aller]'
,demi2J1Retour = '$_POST[demi2J1Retour]'
,demi2J2 = '$_POST[demi2J2]'
,demi2J2Aller = '$_POST[demi2J2Aller]'
,demi2J2Retour = '$_POST[demi2J2Retour]'
,finaleJ1 = '$_POST[finaleJ1]'
,finaleJ1Aller = '$_POST[finaleJ1Aller]'
,finaleJ1Retour = '$_POST[finaleJ1Retour]'
,finaleJ2 = '$_POST[finaleJ2]'
,finaleJ2Aller = '$_POST[finaleJ2Aller]'
,finaleJ2Retour = '$_POST[finaleJ2Retour]'
where login='$login' and nomTournoi='$name';";

$sql = $mysqli->query($req);


header("Refresh: 0;URL=huitiemes.php?name=$name&nb=$nb");