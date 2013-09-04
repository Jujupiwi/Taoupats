<?php
include 'contenu/param.php';
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
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
if (isset($_GET['login'])) {
    $login_user = $_GET['login'];
} else {
    $login_user = '';
}

// on cr�e la requ�te SQL
$sql = "update user set auto='O' where login = '$login_user';";
$sql2 = "select password, email from user where login = '$login_user';";

// on envoie la requête
$result = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
$requete = $mysqli->query($sql2) or die('Erreur SQL !<br>' . $sql2 . '<br>' . mysql_error());
$row = $requete->fetch_assoc();
if ($login == 'root') {
} else {
    $sujet = 'Autorisation taoupatsdedaux.fr';
    $message = 'Vous pouvez acceder aux sondages sur le site en vous connectant grace a votre login($login_user) et mot de passe($row[password]) : www.taoupatsdedaux.fr/sondage-mobile.php';
    $message .= $_POST['optionsRadios'];
    $destinataire = $row['email'];
    $headers = "Content-Type: text/html; charset=\"iso-8859-1\"";
    if (mail($destinataire, $sujet, $message, $headers)) {
    } else {
        echo "Une erreur c'est produite lors de l'envois de l'email.";
    }
}
?>
<br>
<br>
<br>
<br>

<div class="row-fluid">
    <center>
        <div class="text-success">
            <h4>
                <strong>Autorisation effectuée pour <?php echo $login_user;?></strong>
            </h4>
        </div>
    </center>
</div>
<br> <br>

</body>
</html>
