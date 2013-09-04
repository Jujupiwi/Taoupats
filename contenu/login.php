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
$sql = "select login, auto, prenom, password from user where login = '$_POST[user]'";

$requete = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$row = $requete->fetch_assoc();

if ($row['password'] != $_POST['password'] || $row['login'] != $_POST['user']) {
    ?>
    <div class="container">
        <div class="row-fluid">
            <div class="offset3 span6">
                <div class="text-error">
                    <h4>
                        <strong><span id="stylee">Erreur</span> : Mauvais Login ou Mot de passe!!</strong>
                        <strong>Vous allez etre redirige dans 3 secondes ...</strong>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    header("Refresh: 3;URL=../sondage-mobile.php");
} else {
    if ($login == 'root') {
    } else {
        $sujet = 'Login par : ';
        $sujet .= $row['prenom'];
        $message = 'Connexion aux sondages de ce user';
        $destinataire = 'julien_guerrin@yahoo.fr';
        $headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
        if (mail($destinataire, $sujet, $message, $headers)) {
        } else {
            echo "Une erreur c'est produite lors de l'envois de l'email.";
        }
    }
    if ($row['auto'] != 'O') {
        ?>
        <div class="container">
            <div class="row-fluid">
                <div class="offset3 span6">
                    <div class="text-success">
                        <h4>
                            <strong>Vous n'avez pas recu la confirmation par mail!! Veuillez patienter... </strong>
                            <br> <br> <strong>Vous allez etre redirige dans 5 secondes ...</strong>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
        header("Refresh: 5;URL=../sondage-mobile.php");
    } else {
        ?>
        <div class="container">
            <div class="row-fluid">
                <div class="offset3 span6">
                    <div class="text-success">
                        <h4>
                            <strong>Bienvenue </strong><span id="stylee"><?php echo $row['prenom']; ?></span>.
                            <br> <br> <strong>Vous allez etre redirige dans 3 secondes ...</strong>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
        header("Refresh: 3;URL=../sondage.php?user=$_POST[user]");
    }
}
?>
</body>
</html>
