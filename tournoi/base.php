<?php
//Variables:
include 'connexionBase.php';

$nb = $_POST['Nb'];
$name = $_POST['Name'];
$mode = $_POST['Mode'];
$ar = $_POST['ar'];
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);
// on s�lectionne la base
mysql_select_db("taoupats");
$sql = "INSERT INTO tournoi (nom_tournoi, mode_tournoi, nombre_tournoi, type_match) VALUES ('$name','$mode','$nb','$ar');";
// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

for ($i = 1; $i <= $nb; $i++) {
    $joueur = $_POST["joueur$i"];
    $equipe = $_POST["equipe$i"];
    $sql = "INSERT INTO joueur (nom_tournoi, joueur, equipe, id_equipe) VALUES ('$name','$joueur','$equipe','$i');";
// on envoie la requ�te
    $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
    $sql = "INSERT INTO classement (nom_tournoi, mj_classement, equipe, position, victoire, nul, defaite, bp, bc, diff, points) VALUES ('$name',0,'$equipe','$i',0,0,0,0,0,0,0);";
// on envoie la requ�te
    $req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
}
header("Refresh: 0;URL=tableau.php?name=$name");
?>
