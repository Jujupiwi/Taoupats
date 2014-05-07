<?php
//Variables:
include '../param.php';

$name = $_POST['name'];
$joueur = $_POST['joueur'];
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

//Aller ou aller/retour
$type = getTypeMatch($mysqli, $name, $login);

$sql = $mysqli->query("select id_equipe, equipe from joueur where nom_tournoi='$name' and login='$login' and joueur='$joueur'");
$requete = $sql->fetch_array();
$idequipe = $requete[0];
$nomEquipe = $requete[1];


$sql = $mysqli->query("select id_match, id_equipe_ext from matchs where id_equipe_dom = '$idequipe' and nb_equipe = '$nb';");

while ($row = $sql->fetch_array()) {
    $rows[] = $row;
}

foreach ($rows as $ligne) {
    $sql = $mysqli->query("select equipe from joueur where nom_tournoi='$name' and login='$login' and id_equipe='$ligne[1]'");
    $requete = $sql->fetch_array();
    $equipe = $requete[0];
    $sqlcount = $mysqli->query("select count(id_match) from resultats where equipe = '$nomEquipe' and login='$login' and id_match = '$ligne[0]' and nom_tournoi = '$name';");
    $requete = $sqlcount->fetch_array();
    $isjoue = $requete[0];
    if ($isjoue == 0) {
        $sqlcount = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$nomEquipe','0','0','0','1','-3','0','3','$ligne[0]', '$login');");
        $sqlcount = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe','3','1','0','0','3','3','0','$ligne[0]', '$login');");
    } else {
        $sqlcount = $mysqli->query("update resultats set points = '3', victoire = '1', nul='0', defaite='0', diff='3', bp='3', bc='0' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe' and id_match='$ligne[0]';");
        $sqlcount = $mysqli->query("update resultats set points = '0', victoire = '0', nul='0', defaite='1', diff='-3', bp='0', bc='3' where nom_tournoi = '$name' and login='$login' and equipe = '$nomEquipe' and id_match='$ligne[0]';");
    }
}

$sql = $mysqli->query("select id_match, id_equipe_dom from matchs where id_equipe_ext = '$idequipe' and nb_equipe = '$nb';");
while ($row = $sql->fetch_array()) {
    $rows[] = $row;
}

foreach ($rows as $ligne) {
    $sql = $mysqli->query("select equipe from joueur where nom_tournoi='$name' and login='$login' and id_equipe='$ligne[1]'");
    $requete = $sql->fetch_array();
    $equipe = $requete[0];
    $sqlcount = $mysqli->query("select count(id_match) from resultats where equipe = '$nomEquipe' and login='$login' and id_match = '$ligne[0]' and nom_tournoi = '$name';");
    $requete = $sqlcount->fetch_array();
    $isjoue = $requete[0];
    if ($isjoue == 0) {
        $sqlcount = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe','3','1','0','0','3','3','0','$ligne[0]', '$login');");
        $sqlcount = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$nomEquipe','0','0','0','1','-3','0','3','$ligne[0]', '$login');");
    } else {
        $sqlcount = $mysqli->query("update resultats set points = '3', victoire = '1', nul='0', defaite='0', diff='3', bp='3', bc='0' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe' and id_match='$ligne[0]';");
        $sqlcount = $mysqli->query("update resultats set points = '0', victoire = '0', nul='0', defaite='1', diff='-3', bp='0', bc='3' where nom_tournoi = '$name' and login='$login' and equipe = '$nomEquipe' and id_match='$ligne[0]';");
    }
}

for ($i = 1; $i <= $nb; $i++) {
    $sql = $mysqli->query("select equipe from joueur where nom_tournoi = '$name' and login='$login' and id_equipe='$i';");
    $requete = $sql->fetch_array();
    $equipe = $requete[0];

    $sql = $mysqli->query("select sum(points) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $points = $requete[0];

    $sql = $mysqli->query("select sum(victoire) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $victoire = $requete[0];

    $sql = $mysqli->query("select sum(nul) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $nul = $requete[0];

    $sql = $mysqli->query("select sum(defaite) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $defaite = $requete[0];

    $sql = $mysqli->query("select sum(diff) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $diff = $requete[0];

    $sql = $mysqli->query("select sum(bp) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $bp = $requete[0];

    $sql = $mysqli->query("select sum(bc) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $bc = $requete[0];

    $sql = $mysqli->query("select count(equipe) from resultats where nom_tournoi = '$name' and login='$login' and equipe='$equipe';");
    $requete = $sql->fetch_array();
    $nbjoue = $requete[0];

    if ($type == 'non') {
        $defaite = $defaite / 2;
        $diff = $diff / 2;
        $bc = $bc / 2;
        $bp = $bp / 2;
        $nbjoue = $nbjoue / 2;
        $victoire = $victoire / 2;
        $points = $points / 2;
    }
    $sql = $mysqli->query("update classement set points = '$points', victoire = '$victoire', nul = '$nul', defaite = '$defaite', diff = '$diff', bp = '$bp', bc = '$bc', mj_classement = '$nbjoue' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe';");
}


/**
 * @param $mysqli
 * @param $name
 * @param $login
 * @return array
 */
function getTypeMatch($mysqli, $name, $login)
{
    $sql = $mysqli->query("select type_match from tournoi where nom_tournoi='$name' and login='$login'");
    $requete = $sql->fetch_array();
    return $requete[0];
}

header('Refresh: 0;URL=tableau.php?name=' . $name . '');

