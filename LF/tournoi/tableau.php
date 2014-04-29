<?php
include '../param.php';
//...
// Votre code
//...
// Connexion à la base de données
$name = $_GET['name'];

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

$sqlcount = $mysqli->query("select nombre_tournoi from tournoi where nom_tournoi = '$name' and login = '$login';");
$row = $sqlcount->fetch_array();
$nb = $row[0];
$sql = $mysqli->query("select * from matchs where nb_equipe = '$nb';");
$result = $sql->fetch_array();

$sql = $mysqli->query("select type_match from tournoi where nom_tournoi = '$name' and login = '$login';");
$requete = $sql->fetch_array();
$type = $requete[0];

$sqlcount = $mysqli->query("select count(id_match) from matchs where nb_equipe = '$nb';");
$requete = $sqlcount->fetch_array();
$nb_match = $requete[0];

if ($type == "non") {
    $nb_match = $nb_match / 2;
}
$nbAffiche = ($nb_match / 2) + 1;

function ecrireEquipes($result_dom)
{
    if ($result_dom == "france") {
        echo "<img src='images/france.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Espagne" || $result_dom == "espagne" || $result_dom == "ESPAGNE") {
        echo "<img src='images/espagne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Portugal" || $result_dom == "portugal" || $result_dom == "PORTUGAL") {
        echo "<img src='images/portugal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Russie" || $result_dom == "russie" || $result_dom == "RUSSIE") {
        echo "<img src='images/russie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Angleterre" || $result_dom == "angleterre" || $result_dom == "ANGLETERRE") {
        echo "<img src='images/angleterre.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Suede" || $result_dom == "suede" || $result_dom == "SUEDE") {
        echo "<img src='images/suede.png' width='30px' height='30px'>";
    }
    if ($result_dom == "belgique" || $result_dom == "Belgique" || $result_dom == "BELGIQUE") {
        echo "<img src='images/belgique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "allemagne" || $result_dom == "Allemagne" || $result_dom == "ALLEMAGNE") {
        echo "<img src='images/allemagne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Italie" || $result_dom == "italie" || $result_dom == "ITALIE") {
        echo "<img src='images/italie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Pays-Bas" || $result_dom == "pays-bas" || $result_dom == "PAYS-BAS") {
        echo "<img src='images/pays-bas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Argentine" || $result_dom == "argentine" || $result_dom == "ARGENTINE") {
        echo "<img src='images/argentine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Mexique" || $result_dom == "mexique" || $result_dom == "MEXIQUE") {
        echo "<img src='images/mexique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Bresil" || $result_dom == "bresil" || $result_dom == "BRESIL") {
        echo "<img src='images/bresil.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Etats-Unis" || $result_dom == "etats-unis" || $result_dom == "ETATS-UNIS") {
        echo "<img src='images/etats-unis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "uruguay" || $result_dom == "Uruguay" || $result_dom == "URUGUAY") {
        echo "<img src='images/uruguay.png' width='30px' height='30px'>";
    }
    if ($result_dom == "maroc" || $result_dom == "Maroc" || $result_dom == "MAROC") {
        echo "<img src='images/maroc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "algerie" || $result_dom == "Algerie" || $result_dom == "ALGERIE") {
        echo "<img src='images/algerie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tunisie" || $result_dom == "Tunisie" || $result_dom == "TUNISIE") {
        echo "<img src='images/tunisie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "afriquedusud" || $result_dom == "Afrique Du Sud" || $result_dom == "AFRIQUE DU SUD") {
        echo "<img src='images/afriquedusud.png' width='30px' height='30px'>";
    }
    if ($result_dom == "senegal" || $result_dom == "Senegal" || $result_dom == "SENEGAL") {
        echo "<img src='images/senegal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "egypte" || $result_dom == "Egypte" || $result_dom == "EGYPTE") {
        echo "<img src='images/egypte.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mali" || $result_dom == "Mali" || $result_dom == "MALI") {
        echo "<img src='images/mali.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ghana" || $result_dom == "Ghana" || $result_dom == "GHANA") {
        echo "<img src='images/ghana.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cameroun" || $result_dom == "Cameroun" || $result_dom == "CAMEROUN") {
        echo "<img src='images/cameroun.png' width='30px' height='30px'>";
    }
    if ($result_dom == "coteivoire" || $result_dom == "cote d'ivoire" || $result_dom == "COTE D'IVOIRE") {
        echo "<img src='images/coteivoire.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chine" || $result_dom == "Chine" || $result_dom == "CHINE") {
        echo "<img src='images/chine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "japon" || $result_dom == "Japon" || $result_dom == "JAPON") {
        echo "<img src='images/japon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "turquie" || $result_dom == "Turquie" || $result_dom == "TURQUIE") {
        echo "<img src='images/turquie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nouvellezelande" || $result_dom == "Nouvelle Zelande" || $result_dom == "NOUVELLE ZELANDE") {
        echo "<img src='images/nouvellezelande.png' width='30px' height='30px'>";
    }
    if ($result_dom == "australie" || $result_dom == "Australie" || $result_dom == "AUSTRALIE") {
        echo "<img src='images/australie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Braga" || $result_dom == "braga" || $result_dom == "BRAGA") {
        echo "<img src='images/braga.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Sporting" || $result_dom == "sporting" || $result_dom == "SPORTING") {
        echo "<img src='images/sporting.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Porto" || $result_dom == "porto" || $result_dom == "PORTO") {
        echo "<img src='images/porto.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Benfica" || $result_dom == "benfica" || $result_dom == "BENFICA") {
        echo "<img src='images/benfica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Galatasaray" || $result_dom == "galatasaray" || $result_dom == "GALATASARAY") {
        echo "<img src='images/galatasaray.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Juventus" || $result_dom == "juventus" || $result_dom == "JUVENTUS") {
        echo "<img src='images/juventus.png' width='30px' height='30px'>";
    }
    if ($result_dom == "udinese") {
        echo "<img src='images/udinese.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Fiorentina" || $result_dom == "fiorentina" || $result_dom == "FIORENTINA") {
        echo "<img src='images/fiorentina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fenerbahce" || $result_dom == "Fenerbahce" || $result_dom == "FENERBAHCE") {
        echo "<img src='images/fenerbahce.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Milan" || $result_dom == "milan" || $result_dom == "MILAN") {
        echo "<img src='images/milan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Roma" || $result_dom == "rome" || $result_dom == "ROMA") {
        echo "<img src='images/rome.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Inter" || $result_dom == "inter" || $result_dom == "INTER") {
        echo "<img src='images/inter.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Naples" || $result_dom == "naples" || $result_dom == "NAPLES") {
        echo "<img src='images/naples.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Lazio" || $result_dom == "lazio" || $result_dom == "LAZIO") {
        echo "<img src='images/lazio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "atalanta") {
        echo "<img src='images/atalanta.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bologne") {
        echo "<img src='images/bologne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cagliari") {
        echo "<img src='images/cagliari.png' width='30px' height='30px'>";
    }
    if ($result_dom == "catane") {
        echo "<img src='images/catane.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chievo verone") {
        echo "<img src='images/chievo verone.png' width='30px' height='30px'>";
    }
    if ($result_dom == "genoa") {
        echo "<img src='images/genoa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hellas verone") {
        echo "<img src='images/hellas verone.png' width='30px' height='30px'>";
    }
    if ($result_dom == "livourne") {
        echo "<img src='images/livourne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "parme") {
        echo "<img src='images/parme.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sampdoria") {
        echo "<img src='images/sampdoria.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sassuolo") {
        echo "<img src='images/sassuolo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "torino") {
        echo "<img src='images/torino.png' width='30px' height='30px'>";
    }
    if ($result_dom == "PSG" || $result_dom == "psg" || $result_dom == "Paris") {
        echo "<img src='images/psg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Om" || $result_dom == "om" || $result_dom == "OM") {
        echo "<img src='images/om.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Lyon" || $result_dom == "lyon" || $result_dom == "LYON" || $result_dom == "OL" || $result_dom == "ol") {
        echo "<img src='images/ol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Monaco" || $result_dom == "monaco" || $result_dom == "MONACO") {
        echo "<img src='images/monaco.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Lille" || $result_dom == "lille" || $result_dom == "LILLE" || $result_dom == "Losc" || $result_dom == "LOSC") {
        echo "<img src='images/lille.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ajaccio") {
        echo "<img src='images/ajaccio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bastia") {
        echo "<img src='images/bastia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bordeaux") {
        echo "<img src='images/bordeaux.png' width='30px' height='30px'>";
    }
    if ($result_dom == "evian") {
        echo "<img src='images/evian.png' width='30px' height='30px'>";
    }
    if ($result_dom == "guingamp") {
        echo "<img src='images/guingamp.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lorient") {
        echo "<img src='images/lorient.png' width='30px' height='30px'>";
    }
    if ($result_dom == "montpellier") {
        echo "<img src='images/montpellier.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nantes") {
        echo "<img src='images/nantes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nice") {
        echo "<img src='images/nice.png' width='30px' height='30px'>";
    }
    if ($result_dom == "reims") {
        echo "<img src='images/reims.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rennes") {
        echo "<img src='images/rennes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saint etienne") {
        echo "<img src='images/saint etienne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sochaux") {
        echo "<img src='images/sochaux.png' width='30px' height='30px'>";
    }
    if ($result_dom == "toulouse") {
        echo "<img src='images/toulouse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "valenciennes") {
        echo "<img src='images/valenciennes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Dortmund" || $result_dom == "dortmund" || $result_dom == "DORTMUND") {
        echo "<img src='images/dortmund.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Leverkusen" || $result_dom == "leverkusen" || $result_dom == "LEVERKUSEN") {
        echo "<img src='images/leverkusen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Shalke" || $result_dom == "shalke" || $result_dom == "SHALKE") {
        echo "<img src='images/shalke.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Bayern" || $result_dom == "bayern" || $result_dom == "BAYERN") {
        echo "<img src='images/bayern.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Hambourg" || $result_dom == "hambourg" || $result_dom == "HAMBOURG") {
        echo "<img src='images/hambourg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Werder" || $result_dom == "werder" || $result_dom == "WERDER") {
        echo "<img src='images/werder.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Wolfsburg" || $result_dom == "wolfsburg" || $result_dom == "WOLFSBURG") {
        echo "<img src='images/wolfsburg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gladbach") {
        echo "<img src='images/gladbach.png' width='30px' height='30px'>";
    }
    if ($result_dom == "augsbourg") {
        echo "<img src='images/augsbourg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eintracht brunswick") {
        echo "<img src='images/eintracht brunswick.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eintracht francfort") {
        echo "<img src='images/eintracht francfort.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fribourg") {
        echo "<img src='images/fribourg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hanovre 96") {
        echo "<img src='images/hanovre 96.png' width='30px' height='30px'>";
    }
    if ($result_dom == "herta berlin") {
        echo "<img src='images/herta berlin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hoffenheim") {
        echo "<img src='images/hoffenheim.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mayence 05") {
        echo "<img src='images/mayence 05.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nuremberg") {
        echo "<img src='images/nuremberg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stuttgart") {
        echo "<img src='images/stuttgart.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Barca" || $result_dom == "barca" || $result_dom == "BARCA") {
        echo "<img src='images/barca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Real" || $result_dom == "real" || $result_dom == "REAL") {
        echo "<img src='images/real.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Seville" || $result_dom == "seville" || $result_dom == "SEVILLE") {
        echo "<img src='images/seville.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Bilbao" || $result_dom == "bilbao" || $result_dom == "BILBAO") {
        echo "<img src='images/bilbao.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Valence" || $result_dom == "valence" || $result_dom == "VALENCE") {
        echo "<img src='images/valence.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Sociedad" || $result_dom == "sociedad" || $result_dom == "SOCIEDAD") {
        echo "<img src='images/sociedad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Atletico" || $result_dom == "atletico" || $result_dom == "ATLETICO") {
        echo "<img src='images/atletico.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Malaga" || $result_dom == "malaga" || $result_dom == "MALAGA") {
        echo "<img src='images/malaga.png' width='30px' height='30px'>";
    }
    if ($result_dom == "almeria") {
        echo "<img src='images/almeria.png' width='30px' height='30px'>";
    }
    if ($result_dom == "betis seville") {
        echo "<img src='images/betis seville.png' width='30px' height='30px'>";
    }
    if ($result_dom == "celta vigo") {
        echo "<img src='images/celta vigo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "elche") {
        echo "<img src='images/elche.png' width='30px' height='30px'>";
    }
    if ($result_dom == "espanyol barcelone") {
        echo "<img src='images/espanyol barcelone.png' width='30px' height='30px'>";
    }
    if ($result_dom == "getafe") {
        echo "<img src='images/getafe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grenada") {
        echo "<img src='images/grenada.png' width='30px' height='30px'>";
    }
    if ($result_dom == "levante") {
        echo "<img src='images/levante.png' width='30px' height='30px'>";
    }
    if ($result_dom == "osasuna") {
        echo "<img src='images/osasuna.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rayo vallecano") {
        echo "<img src='images/rayo vallecano.png' width='30px' height='30px'>";
    }
    if ($result_dom == "valladolid") {
        echo "<img src='images/valladolid.png' width='30px' height='30px'>";
    }
    if ($result_dom == "villarreal") {
        echo "<img src='images/villarreal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Liverpool" || $result_dom == "liverpool" || $result_dom == "LIVERPOOL") {
        echo "<img src='images/liverpool.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Arsenal" || $result_dom == "arsenal" || $result_dom == "ARSENAL") {
        echo "<img src='images/arsenal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Newcastle" || $result_dom == "newcastle" || $result_dom == "NEWCASTLE") {
        echo "<img src='images/newcastle.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Tottenham" || $result_dom == "tottenham" || $result_dom == "TOTTENHAM") {
        echo "<img src='images/tottenham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Manchester United" || $result_dom == "MAN U" || $result_dom == "manu" || $result_dom == "MANCHESTER UNITED") {
        echo "<img src='images/manu.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Manchester City" || $result_dom == "CITY" || $result_dom == "city") {
        echo "<img src='images/city.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chelsea") {
        echo "<img src='images/chelsea.png' width='30px' height='30px'>";
    }
    if ($result_dom == "southampton") {
        echo "<img src='images/southampton.png' width='30px' height='30px'>";
    }
    if ($result_dom == "norwich") {
        echo "<img src='images/norwich.png' width='30px' height='30px'>";
    }
    if ($result_dom == "everton") {
        echo "<img src='images/everton.png' width='30px' height='30px'>";
    }
    if ($result_dom == "villa") {
        echo "<img src='images/villa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cardiff") {
        echo "<img src='images/cardiff.png' width='30px' height='30px'>";
    }
    if ($result_dom == "crystal") {
        echo "<img src='images/crystal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hull") {
        echo "<img src='images/hull.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stoke") {
        echo "<img src='images/stoke.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sunderland") {
        echo "<img src='images/sunderland.png' width='30px' height='30px'>";
    }
    if ($result_dom == "west ham") {
        echo "<img src='images/west ham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "west bromwich") {
        echo "<img src='images/west bromwich.png' width='30px' height='30px'>";
    }
    if ($result_dom == "swansea") {
        echo "<img src='images/swansea.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fulham") {
        echo "<img src='images/fulham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "shakhtar") {
        echo "<img src='images/shakhtar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "olympiakos") {
        echo "<img src='images/olympiakos.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bale") {
        echo "<img src='images/bale.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ajax") {
        echo "<img src='images/ajax.png' width='30px' height='30px'>";
    }
    if ($result_dom == "america") {
        echo "<img src='images/america.png' width='30px' height='30px'>";
    }
    if ($result_dom == "celtic") {
        echo "<img src='images/celtic.png' width='30px' height='30px'>";
    }
    if ($result_dom == "copenhague") {
        echo "<img src='images/copenhague.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mineiro") {
        echo "<img src='images/mineiro.png' width='30px' height='30px'>";
    }
    if ($result_dom == "anderlecht") {
        echo "<img src='images/anderlecht.png' width='30px' height='30px'>";
    }
    if ($result_dom == "boca") {
        echo "<img src='images/boca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cska") {
        echo "<img src='images/cska.png' width='30px' height='30px'>";
    }
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
    <link rel="stylesheet" href="../assets/css/themes/default.css" id="style_color">
    <link rel="stylesheet" href="../assets/css/themes/headers/default.css" id="style_color-header-1">
</head>

<body>

<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="pull-left">Tournoi <?php echo $name; ?></h1>
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
<div class="col-lg-12" style="margin-bottom: 180px;">
    <form class="form-horizontal well" method="post" id="tour"
          action="resultat.php">
        <div class="row">
            <div class="col-lg-6">
                <fieldset>
                    <h3>Calendrier</h3>
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <thead>
                        <th style='text-align: center;'>Jou</th>
                        <th style="text-align:center;">Equipe Dom</th>
                        <th style="text-align:center;"></th>
                        <th style="text-align:center;">Score Dom</th>
                        <th style="text-align:center;">vs</th>
                        <th style="text-align:center;">Score Ext</th>
                        <th style="text-align:center;"></th>
                        <th style="text-align:center;">Equipe Ext</th>
                        </thead>
                        <tbody>
                        <?php for ($i = 1; $i <= $nb_match; $i++) {
                            if ($i == $nbAffiche) {
                                echo "</tbody></table></fieldset></div><div class='col-lg-6'>
        <fieldset><h3>Calendrier</h3><table class='table table-striped table-hover table-condensed table-bordered'>
        <thead>
        <th style='text-align: center;'>Jou</th>
        <th style='text-align:center;'>Equipe Dom</th>
        <th style='text-align:center;'></th>
        <th style='text-align:center;''>Score Dom</th>
        <th style='text-align:center;'>vs</th>
        <th style='text-align:center;'>Score Ext</th>
        <th style='text-align:center;''></th>
        <th style='text-align:center;'>Equipe Ext</th>
        </thead><tbody>";
                            }
                            echo "<tr>";
                            echo "<td style='text-align: center;vertical-align: middle'>";
                            echo $i;
                            echo "</td>";
                            echo "<td style='text-align:center;vertical-align: middle'>";
                            $sql = $mysqli->query("select equipe from joueur where nom_tournoi = '$name' and login = '$login' and id_equipe = (select id_equipe_dom from matchs where nb_equipe='$nb' and id_match='$i');");
                            $requete = $sql->fetch_array();
                            $result_dom = $requete[0];
                            $sql = $mysqli->query("select joueur from joueur where nom_tournoi = '$name' and login = '$login' and equipe = '$result_dom';");
                            $requete = $sql->fetch_array();
                            $resultat = $requete[0];
                            echo strtoupper($result_dom);
                            echo " (";
                            echo $resultat;
                            echo ")";
                            echo "</td>";
                            echo "<td style='text-align:center;vertical-align: middle'>";
                            /**
                             * Ecriture des équipes!!!!!!!!!
                             */
                            ecrireEquipes($result_dom);
                            echo "</td>";
                            echo "<td style='text-align:center;vertical-align: middle'>";
                            $sql = $mysqli->query("select bp, count(bp) from resultats where nom_tournoi = '$name' and login = '$login' and id_match = '$i';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $test = $requete[0];
                                echo '<input type="text" name="score_dom_' . $i . '" style="width:50px;height:30px;text-align:center;margin-left:30px" maxlength=2 class="form-control numbersOnly" value="' . stripslashes($test) . '">';
                            } else {
                                echo "<input type='text' name='score_dom_$i' style='width:50px;height:30px;text-align:center;margin-left:30px' maxlength=2 class='form-control numbersOnly'>";
                            }
                            echo "<input type='hidden' name='equipe_dom_$i' value='$result_dom'>";
                            echo "</td>";
                            echo "<td style='text-align:center;vertical-align: middle'>";
                            echo "vs";
                            echo "</td>";
                            echo "<td style='text-align:center;vertical-align: middle'>";
                            $sql = $mysqli->query("select bc, count(bc) from resultats where nom_tournoi = '$name' and login = '$login' and id_match = '$i';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $test = $requete[0];
                                echo '<input type="text" name="score_ext_' . $i . '" style="width:50px;height:30px;text-align:center;margin-left:30px;vertical-align: middle" maxlength=2 class="form-control numbersOnly" value="' . stripslashes($test) . '">';
                            } else {
                                echo "<input type='text' name='score_ext_$i' style='width:50px;height:30px;text-align:center;margin-left:30px;vertical-align: middle' maxlength=2 class='form-control numbersOnly'>";
                            }
                            echo "</td>";
                            echo "<td style='text-align:center;vertical-align: middle'>";
                            $sql = $mysqli->query("select equipe from joueur where nom_tournoi = '$name' and login = '$login' and id_equipe = (select id_equipe_ext from matchs where nb_equipe='$nb' and id_match='$i');");
                            $requete = $sql->fetch_array();
                            $result = $requete[0];
                            $sql = $mysqli->query("select joueur from joueur where nom_tournoi = '$name' and login = '$login' and equipe = '$result';");
                            $requete = $sql->fetch_array();
                            $resultat = $requete[0];
                            /**
                             * Ecriture des équipes!!!!!!!!!
                             */
                            ecrireEquipes($result);
                            echo "<input type='hidden' name='equipe_ext_$i' value='$result'>";
                            echo "</td>";
                            echo "<td style='text-align: center;vertical-align: middle'>";
                            echo strtoupper($result);
                            echo " (";
                            echo $resultat;
                            echo ")";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <br><br>
            <center>
                <input type="hidden" value="<?php echo $nb; ?>" name="nb">
                <input type="hidden" value="<?php echo $name; ?>" name="name">
                <input type="hidden" value="<?php echo $nb_match; ?>" name="nbmatch">
                <input type="submit" class="btn-u btn-u-blue" id="bout" value="Mettre a jour">
            </center>
            <br>
    </form>
</div>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <fieldset>
            <form class="form-horizontal well">
                <h3>Classement</h3>
                <table class="table table-striped table-condensed table-hover">
                    <thead>
                    <th style="text-align:center;">Pos</th>
                    <th style="text-align:center;"></th>
                    <th style="text-align:center;">Equipe</th>
                    <th style="text-align:center;">Joueur</th>
                    <th style="text-align:center;">MJ</th>
                    <th style="text-align:center;">V</th>
                    <th style="text-align:center;">N</th>
                    <th style="text-align:center;">D</th>
                    <th style="text-align:center;">BP</th>
                    <th style="text-align:center;">BC</th>
                    <th style="text-align:center;">DIFF</th>
                    <th style="text-align:center;">PTS</th>
                    </thead>
                    <tbody>
                    <?php
                    $sql = $mysqli->query("select equipe from classement where nom_tournoi = '$name' and login = '$login' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;");
                    $i = 1;
                    while ($row = $sql->fetch_array()) {
                        $rows[] = $row;
                    }
                    foreach ($rows as $ligne) {
                        if ($i == 1) {
                            echo "<tr class='success'>";
                        } else if ($i == $nb) {
                            echo "<tr class='danger'>";
                        } else {
                            echo "<tr>";
                        }
                        ?>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php echo $i; ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            /**
                             * Ecriture des équipes!!!!!!!!!
                             */
                            ecrireEquipes($ligne[0]);
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            echo strtoupper($ligne[0]);
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select joueur from joueur where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            echo $requete[0];
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select mj_classement, count(mj_classement) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select victoire, count(victoire) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select nul, count(nul) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select defaite, count(defaite) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select bp, count(bp) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select bc, count(bc) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select diff, count(diff) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        <td style="text-align:center;vertical-align:middle;">
                            <?php
                            $sql = $mysqli->query("select points, count(points) from classement where nom_tournoi = '$name' and login = '$login' and equipe = '$ligne[0]';");
                            $requete = $sql->fetch_array();
                            $nblignes = $requete[1];
                            if ($nblignes != 0) {
                                $resultat = $requete[0];
                                echo $resultat;
                            }
                            ?>
                        </td>
                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>
                <br>
        </fieldset>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-offset-3 col-lg-6">
        <a class="btn-u btn-u-orange" href="membre.php" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>
        <!--        --><?php
        //        if ($nb > 7) {
        //
        ?>
        <!--        <a class="btn-u btn-u-red" href="quart_final.php?name=--><?php //echo $name; ?><!--"-->
        <!--           width="100px" height="30px">Quart de Finale</a>-->
        <!--        --><?php //} ?>
        <!--        <a class="btn-u btn-u-green" href="demie_final.php?name=-->
        <?php //echo $name; ?><!--" width="100px"-->
        <!--           height="30px">Demie Finale</a>-->
    </div>
</div>
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
    $('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    //    $(".numbersOnly").each(function (index) {
    //        if ($(this).val() != '') {
    //            $(this).parent().parent().hide();
    //        }
    //    });
</script>
</body>
</html>