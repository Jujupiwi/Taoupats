<?php
include '../param.php';
$error = 'E';
if (isset($_GET['enreg'])) {
    $enreg = $_GET['enreg'];
    if ($enreg == 'I') {
        $error = 'Un tournoi de ce nom existe deja!';
    }
}
//...
// Votre code
//...
// Connexion à la base de données

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
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Nouveau Tournoi</h1>
        <ul class="pull-right breadcrumb">
            <li class="active">Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !</li>
            <li><a class="btn-u btn-u-red" href="../deconnexion.php">Deconnexion</a></li>
        </ul>
    </div>
    <!--/container-->
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container" style="margin-bottom: 280px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <form id="valide" class="reg-page" method="post" style="text-align: center" action="tournoi.php">
                <div class="reg-header">
                    <h1>Nouveau tournoi</h1>
                </div>
                <?php
                if ($error != 'E') {
                    echo "<label><span class='color-red'>" . $error . "</span></label>";
                }
                ?>
                <div class="alert alert-block alert-error" id="nameTournoiAlert" style="display: none; color: red">
                    <button type="button" class="close" id="closeNT">x</button>
                    <h4>Attention!</h4> Le Nom de Tournoi obligatoire!
                </div>
                <div class="alert alert-block alert-error" id="nbJoueurAlert" style="display: none; color: red">
                    <button type="button" class="close" id="closeNB">x</button>
                    <h4>Attention!</h4> Le Nombre de Joueurs doit etre compris entre 4 et 20!
                </div>
                <div class="input-group margin-bottom-20">
                    <label for="nomTournoi">Nom Tournoi LF <span class="color-red">*</span></label>
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input id="nomTournoi" type="text" placeholder="Nom Tournoi" name="name" class="form-control">
                </div>
                <div class="input-group margin-bottom-20">
                    <label for="nbJoueurs">Nombre de joueurs LF <span class="color-red">*</span></label>
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input id="nbJoueurs" type="number" placeholder="4/20" name="quant"
                           class="form-control numbersOnly">
                </div>
                <input class="btn-u btn-u-blue" type="submit" id="valide" name="continuer" value="Continuer">
            </form>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-4">
            <a class="btn-u btn-u-red" href="membre.php" width="100px" height="30px">&nbsp;&nbsp;Retour&nbsp;&nbsp;</a>
        </div>
    </div>
    <!--/row-->
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
    <!--/row-->
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
<script>
    $("#valide").submit(function (event) {
        var alertNbJoueur = $("#nbJoueurAlert");
        var alertNomTournoi = $("#nameTournoiAlert");
        alertNbJoueur.css("display", "none");
        alertNomTournoi.css("display", "none");
        if (document.getElementById('nomTournoi').value == "") {
            alertNomTournoi.show("slow");
        } else {
            if (document.getElementById('nbJoueurs').value > 20 || document.getElementById('nbJoueurs').value < 4) {
                document.getElementById('nbJoueurs').value = '';
                alertNbJoueur.show("slow");
            } else {
                $("#valide").submit();
            }
        }
        event.preventDefault();
    });
    $('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    $("#closeNT").click(function () {
        $("#nameTournoiAlert").css("display", "none");
    });
    $("#closeNB").click(function () {
        $("#nbJoueurAlert").css("display", "none");
    });
</script>

</body>
</html>