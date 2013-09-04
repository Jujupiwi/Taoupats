<?php
include 'param.php';
// on se connecte � MySQL et a la base
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// variables
$error = false;
$resultat1 = 'Erreur : Ce login existe déjà!!!';
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
// on crée la requête SQL
$sql1 = "select nom, login from user;";
// on envoie la requête
$result = $mysqli->query($sql1) or die('Erreur SQL !<br>' . $sql1 . '<br>' . mysql_error());
$error = false;
// on vérifie la présence ou non du login et du nom
while ($row = $result->fetch_assoc()) {
    if ($row['login'] == $_POST['login_new'] || $row['nom'] == $_POST['nom']
        || $row['email'] == $_POST['email']
    ) {
        $error = true;
    }
}
if ($error == true) {
    ?>
    <div class="row-fluid centrage">
        <center>
            <div class="text-success">
                <h4>
                    <strong>Erreur : Ce login existe déjà!!!</strong>
                    <br> <br> <strong>Vous allez être redirigé dans 5 secondes ...</strong>
                </h4>
            </div>
        </center>
    </div>
    <?php
    header("Refresh: 5;URL=../sondage-mobile.php");
} else {
// on cr�e la requ�te SQL
    $sql = "INSERT INTO user (nom, ip, prenom, email, login, password) VALUES ('$_POST[nom]',
'$_SERVER[REMOTE_ADDR]','$_POST[prenom]','$_POST[email]','$_POST[login_new]','$_POST[password_new]');";
// on envoie la requ�te
    $requete = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());

    if ($login == 'root') {
    } else {
        $sujet = 'Création user';
        $sujet .= $_SERVER['REMOTE_ADDR'];
        $message = 'Nom : ';
        $message .= $_POST['nom'];
        $message .= ' Prénom : ';
        $message .= $_POST['prenom'];
        $message .= ' Email : ';
        $message .= $_POST['email'];
        $message .= ' Pseudo : ';
        $message .= $_POST['login_new'];
        $message .= ' Password : ';
        $message .= $_POST['password_new'];
        $message .= '. pour valider cliquez ici : ';
        $message .= 'www.taoupatsdedaux.fr/validate.php?login=$_POST[login_new]';
        $destinataire = 'julien_guerrin@yahoo.fr';
        $headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
        if (mail($destinataire, $sujet, $message, $headers)) {
        } else {
            echo "Une erreur c'est produite lors de l'envois de l'email.";
        }
    }
    ?>
    <div class="row-fluid centrage">
        <center>
            <div class="text-success">
                <h4>
                    <strong>Bienvenue <?php echo $_POST['prenom']; ?>.</strong>
                    <br>
                    Vous allez recevoir une confirmation par mail!
                    <br> <br> <strong>Vous allez être redirigé dans 5 secondes ...</strong>
                </h4>
            </div>
        </center>
    </div>
    <?php
    header("Refresh: 5;URL=../sondage-mobile.php");
}
?>
</body>
</html>
