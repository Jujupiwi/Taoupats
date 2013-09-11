<?php
include 'connexionBase.php';

$name = $_GET['name'];
$nb = $_GET['nb'];
$nb_match = $_GET['nbmatch'];
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);
// on s�lectionne la base
mysql_select_db("taoupats");

for ($i = 1; $i <= $nb_match; $i++) {
    $equipe_dom = $_POST["equipe_dom_$i"];
    $equipe_ext = $_POST["equipe_ext_$i"];
    $score_dom = $_POST["score_dom_$i"];
    $score_ext = $_POST["score_ext_$i"];
    $sqlcount = "select count(id_match) from resultats where equipe = '$equipe_dom' and id_match = '$i' and nom_tournoi = '$name';";
    $requete = mysql_query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $isjoue_dom = mysql_result($requete, 0);
    $sqlcount = "select count(id_match) from resultats where equipe = '$equipe_ext' and id_match = '$i' and nom_tournoi = '$name';";
    $requete = mysql_query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $isjoue_ext = mysql_result($requete, 0);
    if ($isjoue_dom == 0 && $isjoue_ext == 0) {
        if ($score_dom != "" && $score_ext != "") {
            if ($score_dom > $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = "INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match) VALUES ('$name','$equipe_dom','3','1','0','0','$diff','$score_dom','$score_ext','$i');";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                $diff = $score_ext - $score_dom;
                $sql = "INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match) VALUES ('$name','$equipe_ext','0','0','0','1','$diff','$score_ext','$score_dom','$i');";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
            } else if ($score_dom < $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = "INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match) VALUES ('$name','$equipe_dom','0','0','0','1','$diff','$score_dom','$score_ext','$i');";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                $diff = $score_ext - $score_dom;
                $sql = "INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match) VALUES ('$name','$equipe_ext','3','1','0','0','$diff','$score_ext','$score_dom','$i');";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
            } else if ($score_dom == $score_ext) {
                $sql = "INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match) VALUES ('$name','$equipe_dom','1','0','1','0','0','$score_dom','$score_ext','$i');";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                $sql = "INSERT INTO resultats (nom_tournoi, equipe, points, victoire, nul, defaite, diff, bp, bc, id_match) VALUES ('$name','$equipe_ext','1','0','1','0','0','$score_ext','$score_dom','$i');";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
            }
        }
    } else {
        if ($score_dom != "" && $score_ext != "") {
            if ($score_dom > $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = "update resultats set points = '3', victoire = '1', nul='0', defaite='0', diff='$diff', bp='$score_dom', bc='$score_ext' where nom_tournoi = '$name' and equipe = '$equipe_dom' and id_match='$i';";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                $diff = $score_ext - $score_dom;
                $sql = "update resultats set points = '0', victoire = '0', nul='0', defaite='1', diff='$diff', bp='$score_ext', bc='$score_dom' where nom_tournoi = '$name' and equipe = '$equipe_ext' and id_match='$i';";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
            } else if ($score_dom < $score_ext) {
                $diff = $score_dom - $score_ext;
                $sql = "update resultats set points = '0', victoire = '0', nul='0', defaite='1', diff='$diff', bp='$score_dom', bc='$score_ext' where nom_tournoi = '$name' and equipe = '$equipe_dom' and id_match='$i';";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                $diff = $score_ext - $score_dom;
                $sql = "update resultats set points = '3', victoire = '1', nul='0', defaite='0', diff='$diff', bp='$score_ext', bc='$score_dom' where nom_tournoi = '$name' and equipe = '$equipe_ext' and id_match='$i';";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
            } else if ($score_dom == $score_ext) {
                $sql = "update resultats set points = '1', victoire = '0', nul='1', defaite='0', diff='0', bp='$score_dom', bc='$score_ext' where nom_tournoi = '$name' and equipe = '$equipe_dom' and id_match='$i';";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
                $sql = "update resultats set points = '1', victoire = '0', nul='1', defaite='0', diff='0', bp='$score_ext', bc='$score_dom' where nom_tournoi = '$name' and equipe = '$equipe_ext' and id_match='$i';";
                $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
            }
        }
    }
}
for ($i = 1; $i <= $nb; $i++) {
    $sql = "select equipe from joueur where nom_tournoi = '$name' and id_equipe='$i';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $equipe = mysql_result($requete, 0);
    echo $equipe;
    $sql = "select sum(points) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $points = mysql_result($requete, 0);
    echo $points;
    $sql = "select sum(victoire) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $victoire = mysql_result($requete, 0);
    echo $victoire;
    $sql = "select sum(nul) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $nul = mysql_result($requete, 0);
    echo $nul;
    $sql = "select sum(defaite) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $defaite = mysql_result($requete, 0);
    echo $defaite;
    $sql = "select sum(diff) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $diff = mysql_result($requete, 0);
    echo $diff;
    $sql = "select sum(bp) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $bp = mysql_result($requete, 0);
    echo $bp;
    $sql = "select sum(bc) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $bc = mysql_result($requete, 0);
    echo $bc;
    $sql = "select count(equipe) from resultats where nom_tournoi = '$name' and equipe='$equipe';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $nbjoue = mysql_result($requete, 0);
    echo $nbjoue;
    echo "<br>";
    $sql = "update classement set points = '$points', victoire = '$victoire', nul = '$nul', defaite = '$defaite', diff = '$diff', bp = '$bp', bc = '$bc', mj_classement = '$nbjoue' where nom_tournoi = '$name' and equipe = '$equipe';";
    $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
}

header("Refresh: 0;URL=tableau.php?name=$name");
?>