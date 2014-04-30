<?php
$error = 'E';
if (isset($_GET['enreg'])) {
    $enreg = $_GET['enreg'];
    if ($enreg == 'E') {
        $error = 'Enregistrement effectue, vous allez recevoir un mail de confirmation.';
    }
    if ($enreg == 'P') {
        $error = 'Mail de reinitialisation du mot de passe envoye.';
    }
    if ($enreg == 'O') {
        $error = 'Mot de passe reinitialise';
    }
}
include 'param.php';
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

        $mysqli = new mysqli($serv, $user, $pwd, $data);
        if ($mysqli->connect_errno) {
            $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

// on teste si une entrée de la base contient ce couple login / pass
        $login = $mysqli->real_escape_string($_POST['login']);
        $pass = $mysqli->real_escape_string($_POST['pass']);
        $cryptPass = md5($pass);
        $res = $mysqli->query('SELECT count(*) FROM membre WHERE login="' . $login . '" AND pass="' . $cryptPass . '"');
        $row = $res->fetch_array();


// si on obtient une réponse, alors l'utilisateur est un membre
        if ($row[0] == 1) {
            $res = $mysqli->query('SELECT count(*) FROM membre WHERE login="' . $login . '" AND pass="' . $cryptPass . '" AND valide=1');
            $row = $res->fetch_array();
            if ($row[0] == 1) {
                session_start();
                $_SESSION['login'] = $_POST['login'];
                header('Location: tournoi/membre.php');
                exit();
            } else {
                $error = 'Vous devez activer votre compte avec le mail recu.';
            }

        } // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
        elseif ($row[0] == 0) {
            $error = 'Compte non reconnu.';
        } // sinon, alors la, il y a un gros problème :)
        else {
            $error = 'Probleme dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
        }
    } else {
        $error = 'Au moins un des champs est vide.';
    }
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
    <title>Tournoi LF</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/headers/header1.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">
    <!-- CSS Style Page -->
    <link rel="stylesheet" href="assets/css/pages/page_log_reg_v1.css">
    <!-- CSS Theme -->
    <link rel="stylesheet" href="assets/css/themes/red.css" id="style_color">
    <link rel="stylesheet" href="assets/css/themes/headers/header1-red.css" id="style_color-header-1">
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Login</h1>
        <ul class="pull-right breadcrumb">
            <li class="active">Login</li>
        </ul>
    </div>
    <!--/container-->
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <form class="reg-page" method="post" action="index.php">
                <div class="reg-header">
                    <h2>Se connecter</h2>
                </div>
                <?php
                if ($error != 'E') {
                    echo "<label><span class='color-red'>" . $error . "</span></label>";
                }
                ?>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-user"></i></span>
                    <input type="text" placeholder="Pseudo" name="login" class="form-control">
                </div>
                <div class="input-group margin-bottom-20">
                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Password" name="pass" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="checkbox"><input type="checkbox"> Rester connecte</label>
                    </div>
                    <div class="col-md-6">
                        <input class="btn-u pull-right" name="connexion" type="submit" value="Connexion">
                    </div>
                </div>

                <hr>

                <h4>Mot de passe oublie ?</h4>
                <p><a class="color-green" href="password.php">Cliquez ici</a> pour reinitaliser le mot de passe.</p>

                <hr>
                <h4>Pas encore inscrit ?</h4>
                <a class="color-green" href="registration.php">S'enregistrer</a>
            </form>
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
<script type="text/javascript" src="assets/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/hover-dropdown.min.js"></script>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
    });
</script>
<!--[if lt IE 9]>
<script src="assets/plugins/respond.js"></script>
<![endif]-->

</body>
</html> 