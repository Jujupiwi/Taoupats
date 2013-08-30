<?php
include 'param.php';
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Club de Foot des Taoupats de Daux"/>
    <meta name="keywords" content="taoupats, Taoupats, daux, Daux, foot, Foot, Club, club"/>
    <title>Taoupats de Daux</title>
    <!-- Styles
    +++++++++++++ -->
    <link rel="stylesheet" type="text/css" href="/test/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/test/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="/test/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/test/bootstrap/css/style.css">
    <link type="text/css" rel="stylesheet" href="/test/bootstrap/css/progressBar.jQuery.css"/>

    <!-- Scripts
    +++++++++++++ -->
    <script type="text/javascript" src="/test/bootstrap/js/jQuery.js"></script>
    <script type="text/javascript" src="/test/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/test/bootstrap/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="/test/bootstrap/js/progressBar.jQuery.js"></script>
    <style>
        #progress4 td.progressBar-off {
            background-color: yellow;
        }

        #progress4 td.progressBar-on {
            background-color: black;
        }

        #progress4 td.progressBar-value {
            color: yellow;
        }

        #stylee {
            color: red;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 120%;
        }
    </style>
    <script language="javascript">
        <!--
        var compteur = 0;
        function update_progressBar(valeur) {
            /* params are name:default
             orientation:'vertical', // 'vertical' ou 'horizontal' -> orientation de la progress bar
             value:0 // valeur par d�faut de la progress bar
             max:100 // valeur maximum possible
             rows:30 // nombre de lignes pour l'affichage
             */
            $('#progress4').progressBar({ value: valeur, orientation: 'horizontal'});
            if (compteur <= 100) {
                window.setTimeout("update_progressBar(" + compteur++ + ")", 20); // toute les second
            }
        }
        $(document).ready(function () {
            window.setTimeout("update_progressBar(compteur)", 20); // toute les second
        });
        //-->
    </script>
</head>
<body>
<?php
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);

// on s�lectionne la base
mysql_select_db("taoupats");
// on cr�e la requ�te SQL
$sql = "INSERT INTO sondage (nom_sondage, choix, ip) VALUES ('$noteMatch','$_POST[note]','$_SERVER[REMOTE_ADDR]');";

// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$sujet = 'Vote effectue par : ';
$sujet .= $_SERVER['REMOTE_ADDR'];
$message = 'Note attribue : ';
$message .= $_POST['note'];
$destinataire = 'julien_guerrin@yahoo.fr';
$headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
if (mail($destinataire, $sujet, $message, $headers)) {
} else {
    echo "Une erreur c'est produite lors de l'envois de l'email.";
}
?>
<br><br><br><br>

<div class="row-fluid">
    <center>
        <div class="text-success">
            <h4>
                <strong>Votre note est prise en compte!</strong>
                Votre note <span id="stylee"><?php echo $_POST['note']; ?></span>.
                <br><br>
                <strong>Vous allez etre redirige dans 3 secondes ...</strong>
            </h4>
        </div>
    </center>
</div>
<center>
    <br><br>

    <div id="progress4"></div>
</center>
<?php
header("Refresh: 3;URL=/test/sondage.php");
?>
</body>
</html>
