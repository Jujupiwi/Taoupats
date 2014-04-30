<?php
include '../param.php';
//...
// Votre code
//...
// Connexion à la base de données

$nomTournoi = $_POST['name'];
$nbJoueur = $_POST['quant'];

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

$res = $mysqli->query("select count(nom_tournoi) from tournoi where nom_tournoi = '$nomTournoi' and login = '$login';");
$row = $res->fetch_array();
if ($row[0] != 0) {
    header('Location: creation.php?enreg=I');
}

?>
<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
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
    <link rel="stylesheet" href="../assets/css/themes/red.css" id="style_color">
    <link rel="stylesheet" href="../assets/css/themes/headers/header1-red.css" id="style_color-header-1">
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Choix des equipes</h1>
        <ul class="pull-right breadcrumb">
            <li class="active">Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !</li>
            <li><a class="btn-u btn-u-red" href="../deconnexion.php">Deconnexion</a></li>
        </ul>
    </div>
    <!--/container-->
</div>
<!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container" style="margin-bottom: 180px;">
<div class="row">
<div class="col-md-12 col-sm-12">
<form id="valide" class="reg-page" method="post" style="text-align: center" action="base.php">
<div class="reg-header">
    <h1>Choix des equipes</h1>

    <h3>Tournoi : <?php echo $nomTournoi; ?></h3>
    <h4>Nombre de joueurs : <?php echo $nbJoueur; ?></h4>
</div>
<div class="row">
<div class="col-md-12">
<?php for ($i = 1; $i <= $nbJoueur; $i++) { ?>
    <div class="row">
    <div class="col-md-3">
        <input class="form-control" type="text" name="joueur<?php echo $i; ?>"
               placeholder="Joueur <?php echo $i; ?>"/>
    </div>
    <div class="col-md-3">
        <select class="form-control" name="countrySelect<?php echo $i; ?>"
                id="countrySelect<?php echo $i; ?>"
                onchange="affiche_div('countrySelect<?php echo $i; ?>','<?php echo $i; ?>','autre<?php echo $i; ?>')">
            <option value="rien" selected="selected"></option>
            <option value="Club">Club</option>
            <option value="Pays">Pays</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-md-3">
        <div id="div_a_afficher<?php echo $i; ?>" style="display:none"
             onchange="affiche_div('ligue<?php echo $i; ?>','<?php echo $i; ?>','club_ligue')"
             name="div_a_afficher<?php echo $i; ?>">
            <select class="form-control" name="ligue<?php echo $i; ?>" id="ligue<?php echo $i; ?>">
                <option value="rien"></option>
                <option value="premiere_league">Premier League (Angleterre)</option>
                <option value="liga">Liga (Espagne)</option>
                <option value="serie_a">Serie A (Italie)</option>
                <option value="bundesliga">Bundesliga (Allemagne)</option>
                <option value="ligue_1">Ligue 1 (France)</option>
                <option value="super_lig">Super Lig (Turquie)</option>
                <option value="d1_argentine">D1 Argentine</option>
                <option value="d1_belge">D1 Belgique</option>
                <option value="d1_bresil">Serie A (Bresil)</option>
                <option value="d1_danemark">Superliga (Danemark)</option>
                <option value="d1_grece">Super League (Grece)</option>
                <option value="d1_ecosse">League (Ecosse)</option>
                <option value="d1_mexique">Primera Division (Mexique)</option>
                <option value="d1_pays_bas">Eredivisie (Pays-Bas)</option>
                <option value="d1_portugal">SuperLiga (Portugal)</option>
                <option value="d1_russe">Premier League (Russie)</option>
                <option value="d1_suisse">Super League (Suisse)</option>
                <option value="d1_ukraine">D1 Ukraine</option>
            </select>
        </div>
        <div id="autre<?php echo $i; ?>" style="display:none"
             onchange="affiche_div('country<?php echo $i; ?>','<?php echo $i; ?>','country_ligue')">
            <select class="form-control" name="country<?php echo $i; ?>" id="country<?php echo $i; ?>">
                <option value="rien"></option>
                <option value="europe">Europe</option>
                <option value="am_nord">Amerique du Nord</option>
                <option value="am_sud">Amerique du Sud</option>
                <option value="asie">Asie</option>
                <option value="afrique">Afrique</option>
                <option value="oceanie">Oceanie</option>
            </select>
        </div>
    </div>
    <div class="col-md-3">
    <div id="premier_league<?php echo $i; ?>" name="premier_league<?php echo $i; ?>"
         style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test13"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="arsenal">Arsenal</option>
            <option value="villa">Aston Villa</option>
            <option value="cardiff">Cardiff City</option>
            <option value="crystal">Crystal Palace</option>
            <option value="chelsea">Chelsea</option>
            <option value="fulham">Fulham</option>
            <option value="everton">Everton</option>
            <option value="hull">Hull City</option>
            <option value="liverpool">Liverpool</option>
            <option value="newcastle">Newcastle</option>
            <option value="city">Manchester City</option>
            <option value="manu">Manchester United</option>
            <option value="norwich">Norwich</option>
            <option value="southampton">Southampton</option>
            <option value="stoke">Stoke City</option>
            <option value="sunderland">Sunderland</option>
            <option value="swansea">Swansea</option>
            <option value="tottenham">Tottenham</option>
            <option value="west bromwich">West Bromwich</option>
            <option value="west ham">West Ham</option>
        </select>
    </div>
    <div id="europe<?php echo $i; ?>" name="europe<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test12"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="allemagne">Allemagne</option>
            <option value="angleterre">Angleterre</option>
            <option value="belgique">Belgique</option>
            <option value="espagne">Espagne</option>
            <option value="france">France</option>
            <option value="italie">Italie</option>
            <option value="pays-bas">Pays-Bas</option>
            <option value="portugal">Portugal</option>
            <option value="russie">Russie</option>
            <option value="suede">Suede</option>
        </select>
    </div>
    <div id="am_sud<?php echo $i; ?>" name="am_sud<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test11"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="argentine">Argentine</option>
            <option value="bresil">Bresil</option>
            <option value="mexique">Mexique</option>
            <option value="uruguay">Uruguay</option>
        </select>
    </div>
    <div id="am_nord<?php echo $i; ?>" name="am_nord<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test10"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="etats-unis">Etats-Unis</option>
        </select>
    </div>
    <div id="asie<?php echo $i; ?>" name="asie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test9"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="chine">Chine</option>
            <option value="japon">Japon</option>
            <option value="turquie">Turquie</option>
        </select>
    </div>
    <div id="afrique<?php echo $i; ?>" name="afrique<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test8"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="algerie">Algerie</option>
            <option value="afriquedusud">Afrique du Sud</option>
            <option value="cameroun">Cameroun</option>
            <option value="coteivoire">Cote d'Ivoire</option>
            <option value="egypte">Egypte</option>
            <option value="ghana">Ghana</option>
            <option value="mali">Mali</option>
            <option value="maroc">Maroc</option>
            <option value="senegal">Senegal</option>
            <option value="tunisie">Tunisie</option>
        </select>
    </div>
    <div id="oceanie<?php echo $i; ?>" name="oceanie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test7"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="nouvellezelande">Nouvelle Zelande</option>
            <option value="australie">Australie</option>
        </select>
    </div>
    <div id="liga<?php echo $i; ?>" name="liga<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="almeria">Almeria</option>
            <option value="atletico">Atletico Madrid</option>
            <option value="barca">Barcelone FC</option>
            <option value="betis seville">Betis Seville</option>
            <option value="bilbao">Bilbao</option>
            <option value="celta vigo">Celta Vigo</option>
            <option value="elche">Elche</option>
            <option value="espanyol barcelone">Espanyol Barcelone</option>
            <option value="getafe">Getafe</option>
            <option value="grenada">Grenada</option>
            <option value="levante">Levante</option>
            <option value="malaga">Malaga</option>
            <option value="osasuna">Osasuna</option>
            <option value="rayo vallecano">Rayo Vallecano</option>
            <option value="real">Real Madrid</option>
            <option value="sociedad">Real Sociedad</option>
            <option value="seville">Seville FC</option>
            <option value="valladolid">Valladolid</option>
            <option value="valence">Valence</option>
            <option value="villarreal">Villarreal</option>
        </select>
    </div>
    <div id="serie_a<?php echo $i; ?>" name="serie_a<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test5"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="rome">AS Roma</option>
            <option value="juventus">Juventus</option>
            <option value="fiorentina">Fiorentina</option>
            <option value="milan">Milan AC</option>
            <option value="inter">Inter Milan</option>
            <option value="naples">Naples</option>
            <option value="lazio">Lazio Rome</option>
            <option value="udinese">Udinese</option>
            <option value="atalanta">Atalanta</option>
            <option value="bologne">Bologne</option>
            <option value="cagliari">Cagliari</option>
            <option value="catane">Catane</option>
            <option value="chievo verone">Chievo Verone</option>
            <option value="genoa">Genoa</option>
            <option value="hellas verone">Hellas Verone</option>
            <option value="livourne">Livourne</option>
            <option value="parme">Parme</option>
            <option value="sampdoria">Sampdoria</option>
            <option value="sassuolo">Sassuolo</option>
            <option value="torino">Torino</option>
        </select>
    </div>
    <div id="bundes<?php echo $i; ?>" name="bundes<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test4"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="augsbourg">Augsbourg</option>
            <option value="bayern">Bayern Munich</option>
            <option value="dortmund">Borussia Dortmund</option>
            <option value="eintracht brunswick">Eintracht Brunswick</option>
            <option value="eintracht francfort">Eintracht Francfort</option>
            <option value="fribourg">Fribourg</option>
            <option value="gladbach">M'Gladbach</option>
            <option value="hanovre 96">Hanovre 96</option>
            <option value="herta berlin">Herta Berlin</option>
            <option value="hoffenheim">Hoffenheim</option>
            <option value="mayence 05">Mayence 05</option>
            <option value="nuremberg">Nuremberg</option>
            <option value="leverkusen">Bayer Leverkusen</option>
            <option value="hambourg">Hambourg</option>
            <option value="shalke">Shalke 04</option>
            <option value="stuttgart">Stuttgart</option>
            <option value="werder">Werder Breme</option>
            <option value="wolfsburg">Wolfsburg</option>
        </select>
    </div>
    <div id="ligue_1<?php echo $i; ?>" name="ligue_1<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test3"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="ajaccio">Ajaccio</option>
            <option value="bastia">Bastia</option>
            <option value="bordeaux">Bordeaux</option>
            <option value="evian">Evian</option>
            <option value="guingamp">Guingamp</option>
            <option value="lorient">Lorient</option>
            <option value="montpellier">Montpellier</option>
            <option value="nantes">Nantes</option>
            <option value="nice">Nice</option>
            <option value="reims">Reims</option>
            <option value="rennes">rennes</option>
            <option value="saint etienne">Saint Etienne</option>
            <option value="sochaux">Sochaux</option>
            <option value="toulouse">Toulouse</option>
            <option value="valenciennes">Valenciennes</option>
            <option value="om">OM</option>
            <option value="ol">OL</option>
            <option value="monaco">Monaco</option>
            <option value="lille">Lille</option>
            <option value="psg">PSG</option>
        </select>
    </div>
    <div id="super_lig<?php echo $i; ?>" name="super_lig<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test2"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="fenerbahce">Fenerbahce</option>
            <option value="galatasaray">Galatasaray</option>
        </select>
    </div>
    <div id="d1_portugal<?php echo $i; ?>" name="d1_portugal<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test1"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="benfica">Benfica Lisbonne</option>
            <option value="braga">Braga</option>
            <option value="porto">FC Porto</option>
            <option value="sporting">Sporting Portugal</option>
        </select>
    </div>
    <div id="d1_russe<?php echo $i; ?>" name="d1_russe<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="cska">CSKA Moscou</option>
        </select>
    </div>
    <div id="d1_argentine<?php echo $i; ?>" name="d1_argentine<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="boca">Boca Junior</option>
        </select>
    </div>
    <div id="d1_belge<?php echo $i; ?>" name="d1_belge<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="anderlecht">Anderlecht</option>
        </select>
    </div>
    <div id="d1_bresil<?php echo $i; ?>" name="d1_bresil<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="mineiro">Atletico Mineiro</option>
        </select>
    </div>
    <div id="d1_danemark<?php echo $i; ?>" name="d1_danemark<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="copenhague">Copenhague</option>
        </select>
    </div>
    <div id="d1_grece<?php echo $i; ?>" name="d1_grece<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="olympiakos">Olympiakos</option>
        </select>
    </div>
    <div id="d1_ecosse<?php echo $i; ?>" name="d1_ecosse<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="celtic">Celtic Glasgow</option>
        </select>
    </div>
    <div id="d1_mexique<?php echo $i; ?>" name="d1_mexique<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="america">CA America</option>
        </select>
    </div>
    <div id="d1_pays_bas<?php echo $i; ?>" name="d1_pays_bas<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="ajax">Ajax Amsterdam</option>
        </select>
    </div>
    <div id="d1_suisse<?php echo $i; ?>" name="d1_suisse<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="bale">Bale</option>
        </select>
    </div>
    <div id="d1_ukraine<?php echo $i; ?>" name="d1_ukraine<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="shakhtar">Shakhtar Donietsk</option>
        </select>
    </div>
    <div id="image<?php echo $i; ?>">
    </div>
    </div>
    <input type="hidden" name="equipe<?php echo $i; ?>" id="equipe<?php echo $i; ?>">
    </div>
    ------------------------------------------<br><br>
<?php } ?>
</div>
</div>
<h4>Aller - Retour</h4>
<div class="row">
    <div class="col-lg-offset-4 col-lg-4">
        <div class="col-lg-6">
            <div class="input-group">
                <input type="text" class="form-control" value="Oui" disabled>
                <span class="input-group-addon">
                <input type="radio" name="ar" id="oui" value="oui" checked>
              </span>
            </div>
            <!-- /input-group -->
        </div>
        <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                <input type="radio" name="ar" id="non" value="non">
              </span>
                <input type="text" class="form-control" value="Non" disabled>
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->

<br><br><br>
<input type="hidden" value="<?php echo $nbJoueur; ?>" name="Nb">
<input type="hidden" value="<?php echo $nomTournoi; ?>" name="Name">
<input type="submit" class="btn-u btn-u-blue" value="Continuer"/>
</form>
</div>
</div>
<!--/row-->
</div>
<!--/container-->
<!--=== End Content Part ===-->

<!--=== Footer ===-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 md-margin-bottom-40">
                <!-- About -->
                <div class="headline"><h2>A Propos</h2></div>
                <p class="margin-bottom-25 md-margin-bottom-40">Outil de gestion de competition FIFA.</p>
                <p class="margin-bottom-10">Creation de championnats ou de tournois de 4 a 20 joueurs!!</p>


            </div>
            <!--/col-md-4-->

            <div class="col-md-4">
                <!-- Stay Connected -->
                <div class="headline"><h2>Reseaux sociaux</h2></div>
                <ul class="social-icons">
                    <li><a href="#" data-original-title="Feed" class="social_rss"></a></li>
                    <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="Pinterest" class="social_pintrest"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="Vimeo" class="social_vimeo"></a></li>
                </ul>
            </div>
            <!--/col-md-4-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</div>
<!--/footer-->
<!--=== End Footer ===-->

<!--=== Copyright ===-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-space">
                    2014 @Jujupiwi.
                </p>
            </div>
            <div class="col-md-6">

            </div>
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</div>
<!--/copyright-->
<!--=== End Copyright ===-->

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
    function valid(val) {
        valeur_choisie = $("select[name=lol" + val + "]").filter(':visible').val();
        $('#equipe' + val).val(valeur_choisie);
        var valeur = $('#equipe' + val).val();
        $('#image' + val).html("<img src='images/" + valeur + ".png' width='30px' height='30px'>");
    }
    function affiche_div(id_a_lire, id_a_afficher, autre_id) {
        //on lit le select
        var valeur_choisie = document.getElementById(id_a_lire).value;
        //puis on teste(atention ce qui est renvoy? ici c'est $data['code']
        if (autre_id == "club_ligue") {
            if (valeur_choisie == 'premiere_league') { //par exemple
                document.getElementById('premier_league' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('premier_league' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'liga') { //par exemple
                document.getElementById('liga' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('liga' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'serie_a') { //par exemple
                document.getElementById('serie_a' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('serie_a' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'bundesliga') { //par exemple
                document.getElementById('bundes' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('bundes' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'ligue_1') { //par exemple
                document.getElementById('ligue_1' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('ligue_1' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'super_lig') { //par exemple
                document.getElementById('super_lig' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('super_lig' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_portugal') { //par exemple
                document.getElementById('d1_portugal' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_portugal' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_russe') { //par exemple
                document.getElementById('d1_russe' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_russe' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_argentine') { //par exemple
                document.getElementById('d1_argentine' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_argentine' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_belge') { //par exemple
                document.getElementById('d1_belge' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_belge' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_bresil') { //par exemple
                document.getElementById('d1_bresil' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_bresil' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_danemark') { //par exemple
                document.getElementById('d1_danemark' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_danemark' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_grece') { //par exemple
                document.getElementById('d1_grece' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_grece' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_ecosse') { //par exemple
                document.getElementById('d1_ecosse' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_ecosse' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_mexique') { //par exemple
                document.getElementById('d1_mexique' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_mexique' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_pays_bas') { //par exemple
                document.getElementById('d1_pays_bas' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_pays_bas' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_suisse') { //par exemple
                document.getElementById('d1_suisse' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_suisse' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'd1_ukraine') { //par exemple
                document.getElementById('d1_ukraine' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('d1_ukraine' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
        } else if (autre_id == "country_ligue") {
            if (valeur_choisie == 'europe') { //par exemple
                document.getElementById('europe' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('europe' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'am_sud') { //par exemple
                document.getElementById('am_sud' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('am_sud' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'am_nord') { //par exemple
                document.getElementById('am_nord' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('am_nord' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'asie') { //par exemple
                document.getElementById('asie' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('asie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'afrique') { //par exemple
                document.getElementById('afrique' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('afrique' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'oceanie') { //par exemple
                document.getElementById('oceanie' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('oceanie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
        } else {
            if (valeur_choisie == 'Pays') { //par exemple
                document.getElementById(autre_id).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById(autre_id).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            if (valeur_choisie == 'Club') { //par exemple
                document.getElementById('div_a_afficher' + id_a_afficher).style.display = 'block'; //on affiche le div
            } else {
                document.getElementById('div_a_afficher' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
            }
            document.getElementById('d1_portugal' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_belge' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_bresil' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_danemark' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_grece' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_ecosse' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_mexique' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_pays_bas' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_suisse' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_ukraine' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_argentine' + id_a_afficher).style.display = 'none';
            document.getElementById('d1_russe' + id_a_afficher).style.display = 'none';
            document.getElementById('super_lig' + id_a_afficher).style.display = 'none';
            document.getElementById('ligue_1' + id_a_afficher).style.display = 'none';
            document.getElementById('bundes' + id_a_afficher).style.display = 'none';
            document.getElementById('serie_a' + id_a_afficher).style.display = 'none';
            document.getElementById('liga' + id_a_afficher).style.display = 'none';
            document.getElementById('premier_league' + id_a_afficher).style.display = 'none';
            document.getElementById('europe' + id_a_afficher).style.display = 'none';
            document.getElementById('am_sud' + id_a_afficher).style.display = 'none';
            document.getElementById('am_nord' + id_a_afficher).style.display = 'none';
            document.getElementById('afrique' + id_a_afficher).style.display = 'none';
            document.getElementById('asie' + id_a_afficher).style.display = 'none';
            document.getElementById('oceanie' + id_a_afficher).style.display = 'none';

        }
    }

</script>

</body>
</html>