<?php
include 'param.php';
// on se connecte � MySQL et a la base
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Club de Foot des Taoupats de Daux"/>
    <meta name="keywords" content="taoupats, Taoupats, daux, Daux, foot, Foot, Club, club"/>
    <title>Taoupats de Daux</title>
    <!-- Styles +++++++++++++ -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <!-- Scripts +++++++++++++ -->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
</head>
<body style="margin-top: 200px;">
<?php
// on cr�e la requ�te SQL
$sql = "select login, prenom, password from user where email = '$_POST[email]';";

$requete = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$row = $requete->fetch_assoc();

if ($login == 'root') {
} else {
    $sujet = 'Mot de passe oublie ? ';
    $sujet .= $row['prenom'];
    $message = 'Voici votre login : ';
    $message .= $row['login'];
    $message .= ' et votre mot de passe : ';
    $message .= $row['password'];
    $destinataire = $_POST['email'];
    $headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
    if (mail($destinataire, $sujet, $message, $headers)) {
    } else {
        echo "Une erreur c'est produite lors de l'envois de l'email.";
    }
}
header("Refresh: 3;URL=../sondage-mobile.php");
?>
<div class="container">
    <div class="row-fluid">
        <div class="offset3 span6">
            <center>
                <div class="text-success">
                    <h4>
                        <strong>Mot de passe envoyé : </strong><span id="stylee"><?php echo $row['prenom']; ?></span>.
                        <br> <br> <strong>Vous allez etre redirige dans 3 secondes ...</strong>
                    </h4>
                </div>
            </center>
        </div>
    </div>
</div>
</body>
</html>
