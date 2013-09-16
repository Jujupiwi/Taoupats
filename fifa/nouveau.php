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
    <div class="alert alert-danger alert-dismissable" id="nameTournoi" style="display: none;">
        <button type="button" id="close" class="close">×</button>
        <strong>Attention!</strong> Le nom de tournoi est obligatoire.
    </div>
    <div class="jumbotron">
        <div class="container">
            <h1>Création Tournoi FiFa</h1><br>

            <div class="col-lg-6">
                <form role="form" id="formSubmit" method="post" action="choixEquipes.php">
                    <div class="form-group">
                        <label for="nomTournoi">Nom du Tournoi</label>
                        <input type="text" class="form-control input-lg" id="nomTournoi" placeholder="Nom Tournoi">
                    </div>
                    <label for="selectEquipe">Nombre d'équipe</label>
                    <select class="form-control input-lg" id="selectEquipe">
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>12</option>
                        <option>14</option>
                        <option>16</option>
                    </select><br>
                    <a href="index.php">
                        <button type="button" class="btn btn-warning btn-lg">Retour</button>
                    </a>
                    <input type="submit" id="btnsubmit" class="btn btn-primary btn-lg" value="Continuer"/>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
    $('#formSubmit').submit(function () {
        if ($('#nomTournoi').val().length == 0) {
            $("#nameTournoi").show('slow');
            return false;
        } else {
            return true;
        }
    });
    $("#close").click(function () {
        $("#nameTournoi").hide('fast');
    });
</script>
</html>