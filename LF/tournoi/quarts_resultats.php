<?php
include '../param.php';

$name = $_POST['name'];
$nb = $_POST['nb'];
$mode = $_POST['options'];

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

$Q1_joueur1 = $_POST["Q1_joueur1"];
$Q1_joueur1_A = $_POST["Q1_joueur1_A"];
$Q1_joueur1_R = $_POST["Q1_joueur1_R"];

$Q1_joueur2 = $_POST["Q1_joueur2"];
$Q1_joueur2_A = $_POST["Q1_joueur2_A"];
$Q1_joueur2_R = $_POST["Q1_joueur2_R"];

$Q2_joueur1 = $_POST["Q2_joueur1"];
$Q2_joueur1_A = $_POST["Q2_joueur1_A"];
$Q2_joueur1_R = $_POST["Q2_joueur1_R"];

$Q2_joueur2 = $_POST["Q2_joueur2"];
$Q2_joueur2_A = $_POST["Q2_joueur2_A"];
$Q2_joueur2_R = $_POST["Q2_joueur2_R"];

$Q3_joueur1 = $_POST["Q3_joueur1"];
$Q3_joueur1_A = $_POST["Q3_joueur1_A"];
$Q3_joueur1_R = $_POST["Q3_joueur1_R"];

$Q3_joueur2 = $_POST["Q3_joueur2"];
$Q3_joueur2_A = $_POST["Q3_joueur2_A"];
$Q3_joueur2_R = $_POST["Q3_joueur2_R"];

$Q4_joueur1 = $_POST["Q4_joueur1"];
$Q4_joueur1_A = $_POST["Q4_joueur1_A"];
$Q4_joueur1_R = $_POST["Q4_joueur1_R"];

$Q4_joueur2 = $_POST["Q4_joueur2"];
$Q4_joueur2_A = $_POST["Q4_joueur2_A"];
$Q4_joueur2_R = $_POST["Q4_joueur2_R"];

$D1_joueur1 = $_POST["D1_joueur1"];
$D1_joueur1_A = $_POST["D1_joueur1_A"];
$D1_joueur1_R = $_POST["D1_joueur1_R"];

$D1_joueur2 = $_POST["D1_joueur2"];
$D1_joueur2_A = $_POST["D1_joueur2_A"];
$D1_joueur2_R = $_POST["D1_joueur2_R"];

$D2_joueur1 = $_POST["D2_joueur1"];
$D2_joueur1_A = $_POST["D2_joueur1_A"];
$D2_joueur1_R = $_POST["D2_joueur1_R"];

$D2_joueur2 = $_POST["D2_joueur2"];
$D2_joueur2_A = $_POST["D2_joueur2_A"];
$D2_joueur2_R = $_POST["D2_joueur2_R"];

$F_joueur1 = $_POST["F_joueur1"];
$F_joueur1_A = $_POST["F_joueur1_A"];
$F_joueur1_R = $_POST["F_joueur1_R"];

$F_joueur2 = $_POST["F_joueur2"];
$F_joueur2_A = $_POST["F_joueur2_A"];
$F_joueur2_R = $_POST["F_joueur2_R"];

$req = "UPDATE `quarts` SET `quart1J1Aller`='$Q1_joueur1_A',`quart1J2Aller`='$Q1_joueur2_A',`quart1J1Retour`='$Q1_joueur1_R',
`quart1J2Retour`='$Q1_joueur2_R',`quart2J1Aller`='$Q2_joueur1_A',`quart2J2Aller`='$Q2_joueur2_A',`quart2J1Retour`='$Q2_joueur1_R',
`quart2J2Retour`='$Q2_joueur2_R',`quart3J1Aller`='$Q3_joueur1_A',`quart3J2Aller`='$Q3_joueur2_A',`quart3J1Retour`='$Q3_joueur1_R',
`quart3J2Retour`='$Q3_joueur2_R',`quart4J1Aller`='$Q4_joueur1_A',`quart4J2Aller`='$Q4_joueur2_A',`quart4J1Retour`='$Q4_joueur1_R',
`quart4J2Retour`='$Q4_joueur2_R',`demi1J1Aller`='$D1_joueur1_A',`demi1J2Aller`='$D1_joueur2_A',`demi1J1Retour`='$D1_joueur1_R',
`demi1J2Retour`='$D1_joueur2_R',`demi2J1Aller`='$D2_joueur1_A',`demi2J2Aller`='$D2_joueur2_A',`demi2J1Retour`='$D2_joueur1_R',
`demi2J2Retour`='$D2_joueur2_R',`finaleJ1Aller`='$F_joueur1_A',`finaleJ2Aller`='$F_joueur2_A',`finaleJ1Retour`='$F_joueur1_R',
`finaleJ2Retour`='$F_joueur2_R',`quart1J1`='$Q1_joueur1',`quart1J2`='$Q1_joueur2', `quart2J1`='$Q2_joueur1',
 `quart2J2`='$Q2_joueur2', `quart3J1`='$Q3_joueur1',`quart3J2`='$Q3_joueur2',`quart4J1`='$Q4_joueur1',
 `quart4J2`='$Q4_joueur2', `demi1J1`='$D1_joueur1', `demi1J2`='$D1_joueur2', `demi2J1`='$D2_joueur1',
 `demi2J2`='$D2_joueur2', `finaleJ1`='$F_joueur1', `finaleJ2`='$F_joueur2' WHERE login='$login' and nomTournoi = '$name'";

$sql = $mysqli->query($req);


header("Refresh: 0;URL=quarts.php?name=$name&nb=$nb");