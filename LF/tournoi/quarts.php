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
            font-weight: bold !important;
        }
    </style>
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
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

<form id="fond" class="reg-page" method="post" action="quarts_resultats.php">
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

<div class="row input-group">
    <span id="quart" style="margin-left: 100px;color: red;"><b>1/4 FINALES</b></span>
    <span id="demie" style="margin-left: 320px;color: #0000ff;"><b>1/2 FINALES</b></span>
    <span id="finale" style="margin-left: 320px;color: #008000;"><b>FINALE</b></span>
</div>
<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart1J1Aller, quart1J1Retour, quart1J2Aller, quart1J2Retour, quart1J1, quart1J2 from quarts
             where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 1" id="Q1_joueur1" name="Q1_joueur1"
           class="form-control" value="<?php echo $requete[4]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q1_joueur1_A" id="Q1_joueur1_A"
           placeholder="Score 1" class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q1_joueur1_R" id="Q1_joueur1_R"
           placeholder="Score 1" class="form-control retour" value="<?php echo $requete[1]; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <input type="text" style="width: 150px !important;" placeholder="Joueur 2" name="Q1_joueur2" id="Q1_joueur2"
           class="form-control" value="<?php echo $requete[5]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q1_joueur2_A" id="Q1_joueur2_A"
           placeholder="Score 1" value="<?php echo $requete[2]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q1_joueur2_R" id="Q1_joueur2_R"
           placeholder="Score 1" value="<?php echo $requete[3]; ?>" class="form-control retour"/>
</div>

<div class="row" style="margin-top: 30px;"></div>

<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart2J1Aller, quart2J1Retour, quart2J1 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 3" name="Q2_joueur1" id="Q2_joueur1"
           class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q2_joueur1_A" id="Q2_joueur1_A"
           placeholder="Score 1" value="<?php echo $requete[0]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q2_joueur1_R" id="Q2_joueur1_R"
           placeholder="Score 1" value="<?php echo $requete[1]; ?>" class="form-control retour"/>

    <?php
    $sql = $mysqli->query("select demi1J1Aller, demi1J1Retour, demi1J1 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="margin-left:150px;width: 150px !important;" name="D1_joueur1" id="D1_joueur1"
           placeholder="Joueur 1" class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D1_joueur1_A" id="D1_joueur1_A"
           placeholder="Score 1" value="<?php echo $requete[0]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D1_joueur1_R" id="D1_joueur1_R"
           placeholder="Score 1" value="<?php echo $requete[1]; ?>" class="form-control retour"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
    <div class="col-md-4 vs1" style="margin-left: 40px; color: #0000ff;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart2J2Aller, quart2J2Retour, quart2J2 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 4" name="Q2_joueur2" id="Q2_joueur2"
           class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q2_joueur2_A" id="Q2_joueur2_A"
           placeholder="Score 1" value="<?php echo $requete[0]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q2_joueur2_R" id="Q2_joueur2_R"
           placeholder="Score 1" value="<?php echo $requete[1]; ?>" class="form-control retour"/>

    <?php
    $sql = $mysqli->query("select demi1J2Aller, demi1J2Retour, demi1J2 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="margin-left:150px;width: 150px !important;" name="D1_joueur2" id="D1_joueur2"
           placeholder="Joueur 2" class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D1_joueur2_A" id="D1_joueur2_A"
           placeholder="Score 1" value="<?php echo $requete[0]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D1_joueur2_R" id="D1_joueur2_R"
           placeholder="Score 1" value="<?php echo $requete[1]; ?>" class="form-control retour"/>

    <?php
    $sql = $mysqli->query("select finaleJ1Aller, finaleJ1Retour, finaleJ1 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="margin-left:100px;width: 150px !important;" name="F_joueur1" id="F_joueur1"
           placeholder="Joueur 1" class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="F_joueur1_A" placeholder="Score 1"
           id="F_joueur1_A"
           class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="F_joueur1_R" placeholder="Score 1"
           id="F_joueur1_R"
           class="form-control retour" value="<?php echo $requete[1]; ?>"/>
</div>
<div class="col-md-8"></div>
<div class="col-md-2 vs2" style="margin-left: 60px; margin-top: 10px;color: #008000"><b>Vs</b></div>
<div class="row" style="margin-top: 50px;"></div>

<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart3J1Aller, quart3J1Retour, quart3J1 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 5" name="Q3_joueur1" id="Q3_joueur1"
           class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q3_joueur1_A" id="Q3_joueur1_A"
           placeholder="Score 1" value="<?php echo $requete[0]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q3_joueur1_R" id="Q3_joueur1_R"
           placeholder="Score 1" value="<?php echo $requete[1]; ?>" class="form-control retour"/>

    <?php
    $sql = $mysqli->query("select demi2J1Aller, demi2J1Retour, demi2J1 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="margin-left:150px;width: 150px !important;" name="D2_joueur1" id="D2_joueur1"
           placeholder="Joueur 3" class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D2_joueur1_A" id="D2_joueur1_A"
           placeholder="Score 1" value="<?php echo $requete[0]; ?>" class="form-control"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D2_joueur1_R" id="D2_joueur1_R"
           placeholder="Score 1" value="<?php echo $requete[1]; ?>" class="form-control retour"/>

    <?php
    $sql = $mysqli->query("select finaleJ2Aller, finaleJ2Retour, finaleJ2 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="margin-left:100px;width: 150px !important;" name="F_joueur2" id="F_joueur2"
           placeholder="Joueur 2" class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="F_joueur2_A" placeholder="Score 1"
           id="F_joueur2_A"
           class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="F_joueur2_R" placeholder="Score 1"
           id="F_joueur2_R"
           class="form-control retour" value="<?php echo $requete[1]; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
    <div class="col-md-4 vs1" style="margin-left: 50px;color: #0000ff;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart3J2Aller, quart3J2Retour, quart3J2 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 6" name="Q3_joueur2" id="Q3_joueur2"
           class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q3_joueur2_A" id="Q3_joueur2_A"
           placeholder="Score 1" class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q3_joueur2_R" id="Q3_joueur2_R"
           placeholder="Score 1" class="form-control retour" value="<?php echo $requete[1]; ?>"/>

    <?php
    $sql = $mysqli->query("select demi2J2Aller, demi2J2Retour, demi2J2 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="margin-left:150px;width: 150px !important;" name="D2_joueur2" id="D2_joueur2"
           placeholder="Joueur 4" class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D2_joueur2_A" id="D2_joueur2_A"
           placeholder="Score 1" class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="D2_joueur2_R" id="D2_joueur2_R"
           placeholder="Score 1" class="form-control retour" value="<?php echo $requete[1]; ?>"/>
</div>
<div class="row" style="margin-top: 30px;"></div>

<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart4J1Aller, quart4J1Retour, quart4J1 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 7" name="Q4_joueur1" id="Q4_joueur1"
           class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q4_joueur1_A" id="Q4_joueur1_A"
           placeholder="Score 1" class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q4_joueur1_R" id="Q4_joueur1_R"
           placeholder="Score 1" class="form-control retour" value="<?php echo $requete[1]; ?>"/>
</div>
<div class="row">
    <div class="col-md-4" style="color: red;"><b>Vs</b></div>
</div>
<div class="row input-group">
    <?php
    $sql = $mysqli->query("select quart4J2Aller, quart4J2Retour, quart4J2 from quarts where nomTournoi = '$name' and login = '$login';");
    $requete = $sql->fetch_array();
    ?>
    <input type="text" style="width: 150px !important;" placeholder="Joueur 8" name="Q4_joueur2" id="Q4_joueur2"
           class="form-control" value="<?php echo $requete[2]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q4_joueur2_A" id="Q4_joueur2_A"
           placeholder="Score 1" class="form-control" value="<?php echo $requete[0]; ?>"/>
    <input type="text" style="margin-left:10px;width: 50px !important;" name="Q4_joueur2_R" id="Q4_joueur2_R"
           placeholder="Score 1" class="form-control retour" value="<?php echo $requete[1]; ?>"/>
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
    $("#quart").css("margin-left", "100px");
    $("#demie").css("margin-left", "320px");
    $("#finale").css("margin-left", "320px");
    $(".vs1").css("margin-left", "50px");
    $(".vs2").css("margin-left", "60px");
}

function afficheAller() {
    $(".retour").hide("fast");
    $("#quart").css("margin-left", "50px");
    $("#demie").css("margin-left", "290px");
    $("#finale").css("margin-left", "250px");
    $(".vs1").css("margin-left", "0px");
    $(".vs2").css("margin-left", "-60px");
}

function color() {
    var q1J1 = $("#Q1_joueur1");
    var q1J2 = $("#Q1_joueur2");
    q1J1.css("background-color", "");
    q1J2.css("background-color", "");
    var q1J1A = $("#Q1_joueur1_A");
    var q1J2A = $("#Q1_joueur2_A");
    q1J1A.css("background-color", "");
    q1J2A.css("background-color", "");
    var q1J1R = $("#Q1_joueur1_R");
    var q1J2R = $("#Q1_joueur2_R");
    var d1J1 = $("#D1_joueur1");
    var d1J2 = $("#D1_joueur2");

    if (q1J1A.val() > q1J2A.val()) {
        q1J1.css("background-color", "#B2C0BE");
        q1J2.css("background-color", "#B2C0BE");
        q1J1A.css("background-color", "#8AF7A4");
        q1J2A.css("background-color", "#F78A8A");
    } else if (q1J1A.val() < q1J2A.val()) {
        q1J1.css("background-color", "#B2C0BE");
        q1J2.css("background-color", "#B2C0BE");
        q1J1A.css("background-color", "#F78A8A");
        q1J2A.css("background-color", "#8AF7A4");
    } else if (q1J1A.val() == q1J2A.val()) {
        q1J1.css("background-color", "");
        q1J2.css("background-color", "");
        q1J1A.css("background-color", "");
        q1J2A.css("background-color", "");
    }

    if (q1J1R.val() > q1J2R.val()) {
        q1J1.css("background-color", "#B2C0BE");
        q1J2.css("background-color", "#B2C0BE");
        q1J1R.css("background-color", "#8AF7A4");
        q1J2R.css("background-color", "#F78A8A");
    } else if (q1J1R.val() < q1J1R.val()) {
        q1J1.css("background-color", "#B2C0BE");
        q1J2.css("background-color", "#B2C0BE");
        q1J1R.css("background-color", "#F78A8A");
        q1J2R.css("background-color", "#8AF7A4");
    } else if (q1J1R.val() == q1J1R.val()) {
        q1J1R.css("background-color", "");
        q1J1R.css("background-color", "");
    }

    var q2J1 = $("#Q2_joueur1");
    var q2J2 = $("#Q2_joueur2");
    q2J1.css("background-color", "");
    q2J2.css("background-color", "");
    var q2J1A = $("#Q2_joueur1_A");
    var q2J2A = $("#Q2_joueur2_A");
    q2J1A.css("background-color", "");
    q2J2A.css("background-color", "");
    var q2J1R = $("#Q2_joueur1_R");
    var q2J2R = $("#Q2_joueur2_R");

    if (q2J1A.val() > q2J2A.val()) {
        q2J1.css("background-color", "#B2C0BE");
        q2J2.css("background-color", "#B2C0BE");
        q2J1A.css("background-color", "#8AF7A4");
        q2J2A.css("background-color", "#F78A8A");
    } else if (q2J1A.val() < q2J2A.val()) {
        q2J1.css("background-color", "#B2C0BE");
        q2J2.css("background-color", "#B2C0BE");
        q2J1A.css("background-color", "#F78A8A");
        q2J2A.css("background-color", "#8AF7A4");
    } else if (q2J1A.val() == q2J2A.val()) {
        q2J1.css("background-color", "");
        q2J2.css("background-color", "");
        q2J1A.css("background-color", "");
        q2J2A.css("background-color", "");
    }

    if (q2J1R.val() > q2J2R.val()) {
        q2J1.css("background-color", "#B2C0BE");
        q2J2.css("background-color", "#B2C0BE");
        q2J1R.css("background-color", "#8AF7A4");
        q2J2R.css("background-color", "#F78A8A");
    } else if (q2J1R.val() < q2J2R.val()) {
        q2J1.css("background-color", "#B2C0BE");
        q2J2.css("background-color", "#B2C0BE");
        q2J1R.css("background-color", "#F78A8A");
        q2J2R.css("background-color", "#8AF7A4");
    } else if (q2J1R.val() == q2J2R.val()) {
        q2J2R.css("background-color", "");
        q2J1R.css("background-color", "");
    }

    var q3J1 = $("#Q3_joueur1");
    var q3J2 = $("#Q3_joueur2");
    q3J1.css("background-color", "");
    q3J2.css("background-color", "");
    var q3J1A = $("#Q3_joueur1_A");
    var q3J2A = $("#Q3_joueur2_A");
    q3J1A.css("background-color", "");
    q3J2A.css("background-color", "");
    var q3J1R = $("#Q3_joueur1_R");
    var q3J2R = $("#Q3_joueur2_R");
    var d2J1 = $("#D2_joueur1");
    var d2J2 = $("#D2_joueur2");

    if (q3J1A.val() > q3J2A.val()) {
        q3J1.css("background-color", "#B2C0BE");
        q3J2.css("background-color", "#B2C0BE");
        q3J1A.css("background-color", "#8AF7A4");
        q3J2A.css("background-color", "#F78A8A");
    } else if (q3J1A.val() < q3J2A.val()) {
        q3J1.css("background-color", "#B2C0BE");
        q3J2.css("background-color", "#B2C0BE");
        q3J1A.css("background-color", "#F78A8A");
        q3J2A.css("background-color", "#8AF7A4");
    } else if (q3J1A.val() == q3J2A.val()) {
        q3J1.css("background-color", "");
        q3J2.css("background-color", "");
        q3J1A.css("background-color", "");
        q3J2A.css("background-color", "");
    }

    if (q3J1R.val() > q3J2R.val()) {
        q3J1.css("background-color", "#B2C0BE");
        q3J2.css("background-color", "#B2C0BE");
        q3J1R.css("background-color", "#8AF7A4");
        q3J2R.css("background-color", "#F78A8A");
    } else if (q3J1R.val() < q3J2R.val()) {
        q3J1.css("background-color", "#B2C0BE");
        q3J2.css("background-color", "#B2C0BE");
        q3J1R.css("background-color", "#F78A8A");
        q3J2R.css("background-color", "#8AF7A4");
    } else if (q3J2R.val() == q3J1R.val()) {
        q3J2R.css("background-color", "");
        q3J1R.css("background-color", "");
    }

    var q4J1 = $("#Q4_joueur1");
    var q4J2 = $("#Q4_joueur2");
    q4J1.css("background-color", "");
    q4J2.css("background-color", "");
    var q4J1A = $("#Q4_joueur1_A");
    var q4J2A = $("#Q4_joueur2_A");
    q4J1A.css("background-color", "");
    q4J2A.css("background-color", "");
    var q4J1R = $("#Q4_joueur1_R");
    var q4J2R = $("#Q4_joueur2_R");
    if (q4J1A.val() > q4J2A.val()) {
        q4J1.css("background-color", "#B2C0BE");
        q4J2.css("background-color", "#B2C0BE");
        q4J1A.css("background-color", "#8AF7A4");
        q4J2A.css("background-color", "#F78A8A");
    } else if (q4J1A.val() < q4J2A.val()) {
        q4J1.css("background-color", "#B2C0BE");
        q4J2.css("background-color", "#B2C0BE");
        q4J1A.css("background-color", "#F78A8A");
        q4J2A.css("background-color", "#8AF7A4");
    } else if (q4J1A.val() == q4J2A.val()) {
        q4J1.css("background-color", "");
        q4J2.css("background-color", "");
        q4J1A.css("background-color", "");
        q4J2A.css("background-color", "");
    }

    if (q4J1R.val() > q4J2R.val()) {
        q4J1.css("background-color", "#B2C0BE");
        q4J2.css("background-color", "#B2C0BE");
        q4J1R.css("background-color", "#8AF7A4");
        q4J2R.css("background-color", "#F78A8A");
    } else if (q4J1R.val() < q4J2R.val()) {
        q4J1.css("background-color", "#B2C0BE");
        q4J2.css("background-color", "#B2C0BE");
        q4J1R.css("background-color", "#F78A8A");
        q4J2R.css("background-color", "#8AF7A4");
    } else if (q4J1R.val() == q4J2R.val()) {
        q4J1R.css("background-color", "");
        q4J2R.css("background-color", "");
    }
    var d1J1A = $("#D1_joueur1_A");
    var d1J1R = $("#D1_joueur1_R");
    var d1J2A = $("#D1_joueur2_A");
    var d1J2R = $("#D1_joueur2_R");
    var fJ1 = $("#F_joueur1");
    var fJ2 = $("#F_joueur2");
    if (d1J1A.val() > d1J2A.val()) {
        d1J1.css("background-color", "#B2C0BE");
        d1J2.css("background-color", "#B2C0BE");
        d1J1A.css("background-color", "#8AF7A4");
        d1J2A.css("background-color", "#F78A8A");
    } else if (d1J1A.val() < d1J2A.val()) {
        d1J1.css("background-color", "#B2C0BE");
        d1J2.css("background-color", "#B2C0BE");
        d1J1A.css("background-color", "#F78A8A");
        d1J2A.css("background-color", "#8AF7A4");
    } else if (d1J1A.val() == d1J2A.val()) {
        d1J1.css("background-color", "");
        d1J2.css("background-color", "");
        d1J1A.css("background-color", "");
        d1J2A.css("background-color", "");
    }
    if (d1J1R.val() > d1J2R.val()) {
        d1J1.css("background-color", "#B2C0BE");
        d1J2.css("background-color", "#B2C0BE");
        d1J1R.css("background-color", "#8AF7A4");
        d1J2R.css("background-color", "#F78A8A");
    } else if (d1J1R.val() < d1J2R.val()) {
        d1J1.css("background-color", "#B2C0BE");
        d1J2.css("background-color", "#B2C0BE");
        d1J1R.css("background-color", "#F78A8A");
        d1J2R.css("background-color", "#8AF7A4");
    } else if (d1J1R.val() == d1J2R.val()) {
        d1J1R.css("background-color", "");
        d1J2R.css("background-color", "");
    }
    var d2J1A = $("#D2_joueur1_A");
    var d2J1R = $("#D2_joueur1_R");
    var d2J2A = $("#D2_joueur2_A");
    var d2J2R = $("#D2_joueur2_R");
    if (d2J1A.val() > d2J2A.val()) {
        d2J1.css("background-color", "#B2C0BE");
        d2J2.css("background-color", "#B2C0BE");
        d2J1A.css("background-color", "#8AF7A4");
        d2J2A.css("background-color", "#F78A8A");
    } else if (d2J1A.val() < d2J2A.val()) {
        d2J1.css("background-color", "#B2C0BE");
        d2J2.css("background-color", "#B2C0BE");
        d2J1A.css("background-color", "#F78A8A");
        d2J2A.css("background-color", "#8AF7A4");
    } else if (d2J1A.val() == d2J2A.val()) {
        d2J1.css("background-color", "");
        d2J2.css("background-color", "");
        d2J1A.css("background-color", "");
        d2J2A.css("background-color", "");
    }
    if (d2J1R.val() > d2J2R.val()) {
        d2J1.css("background-color", "#B2C0BE");
        d2J2.css("background-color", "#B2C0BE");
        d2J1R.css("background-color", "#8AF7A4");
        d2J2R.css("background-color", "#F78A8A");
    } else if (d2J1R.val() < d2J2R.val()) {
        d2J1.css("background-color", "#B2C0BE");
        d2J2.css("background-color", "#B2C0BE");
        d2J1R.css("background-color", "#F78A8A");
        d2J2R.css("background-color", "#8AF7A4");
    } else if (d2J1R.val() == d2J2R.val()) {
        d2J1R.css("background-color", "");
        d2J2R.css("background-color", "");
    }
    var fJ1A = $("#F_joueur1_A");
    var fJ1R = $("#F_joueur1_R");
    var fJ2A = $("#F_joueur2_A");
    var fJ2R = $("#F_joueur2_R");

    if (fJ1A.val() > fJ2A.val()) {
        fJ1.css("background-color", "#B2C0BE");
        fJ2.css("background-color", "#B2C0BE");
        fJ1A.css("background-color", "#8AF7A4");
        fJ2A.css("background-color", "#F78A8A");
    } else if (fJ1A.val() < fJ2A.val()) {
        fJ1.css("background-color", "#B2C0BE");
        fJ2.css("background-color", "#B2C0BE");
        fJ1A.css("background-color", "#F78A8A");
        fJ2A.css("background-color", "#8AF7A4");
    } else if (fJ1A.val() == fJ2A.val()) {
        fJ1.css("background-color", "");
        fJ2.css("background-color", "");
        fJ1A.css("background-color", "");
        fJ2A.css("background-color", "");
    }

    if (fJ1R.val() > fJ2R.val()) {
        fJ1.css("background-color", "#B2C0BE");
        fJ2.css("background-color", "#B2C0BE");
        fJ1R.css("background-color", "#8AF7A4");
        fJ2R.css("background-color", "#F78A8A");
    } else if (fJ1R.val() < fJ2R.val()) {
        fJ1.css("background-color", "#B2C0BE");
        fJ2.css("background-color", "#B2C0BE");
        fJ1R.css("background-color", "#F78A8A");
        fJ2R.css("background-color", "#8AF7A4");
    } else if (fJ1R.val() == fJ2R.val()) {
        fJ1R.css("background-color", "");
        fJ2R.css("background-color", "");
    }
}

$("input[type='text']").keyup(function () {
    color();
});
$(document).ready(function () {
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