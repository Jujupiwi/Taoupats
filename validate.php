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
$sql = "INSERT INTO user (auto) VALUES ('O') where login = '$login_user';";


// on envoie la requête
$result = $mysqli->query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
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
