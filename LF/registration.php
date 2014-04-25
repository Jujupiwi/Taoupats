<?php
include 'param.php';
// on teste si le visiteur a soumis le formulaire
$error = 'E';
if (isset($_POST['inscription']) && $_POST['inscription'] == 'Inscription') {
    // on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
        // on teste les deux mots de passe
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $error = 'Les 2 mots de passe sont differents.';
        } else {
            $mysqli = new mysqli($serv, $user, $pwd, $data);
            if ($mysqli->connect_errno) {
                $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            // on recherche si ce login est déjà utilisé par un autre membre
            $login = $mysqli->real_escape_string($_POST['login']);
            $pass = $mysqli->real_escape_string($_POST['pass']);
            $mail = $mysqli->real_escape_string($_POST['mail']);
            $cryptPass = md5($pass);
            $res = $mysqli->query('SELECT count(*) FROM membre WHERE login="' . $login . '"');
            $row = $res->fetch_array();

            if ($row[0] == 0) {
                session_start();
                $_SESSION['login'] = $_POST['login'];
                // Génération aléatoire d'une clé
                $cle = md5(microtime(TRUE) * 100000);
                $res = $mysqli->query('INSERT INTO membre VALUES("' . $login . '", "' . $cryptPass . '", "' . $mail . '",0,"' . $cle . '")');

                // Préparation du mail contenant le lien d'activation
                $destinataire = $mail;
                $sujet = "Activer votre compte";
                $entete = "From: inscription@tournoisLF.com";

                // Le lien d'activation est composé du login(log) et de la clé(cle)
                $message = 'Bienvenue sur TournoisLF,

                Pour activer votre compte, veuillez cliquer sur le lien ci dessous
                ou copier/coller dans votre navigateur internet.

                http://127.0.0.1/Taoupats/LF/inscription.php?log=' . urlencode($login) . '&cle=' . urlencode($cle) . '


                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.';
                mail($destinataire, $sujet, $message, $entete);
                header('Location: tournoi/membre.php');
                exit();
            } else {
                $error = 'Un membre possede deja ce login.';
            }
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
    <title>Unify | Welcome...</title>

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
    <link rel="stylesheet" href="assets/css/themes/default.css" id="style_color">
    <link rel="stylesheet" href="assets/css/themes/headers/default.css" id="style_color-header-1">
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Enregistrement</h1>
        <ul class="pull-right breadcrumb">
            <li class="active">Enregistrement</li>
        </ul>
    </div>
    <!--/container-->
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <form class="reg-page" method="post" action="registration.php">
                <div class="reg-header">
                    <h2>Creer un nouveau compte</h2>
                    <p>Vous avez deja un compte ? <a href="index.php" class="color-green">cliquez ici</a>.</p>
                </div>
                <?php
                if ($error != 'E') {
                    echo "<label><span class='color-red'>" . $error . "</span></label><br>";
                }
                ?>

                <label>Pseudo LF <span class="color-red">*</span></label>
                <input type="text" name="login" class="form-control margin-bottom-20">

                <label>Email <span class="color-red">*</span></label>
                <input type="email" name="mail" class="form-control margin-bottom-20">

                <div class="row">
                    <div class="col-sm-6">
                        <label>Password <span class="color-red">*</span></label>
                        <input name="pass" type="password" class="form-control margin-bottom-20">
                    </div>
                    <div class="col-sm-6">
                        <label>Confirm Password <span class="color-red">*</span></label>
                        <input type="password" name="pass_confirm" class="form-control margin-bottom-20">
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6 text-right">
                        <input class="btn-u" type="submit" name="inscription" value="Inscription">
                    </div>
                </div>
            </form>
        </div>
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