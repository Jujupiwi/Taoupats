<?php
include 'param.php';
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Club de Foot des Taoupats de Daux"/>
    <meta name="keywords"
          content="taoupats, Taoupats, daux, Daux, foot, Foot, Club, club"/>
    <title>Taoupats de Daux</title>
    <!-- Styles
        +++++++++++++ -->
    <link rel="stylesheet" type="text/css"
          href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css"
          href="/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css"
          href="/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
          href="/css/style.css">

    <!-- Scripts
        +++++++++++++ -->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <style>
        #stylee {
            color: red;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 120%;
        }
    </style>
</head>
<body>
<?php
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);

// on s�lectionne la base
mysql_select_db("taoupats");
// on cr�e la requ�te SQL
$sql = "INSERT INTO sondage (nom_sondage, choix, ip) VALUES ('$match','$_POST[optionsRadios]','$_SERVER[REMOTE_ADDR]');";

// on envoie la requ�te
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$sujet = 'Vote effectue par : ';
$sujet .= $_SERVER['REMOTE_ADDR'];
$message = 'Vote effectue pour : ';
$message .= $_POST['optionsRadios'];
$destinataire = 'julien_guerrin@yahoo.fr';
$headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
if (mail($destinataire, $sujet, $message, $headers)) {
} else {
    echo "Une erreur c'est produite lors de l'envois de l'email.";
}
?>
<br>
<br>
<br>
<br>

<div class="row-fluid centrage">
    <div class="text-success">
        <h4>
            <strong>Votre vote est pris en compte!</strong> Merci d'avoir vote
            pour <span id="stylee"><?php echo $_POST['optionsRadios']; ?> </span>.
            <br> <br> <strong>Vous allez etre redirige dans 3 secondes ...</strong>
        </h4>
    </div>
</div>
<br> <br>

<div id="progress4" class="centrage"></div>
<?php
header("Refresh: 3;URL=../sondage.php");
?>
</body>
</html>
