<html>
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
    <link rel="stylesheet" href="../assets/css/themes/default.css" id="style_color">
    <link rel="stylesheet" href="../assets/css/themes/headers/default.css" id="style_color-header-1">
</head>
<body style="padding-top:100px;padding-left:100px;">
<?php
include '../param.php';
$name = $_GET['name'];

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

$sql = $mysqli->query("select equipe from classement where nom_tournoi = '$name' and login = '$login' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;");
while ($row = $sql->fetch_array()) {
    $rows[] = $row;
}
$i = 1;
foreach ($rows as $ligne) {
    if ($i == 1) {
        $equipe1 = $ligne[0];
    } else if ($i == 2) {
        $equipe2 = $ligne[0];
    } else if ($i == 3) {
        $equipe3 = $ligne[0];
    } else if ($i == 4) {
        $equipe4 = $ligne[0];
    }
    $i++;
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <label for="<?php echo strtoupper($equipe1); ?>">Demi Finale 1</label>
                <input type="text" style="width:200px; height:30px;" readonly class="form-control dom_df1"
                       value="<?php echo strtoupper($equipe1); ?>">
                <input type="text" style="width:40px; height:30px;" class="form-control score_dom_df1"/>
            </div>
            <div class="row">
                vs
            </div>
            <div class="row">
                <label for="<?php echo strtoupper($equipe4); ?>"></label>
                <input type="text" style="width:200px; height:30px;" readonly class="form-control ext_df1"
                       value="<?php echo strtoupper($equipe4); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="form-control score_ext_df1"/>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="row">
                <label for="<?php echo strtoupper($equipe2); ?>">Demi Finale 2</label>
                <input type="text" style="width:200px; height:30px;" readonly class="form-control dom_df2"
                       value="<?php echo strtoupper($equipe2); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="form-control score_dom_df2"/>
            </div>
            <div class="row">
                vs
            </div>
            <div class="row">
                <label for="<?php echo strtoupper($equipe3); ?>"></label>
                <input type="text" style="width:200px; height:30px; " readonly class="form-control ext_df2"
                       value="<?php echo strtoupper($equipe3); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="form-control score_ext_df2"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-2 col-lg-3">
            <input type="text" style="width:200px; height:30px;" readonly class="form-control dom_f"/>
        </div>
        <div class="col-lg-1" style="padding-left: 20px;">
            vs
        </div>
        <div class="col-lg-3">
            <input type="text" style="width:200px; height:30px;" readonly class="form-control ext_f"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-3">
            <input type="text" style="width:40px; height:30px;" class="form-control score_dom_f"/>
        </div>
        <div class="col-lg-1">

        </div>
        <div class="col-lg-3">
            <input type="text" style="width:40px; height:30px" class="form-control score_ext_f"/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1" style="padding-left: 50px;">
            <img src="images/ldc.jpg">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-4" style="padding-left: 60px;">
            <a class="btn btn-medium btn-u-red" href="../deconnexion.php" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>
        </div>
    </div>
</div>
</body>
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
</script>
<script>
    jQuery('.score_dom_df1').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_dom_df2').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_ext_df1').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_ext_df2').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_dom_f').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_ext_f').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    $("input[type='text']").keyup(function () {
        if ($('input[class=score_dom_df1]').val() > $('input[class=score_ext_df1]').val()) {
            var text = $('input[class=dom_df1]').val();
            $('input[class=dom_df1]').css("background-color", "#8AF7A4");
            $('input[class=ext_df1]').css("background-color", "#F78A8A");
            $('input[class=dom_f]').val(text);
        }
        if ($('input[class=score_dom_df1]').val() < $('input[class=score_ext_df1]').val()) {
            var text = $('input[class=ext_df1]').val();
            $('input[class=dom_df1]').css("background-color", "#F78A8A");
            $('input[class=ext_df1]').css("background-color", "#8AF7A4");
            $('input[class=dom_f]').val(text);
        }
        if ($('input[class=score_dom_df2]').val() > $('input[class=score_ext_df2]').val()) {
            var text = $('input[class=dom_df2]').val();
            $('input[class=dom_df2]').css("background-color", "#8AF7A4");
            $('input[class=ext_df2]').css("background-color", "#F78A8A");
            $('input[class=ext_f]').val(text);
        }
        if ($('input[class=score_dom_df2]').val() < $('input[class=score_ext_df2]').val()) {
            var text = $('input[class=ext_df2]').val();
            $('input[class=dom_df2]').css("background-color", "#F78A8A");
            $('input[class=ext_df2]').css("background-color", "#8AF7A4");
            $('input[class=ext_f]').val(text);
        }
        if ($('input[class=score_dom_f]').val() < $('input[class=score_ext_f]').val()) {
            $('input[class=dom_f]').css("background-color", "#F78A8A");
            $('input[class=ext_f]').css("background-color", "#8AF7A4");
        }

        if ($('input[class=score_dom_f]').val() > $('input[class=score_ext_f]').val()) {
            $('input[class=dom_f]').css("background-color", "#8AF7A4");
            $('input[class=ext_f]').css("background-color", "#F78A8A");
        }
    });
</script>
</html>