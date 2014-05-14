<?php
include '../param.php';

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
$name = $_GET['name'];
$nb = $_GET['nb'];
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <title>Tournois LF</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/headers/header1.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.css">
    <!-- CSS Style Page -->
    <link rel="stylesheet" href="../assets/css/pages/page_log_reg_v1.css">
    <!-- CSS Theme -->
    <link rel="stylesheet" href="../assets/css/themes/red.css" id="style_color">
    <link rel="stylesheet" href="../assets/css/themes/headers/header1-red.css" id="style_color-header-1">
    <style>
        input {
            height: 30px !important;
            font-weight: bold !important;
        }
    </style>
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-10">
    <div class="container">
        <h1 class="pull-left">Tournoi <?php echo $name; ?></h1>
        <ul class="pull-right breadcrumb">
            <li class="active">Bienvenue
                <?php echo htmlentities(trim($_SESSION['login'])); ?> !
            </li>
            <li><a class="btn-u btn-u-red" href="../deconnexion.php">Deconnexion</a></li>
        </ul>
    </div>
    <!--/container-->
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->
<div class="container" style="margin-bottom: 130px;">
<h2>Tournoi : <?php echo $name; ?></h2>

<form class="form-inline" role="form">
    <div class="radio">
        <label>
            <input type="radio" name="options" id="A" onclick="afficheAller();" value="A">
            Aller
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="options" id="AR" onclick="afficheRetour();" value="AR" checked>
            Aller / Retour
        </label>
    </div>
</form>
<form id="fond" class="reg-page" method="post" action="huitiemes_resultats.php">
<div class="row input-group">
    <span id="huitieme" style="margin-left: 90px;color: red;"><b>1/8 FINALES</b></span>
    <span id="quart" style="margin-left: 220px;color: #0000ff;"><b>1/4 FINALES</b></span>
    <span id="demie" style="margin-left: 180px;color: #008000;"><b>1/2 FINALES</b></span>
    <span id="finale" style="margin-left: 220px;color: purple;"><b>FINALE</b></span>
</div>
<div class="row input-group">
    <?php
    $sql = $mysqli->query("select * from huitiemes
             where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 1" name="huitieme1J1"
           class="form-control match_1"
           value="<?php echo $requete['huitieme1J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme1J1Aller"
           class="form-control aller_dom_1" value="<?php echo $requete['huitieme1J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme1J1Retour"
           class="form-control retour_dom_1 retour" value="<?php echo $requete['huitieme1J1Retour']; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 2" name="huitieme1J2"
           class="form-control match_1"
           value="<?php echo $requete['huitieme1J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme1J2Aller"
           value="<?php echo $requete['huitieme1J2Aller']; ?>" class="form-control aller_ext_1"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme1J2Retour"
           class="form-control retour_ext_1 retour" value="<?php echo $requete['huitieme1J2Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" name="quart1J1" placeholder="Joueur 1"
           class="form-control match_9" value="<?php echo $requete['quart1J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" name="quart1J1Aller" placeholder="Score 1"
           class="form-control aller_dom_9" value="<?php echo $requete['quart1J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart1J1Retour"
           class="form-control retour retour_dom_9" value="<?php echo $requete['quart1J1Retour']; ?>"/>
</div>

<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 3" name="huitieme2J1"
           class="form-control match_2" value="<?php echo $requete['huitieme2J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme2J1Aller"
           class="form-control aller_dom_2" value="<?php echo $requete['huitieme2J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme2J1Retour"
           class="form-control retour_dom_2 retour" value="<?php echo $requete['huitieme2J1Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 2" name="quart1J2"
           class="form-control match_9" value="<?php echo $requete['quart1J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_9"
           name="quart1J2Aller" value="<?php echo $requete['quart1J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart1J2Retour"
           class="form-control retour retour_ext_9" value="<?php echo $requete['quart1J2Retour']; ?>"/>
</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 4" name="huitieme2J2"
           value="<?php echo $requete['huitieme2J2']; ?>" class="form-control match_2"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme2J2Aller"
           value="<?php echo $requete['huitieme2J2Aller']; ?>" class="form-control aller_ext_2"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme2J2Retour"
           class="form-control retour_ext_2 retour" value="<?php echo $requete['huitieme2J2Retour']; ?>"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 1" name="demi1J1"
           class="form-control match_10" value="<?php echo $requete['demi1J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_10"
           value="<?php echo $requete['demi1J1Aller']; ?>" name="demi1J1Aller"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           value="<?php echo $requete['demi1J1Retour']; ?>" name="demi1J1Retour"
           class="form-control retour retour_dom_10"/>

</div>
<div class="row input-group">
    <div class="col-md-8" style="margin-left: 570px;color: #008000;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 5" name="huitieme3J1"
           value="<?php echo $requete['huitieme3J1']; ?>" class="form-control match_3"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           value="<?php echo $requete['huitieme3J1Aller']; ?>" name="huitieme3J1Aller"
           class="form-control aller_dom_3"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           value="<?php echo $requete['huitieme3J1Retour']; ?>"
           name="huitieme3J1Retour" class="form-control retour retour_dom_3"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 2" name="demi1J2"
           class="form-control match_10" value="<?php echo $requete['demi1J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="demi1J2Aller"
           value="<?php echo $requete['demi1J2Aller']; ?>" class="form-control aller_ext_10"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="demi1J2Retour"
           class="form-control retour retour_ext_10" value="<?php echo $requete['demi1J2Retour']; ?>"/>

</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 6" class="form-control match_3"
           value="<?php echo $requete['huitieme3J2']; ?>"
           name="huitieme3J2"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           value="<?php echo $requete['huitieme3J2Aller']; ?>" name="huitieme3J2Aller"
           class="form-control aller_ext_3"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme3J2Retour"
           class="form-control retour retour_ext_3" value="<?php echo $requete['huitieme3J2Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 3" name="quart2J1"
           class="form-control match_11" value="<?php echo $requete['quart2J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart2J1Aller"
           value="<?php echo $requete['quart2J1Aller']; ?>" class="form-control aller_dom_11"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart2J1Retour"
           class="form-control retour retour_dom_11" value="<?php echo $requete['quart2J1Retour']; ?>"/>

</div>
<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 7" class="form-control match_4"
           name="huitieme4J1"
           value="<?php echo $requete['huitieme4J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_4" name="huitieme4J1Aller"
           value="<?php echo $requete['huitieme4J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme4J1Retour"
           class="form-control retour retour_dom_4" value="<?php echo $requete['huitieme4J1Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 4" name="quart2J2"
           class="form-control match_11" value="<?php echo $requete['quart2J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_11" name="quart2J2Aller"
           value="<?php echo $requete['quart2J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart2J2Retour"
           class="form-control retour retour_ext_11" value="<?php echo $requete['quart2J2Retour']; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 8" class="form-control match_4"
           name="huitieme4J2"
           value="<?php echo $requete['huitieme4J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_4" name="huitieme4J2Aller"
           value="<?php echo $requete['huitieme4J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme4J2Retour"
           class="form-control retour retour_ext_4" value="<?php echo $requete['huitieme4J2Retour']; ?>"/>

    <input type="text" style="width: 150px !important;margin-left:580px;" placeholder="Joueur 1" name="finaleJ1"
           class="form-control match_12" value="<?php echo $requete['finaleJ1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_12" name="finaleJ1Aller"
           value="<?php echo $requete['finaleJ1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="finaleJ1Retour"
           class="form-control retour retour_dom_12" value="<?php echo $requete['finaleJ1Retour']; ?>"/>
</div>
<div class="row" style="margin-left: 830px;color: purple;"><b>Vs</b></div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 9" class="form-control match_5"
           name="huitieme5J1"
           value="<?php echo $requete['huitieme5J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_5" name="huitieme5J1Aller"
           value="<?php echo $requete['huitieme5J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme5J1Retour"
           class="form-control retour retour_dom_5" value="<?php echo $requete['huitieme5J1Retour']; ?>"/>

    <input type="text" style="width: 150px !important;margin-left:580px;" placeholder="Joueur 2" name="finaleJ2"
           class="form-control match_12" value="<?php echo $requete['finaleJ2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_12" name="finaleJ2Aller"
           value="<?php echo $requete['finaleJ2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="finaleJ2Retour"
           class="form-control retour retour_ext_12" value="<?php echo $requete['finaleJ2Retour']; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 10" class="form-control match_5"
           name="huitieme5J2"
           value="<?php echo $requete['huitieme5J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_5" name="huitieme5J2Aller"
           value="<?php echo $requete['huitieme5J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme5J2Retour"
           class="form-control retour retour_ext_5" value="<?php echo $requete['huitieme5J2Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 5" name="quart3J1"
           class="form-control match_13" value="<?php echo $requete['quart3J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_13" name="quart3J1Aller"
           value="<?php echo $requete['quart3J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart3J1Retour"
           class="form-control retour retour_dom_13" value="<?php echo $requete['quart3J1Retour']; ?>"/>
</div>

<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 11" class="form-control match_6"
           name="huitieme6J1"
           value="<?php echo $requete['huitieme6J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_6" name="huitieme6J1Aller"
           value="<?php echo $requete['huitieme6J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme6J1Retour"
           class="form-control retour retour_dom_6" value="<?php echo $requete['huitieme6J1Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 6" name="quart3J2"
           class="form-control match_13" value="<?php echo $requete['quart3J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_13" name="quart3J2Aller"
           value="<?php echo $requete['quart3J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart3J2Retour"
           class="form-control retour retour_ext_13" value="<?php echo $requete['quart3J2Retour']; ?>"/>
</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 12" class="form-control match_6"
           name="huitieme6J2"
           value="<?php echo $requete['huitieme6J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_6" name="huitieme6J2Aller"
           value="<?php echo $requete['huitieme6J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme6J2Retour"
           class="form-control retour retour_ext_6" value="<?php echo $requete['huitieme6J2Retour']; ?>"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 3" name="demi2J1"
           class="form-control match_14" value="<?php echo $requete['demi2J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_14" name="demi2J1Aller"
           value="<?php echo $requete['demi2J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="demi2J1Retour"
           class="form-control retour retour_dom_14" value="<?php echo $requete['demi2J1Retour']; ?>"/>

</div>
<div class="row input-group">
    <div class="col-md-8" style="margin-left: 570px;color: #008000;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 13" class="form-control match_7"
           name="huitieme7J1"
           value="<?php echo $requete['huitieme7J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_7" name="huitieme7J1Aller"
           value="<?php echo $requete['huitieme7J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme7J1Retour"
           class="form-control retour retour_dom_7" value="<?php echo $requete['huitieme7J1Retour']; ?>"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 4" name="demi2J2"
           class="form-control match_14" value="<?php echo $requete['demi2J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_14" name="demi2J2Aller"
           value="<?php echo $requete['demi2J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="demi2J2Retour"
           class="form-control retour retour_ext_14" value="<?php echo $requete['demi2J2Retour']; ?>"/>

</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 14" class="form-control match_7"
           name="huitieme7J2"
           value="<?php echo $requete['huitieme7J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_7" name="huitieme7J2Aller"
           value="<?php echo $requete['huitieme7J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme7J2Retour"
           class="form-control retour retour_ext_7" value="<?php echo $requete['huitieme7J2Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 7" name="quart4J1"
           class="form-control match_15" value="<?php echo $requete['quart4J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_15" name="quart4J1Aller"
           value="<?php echo $requete['quart4J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart4J1Retour"
           class="form-control retour retour_dom_15" value="<?php echo $requete['quart4J1Retour']; ?>"/>

</div>
<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 15" class="form-control match_8"
           name="huitieme8J1"
           value="<?php echo $requete['huitieme8J1']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_dom_8" name="huitieme8J1Aller"
           value="<?php echo $requete['huitieme8J1Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme8J1Retour"
           class="form-control retour retour_dom_8" value="<?php echo $requete['huitieme8J1Retour']; ?>"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 8" name="quart4J2"
           class="form-control match_15" value="<?php echo $requete['quart4J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_15" name="quart4J2Aller"
           value="<?php echo $requete['quart4J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="quart4J2Retour"
           class="form-control retour retour_ext_15" value="<?php echo $requete['quart4J2Retour']; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 16" class="form-control match_8"
           name="huitieme8J2"
           value="<?php echo $requete['huitieme8J2']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control aller_ext_8" name="huitieme8J2Aller"
           value="<?php echo $requete['huitieme8J2Aller']; ?>"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" name="huitieme8J2Retour"
           class="form-control retour retour_ext_8" value="<?php echo $requete['huitieme8J2Retour']; ?>"/>
</div>
<br><br>
<center>
    <input type="hidden" value="<?php echo $nb; ?>" name="nb">
    <input type="hidden" value="<?php echo $name; ?>" name="name">
    <input type="submit" class="btn-u btn-u-blue" id="bout" value="Mettre a jour">
</center>
</form>
<br>
<div class="col-lg-8">
    <a class="btn-u btn-u-orange" href="membre.php" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>
    <a class="btn-u btn-u-sea" href="#" onclick="fond1();" style="width: :100px;height: 30px;">
        &nbsp;&nbsp;Fond 1&nbsp;&nbsp;</a>
    <a class="btn-u btn-u-yellow" href="#" onclick="fond2();" style="width: :100px;height: 30px;">
        &nbsp;&nbsp;Fond 2&nbsp;&nbsp;</a>
    <a class="btn-u btn-u-red" href="#" onclick="fond3();" style="width: :100px;height: 30px;">
        &nbsp;&nbsp;Fond 3&nbsp;&nbsp;</a>
    <a class="btn-u btn-u-blue" href="#" onclick="fond5();" style="width: :100px;height: 30px;">
        &nbsp;&nbsp;Fond 4&nbsp;&nbsp;</a>
    <a class="btn-u btn-u-green" href="#" onclick="fond4();" style="width: :100px;height: 30px;">
        &nbsp;&nbsp;Aucun fond&nbsp;&nbsp;</a>
</div>
</div>

<!--/container-->
<!--=== End Content Part ===-->

<!--=== Footer ===-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 md-margin-bottom-40">
                <!-- About -->
                <div class="headline"><h2>A Propos</h2></div>
                <p class="margin-bottom-25 md-margin-bottom-40">Outil de gestion de competition FIFA.</p>
                <p class="margin-bottom-10">Creation de championnats ou de tournois de 4 a 20 joueurs!!</p>


            </div>
            <!--/col-md-4-->

            <div class="col-md-4">
                <!-- Stay Connected -->
                <div class="headline"><h2>Reseaux sociaux</h2></div>
                <ul class="social-icons">
                    <li><a href="#" data-original-title="Feed" class="social_rss"></a></li>
                    <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="Pinterest" class="social_pintrest"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="Vimeo" class="social_vimeo"></a></li>
                </ul>
            </div>
            <!--/col-md-4-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</div>
<!--/footer-->
<!--=== End Footer ===-->

<!--=== Copyright ===-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-space">
                    2014 @Jujupiwi.
                </p>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</div>
<!--/copyright-->
<!--=== End Copyright ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="../assets/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/plugins/hover-dropdown.min.js"></script>
<script type="text/javascript" src="../assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="../assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
    });
</script>
<!--[if lt IE 9]>
<script src="../assets/plugins/respond.js"></script>
<![endif]-->
<script type="text/javascript">
    $('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    //    $(".numbersOnly").each(function (index) {
    //        if ($(this).val() != '') {
    //            $(this).parent().parent().hide();
    //        }
    //    });
    function afficheRetour() {
        $(".retour").show("fast");
        $("#huitieme").css("margin-left", "90px");
        $("#quart").css("margin-left", "220px");
        $("#demie").css("margin-left", "180px");
        $("#finale").css("margin-left", "220px");
    }

    function afficheAller() {
        $(".retour").hide("fast");
        $("#huitieme").css("margin-left", "60px");
        $("#quart").css("margin-left", "160px");
        $("#demie").css("margin-left", "180px");
        $("#finale").css("margin-left", "220px");
    }

    $(document).ready(function () {
        color();
    });

    function color() {
        for (var i = 1; i < 23; i++) {
            var aller_dom = $(".aller_dom_" + i);
            var aller_ext = $(".aller_ext_" + i);
            var retour_dom = $(".retour_dom_" + i);
            var retour_ext = $(".retour_ext_" + i);
            var match = $(".match_" + i);
            if (aller_dom.val() > aller_ext.val()) {
                match.css("background-color", "#B2C0BE");
                aller_dom.css("background-color", "#8AF7A4");
                aller_ext.css("background-color", "#F78A8A");
            } else if (aller_dom.val() < aller_ext.val()) {
                match.css("background-color", "#B2C0BE");
                aller_dom.css("background-color", "#F78A8A");
                aller_ext.css("background-color", "#8AF7A4");
            } else if (aller_dom.val() == aller_ext.val()) {
                match.css("background-color", "");
                aller_dom.css("background-color", "");
                aller_ext.css("background-color", "");
            }

            if (retour_dom.val() > retour_ext.val()) {
                retour_dom.css("background-color", "#8AF7A4");
                retour_ext.css("background-color", "#F78A8A");
            } else if (retour_dom.val() < retour_ext.val()) {
                retour_dom.css("background-color", "#F78A8A");
                retour_ext.css("background-color", "#8AF7A4");
            } else if (retour_dom.val() == retour_ext.val()) {
                retour_dom.css("background-color", "");
                retour_ext.css("background-color", "");
            }
        }
    }

    $("input[type='text']").keyup(function () {
        color();
    });

    function fond1() {
        $("#fond").css("background-image", "url('images/fond4.jpg')");
    }
    function fond2() {
        $("#fond").css("background-image", "url('images/fond1.jpeg')");
    }
    function fond3() {
        $("#fond").css("background-image", "url('images/fond2.jpeg')");
    }
    function fond4() {
        $("#fond").css("background-image", "");
    }
    function fond5() {
        $("#fond").css("background-image", "url('images/carte-monde.png')");
    }
</script>
</body>
</html>