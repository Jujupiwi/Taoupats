<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jguerrin
 * Date: 13/09/13
 * Time: 14:17
 */
include 'connexionBase.php';
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$nbequipe = $_GET['nbequipe'];
$nomTournoi = $_GET['nomTournoi'];
$i = 1;
$sql2 = "INSERT INTO tournoi (nom_tournoi, mode_tournoi, nombre_tournoi, type_match) VALUES ('$nomTournoi','ch','$nbequipe','oui');";
$requete2 = $mysqli->query($sql2) or die('Erreur SQL !<br>' . $sql2 . '<br>' . mysql_error());
foreach ($_POST as $key => $val) {
    $sql = "INSERT INTO joueur (nom_tournoi, joueur, equipe, id_equipe) VALUES ('$nomTournoi','$key','$val','$i');";
    $sql1 = "INSERT INTO classement (nom_tournoi, mj_classement, equipe, position, victoire, nul, defaite, bp, bc, diff, points) VALUES ('$nomTournoi',0,'$val','$i',0,0,0,0,0,0,0);";
    $requete = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
    $requete1 = $mysqli->query($sql1) or die('Erreur SQL !<br>' . $sql1 . '<br>' . mysql_error());
    $i++;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
    <title>Tournoi FIFA 14</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site du club de foot des taoupats de daux">
    <meta name="keywords" content="Foot,Daux,Taoupats">
    <meta name="author" content="Julien Guerrin">
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel='stylesheet' href='typicons/font/typicons.css'/>
</head>
<body style="margin-top: 100px;">
<div class="container">
    <div class="alert alert-danger alert-dismissable" id="nameTournoi" style="display: none;">
        <button type="button" id="close" class="close">×</button>
        <strong>Attention!</strong> Le nom de tournoi est obligatoire.
    </div>
    <div class="jumbotron">
        <div class="container">
            <h1>Création Tournoi FiFa</h1><br>

        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</html>