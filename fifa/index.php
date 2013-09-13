<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jguerrin
 * Date: 13/09/13
 * Time: 14:17
 */
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
    <div class="jumbotron">
        <div class="container">
            <h1>Tournoi FIFA</h1>
            <div class="col-lg-12">
                <p><img src="images/fifa.jpg"></p>
            </div>
            <div class="col-lg-8">
                <div class="list-group">
                    <a href="nouveau.php" class="list-group-item active">
                        <h2 class="list-group-item-heading">CREER</h2>
                        <p class="list-group-item-text">Démarrer un nouveau tournoi FIFA.</p>
                    </a>
                    <a href="charger.php" class="list-group-item alert-warning">
                        <h2 class="list-group-item-heading">CHARGER</h2>
                        <p class="list-group-item-text">Charger un ancien tournoi FIFA.</p>
                    </a>
                    <a href="supprimer.php" class="list-group-item alert-danger">
                        <h2 class="list-group-item-heading">SUPPRIMER</h2>
                        <p class="list-group-item-text">Supprimer un tournoi FIFA.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>