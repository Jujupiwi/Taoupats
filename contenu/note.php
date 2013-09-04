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
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (isset($_POST['login'])) {
    $login_user = $_POST['login'];
} else {
    $login_user = '';
}
// on cr�e la requ�te SQL
if ($login_user == '') {
    $sql = "INSERT INTO sondage (nom_sondage, choix, ip) VALUES ('$noteMatch','$_POST[note]','$_SERVER[REMOTE_ADDR]');";
} else {
    $sql = "INSERT INTO sondage (nom_sondage, choix, ip, login) VALUES ('$noteMatch','$_POST[note]','$_SERVER[REMOTE_ADDR]','$_POST[login]');";
}

$result = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
if ($login == 'root') {
} else {
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
    if ($login_user == '') {
        header("Refresh: 3;URL=../sondage.php");
    } else {
        header("Refresh: 3;URL=../sondage.php?user=$login_user");
    }
    ?>
</center>
</body>
</html>
