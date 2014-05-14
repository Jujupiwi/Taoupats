<?php
include '../param.php';
//...
// Votre code
//...
// Connexion à la base de données

$nomTournoi = $_POST['name'];
$nbJoueur = $_POST['quant'];
$mode = $_POST['mode'];

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

if ($mode == 'coupe') {
    $sql = $mysqli->query("INSERT INTO tournoi (nom_tournoi, nombre_tournoi, login, mode) VALUES ('$nomTournoi','$nbJoueur','$login', 'coupe');");
    if ($nbJoueur == 8) {
        $sql = $mysqli->query("INSERT INTO `quarts`(`nomTournoi`, `login`) VALUES ('$nomTournoi','$login')");
        header('Location: quarts.php?name=' . $nomTournoi . '&nb=' . $nbJoueur . '');
    } else {
        $sql = $mysqli->query("INSERT INTO `huitiemes`(`nomTournoi`, `login`) VALUES ('$nomTournoi','$login')");
        header('Location: huitiemes.php?name=' . $nomTournoi . '&nb=' . $nbJoueur . '');
    }
    exit();
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
            <option value="Club">Championnat</option>
            <option value="Pays">Pays</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-md-3">
    <div id="div_a_afficher<?php echo $i; ?>" style="display:none"
         onchange="affiche_div('ligue<?php echo $i; ?>','<?php echo $i; ?>','club_ligue')"
         name="div_a_afficher<?php echo $i; ?>">
        <select class="form-control" name="ligue<?php echo $i; ?>" id="ligue<?php echo $i; ?>">
            <option value="rien"></option>
            <option value="bundesliga">Allemagne</option>
            <option value="premiere_league">Angleterre</option>
            <option value="algerie">Algerie</option>
            <option value="d1_arabie">Arabie Saoudite</option>
            <option value="d1_argentine">Argentine</option>
            <option value="d1_australie">Australie</option>
            <option value="d1_autriche">Autriche</option>
            <option value="azerbaidjan">Azerbaidjan</option>
            <option value="d1_belge">Belgique</option>
            <option value="bielorussie">Bielorussie</option>
            <option value="bosnie">Bosnie</option>
            <option value="d1_bresil">Bresil</option>
            <option value="bulgarie">Bulgarie</option>
            <option value="canada">Canada</option>
            <option value="d1_chili">Chili</option>
            <option value="chypre">Chypre</option>
            <option value="d1_colombie">Colombie</option>
            <option value="coree">Coree du sud</option>
            <option value="d1_danemark">Danemark</option>
            <option value="d1_ecosse">Ecosse</option>
            <option value="egypte">Egypte</option>
            <option value="liga">Espagne</option>
            <option value="estonie">Estonie</option>
            <option value="etatsunis">Etats-unis</option>
            <option value="finlande">Finlande</option>
            <option value="ligue_1">France</option>
            <option value="d1_grece">Grece</option>
            <option value="hongrie">Hongrie</option>
            <option value="feroe">Iles Feroe</option>
            <option value="irlande">Irlande</option>
            <option value="islande">Islande</option>
            <option value="israel">Israel</option>
            <option value="serie_a">Italie</option>
            <option value="japon">Japon</option>
            <option value="lettonie">Lettonie</option>
            <option value="lituanie">Lituanie</option>
            <option value="luxembourg">Luxembourg</option>
            <option value="macedoine">Macedoine</option>
            <option value="maroc">Maroc</option>
            <option value="d1_mexique">Mexique</option>
            <option value="moldavie">Moldavie</option>
            <option value="montenegro">Montenegro</option>
            <option value="norvege">Norvege</option>
            <option value="zelande">Nouvelle-Zelande</option>
            <option value="d1_pays_bas">Pays-Bas</option>
            <option value="pays_galles">Pays de galles</option>
            <option value="pologne">Pologne</option>
            <option value="d1_portugal">Portugal</option>
            <option value="tcheque">Republique Tcheque</option>
            <option value="roumanie">Roumanie</option>
            <option value="d1_russe">Russie</option>
            <option value="saintmarin">Saint-Marin</option>
            <option value="serbie">Serbie</option>
            <option value="slovenie">Slovenie</option>
            <option value="slovaquie">Slovaquie</option>
            <option value="suede">Suede</option>
            <option value="d1_suisse">Suisse</option>
            <option value="tunisie">Tunisie</option>
            <option value="super_lig">Turquie</option>
            <option value="ukraine">Ukraine</option>
            <option value="uruguay">Uruguay</option>

        </select>
    </div>
    <div id="autre<?php echo $i; ?>" style="display:none"
         onchange="valid(<?php echo $i; ?>);">
    <select class="form-control" name="lol<?php echo $i; ?>" id="test4">
    <option value="rien"></option>
    <option value="afghanistan">Afghanistan</option>
    <option value="afriquedusud">Afriquedusud</option>
    <option value="albanie">Albanie</option>
    <option value="algerie">Algerie</option>
    <option value="allemagne">Allemagne</option>
    <option value="andorre">Andorre</option>
    <option value="angleterre">Angleterre</option>
    <option value="angola">Angola</option>
    <option value="anguilla">Anguilla</option>
    <option value="antiguaetbarbuda">Antiguaetbarbuda</option>
    <option value="arabiesaoudite">Arabiesaoudite</option>
    <option value="argentine">Argentine</option>
    <option value="armenie">Armenie</option>
    <option value="aruba">Aruba</option>
    <option value="australie">Australie</option>
    <option value="autriche">Autriche</option>
    <option value="azerbaidjan">Azerbaidjan</option>
    <option value="bahamas">Bahamas</option>
    <option value="bahrein">Bahrein</option>
    <option value="bangladesh">Bangladesh</option>
    <option value="barbade">Barbade</option>
    <option value="belarus">Belarus</option>
    <option value="belgique">Belgique</option>
    <option value="belize">Belize</option>
    <option value="benin">Benin</option>
    <option value="bermudes">Bermudes</option>
    <option value="bhoutan">Bhoutan</option>
    <option value="bih">Bih</option>
    <option value="bolivie">Bolivie</option>
    <option value="bosnieetherzegovine">Bosnieetherzegovine</option>
    <option value="botswana">Botswana</option>
    <option value="bresil">Bresil</option>
    <option value="brunei">Brunei</option>
    <option value="bulgarie">Bulgarie</option>
    <option value="burkinafaso">Burkinafaso</option>
    <option value="burundi">Burundi</option>
    <option value="cambodge">Cambodge</option>
    <option value="cameroun">Cameroun</option>
    <option value="canada">Canada</option>
    <option value="capvert">Capvert</option>
    <option value="chili">Chili</option>
    <option value="chine">Chine</option>
    <option value="chypre">Chypre</option>
    <option value="colombie">Colombie</option>
    <option value="comores">Comores</option>
    <option value="congo">Congo</option>
    <option value="coreedunord">Coreedunord</option>
    <option value="coreedusud">Coreedusud</option>
    <option value="costarica">Costarica</option>
    <option value="cotedivoire">Cotedivoire</option>
    <option value="crnagora">Crnagora</option>
    <option value="croatie">Croatie</option>
    <option value="cuba">Cuba</option>
    <option value="curacao">Curacao</option>
    <option value="danemark">Danemark</option>
    <option value="djibouti">Djibouti</option>
    <option value="dominique">Dominique</option>
    <option value="eau">Eau</option>
    <option value="ecosse">Ecosse</option>
    <option value="egypte">Egypte</option>
    <option value="equateur">Equateur</option>
    <option value="erythree">Erythree</option>
    <option value="espagne">Espagne</option>
    <option value="estonie">Estonie</option>
    <option value="etatsunis">Etatsunis</option>
    <option value="ethiopie">Ethiopie</option>
    <option value="fidji">Fidji</option>
    <option value="finlande">Finlande</option>
    <option value="france">France</option>
    <option value="fyrom">Fyrom</option>
    <option value="gabon">Gabon</option>
    <option value="gambie">Gambie</option>
    <option value="georgie">Georgie</option>
    <option value="ghana">Ghana</option>
    <option value="grece">Grece</option>
    <option value="grenade">Grenade</option>
    <option value="guam">Guam</option>
    <option value="guatemala">Guatemala</option>
    <option value="guinee">Guinee</option>
    <option value="guineeequatoriale">Guineeequatoriale</option>
    <option value="guinéebissau">Guinéebissau</option>
    <option value="haiti">Haiti</option>
    <option value="honduras">Honduras</option>
    <option value="hongkong">Hongkong</option>
    <option value="hongrie">Hongrie</option>
    <option value="ilemaurice">Ilemaurice</option>
    <option value="ilescaimans">Ilescaimans</option>
    <option value="ilescook">Ilescook</option>
    <option value="ilesferoe">Ilesferoe</option>
    <option value="ilessalomon">Ilessalomon</option>
    <option value="ilesturquesetcaiques">Ilesturquesetcaiques</option>
    <option value="ilesviergeamericaine">Ilesviergeamericaine</option>
    <option value="ilesviergebritanique">Ilesviergebritanique</option>
    <option value="inde">Inde</option>
    <option value="indonesie">Indonesie</option>
    <option value="irak">Irak</option>
    <option value="iran">Iran</option>
    <option value="irlande">Irlande</option>
    <option value="irlandedunord">Irlandedunord</option>
    <option value="islande">Islande</option>
    <option value="israel">Israel</option>
    <option value="italie">Italie</option>
    <option value="jamaique">Jamaique</option>
    <option value="japon">Japon</option>
    <option value="jordanie">Jordanie</option>
    <option value="kazakhstan">Kazakhstan</option>
    <option value="kenya">Kenya</option>
    <option value="kirghizistan">Kirghizistan</option>
    <option value="koweit">Koweit</option>
    <option value="laos">Laos</option>
    <option value="lesotho">Lesotho</option>
    <option value="lettonie">Lettonie</option>
    <option value="liban">Liban</option>
    <option value="liberia">Liberia</option>
    <option value="libye">Libye</option>
    <option value="liechtenstein">Liechtenstein</option>
    <option value="lituanie">Lituanie</option>
    <option value="luxembourg">Luxembourg</option>
    <option value="macao">Macao</option>
    <option value="macedoine">Macedoine</option>
    <option value="madagascar">Madagascar</option>
    <option value="malaisie">Malaisie</option>
    <option value="malawi">Malawi</option>
    <option value="maldives">Maldives</option>
    <option value="mali">Mali</option>
    <option value="malte">Malte</option>
    <option value="maroc">Maroc</option>
    <option value="mauritanie">Mauritanie</option>
    <option value="mexique">Mexique</option>
    <option value="moldavie">Moldavie</option>
    <option value="mongolie">Mongolie</option>
    <option value="montenegro">Montenegro</option>
    <option value="montserrat">Montserrat</option>
    <option value="mozambique">Mozambique</option>
    <option value="myanmar">Myanmar</option>
    <option value="namibie">Namibie</option>
    <option value="nepal">Nepal</option>
    <option value="nicaragua">Nicaragua</option>
    <option value="niger">Niger</option>
    <option value="nigeria">Nigeria</option>
    <option value="norvege">Norvege</option>
    <option value="nouvellecaledonie">Nouvellecaledonie</option>
    <option value="nouvellezelande">Nouvellezelande</option>
    <option value="oman">Oman</option>
    <option value="ouganda">Ouganda</option>
    <option value="ouzbekistan">Ouzbekistan</option>
    <option value="pakistan">Pakistan</option>
    <option value="palestine">Palestine</option>
    <option value="panama">Panama</option>
    <option value="papouasienouvelleguinee">Papouasienouvelleguinee</option>
    <option value="paraguay">Paraguay</option>
    <option value="paysbas">Paysbas</option>
    <option value="paysdegalles">Paysdegalles</option>
    <option value="perou">Perou</option>
    <option value="philippines">Philippines</option>
    <option value="pologne">Pologne</option>
    <option value="portugal">Portugal</option>
    <option value="puertorico">Puertorico</option>
    <option value="qatar">Qatar</option>
    <option value="rdcongo">Rdcongo</option>
    <option value="repcentrafricaine">Repcentrafricaine</option>
    <option value="repdominicaine">Repdominicaine</option>
    <option value="reptcheque">Reptcheque</option>
    <option value="reunion">Reunion</option>
    <option value="roumanie">Roumanie</option>
    <option value="russie">Russie</option>
    <option value="rwanda">Rwanda</option>
    <option value="saintelucie">Saintelucie</option>
    <option value="saintkittsetnevis">Saintkittsetnevis</option>
    <option value="saintmarin">Saintmarin</option>
    <option value="saintmartin">Saintmartin</option>
    <option value="saintvicentetlesgrenadines">Saintvicentetlesgrenadines</option>
    <option value="salvador">Salvador</option>
    <option value="samoa">Samoa</option>
    <option value="samoaamericaines">Samoaamericaines</option>
    <option value="saomeeprincipe">Saomeeprincipe</option>
    <option value="senegal">Senegal</option>
    <option value="serbie">Serbie</option>
    <option value="seychelles">Seychelles</option>
    <option value="sierraleone">Sierraleone</option>
    <option value="singapour">Singapour</option>
    <option value="slovaquie">Slovaquie</option>
    <option value="slovenie">Slovenie</option>
    <option value="somalie">Somalie</option>
    <option value="soudan">Soudan</option>
    <option value="srbija">Srbija</option>
    <option value="srilanka">Srilanka</option>
    <option value="suede">Suede</option>
    <option value="suisse">Suisse</option>
    <option value="surinam">Surinam</option>
    <option value="swaziland">Swaziland</option>
    <option value="syrie">Syrie</option>
    <option value="tadjikistan">Tadjikistan</option>
    <option value="tahiti">Tahiti</option>
    <option value="taiwan">Taiwan</option>
    <option value="tanzanie">Tanzanie</option>
    <option value="tchad">Tchad</option>
    <option value="thailande">Thailande</option>
    <option value="timororiental">Timororiental</option>
    <option value="togo">Togo</option>
    <option value="tonga">Tonga</option>
    <option value="triniteettobago">Triniteettobago</option>
    <option value="tunisie">Tunisie</option>
    <option value="turkmenistan">Turkmenistan</option>
    <option value="turquie">Turquie</option>
    <option value="ukraine">Ukraine</option>
    <option value="uruguay">Uruguay</option>
    <option value="vanuatu">Vanuatu</option>
    <option value="venezuela">Venezuela</option>
    <option value="vietnam">Vietnam</option>
    <option value="yemen">Yemen</option>
    <option value="zambie">Zambie</option>
    <option value="zanzibar">Zanzibar</option>
    <option value="zimbabwe">Zimbabwe</option>
    <option value="libre<?php echo $i; ?>">Libre</option>
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
            <option value="astonvilla">Astonvilla</option>
            <option value="barnsley">Barnsley</option>
            <option value="birminghamcity">Birminghamcity</option>
            <option value="blackburn">Blackburn</option>
            <option value="blackpool">Blackpool</option>
            <option value="bolton">Bolton</option>
            <option value="brightonhovealbion">Brightonhovealbion</option>
            <option value="bristolcity">Bristolcity</option>
            <option value="burnley">Burnley</option>
            <option value="charltonathletic">Charltonathletic</option>
            <option value="chelsea">Chelsea</option>
            <option value="cheltenham">Cheltenham</option>
            <option value="conventrycity">Conventrycity</option>
            <option value="crystalpalace">Crystalpalace</option>
            <option value="derbycounty">Derbycounty</option>
            <option value="doncasterrovers">Doncasterrovers</option>
            <option value="everton">Everton</option>
            <option value="fulham">Fulham</option>
            <option value="hartlepool">Hartlepool</option>
            <option value="huddersfield">Huddersfield</option>
            <option value="hullcity">Hullcity</option>
            <option value="ipswichtown">Ipswichtown</option>
            <option value="leedsutd">Leedsutd</option>
            <option value="leicestercity">Leicestercity</option>
            <option value="liverpool">Liverpool</option>
            <option value="city">Mancity</option>
            <option value="manu">Manutd</option>
            <option value="middlesbrough">Middlesbrough</option>
            <option value="millwall">Millwall</option>
            <option value="newcastle">Newcastle</option>
            <option value="nforest">Nforest</option>
            <option value="norwich">Norwich</option>
            <option value="peterboroughunited">Peterboroughunited</option>
            <option value="portsmouth">Portsmouth</option>
            <option value="qpr">Qpr</option>
            <option value="reading">Reading</option>
            <option value="sheffieldunited">Sheffieldunited</option>
            <option value="sheffieldwednesday">Sheffieldwednesday</option>
            <option value="southampton">Southampton</option>
            <option value="stoke">Stoke</option>
            <option value="sunderland">Sunderland</option>
            <option value="torquay">Torquay</option>
            <option value="tottenham">Tottenham</option>
            <option value="watford">Watford</option>
            <option value="wba">Wba</option>
            <option value="westham">Westham</option>
            <option value="wigan">Wigan</option>
            <option value="wolves">Wolves</option>
        </select>
    </div>
    <div id="liga<?php echo $i; ?>" name="liga<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="atletico">Atletico</option>
            <option value="barca">Barca</option>
            <option value="barcab">Barcab</option>
            <option value="betis">Betis</option>
            <option value="bilbao">Bilbao</option>
            <option value="celta vigo">Celta Vigo</option>
            <option value="espanyol">Espanyol</option>
            <option value="getafe">Getafe</option>
            <option value="gijon">Gijon</option>
            <option value="granada">Granada</option>
            <option value="lacorogne">Lacorogne</option>
            <option value="levante">Levante</option>
            <option value="malaga">Malaga</option>
            <option value="mallorca">Mallorca</option>
            <option value="osasuna">Osasuna</option>
            <option value="rayo">Rayo</option>
            <option value="real">Real</option>
            <option value="realb">Realb</option>
            <option value="santander">Santander</option>
            <option value="sevilla">Sevilla</option>
            <option value="sociedad">Sociedad</option>
            <option value="valence">Valencia</option>
            <option value="valladolid">Valladolid</option>
            <option value="villareal">Villareal</option>
            <option value="zaragoza">Zaragoza</option>
        </select>
    </div>
    <div id="d1_australie<?php echo $i; ?>" name="d1_australie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="adelaideunited">Adelaideunited</option>
            <option value="brisbaneroar">Brisbaneroar</option>
            <option value="ccmariners">Ccmariners</option>
            <option value="goldcoastunited">Goldcoastunited</option>
            <option value="melbourneheart">Melbourneheart</option>
            <option value="melbournevictory">Melbournevictory</option>
            <option value="newcastlejets">Newcastlejets</option>
            <option value="perthglory">Perthglory</option>
            <option value="sydneyfc">Sydneyfc</option>
            <option value="westernsydneywfc">Westernsydneywfc</option>
        </select>
    </div>
    <div id="d1_autriche<?php echo $i; ?>" name="d1_autriche<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="austriawien">Austriawien</option>
            <option value="fcadmira">Fcadmira</option>
            <option value="grodig">Grodig</option>
            <option value="kapfenbergersv">Kapfenbergersv</option>
            <option value="rapidwien">Rapidwien</option>
            <option value="rbsalzburg">Rbsalzburg</option>
            <option value="sturmgraz">Sturmgraz</option>
            <option value="svmattersburg">Svmattersburg</option>
            <option value="svried">Svried</option>
            <option value="wackerinnsbruck">Wackerinnsbruck</option>
            <option value="wienerneustadt">Wienerneustadt</option>
        </select>
    </div>
    <div id="ukraine<?php echo $i; ?>" name="ukraine<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="arsenalkyiv">Arsenalkyiv</option>
            <option value="chornodesa">Chornodesa</option>
            <option value="dnipro">Dnipro</option>
            <option value="dynamokyiv">Dynamokyiv</option>
            <option value="imariupol">Imariupol</option>
            <option value="karpatylviv">Karpatylviv</option>
            <option value="kryvbas">Kryvbas</option>
            <option value="metalistkharkiv">Metalistkharkiv</option>
            <option value="metalurhdonetsk">Metalurhdonetsk</option>
            <option value="obolon">Obolon</option>
            <option value="oleksandria">Oleksandria</option>
            <option value="shakhtar">Shakhtar</option>
            <option value="tavsimferopol">Tavsimferopol</option>
            <option value="volynlutsk">Volynlutsk</option>
            <option value="vpoltava">Vpoltava</option>
            <option value="zorya">Zorya</option>
        </select>
    </div>
    <div id="saintmarin<?php echo $i; ?>" name="saintmarin<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="domagnano">Domagnano</option>
            <option value="sptrefiori">Sptrefiori</option>
            <option value="sptrepenne">Sptrepenne</option>
            <option value="ssmurata">Ssmurata</option>
        </select>
    </div>
    <div id="slovaquie<?php echo $i; ?>" name="slovaquie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="mskzilina">Mskzilina</option>
            <option value="slovanbratislava">Slovanbratislava</option>
            <option value="spartaktrnava">Spartaktrnava</option>
        </select>
    </div>
    <div id="slovenie<?php echo $i; ?>" name="slovenie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="ndgorica">Ndgorica</option>
            <option value="nkmaribor">Nkmaribor</option>
        </select>
    </div>
    <div id="suede<?php echo $i; ?>" name="suede<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="aik">Aik</option>
            <option value="djurgardens">Djurgardens</option>
            <option value="elfsborg">Elfsborg</option>
            <option value="halmstads">Halmstads</option>
            <option value="hif">Hif</option>
            <option value="ifkgoteborg">Ifkgoteborg</option>
            <option value="malmoff">Malmoff</option>
        </select>
    </div>
    <div id="algerie<?php echo $i; ?>" name="algerie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="crbelouizdad">Crbelouizdad</option>
            <option value="essetif">Essetif</option>
            <option value="jskabylie">Jskabylie</option>
            <option value="mcalger">Mcalger</option>
            <option value="usmalger">Usmalger</option>
        </select>
    </div>
    <div id="bielorussie<?php echo $i; ?>" name="bielorussie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="bate">Bate</option>
            <option value="dinamominsk">Dinamominsk</option>
            <option value="shakhtyorsoligorsk">Shakhtyorsoligorsk</option>
            <option value="slaviyamozyr">Slaviyamozyr</option>
        </select>
    </div>
    <div id="bosnie<?php echo $i; ?>" name="bosnie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="boracbanjaluka">Boracbanjaluka</option>
            <option value="fkleotar">Fkleotar</option>
        </select>
    </div>
    <div id="bulgarie<?php echo $i; ?>" name="bulgarie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="cskasofiya">Cskasofiya</option>
            <option value="levskisofiya">Levskisofiya</option>
            <option value="litexlovech">Litexlovech</option>
            <option value="lokoplovdiv">Lokoplovdiv</option>
            <option value="lokosofiya">Lokosofiya</option>
            <option value="slaviasofiya">Slaviasofiya</option>
        </select>
    </div>
    <div id="canada<?php echo $i; ?>" name="canada<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="serbianwhiteeagles">Serbianwhiteeagles</option>
            <option value="torontofc">Torontofc</option>
            <option value="vanwcaps">Vanwcaps</option>
        </select>
    </div>
    <div id="chypre<?php echo $i; ?>" name="chypre<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="acomonia">Acomonia</option>
            <option value="anorthosisfamagusta">Anorthosisfamagusta</option>
            <option value="apoel">Apoel</option>
            <option value="limassol">Limassol</option>
        </select>
    </div>
    <div id="coree<?php echo $i; ?>" name="coree<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="busanipark">Busanipark</option>
            <option value="daejeoncitizen">Daejeoncitizen</option>
            <option value="fcseoul">Fcseoul</option>
            <option value="gyeongnam">Gyeongnam</option>
            <option value="incheonutd">Incheonutd</option>
            <option value="jejuutd">Jejuutd</option>
            <option value="jeonbukhm">Jeonbukhm</option>
            <option value="pohangsteelers">Pohangsteelers</option>
            <option value="seongnamicfc">Seongnamicfc</option>
            <option value="suwonbluewings">Suwonbluewings</option>
            <option value="ulsanhfc">Ulsanhfc</option>
        </select>
    </div>
    <div id="egypte<?php echo $i; ?>" name="egypte<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="alahly">Alahly</option>
            <option value="zamalek">Zamalek</option>
        </select>
    </div>
    <div id="estonie<?php echo $i; ?>" name="estonie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="fcflora">Fcflora</option>
            <option value="fclevadia">Fclevadia</option>
        </select>
    </div>
    <div id="finlande<?php echo $i; ?>" name="finlande<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="fchonka">Fchonka</option>
            <option value="hjkhelsinki">Hjkhelsinki</option>
            <option value="jjkjyvaskyla">Jjkjyvaskyla</option>
        </select>
    </div>
    <div id="hongrie<?php echo $i; ?>" name="hongrie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="bphonved">Bphonved</option>
            <option value="ferencvarosi">Ferencvarosi</option>
            <option value="videoton">Videoton</option>
        </select>
    </div>
    <div id="feroe<?php echo $i; ?>" name="feroe<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="b36torshavn">B36torshavn</option>
            <option value="hbtorshavn">Hbtorshavn</option>
            <option value="kiklaksvik">Kiklaksvik</option>
            <option value="vikingur">Vikingur</option>
        </select>
    </div>
    <div id="irlande<?php echo $i; ?>" name="irlande<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="bohemian">Bohemian</option>
            <option value="braywanderers">Braywanderers</option>
            <option value="corkcity">Corkcity</option>
            <option value="derrycity">Derrycity</option>
            <option value="droghedaunited">Droghedaunited</option>
            <option value="dundalk">Dundalk</option>
            <option value="monaghanunited">Monaghanunited</option>
            <option value="saintpatricksathletic">Saintpatricksathletic</option>
            <option value="shamrockrovers">Shamrockrovers</option>
            <option value="shelbourne">Shelbourne</option>
            <option value="sligorovers">Sligorovers</option>
            <option value="ucdublin">Ucdublin</option>
        </select>
    </div>
    <div id="islande<?php echo $i; ?>" name="islande<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="framreykjavik">Framreykjavik</option>
            <option value="iaakranes">Iaakranes</option>
            <option value="krreykjavik">Krreykjavik</option>
            <option value="valurreykjavik">Valurreykjavik</option>
        </select>
    </div>
    <div id="israel<?php echo $i; ?>" name="israel<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="hapoelks">Hapoelks</option>
            <option value="hapoelta">Hapoelta</option>
        </select>
    </div>
    <div id="japon<?php echo $i; ?>" name="japon<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="albirexniigata">Albirexniigata</option>
            <option value="cerezoosaka">Cerezoosaka</option>
            <option value="consadolesapporo">Consadolesapporo</option>
            <option value="fctokyo">Fctokyo</option>
            <option value="gambaosaka">Gambaosaka</option>
            <option value="jubiloiwata">Jubiloiwata</option>
            <option value="kashimaantlers">Kashimaantlers</option>
            <option value="kashiwareysol">Kashiwareysol</option>
            <option value="kawasakifrontale">Kawasakifrontale</option>
            <option value="nagoyagrampus">Nagoyagrampus</option>
            <option value="omiyaardija">Omiyaardija</option>
            <option value="sagantosu">Sagantosu</option>
            <option value="sanfreccehiroshima">Sanfreccehiroshima</option>
            <option value="shimizuspulse">Shimizuspulse</option>
            <option value="urawareddiamonds">Urawareddiamonds</option>
            <option value="vegaltasendai">Vegaltasendai</option>
            <option value="visselkobe">Visselkobe</option>
            <option value="yokohamafmarinos">Yokohamafmarinos</option>
        </select>
    </div>
    <div id="lettonie<?php echo $i; ?>" name="lettonie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="fcdaugava">Fcdaugava</option>
            <option value="fkventspils">Fkventspils</option>
            <option value="skontofc">Skontofc</option>
        </select>
    </div>
    <div id="lituanie<?php echo $i; ?>" name="lituanie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="fbkkaunas">Fbkkaunas</option>
            <option value="fkekranas">Fkekranas</option>
        </select>
    </div>
    <div id="luxembourg<?php echo $i; ?>" name="luxembourg<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="differdange">Differdange</option>
            <option value="dudelange">Dudelange</option>
            <option value="grevenmacher">Grevenmacher</option>
        </select>
    </div>
    <div id="macedoine<?php echo $i; ?>" name="macedoine<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="11oktomvri">11oktomvri</option>
            <option value="bregalnicastip">Bregalnicastip</option>
            <option value="horizontturnovo">Horizontturnovo</option>
            <option value="metalurgskopje">Metalurgskopje</option>
            <option value="napredokkicevo">Napredokkicevo</option>
            <option value="rabotnickiskopje">Rabotnickiskopje</option>
            <option value="tetekstetovo">Tetekstetovo</option>
            <option value="vardarskopje">Vardarskopje</option>
        </select>
    </div>
    <div id="maroc<?php echo $i; ?>" name="maroc<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="asfarrabat">Asfarrabat</option>
            <option value="kenitraac">Kenitraac</option>
            <option value="rajacasablanca">Rajacasablanca</option>
            <option value="wydadcasablanca">Wydadcasablanca</option>
        </select>
    </div>
    <div id="moldavie<?php echo $i; ?>" name="moldavie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="daciachisinau">Daciachisinau</option>
            <option value="sherifftiraspol">Sherifftiraspol</option>
        </select>
    </div>
    <div id="montenegro<?php echo $i; ?>" name="montenegro<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="buducnostpodgo">Buducnostpodgo</option>
            <option value="fkbokelj">Fkbokelj</option>
            <option value="fksutjeska">Fksutjeska</option>
            <option value="mladostpodgorica">Mladostpodgorica</option>
            <option value="mogrenbudva">Mogrenbudva</option>
            <option value="ofkgrbalj">Ofkgrbalj</option>
            <option value="ofkpetrovac">Ofkpetrovac</option>
            <option value="rudarpljevlja">Rudarpljevlja</option>
            <option value="zetagolubovci">Zetagolubovci</option>
        </select>
    </div>
    <div id="norvege<?php echo $i; ?>" name="norvege<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="molde">Molde</option>
            <option value="rosenborg">Rosenborg</option>
            <option value="skbrann">Skbrann</option>
            <option value="sogndal">Sogndal</option>
            <option value="stromsgodset">Stromsgodset</option>
            <option value="tromso">Tromso</option>
            <option value="vikingfk">Vikingfk</option>
        </select>
    </div>
    <div id="zelande<?php echo $i; ?>" name="zelande<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="wellingtonphoenix">Wellingtonphoenix</option>
        </select>
    </div>
    <div id="pologne<?php echo $i; ?>" name="pologne<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="bialystok">Bialystok</option>
            <option value="gliwice">Gliwice</option>
            <option value="lechpoznan">Lechpoznan</option>
            <option value="legiawarszawa">Legiawarszawa</option>
            <option value="lubin">Lubin</option>
            <option value="poloniawarszawa">Poloniawarszawa</option>
            <option value="slaskwroclaw">Slaskwroclaw</option>
            <option value="wislakrakow">Wislakrakow</option>
        </select>
    </div>
    <div id="tcheque<?php echo $i; ?>" name="tcheque<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="mladaboleslav">Mladaboleslav</option>
            <option value="sigmaolomouc">Sigmaolomouc</option>
            <option value="slaviapraha">Slaviapraha</option>
            <option value="spartapraha">Spartapraha</option>
            <option value="viktoriaplzen">Viktoriaplzen</option>
        </select>
    </div>
    <div id="roumanie<?php echo $i; ?>" name="roumanie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="cfrcluj">Cfrcluj</option>
            <option value="dinamobucuresti">Dinamobucuresti</option>
            <option value="rapidbucuresti">Rapidbucuresti</option>
            <option value="steauabucuresti">Steauabucuresti</option>
        </select>
    </div>
    <div id="serbie<?php echo $i; ?>" name="serbie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="aluminjumnis">Aluminjumnis</option>
            <option value="antimonzajaca">Antimonzajaca</option>
            <option value="balkanmirijevo">Balkanmirijevo</option>
            <option value="banatzrenjanin">Banatzrenjanin</option>
            <option value="bezanija">Bezanija</option>
            <option value="bigbullradnicki">Bigbullradnicki</option>
            <option value="boraccacak">Boraccacak</option>
            <option value="bskborca">Bskborca</option>
            <option value="carkonstantinnis">Carkonstantinnis</option>
            <option value="crvenazvezda">Crvenazvezda</option>
            <option value="cukaricki">Cukaricki</option>
            <option value="dinamopancevo">Dinamopancevo</option>
            <option value="dinamovranje">Dinamovranje</option>
            <option value="donjisrem">Donjisrem</option>
            <option value="fkbask">Fkbask</option>
            <option value="fkmokragora">Fkmokragora</option>
            <option value="fkobilic">Fkobilic</option>
            <option value="fkpristina">Fkpristina</option>
            <option value="fksocanica">Fksocanica</option>
            <option value="fksopot">Fksopot</option>
            <option value="fksvrljig">Fksvrljig</option>
            <option value="fktrepca">Fktrepca</option>
            <option value="fkvrsac">Fkvrsac</option>
            <option value="fkzemun">Fkzemun</option>
            <option value="fkzitoradja">Fkzitoradja</option>
            <option value="hajdukbeograd">Hajdukbeograd</option>
            <option value="hajdukkula">Hajdukkula</option>
            <option value="ibarleposavic">Ibarleposavic</option>
            <option value="indjija">Indjija</option>
            <option value="jagodina">Jagodina</option>
            <option value="javor">Javor</option>
            <option value="jedinstvosurcin">Jedinstvosurcin</option>
            <option value="kolubara">Kolubara</option>
            <option value="lokomotivabeograd">Lokomotivabeograd</option>
            <option value="macvasabac">Macvasabac</option>
            <option value="metalacgm">Metalacgm</option>
            <option value="mladiradnikpozarevac">Mladiradnikpozarevac</option>
            <option value="mladostlucani">Mladostlucani</option>
            <option value="napredakkrusevac">Napredakkrusevac</option>
            <option value="novipazar">Novipazar</option>
            <option value="ofkbeograd">Ofkbeograd</option>
            <option value="ofkmladenovac">Ofkmladenovac</option>
            <option value="ofknis">Ofknis</option>
            <option value="partizan">Partizan</option>
            <option value="proleterns">Proleterns</option>
            <option value="rad">Rad</option>
            <option value="radjevackrupanj">Radjevackrupanj</option>
            <option value="radnicki1923">Radnicki1923</option>
            <option value="radnickinis">Radnickinis</option>
            <option value="radnickiobrenovac">Radnickiobrenovac</option>
            <option value="radnickipirot">Radnickipirot</option>
            <option value="radnickirudovci">Radnickirudovci</option>
            <option value="radnickisombor">Radnickisombor</option>
            <option value="rfknovisad">Rfknovisad</option>
            <option value="rudarkm">Rudarkm</option>
            <option value="sindjelicnis">Sindjelicnis</option>
            <option value="slavijabeograd">Slavijabeograd</option>
            <option value="slobodapsu">Slobodapsu</option>
            <option value="slobodauzice">Slobodauzice</option>
            <option value="slogakraljevo">Slogakraljevo</option>
            <option value="slogaranilug">Slogaranilug</option>
            <option value="smederevo">Smederevo</option>
            <option value="sptksubotica">Sptksubotica</option>
            <option value="srem">Srem</option>
            <option value="starogracko">Starogracko</option>
            <option value="sumadijajagnjilo">Sumadijajagnjilo</option>
            <option value="takovogm">Takovogm</option>
            <option value="teleoptik">Teleoptik</option>
            <option value="vlasinavlasotince">Vlasinavlasotince</option>
            <option value="vojvodina">Vojvodina</option>
        </select>
    </div>
    <div id="tunisie<?php echo $i; ?>" name="tunisie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="clubafricain">Clubafricain</option>
            <option value="cssfaxien">Cssfaxien</option>
            <option value="esperancesportivetunis">Esperancesportivetunis</option>
            <option value="essahel">Essahel</option>
            <option value="jskairouanaise">Jskairouanaise</option>
        </select>
    </div>
    <div id="etatsunis<?php echo $i; ?>" name="etatsunis<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="cfire">Cfire</option>
            <option value="chivas">Chivas</option>
            <option value="colorapids">Colorapids</option>
            <option value="colucrew">Colucrew</option>
            <option value="dallas">Dallas</option>
            <option value="dcutd">Dcutd</option>
            <option value="hdynamo">Hdynamo</option>
            <option value="impact">Impact</option>
            <option value="lagalaxy">Lagalaxy</option>
            <option value="nerevo">Nerevo</option>
            <option value="newyorkrb">Newyorkrb</option>
            <option value="philaunion">Philaunion</option>
            <option value="ptimbers">Ptimbers</option>
            <option value="realsl">Realsl</option>
            <option value="seasounders">Seasounders</option>
            <option value="sjearthquakes">Sjearthquakes</option>
            <option value="sportingkc">Sportingkc</option>
            <option value="torontofc">Torontofc</option>
            <option value="whitecaps">Whitecaps</option>
        </select>
    </div>
    <div id="uruguay<?php echo $i; ?>" name="uruguay<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="capenarol">Capenarol</option>
            <option value="danubiofc">Danubiofc</option>
            <option value="defensorsc">Defensorsc</option>
            <option value="nacional">Nacional</option>
        </select>
    </div>
    <div id="pays_galles<?php echo $i; ?>" name="pays_galles<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test6"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="bangorcity">Bangorcity</option>
            <option value="cardiffcity">Cardiffcity</option>
            <option value="llanelli">Llanelli</option>
            <option value="swansea">Swansea</option>
        </select>
    </div>
    <div id="serie_a<?php echo $i; ?>" name="serie_a<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test5"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="acmilan">Acmilan</option>
            <option value="albinoleffe">Albinoleffe</option>
            <option value="asbari">Asbari</option>
            <option value="ascittadella">Ascittadella</option>
            <option value="ascolicalcio">Ascolicalcio</option>
            <option value="asgubbio">Asgubbio</option>
            <option value="asroma">Asroma</option>
            <option value="atalanta">Atalanta</option>
            <option value="bologna">Bologna</option>
            <option value="bresciacalcio">Bresciacalcio</option>
            <option value="cagliari">Cagliari</option>
            <option value="calciopadova">Calciopadova</option>
            <option value="catania">Catania</option>
            <option value="cesena">Cesena</option>
            <option value="chievo">Chievo</option>
            <option value="delfinopescara">Delfinopescara</option>
            <option value="empoli">Empoli</option>
            <option value="fccrotone">Fccrotone</option>
            <option value="fiorentina">Fiorentina</option>
            <option value="genoa">Genoa</option>
            <option value="giovanilenocerina">Giovanilenocerina</option>
            <option value="grosseto">Grosseto</option>
            <option value="hellasverona">Hellasverona</option>
            <option value="inter">Inter</option>
            <option value="juventus">Juventus</option>
            <option value="juvestabia">Juvestabia</option>
            <option value="lazio">Lazio</option>
            <option value="lecce">Lecce</option>
            <option value="livorno">Livorno</option>
            <option value="modena">Modena</option>
            <option value="naples">Napoli</option>
            <option value="novara">Novara</option>
            <option value="palermo">Palermo</option>
            <option value="parma">Parma</option>
            <option value="reggina">Reggina</option>
            <option value="sampdoria">Sampdoria</option>
            <option value="sassuolo">Sassuolo</option>
            <option value="siena">Siena</option>
            <option value="torinofc">Torinofc</option>
            <option value="udinese">Udinese</option>
            <option value="varese">Varese</option>
            <option value="vicenza">Vicenza</option>
        </select>
    </div>
    <div id="d1_arabie<?php echo $i; ?>" name="d1_arabie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test5"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="alahli">Alahli</option>
            <option value="alhilal">Alhilal</option>
            <option value="najran">Najran</option>
        </select>
    </div>
    <div id="azerbaidjan<?php echo $i; ?>" name="azerbaidjan<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test5"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="bakufk">Bakufk</option>
            <option value="interpik">Interpik</option>
            <option value="lankaran">Lankaran</option>
            <option value="neftci">Neftci</option>
            <option value="qarabag">Qarabag</option>
        </select>
    </div>
    <div id="bundes<?php echo $i; ?>" name="bundes<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test4"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="1fcunionberlin">1fcunionberlin</option>
            <option value="alemanniaaachen">Alemanniaaachen</option>
            <option value="augsburg">Augsburg</option>
            <option value="bayern">Bayern</option>
            <option value="dortmund">Dortmund</option>
            <option value="efrankfurt">Efrankfurt</option>
            <option value="fcenergiecottbus">Fcenergiecottbus</option>
            <option value="fcerzgebirgeaue">Fcerzgebirgeaue</option>
            <option value="fchansarostock">Fchansarostock</option>
            <option value="fortunadusseldorf">Fortunadusseldorf</option>
            <option value="francfort">Francfort</option>
            <option value="freiburg">Freiburg</option>
            <option value="greuther">Greuther</option>
            <option value="greutherfurth">Greutherfurth</option>
            <option value="hamburger">Hamburger</option>
            <option value="hannover">Hannover</option>
            <option value="hertha">Hertha</option>
            <option value="hoffenheim">Hoffenheim</option>
            <option value="ingolstadt">Ingolstadt</option>
            <option value="karlsruhersc">Karlsruhersc</option>
            <option value="klautern">Klautern</option>
            <option value="koln">Koln</option>
            <option value="leverkusen">Leverkusen</option>
            <option value="mainz">Mainz</option>
            <option value="mgladbach">Mgladbach</option>
            <option value="nurnberg">Nurnberg</option>
            <option value="sanktpauli">Sanktpauli</option>
            <option value="schalke">Schalke</option>
            <option value="sgdynamodresden">Sgdynamodresden</option>
            <option value="stuttgart">Stuttgart</option>
            <option value="tsv1860munchen">Tsv1860munchen</option>
            <option value="werder">Werder</option>
            <option value="wolfsburg">Wolfsburg</option>
        </select>
    </div>
    <div id="ligue_1<?php echo $i; ?>" name="ligue_1<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test3"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="acaa">Acaa</option>
            <option value="acajaccio">Acajaccio</option>
            <option value="aja">Aja</option>
            <option value="amiens">Amiens</option>
            <option value="angers">Angers</option>
            <option value="asm">Asm</option>
            <option value="asnl">Asnl</option>
            <option value="assaintpriest">Assaintpriest</option>
            <option value="asse">Asse</option>
            <option value="bastia">Bastia</option>
            <option value="bayonne">Bayonne</option>
            <option value="bdx">Bdx</option>
            <option value="beauvais">Beauvais</option>
            <option value="besancon">Besancon</option>
            <option value="bourgperonnas">Bourgperonnas</option>
            <option value="brest">Brest</option>
            <option value="cabastia">Cabastia</option>
            <option value="caen">Caen</option>
            <option value="cannes">Cannes</option>
            <option value="chateauroux">Chateauroux</option>
            <option value="cherbourg">Cherbourg</option>
            <option value="clermont">Clermont</option>
            <option value="colmar">Colmar</option>
            <option value="creteil">Creteil</option>
            <option value="dijon">Dijon</option>
            <option value="eag">Eag</option>
            <option value="epinal">Epinal</option>
            <option value="estac">Estac</option>
            <option value="eswasquehal">Eswasquehal</option>
            <option value="evian">Evian</option>
            <option value="fcdijonparc">Fcdijonparc</option>
            <option value="fcmulhouse">Fcmulhouse</option>
            <option value="fcn">Fcn</option>
            <option value="fcsete">Fcsete</option>
            <option value="frejusstraphael">Frejusstraphael</option>
            <option value="gf38">Gf38</option>
            <option value="gfcoajaccio">Gfcoajaccio</option>
            <option value="hac">Hac</option>
            <option value="istres">Istres</option>
            <option value="jadrancy">Jadrancy</option>
            <option value="laval">Laval</option>
            <option value="lemans">Lemans</option>
            <option value="lens">Lens</option>
            <option value="lorient">Lorient</option>
            <option value="losc">Losc</option>
            <option value="luzenac">Luzenac</option>
            <option value="martigues">Martigues</option>
            <option value="metz">Metz</option>
            <option value="mhsc">Mhsc</option>
            <option value="nimesolympique">Nimesolympique</option>
            <option value="niort">Niort</option>
            <option value="ogcn">Ogcn</option>
            <option value="ol">Ol</option>
            <option value="om">Om</option>
            <option value="orleans">Orleans</option>
            <option value="parisfc">Parisfc</option>
            <option value="poiresurvie">Poiresurvie</option>
            <option value="psg">Psg</option>
            <option value="quevilly">Quevilly</option>
            <option value="redstar">Redstar</option>
            <option value="reims">Reims</option>
            <option value="rennes">Rennes</option>
            <option value="rouen">Rouen</option>
            <option value="sedan">Sedan</option>
            <option value="sochaux">Sochaux</option>
            <option value="strasbourg">Strasbourg</option>
            <option value="toulouse">Toulouse</option>
            <option value="tours">Tours</option>
            <option value="usbco">Usbco</option>
            <option value="vafc">Vafc</option>
            <option value="vannes">Vannes</option>
        </select>
    </div>
    <div id="super_lig<?php echo $i; ?>" name="super_lig<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test2"
                onchange="valid(<?php echo $i; ?>)">
            <option value="rien"></option>
            <option value="ankaragucu">Ankaragucu</option>
            <option value="antalyaspor">Antalyaspor</option>
            <option value="besiktas">Besiktas</option>
            <option value="bucaspor">Bucaspor</option>
            <option value="bursaspor">Bursaspor</option>
            <option value="eskisehirspor">Eskisehirspor</option>
            <option value="fenerbahce">Fenerbahce</option>
            <option value="galatasaray">Galatasaray</option>
            <option value="gaziantepspor">Gaziantepspor</option>
            <option value="genclerbirligi">Genclerbirligi</option>
            <option value="istanbulbb">Istanbulbb</option>
            <option value="karabukspor">Karabukspor</option>
            <option value="kasimpasa">Kasimpasa</option>
            <option value="kayserispor">Kayserispor</option>
            <option value="konyaspor">Konyaspor</option>
            <option value="manisaspor">Manisaspor</option>
            <option value="mersin">Mersin</option>
            <option value="ordurspor">Ordurspor</option>
            <option value="samsunspor">Samsunspor</option>
            <option value="sivasspor">Sivasspor</option>
            <option value="trabzonspor">Trabzonspor</option>
        </select>
    </div>
    <div id="d1_portugal<?php echo $i; ?>" name="d1_portugal<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test1"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="academica">Academica</option>
            <option value="beiramar">Beiramar</option>
            <option value="benfica">Benfica</option>
            <option value="braga">Braga</option>
            <option value="estorilpraia">Estorilpraia</option>
            <option value="fcporto">Fcporto</option>
            <option value="feirense">Feirense</option>
            <option value="gilvicente">Gilvicente</option>
            <option value="leiria">Leiria</option>
            <option value="maritimo">Maritimo</option>
            <option value="moreirensefc">Moreirensefc</option>
            <option value="nacionalm">Nacionalm</option>
            <option value="olhanense">Olhanense</option>
            <option value="pacos">Pacos</option>
            <option value="portimonensesc">Portimonensesc</option>
            <option value="rioave">Rioave</option>
            <option value="sportingcp">Sportingcp</option>
            <option value="vitoriafc">Vitoriafc</option>
            <option value="vitoriasc">Vitoriasc</option>
        </select>
    </div>
    <div id="d1_russe<?php echo $i; ?>" name="d1_russe<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="alaniyavladikavkaz">Alaniyavladikavkaz</option>
            <option value="amkar">Amkar</option>
            <option value="anji">Anji</option>
            <option value="baltikakaliningrad">Baltikakaliningrad</option>
            <option value="cska">Cska</option>
            <option value="dinamo">Dinamo</option>
            <option value="fkshinnik">Fkshinnik</option>
            <option value="krasnodar">Krasnodar</option>
            <option value="krylya">Krylya</option>
            <option value="kuban">Kuban</option>
            <option value="lokomotiv">Lokomotiv</option>
            <option value="mordoviasaransk">Mordoviasaransk</option>
            <option value="nalchik">Nalchik</option>
            <option value="rostov">Rostov</option>
            <option value="rubin">Rubin</option>
            <option value="sibirnovosibirsk">Sibirnovosibirsk</option>
            <option value="spartak">Spartak</option>
            <option value="terek">Terek</option>
            <option value="tomtomsk">Tomtomsk</option>
            <option value="torpedomoskva">Torpedomoskva</option>
            <option value="volga">Volga</option>
            <option value="zenit">Zenit</option>
            <option value="zhemchuzhinasochi">Zhemchuzhinasochi</option>
        </select>
    </div>
    <div id="d1_argentine<?php echo $i; ?>" name="d1_argentine<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="allboys">Allboys</option>
            <option value="argentinosjuniors">Argentinosjuniors</option>
            <option value="arsenalsarandi">Arsenalsarandi</option>
            <option value="atlrafaela">Atlrafaela</option>
            <option value="banfield">Banfield</option>
            <option value="belgrano">Belgrano</option>
            <option value="boca">Boca</option>
            <option value="casla">Casla</option>
            <option value="catigre">Catigre</option>
            <option value="colon">Colon</option>
            <option value="estudianteslp">Estudianteslp</option>
            <option value="gimnasialaplata">Gimnasialaplata</option>
            <option value="godoycruz">Godoycruz</option>
            <option value="huracan">Huracan</option>
            <option value="independiente">Independiente</option>
            <option value="lanus">Lanus</option>
            <option value="newellsoldboys">Newellsoldboys</option>
            <option value="olimpo">Olimpo</option>
            <option value="quilmes">Quilmes</option>
            <option value="racingclub">Racingclub</option>
            <option value="river">River</option>
            <option value="sanmartinsj">Sanmartinsj</option>
            <option value="unionsantafe">Unionsantafe</option>
            <option value="velezsarsfield">Velezsarsfield</option>
        </select>
    </div>
    <div id="bulgarie<?php echo $i; ?>" name="bulgarie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="cskasofiya">Cskasofiya</option>
            <option value="levskisofiya">Levskisofiya</option>
            <option value="litexlovech">Litexlovech</option>
            <option value="lokoplovdiv">Lokoplovdiv</option>
            <option value="lokosofiya">Lokosofiya</option>
            <option value="slaviasofiya">Slaviasofiya</option>
        </select>
    </div>
    <div id="d1_belge<?php echo $i; ?>" name="d1_belge<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="afctubize">Afctubize</option>
            <option value="antwerp">Antwerp</option>
            <option value="aseupen">Aseupen</option>
            <option value="beerschot">Beerschot</option>
            <option value="bossudour">Bossudour</option>
            <option value="cerclebrugge">Cerclebrugge</option>
            <option value="charleroi">Charleroi</option>
            <option value="cubbrugge">Cubbrugge</option>
            <option value="eendrachtaalst">Eendrachtaalst</option>
            <option value="fcbrussels">Fcbrussels</option>
            <option value="fcdender">Fcdender</option>
            <option value="genk">Genk</option>
            <option value="gent">Gent</option>
            <option value="kortrijk">Kortrijk</option>
            <option value="kskheist">Kskheist</option>
            <option value="ksvroeselare">Ksvroeselare</option>
            <option value="kvktienen">Kvktienen</option>
            <option value="kvoostende">Kvoostende</option>
            <option value="lierse">Lierse</option>
            <option value="lokeren">Lokeren</option>
            <option value="lommelunited">Lommelunited</option>
            <option value="mechelen">Mechelen</option>
            <option value="mons">Mons</option>
            <option value="ohl">Ohl</option>
            <option value="anderlecht">Anderlecht</option>
            <option value="rscl">Rscl</option>
            <option value="sintniklaas">Sintniklaas</option>
            <option value="sinttruidense">Sinttruidense</option>
            <option value="vise">Vise</option>
            <option value="waaslandbeveren">Waaslandbeveren</option>
            <option value="westerlo">Westerlo</option>
            <option value="wetteren">Wetteren</option>
            <option value="whitestar">Whitestar</option>
            <option value="zultewaregem">Zultewaregem</option>
        </select>
    </div>
    <div id="d1_bresil<?php echo $i; ?>" name="d1_bresil<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="acgoianiense">Acgoianiense</option>
            <option value="americamineiro">Americamineiro</option>
            <option value="mineiro">Atleticomineiro</option>
            <option value="avai">Avai</option>
            <option value="bahia">Bahia</option>
            <option value="botafogo">Botafogo</option>
            <option value="ceara">Ceara</option>
            <option value="corinthians">Corinthians</option>
            <option value="coritiba">Coritiba</option>
            <option value="cruzeiro">Cruzeiro</option>
            <option value="figueirense">Figueirense</option>
            <option value="flamengo">Flamengo</option>
            <option value="fluminense">Fluminense</option>
            <option value="gremio">Gremio</option>
            <option value="internacional">Internacional</option>
            <option value="nrecife">Nrecife</option>
            <option value="palmeiras">Palmeiras</option>
            <option value="paranaense">Paranaense</option>
            <option value="pontepreta">Pontepreta</option>
            <option value="portuguesa">Portuguesa</option>
            <option value="santos">Santos</option>
            <option value="saopaulo">Saopaulo</option>
            <option value="srecife">Srecife</option>
            <option value="vasco">Vasco</option>
        </select>
    </div>
    <div id="d1_danemark<?php echo $i; ?>" name="d1_danemark<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="aalborgbk">Aalborgbk</option>
            <option value="achorsens">Achorsens</option>
            <option value="agfaarhus">Agfaarhus</option>
            <option value="brondbyif">Brondbyif</option>
            <option value="esbjerg">Esbjerg</option>
            <option value="copenhague">Kobenhavn</option>
            <option value="midtjylland">Midtjylland</option>
            <option value="nordsjaelland">Nordsjaelland</option>
            <option value="nordsjalland">Nordsjalland</option>
            <option value="odensebk">Odensebk</option>
        </select>
    </div>
    <div id="d1_grece<?php echo $i; ?>" name="d1_grece<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="olympiacos">Olympiakos</option>
            <option value="pana">Pana</option>
            <option value="paok">Paok</option>
            <option value="aek">Aek</option>
        </select>
    </div>
    <div id="d1_ecosse<?php echo $i; ?>" name="d1_ecosse<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="aberdeen">Aberdeen</option>
            <option value="celtic">Celtic</option>
            <option value="dundeefc">Dundeefc</option>
            <option value="dundeeutd">Dundeeutd</option>
            <option value="dunfermline">Dunfermline</option>
            <option value="hearts">Hearts</option>
            <option value="hibernian">Hibernian</option>
            <option value="inverness">Inverness</option>
            <option value="kilmarnock">Kilmarnock</option>
            <option value="motherwell">Motherwell</option>
            <option value="partickthistle">Partickthistle</option>
            <option value="rangers">Rangers</option>
            <option value="rosscountyfc">Rosscountyfc</option>
            <option value="stjohnstone">Stjohnstone</option>
            <option value="stmirren">Stmirren</option>
        </select>
    </div>
    <div id="d1_mexique<?php echo $i; ?>" name="d1_mexique<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="atlantefc">Atlantefc</option>
            <option value="cdguadalajara">Cdguadalajara</option>
            <option value="cfmonterrey">Cfmonterrey</option>
            <option value="cfpachuca">Cfpachuca</option>
            <option value="america">Clubamerica</option>
            <option value="clubatlas">Clubatlas</option>
            <option value="clubtijuana">Clubtijuana</option>
            <option value="cruzazul">Cruzazul</option>
            <option value="dtolucafc">Dtolucafc</option>
            <option value="estudiantestecos">Estudiantestecos</option>
            <option value="fcleon">Fcleon</option>
            <option value="jaguareschiapas">Jaguareschiapas</option>
            <option value="monarcasmorelia">Monarcasmorelia</option>
            <option value="pueblafc">Pueblafc</option>
            <option value="queretarofc">Queretarofc</option>
            <option value="sanluisfc">Sanluisfc</option>
            <option value="santoslaguna">Santoslaguna</option>
            <option value="tigresuanl">Tigresuanl</option>
            <option value="unam">Unam</option>
        </select>
    </div>
    <div id="d1_pays_bas<?php echo $i; ?>" name="d1_pays_bas<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="adodenhaag">Adodenhaag</option>
            <option value="ajax">Ajax</option>
            <option value="az">Az</option>
            <option value="degraafschap">Degraafschap</option>
            <option value="feyenoord">Feyenoord</option>
            <option value="groningen">Groningen</option>
            <option value="heerenveen">Heerenveen</option>
            <option value="heracles">Heracles</option>
            <option value="nac">Nac</option>
            <option value="nec">Nec</option>
            <option value="psv">Psv</option>
            <option value="rodajc">Rodajc</option>
            <option value="sbvexcelsior">Sbvexcelsior</option>
            <option value="twente">Twente</option>
            <option value="utrecht">Utrecht</option>
            <option value="venlo">Venlo</option>
            <option value="vitesse">Vitesse</option>
            <option value="waalwijk">Waalwijk</option>
        </select>
    </div>
    <div id="d1_suisse<?php echo $i; ?>" name="d1_suisse<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="bale">Fcbasel</option>
            <option value="fcluzern">Fcluzern</option>
            <option value="fcsion">Fcsion</option>
            <option value="fczurich">Fczurich</option>
            <option value="grasshopper">Grasshopper</option>
            <option value="lausanne">Lausanne</option>
            <option value="nxamax">Nxamax</option>
            <option value="servette">Servette</option>
            <option value="thun">Thun</option>
            <option value="youngboys">Youngboys</option>
        </select>
    </div>
    <div id="d1_chili<?php echo $i; ?>" name="d1_chili<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="colocolo">Colocolo</option>
            <option value="unionespanola">Unionespanola</option>
            <option value="univcatolica">Univcatolica</option>
            <option value="univdechile">Univdechile</option>
        </select>
    </div>
    <div id="d1_colombie<?php echo $i; ?>" name="d1_colombie<?php echo $i; ?>" style="display:none">
        <select class="form-control" name="lol<?php echo $i; ?>" id="test14"
                onchange="valid(<?php echo $i; ?>);">
            <option value="rien"></option>
            <option value="atleticonacional">Atleticonacional</option>
            <option value="cdamerica">Cdamerica</option>
            <option value="independientemed">Independientemed</option>
            <option value="millonariosfc">Millonariosfc</option>
            <option value="oncecaldas">Oncecaldas</option>
            <option value="santafe">Santafe</option>
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
        if (valeur_choisie == 'd1_australie') { //par exemple
            document.getElementById('d1_australie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('d1_australie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'd1_autriche') { //par exemple
            document.getElementById('d1_autriche' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('d1_autriche' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'd1_arabie') { //par exemple
            document.getElementById('d1_arabie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('d1_arabie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'azerbaidjan') { //par exemple
            document.getElementById('azerbaidjan' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('azerbaidjan' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'd1_chili') { //par exemple
            document.getElementById('d1_chili' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('d1_chili' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'd1_colombie') { //par exemple
            document.getElementById('d1_colombie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('d1_colombie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
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
        if (valeur_choisie == 'bulgarie') { //par exemple
            document.getElementById('bulgarie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('bulgarie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'algerie') { //par exemple
            document.getElementById('algerie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('algerie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'bielorussie') { //par exemple
            document.getElementById('bielorussie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('bielorussie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'bosnie') { //par exemple
            document.getElementById('bosnie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('bosnie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'bulgarie') { //par exemple
            document.getElementById('bulgarie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('bulgarie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'canada') { //par exemple
            document.getElementById('canada' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('canada' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'chypre') { //par exemple
            document.getElementById('chypre' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('chypre' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'coree') { //par exemple
            document.getElementById('coree' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('coree' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'egypte') { //par exemple
            document.getElementById('egypte' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('egypte' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'estonie') { //par exemple
            document.getElementById('estonie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('estonie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'etatsunis') { //par exemple
            document.getElementById('etatsunis' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('etatsunis' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'finlande') { //par exemple
            document.getElementById('finlande' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('finlande' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'hongrie') { //par exemple
            document.getElementById('hongrie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('hongrie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'feroe') { //par exemple
            document.getElementById('feroe' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('feroe' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'irlande') { //par exemple
            document.getElementById('irlande' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('irlande' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'islande') { //par exemple
            document.getElementById('islande' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('islande' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'israel') { //par exemple
            document.getElementById('israel' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('israel' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'japon') { //par exemple
            document.getElementById('japon' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('japon' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'lettonie') { //par exemple
            document.getElementById('lettonie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('lettonie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'lituanie') { //par exemple
            document.getElementById('lituanie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('lituanie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'luxembourg') { //par exemple
            document.getElementById('luxembourg' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('luxembourg' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'macedoine') { //par exemple
            document.getElementById('macedoine' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('macedoine' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'maroc') { //par exemple
            document.getElementById('maroc' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('maroc' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'moldavie') { //par exemple
            document.getElementById('moldavie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('moldavie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'montenegro') { //par exemple
            document.getElementById('montenegro' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('montenegro' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'norvege') { //par exemple
            document.getElementById('norvege' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('norvege' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'zelande') { //par exemple
            document.getElementById('zelande' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('zelande' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'pays_galles') { //par exemple
            document.getElementById('pays_galles' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('pays_galles' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'pologne') { //par exemple
            document.getElementById('pologne' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('pologne' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'tcheque') { //par exemple
            document.getElementById('tcheque' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('tcheque' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'roumanie') { //par exemple
            document.getElementById('roumanie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('roumanie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'saintmarin') { //par exemple
            document.getElementById('saintmarin' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('saintmarin' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'serbie') { //par exemple
            document.getElementById('serbie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('serbie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'slovenie') { //par exemple
            document.getElementById('slovenie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('slovenie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'slovaquie') { //par exemple
            document.getElementById('slovaquie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('slovaquie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'suede') { //par exemple
            document.getElementById('suede' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('suede' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'tunisie') { //par exemple
            document.getElementById('tunisie' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('tunisie' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'uruguay') { //par exemple
            document.getElementById('uruguay' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('uruguay' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
        }
        if (valeur_choisie == 'ukraine') { //par exemple
            document.getElementById('ukraine' + id_a_afficher).style.display = 'block'; //on affiche le div
        } else {
            document.getElementById('ukraine' + id_a_afficher).style.display = 'none'; //on cache div (car l'utilisateur peut revenir sur son choix)
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
        document.getElementById('d1_chili' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_arabie' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_colombie' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_belge' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_bresil' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_autriche' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_australie' + id_a_afficher).style.display = 'none';
        document.getElementById('azerbaidjan' + id_a_afficher).style.display = 'none';
        document.getElementById('bulgarie' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_danemark' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_grece' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_ecosse' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_mexique' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_pays_bas' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_suisse' + id_a_afficher).style.display = 'none';
        document.getElementById('ukraine' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_argentine' + id_a_afficher).style.display = 'none';
        document.getElementById('d1_russe' + id_a_afficher).style.display = 'none';
        document.getElementById('super_lig' + id_a_afficher).style.display = 'none';
        document.getElementById('ligue_1' + id_a_afficher).style.display = 'none';
        document.getElementById('bundes' + id_a_afficher).style.display = 'none';
        document.getElementById('serie_a' + id_a_afficher).style.display = 'none';
        document.getElementById('liga' + id_a_afficher).style.display = 'none';
        document.getElementById('premier_league' + id_a_afficher).style.display = 'none';
        document.getElementById('algerie' + id_a_afficher).style.display = 'none';
        document.getElementById('bielorussie' + id_a_afficher).style.display = 'none';
        document.getElementById('bosnie' + id_a_afficher).style.display = 'none';
        document.getElementById('bulgarie' + id_a_afficher).style.display = 'none';
        document.getElementById('canada' + id_a_afficher).style.display = 'none';
        document.getElementById('chypre' + id_a_afficher).style.display = 'none';
        document.getElementById('coree' + id_a_afficher).style.display = 'none';
        document.getElementById('egypte' + id_a_afficher).style.display = 'none';
        document.getElementById('estonie' + id_a_afficher).style.display = 'none';
        document.getElementById('etatsunis' + id_a_afficher).style.display = 'none';
        document.getElementById('finlande' + id_a_afficher).style.display = 'none';
        document.getElementById('hongrie' + id_a_afficher).style.display = 'none';
        document.getElementById('feroe' + id_a_afficher).style.display = 'none';
        document.getElementById('irlande' + id_a_afficher).style.display = 'none';
        document.getElementById('islande' + id_a_afficher).style.display = 'none';
        document.getElementById('israel' + id_a_afficher).style.display = 'none';
        document.getElementById('japon' + id_a_afficher).style.display = 'none';
        document.getElementById('lettonie' + id_a_afficher).style.display = 'none';
        document.getElementById('lituanie' + id_a_afficher).style.display = 'none';
        document.getElementById('luxembourg' + id_a_afficher).style.display = 'none';
        document.getElementById('macedoine' + id_a_afficher).style.display = 'none';
        document.getElementById('maroc' + id_a_afficher).style.display = 'none';
        document.getElementById('moldavie' + id_a_afficher).style.display = 'none';
        document.getElementById('montenegro' + id_a_afficher).style.display = 'none';
        document.getElementById('norvege' + id_a_afficher).style.display = 'none';
        document.getElementById('zelande' + id_a_afficher).style.display = 'none';
        document.getElementById('pays_galles' + id_a_afficher).style.display = 'none';
        document.getElementById('pologne' + id_a_afficher).style.display = 'none';
        document.getElementById('tcheque' + id_a_afficher).style.display = 'none';
        document.getElementById('roumanie' + id_a_afficher).style.display = 'none';
        document.getElementById('saintmarin' + id_a_afficher).style.display = 'none';
        document.getElementById('serbie' + id_a_afficher).style.display = 'none';
        document.getElementById('slovenie' + id_a_afficher).style.display = 'none';
        document.getElementById('slovaquie' + id_a_afficher).style.display = 'none';
        document.getElementById('suede' + id_a_afficher).style.display = 'none';
        document.getElementById('tunisie' + id_a_afficher).style.display = 'none';
        document.getElementById('uruguay' + id_a_afficher).style.display = 'none';


    }
}

</script>

</body>
</html>