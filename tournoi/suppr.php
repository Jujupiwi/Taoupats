<?php
//Variables:
include 'connexionBase.php';

$name = $_GET['name'];
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);
// on s�lectionne la base
mysql_select_db("taoupats");
$sql = "DELETE from classement WHERE nom_tournoi = '$name';";
// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$sql = "DELETE from resultats WHERE nom_tournoi = '$name';";
// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$sql = "DELETE from joueur WHERE nom_tournoi = '$name';";
// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$sql = "DELETE from tournoi WHERE nom_tournoi = '$name';";
// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

header("Refresh: 0;URL=../tournoi");

?>
