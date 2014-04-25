<?php
include '../param.php';

$name = $_POST['name'];
$nb = $_POST['nb'];
$nb_match = $_POST['nbmatch'];

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

for ($i = 1; $i <= $nb_match; $i++) {
    $equipe_dom = $_POST["equipe_dom_$i"];
    $equipe_ext = $_POST["equipe_ext_$i"];
    $score_dom = $_POST["score_dom_$i"];
    $score_ext = $_POST["score_ext_$i"];
    $sqlcount = $mysqli->query("select count(id_match) from resultats where equipe = '$equipe_dom' and login='$login' and id_match = '$i' and nom_tournoi = '$name';");
    $requete = $sqlcount->fetch_array();
    $isjoue_dom = $requete[0];
    $sqlcount = $mysqli->query("select count(id_match) from resultats where equipe = '$equipe_ext' and login='$login' and id_match = '$i' and nom_tournoi = '$name';");
    $requete = $sqlcount->fetch_array();
    $isjoue_ext = $requete[0];
    if ($isjoue_dom == 0 && $isjoue_ext == 0) {
        if ($score_dom != "" && $score_ext != "") {
            if ($score_dom > $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe_dom','3','1','0','0','$diff','$score_dom','$score_ext','$i', '$login');");
                $diff = $score_ext - $score_dom;
                $sql = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe_ext','0','0','0','1','$diff','$score_ext','$score_dom','$i', '$login');");
            } else if ($score_dom < $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe_dom','0','0','0','1','$diff','$score_dom','$score_ext','$i', '$login');");
                $diff = $score_ext - $score_dom;
                $sql = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe_ext','3','1','0','0','$diff','$score_ext','$score_dom','$i', '$login');");
            } else if ($score_dom == $score_ext) {
                $sql = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe_dom','1','0','1','0','0','$score_dom','$score_ext','$i', '$login');");
                $sql = $mysqli->query("INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match, login) VALUES ('$name','$equipe_ext','1','0','1','0','0','$score_ext','$score_dom','$i', '$login');");

            }
        }
    } else {
        if ($score_dom != "" && $score_ext != "") {
            if ($score_dom > $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = $mysqli->query("update resultats set points = '3', victoire = '1', nul='0', defaite='0', diff='$diff', bp='$score_dom', bc='$score_ext' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe_dom' and id_match='$i';");
                $diff = $score_ext - $score_dom;
                $sql = $mysqli->query("update resultats set points = '0', victoire = '0', nul='0', defaite='1', diff='$diff', bp='$score_ext', bc='$score_dom' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe_ext' and id_match='$i';");
            } else if ($score_dom < $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = $mysqli->query("update resultats set points = '0', victoire = '0', nul='0', defaite='1', diff='$diff', bp='$score_dom', bc='$score_ext' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe_dom' and id_match='$i';");
                $diff = $score_ext - $score_dom;
                $sql = $mysqli->query("update resultats set points = '3', victoire = '1', nul='0', defaite='0', diff='$diff', bp='$score_ext', bc='$score_dom' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe_ext' and id_match='$i';");
            } else if ($score_dom == $score_ext) {
                $sql = $mysqli->query("update resultats set points = '1', victoire = '0', nul='1', defaite='0', diff='0', bp='$score_dom', bc='$score_ext' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe_dom' and id_match='$i';");
                $sql = $mysqli->query("update resultats set points = '1', victoire = '0', nul='1', defaite='0', diff='0', bp='$score_ext', bc='$score_dom' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe_ext' and id_match='$i';");

            }
        }
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

    $sql = $mysqli->query("update classement set points = '$points', victoire = '$victoire', nul = '$nul', defaite = '$defaite', diff = '$diff', bp = '$bp', bc = '$bc', mj_classement = '$nbjoue' where nom_tournoi = '$name' and login='$login' and equipe = '$equipe';");

}

header("Refresh: 0;URL=tableau.php?name=$name");