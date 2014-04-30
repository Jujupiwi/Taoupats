<?php
include 'param.php';
$mysqli = new mysqli($serv, $user, $pwd, $data);
if ($mysqli->connect_errno) {
    $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (isset($_POST['init'])) {
    $pass = $mysqli->real_escape_string($_POST['pass']);
    $pass = md5($_POST['pass']);
    $login = $_POST['login'];
    $mysqli->query("update membre set pass='" . $pass . "' where login= '" . $login . "'");
    header('Location: index.php?enreg=O');
    exit();
}
$cleRecup = $_GET['cle'];
$login = $_GET['login'];
$mail = $_GET['mail'];
$error = 'E';
if ($login == "") {
    $res = $mysqli->query('SELECT login FROM membre WHERE mail="' . $mail . '"');
    $row = $res->fetch_array();
    $login = $row[0];
}
$res = $mysqli->query('SELECT valide, cle FROM membre WHERE login="' . $login . '"');
$row = $res->fetch_array();

if ($row[0] == 0 || $row[1] != $cleRecup) {
    header('Location: index.php?enreg=E');
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
        <h1 class="pull-left">Password oublie</h1>
        <ul class="pull-right breadcrumb">
            <li class="active">Password oublie</li>
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
            <form id="target" class="reg-page" method="post" action="init_password.php">
                <div class="reg-header">
                    <h2>Mot de passe oublie ?</h2>
                    <p>Vous avez deja un compte ? <a href="index.php" class="color-green">cliquez ici</a>.</p>
                </div>
                <div class="alert alert-block alert-error" style="color: red; display: none" id="vide">
                    <button type="button" class="close" id="closeVide">x</button>
                    <h4>Attention!</h4> Veuillez renseigner votre mot de passe!
                </div>
                <div class="alert alert-block alert-error" style="color: red; display: none" id="long">
                    <button type="button" class="close" id="closeLong">x</button>
                    <h4>Attention!</h4> Longueur minimum du mot de passe 4!
                </div>
                <div class="alert alert-block alert-error" style="color: red; display: none" id="egaux">
                    <button type="button" class="close" id="closeEgaux">x</button>
                    <h4>Attention!</h4> Le mot de passe resaisi n'est pas le meme!
                </div>
                <?php
                if ($error != 'E') {
                    echo "<label><span class='color-red'>" . $error . "</span></label><br>";
                }
                ?>

                <label>Nouveau mot de passe <span class="color-red">*</span></label>
                <input type="password" id="pass" name="pass" class="form-control margin-bottom-20">

                <br>

                <label>Resaisir le mot de passe <span class="color-red">*</span></label>
                <input type="password" id="pass2" name="pass2" class="form-control margin-bottom-20">

                <hr>
                <input type="hidden" name="login" value="<?php echo $login; ?>">;
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6 text-right">
                        <input class="btn-u" type="submit" name="init" value="Envoyer">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div style="margin-bottom: 90px;"></div>
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
<script>
    $("#target").submit(function (event) {
        var pass = $("#pass").val();
        var pass2 = $("#pass2").val();
        if (pass.length < 4) {
            $("#long").show("slow");
            event.preventDefault();
        }
        if (pass == '' && pass2 == '') {
            $("#vide").show("slow");
            event.preventDefault();
        } else if (pass != pass2) {
            $("#egaux").show("slow");
            event.preventDefault();
        } else {
            $("#target").submit();
        }
    });

    $("#closeVide").click(function () {
        $("#vide").hide("slow");
    });
    $("#closeEgaux").click(function () {
        $("#egaux").hide("slow");
    });
    $("#closeLong").click(function () {
        $("#long").hide("slow");
    });
</script>
</body>
</html>