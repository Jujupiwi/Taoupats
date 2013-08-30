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
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- Scripts
    +++++++++++++ -->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <style>

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
    <?php
    header("Refresh: 3;URL=../sondage.php");
    ?>
</center>
</body>
</html>
