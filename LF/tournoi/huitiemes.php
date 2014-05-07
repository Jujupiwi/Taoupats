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
<form class="reg-page">
<div class="row input-group">
    <span id="huitieme" style="margin-left: 90px;color: red;"><b>1/8 FINALES</b></span>
    <span id="quart" style="margin-left: 220px;color: #0000ff;"><b>1/4 FINALES</b></span>
    <span id="demie" style="margin-left: 180px;color: #008000;"><b>1/2 FINALES</b></span>
    <span id="finale" style="margin-left: 220px;color: purple;"><b>FINALE</b></span>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 2" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 1"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>

<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 3" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 2"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 4" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 1"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

</div>
<div class="row input-group">
    <div class="col-md-8" style="margin-left: 570px;color: #008000;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 5" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 2"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 6" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 3"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

</div>
<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 7" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 4"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 8" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="width: 150px !important;margin-left:580px;" placeholder="Joueur 1"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row" style="margin-left: 830px;color: purple;"><b>Vs</b></div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 9" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="width: 150px !important;margin-left:580px;" placeholder="Joueur 2"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 10" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 5"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>

<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 11" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 6"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 12" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 3"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

</div>
<div class="row input-group">
    <div class="col-md-8" style="margin-left: 570px;color: #008000;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 13" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="width: 150px !important;margin-left:320px;" placeholder="Joueur 4"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

</div>
<div class="row">
    <div class="col-md-3" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 14" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 7"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

</div>
<div class="row" style="margin-left: 290px;color: #0000ff;"><b>Vs</b></div>

<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 15" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>

    <input type="text" style="margin-left:40px;width: 150px !important;" placeholder="Joueur 8"
           class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 16" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 40px !important;" placeholder="Score 1"
           class="form-control retour"/>
</div>
</form>
<br>
<div class="col-lg-6">
    <a class="btn-u btn-u-orange" href="membre.php" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>
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
</script>
</body>
</html>