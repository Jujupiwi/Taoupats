<?php
include 'connexionBase.php';

$name = $_GET['name'];
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);
// on s�lectionne la base
mysql_select_db("taoupats");
$sqlcount = "select nombre_tournoi from tournoi where nom_tournoi = '$name';";
$requete = mysql_query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$nb = mysql_result($requete, 0);
$sql = "select * from matchs where nb_equipe = '$nb';";
$requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$result = mysql_result($requete, 0);
$sql = "select type_match from tournoi where nom_tournoi = '$name';";
$requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$type = mysql_result($requete, 0);
$sqlcount = "select count(id_match) from matchs where nb_equipe = '$nb';";
$requete = mysql_query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$nb_match = mysql_result($requete, 0);
if ($type == "non") {
    $nb_match = $nb_match / 2;
}
?>
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="../font-awesome/css/font-awesome-ie7.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
</head>
<style>
    p {
        width: 0.9em;
        height : auto;
        overflow: hidden;
        word-wrap:break-word ;}
</style>
<body style="padding-top:100px">

<div class="row-fluid">
<div class="offset3 span6">
<form class="form-horizontal well" method="post"
      action="resultat.php?name=<?php echo $name; ?>&nb=<?php echo $nb; ?>&nbmatch=<?php echo $nb_match; ?>">
<fieldset>
<h3>Calendrier</h3>
<table class="table table-bordered table-striped table-condensed table-hover">
<thead>
<th style="text-align:center;">Journee</th>
<th style="text-align:center;">Equipe Dom</th>
<th style="text-align:center;"></th>
<th style="text-align:center;">Score Dom</th>
<th style="text-align:center;">vs</th>
<th style="text-align:center;">Score Ext</th>
<th style="text-align:center;">Equipe Ext</th>
<th style="text-align:center;"></th>
</thead>
<tbody>
<?php for ($i = 1; $i <= $nb_match; $i++) {
    echo "<tr>";
    echo "<td style='text-align:center;'>";
    echo $i;
    echo "</td>";
    echo "<td style='text-align:center;'>";
    $sql = "select equipe from joueur where nom_tournoi = '$name' and id_equipe = (select id_equipe_dom from matchs where nb_equipe='$nb' and id_match='$i');";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $result_dom = mysql_result($requete, 0);
    $sql = "select joueur from joueur where nom_tournoi = '$name' and equipe = '$result_dom';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $resultat = mysql_result($requete, 0);
    echo strtoupper($result_dom);
    echo " (";
    echo $resultat;
    echo ")";
    echo "</td>";
    echo "<td style='text-align:center;'>";
    if ($result_dom == "France" || $result_dom == "france" || $result_dom == "FRANCE") {
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
    if ($result_dom == "PSG" || $result_dom == "psg" || $result_dom == "Paris") {
        echo "<img src='images/psg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Om" || $result_dom == "om" || $result_dom == "OM") {
        echo "<img src='images/om.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Lyon" || $result_dom == "lyon" || $result_dom == "LYON" || $result_dom == "OL" || $result_dom == "ol") {
        echo "<img src='images/lyon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Monaco" || $result_dom == "monaco" || $result_dom == "MONACO") {
        echo "<img src='images/monaco.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Lille" || $result_dom == "lille" || $result_dom == "LILLE" || $result_dom == "Losc" || $result_dom == "LOSC") {
        echo "<img src='images/lille.png' width='30px' height='30px'>";
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
    if ($result_dom == "Chelsea" || $result_dom == "chelsea" || $result_dom == "CHELSEA") {
        echo "<img src='images/chelsea.png' width='30px' height='30px'>";
    }
    if ($result_dom == "Everton" || $result_dom == "everton" || $result_dom == "EVERTON") {
        echo "<img src='images/everton.png' width='30px' height='30px'>";
    }
    echo "</td>";
    echo "<td style='text-align:center;'>";
    $sql = "select bp from resultats where nom_tournoi = '$name' and id_match = '$i';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $nblignes = mysql_num_rows($requete);
    if ($nblignes != 0) {
        $test = mysql_result($requete, 0);
        echo '<input type="text" name="score_dom_' . $i . '" style="width:50px;height:30px;text-align:center;" maxlength=2 class="numbersOnly" value="' . stripslashes($test) . '">';
    } else {
        echo "<input type='text' name='score_dom_$i' style='width:50px;height:30px;text-align:center;' maxlength=2 class='numbersOnly'>";
    }
    echo "<input type='hidden' name='equipe_dom_$i' value='$result_dom'>";
    echo "</td>";
    echo "<td style='text-align:center;'>";
    echo "vs";
    echo "</td>";
    echo "<td style='text-align:center;'>";
    $sql = "select bc from resultats where nom_tournoi = '$name' and id_match = '$i';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $nblignes = mysql_num_rows($requete);
    if ($nblignes != 0) {
        $test = mysql_result($requete, 0);
        echo '<input type="text" name="score_ext_' . $i . '" style="width:50px;height:30px;text-align:center;" maxlength=2 class="numbersOnly" value="' . stripslashes($test) . '">';
    } else {
        echo "<input type='text' name='score_ext_$i' style='width:50px;height:30px;text-align:center;' maxlength=2 class='numbersOnly'>";
    }
    echo "</td>";
    echo "<td style='text-align:center;'>";
    $sql = "select equipe from joueur where nom_tournoi = '$name' and id_equipe = (select id_equipe_ext from matchs where nb_equipe='$nb' and id_match='$i');";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $result = mysql_result($requete, 0);
    $sql = "select joueur from joueur where nom_tournoi = '$name' and equipe = '$result';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $resultat = mysql_result($requete, 0);
    echo strtoupper($result);
    echo " (";
    echo $resultat;
    echo ")";
    echo "</td>";
    echo "<td style='text-align:center;'>";
    if ($result == "France" || $result == "france" || $result == "FRANCE") {
        echo "<img src='images/france.png' width='30px' height='30px'>";
    }
    if ($result == "Espagne" || $result == "espagne" || $result == "ESPAGNE") {
        echo "<img src='images/espagne.png' width='30px' height='30px'>";
    }
    if ($result == "Portugal" || $result == "portugal" || $result == "PORTUGAL") {
        echo "<img src='images/portugal.png' width='30px' height='30px'>";
    }
    if ($result == "Russie" || $result == "russie" || $result == "RUSSIE") {
        echo "<img src='images/russie.png' width='30px' height='30px'>";
    }
    if ($result == "Angleterre" || $result == "angleterre" || $result == "ANGLETERRE") {
        echo "<img src='images/angleterre.png' width='30px' height='30px'>";
    }
    if ($result == "Suede" || $result == "suede" || $result == "SUEDE") {
        echo "<img src='images/suede.png' width='30px' height='30px'>";
    }
    if ($result == "belgique" || $result == "Belgique" || $result == "BELGIQUE") {
        echo "<img src='images/belgique.png' width='30px' height='30px'>";
    }
    if ($result == "allemagne" || $result == "Allemagne" || $result == "ALLEMAGNE") {
        echo "<img src='images/allemagne.png' width='30px' height='30px'>";
    }
    if ($result == "Italie" || $result == "italie" || $result == "ITALIE") {
        echo "<img src='images/italie.png' width='30px' height='30px'>";
    }
    if ($result == "Pays-Bas" || $result == "pays-bas" || $result == "PAYS-BAS") {
        echo "<img src='images/pays-bas.png' width='30px' height='30px'>";
    }
    if ($result == "Argentine" || $result == "argentine" || $result == "ARGENTINE") {
        echo "<img src='images/argentine.png' width='30px' height='30px'>";
    }
    if ($result == "Mexique" || $result == "mexique" || $result == "MEXIQUE") {
        echo "<img src='images/mexique.png' width='30px' height='30px'>";
    }
    if ($result == "Bresil" || $result == "bresil" || $result == "BRESIL") {
        echo "<img src='images/bresil.png' width='30px' height='30px'>";
    }
    if ($result == "Etats-Unis" || $result == "etats-unis" || $result == "ETATS-UNIS") {
        echo "<img src='images/etats-unis.png' width='30px' height='30px'>";
    }
    if ($result == "uruguay" || $result == "Uruguay" || $result == "URUGUAY") {
        echo "<img src='images/uruguay.png' width='30px' height='30px'>";
    }
    if ($result == "maroc" || $result == "Maroc" || $result == "MAROC") {
        echo "<img src='images/maroc.png' width='30px' height='30px'>";
    }
    if ($result == "algerie" || $result == "Algerie" || $result == "ALGERIE") {
        echo "<img src='images/algerie.png' width='30px' height='30px'>";
    }
    if ($result == "tunisie" || $result == "Tunisie" || $result == "TUNISIE") {
        echo "<img src='images/tunisie.png' width='30px' height='30px'>";
    }
    if ($result == "afriquedusud" || $result == "Afrique Du Sud" || $result == "AFRIQUE DU SUD") {
        echo "<img src='images/afriquedusud.png' width='30px' height='30px'>";
    }
    if ($result == "senegal" || $result == "Senegal" || $result == "SENEGAL") {
        echo "<img src='images/senegal.png' width='30px' height='30px'>";
    }
    if ($result == "egypte" || $result == "Egypte" || $result == "EGYPTE") {
        echo "<img src='images/egypte.png' width='30px' height='30px'>";
    }
    if ($result == "mali" || $result == "Mali" || $result == "MALI") {
        echo "<img src='images/mali.png' width='30px' height='30px'>";
    }
    if ($result == "ghana" || $result == "Ghana" || $result == "GHANA") {
        echo "<img src='images/ghana.png' width='30px' height='30px'>";
    }
    if ($result == "cameroun" || $result == "Cameroun" || $result == "CAMEROUN") {
        echo "<img src='images/cameroun.png' width='30px' height='30px'>";
    }
    if ($result == "coteivoire" || $result == "cote d'ivoire" || $result == "COTE D'IVOIRE") {
        echo "<img src='images/coteivoire.png' width='30px' height='30px'>";
    }
    if ($result == "chine" || $result == "Chine" || $result == "CHINE") {
        echo "<img src='images/chine.png' width='30px' height='30px'>";
    }
    if ($result == "japon" || $result == "Japon" || $result == "JAPON") {
        echo "<img src='images/japon.png' width='30px' height='30px'>";
    }
    if ($result == "turquie" || $result == "Turquie" || $result == "TURQUIE") {
        echo "<img src='images/turquie.png' width='30px' height='30px'>";
    }
    if ($result == "nouvellezelande" || $result == "Nouvelle Zelande" || $result == "NOUVELLE ZELANDE") {
        echo "<img src='images/nouvellezelande.png' width='30px' height='30px'>";
    }
    if ($result == "australie" || $result == "Australie" || $result == "AUSTRALIE") {
        echo "<img src='images/australie.png' width='30px' height='30px'>";
    }
    if ($result == "Braga" || $result == "braga" || $result == "BRAGA") {
        echo "<img src='images/braga.png' width='30px' height='30px'>";
    }
    if ($result == "Sporting" || $result == "sporting" || $result == "SPORTING") {
        echo "<img src='images/sporting.png' width='30px' height='30px'>";
    }
    if ($result == "Porto" || $result == "porto" || $result == "PORTO") {
        echo "<img src='images/porto.png' width='30px' height='30px'>";
    }
    if ($result == "Benfica" || $result == "benfica" || $result == "BENFICA") {
        echo "<img src='images/benfica.png' width='30px' height='30px'>";
    }
    if ($result == "Galatasaray" || $result == "galatasaray" || $result == "GALATASARAY") {
        echo "<img src='images/galatasaray.png' width='30px' height='30px'>";
    }
    if ($result == "Juventus" || $result == "juventus" || $result == "JUVENTUS") {
        echo "<img src='images/juventus.png' width='30px' height='30px'>";
    }
    if ($result == "fenerbahce" || $result == "Fenerbahce" || $result == "FENERBAHCE") {
        echo "<img src='images/fenerbahce.png' width='30px' height='30px'>";
    }
    if ($result == "Milan" || $result == "milan" || $result == "MILAN") {
        echo "<img src='images/milan.png' width='30px' height='30px'>";
    }
    if ($result == "Roma" || $result == "rome" || $result == "ROMA") {
        echo "<img src='images/rome.png' width='30px' height='30px'>";
    }
    if ($result == "Inter" || $result == "inter" || $result == "INTER") {
        echo "<img src='images/inter.png' width='30px' height='30px'>";
    }
    if ($result == "Naples" || $result == "naples" || $result == "NAPLES") {
        echo "<img src='images/naples.png' width='30px' height='30px'>";
    }
    if ($result == "Lazio" || $result == "lazio" || $result == "LAZIO") {
        echo "<img src='images/lazio.png' width='30px' height='30px'>";
    }
    if ($result == "PSG" || $result == "psg" || $result == "Paris") {
        echo "<img src='images/psg.png' width='30px' height='30px'>";
    }
    if ($result == "Om" || $result == "om" || $result == "OM") {
        echo "<img src='images/om.png' width='30px' height='30px'>";
    }
    if ($result == "Lyon" || $result == "lyon" || $result == "LYON" || $result == "OL" || $result == "ol") {
        echo "<img src='images/lyon.png' width='30px' height='30px'>";
    }
    if ($result == "Lille" || $result == "lille" || $result == "LILLE" || $result == "Losc" || $result == "LOSC") {
        echo "<img src='images/lille.png' width='30px' height='30px'>";
    }
    if ($result == "Monaco" || $result == "monaco" || $result == "MONACO") {
        echo "<img src='images/monaco.png' width='30px' height='30px'>";
    }
    if ($result == "Dortmund" || $result == "dortmund" || $result == "DORTMUND") {
        echo "<img src='images/dortmund.png' width='30px' height='30px'>";
    }
    if ($result == "Leverkusen" || $result == "leverkusen" || $result == "LEVERKUSEN") {
        echo "<img src='images/leverkusen.png' width='30px' height='30px'>";
    }
    if ($result == "Shalke" || $result == "shalke" || $result == "SHALKE") {
        echo "<img src='images/shalke.png' width='30px' height='30px'>";
    }
    if ($result == "Bayern" || $result == "bayern" || $result == "BAYERN") {
        echo "<img src='images/bayern.png' width='30px' height='30px'>";
    }
    if ($result == "Hambourg" || $result == "hambourg" || $result == "HAMBOURG") {
        echo "<img src='images/hambourg.png' width='30px' height='30px'>";
    }
    if ($result == "Werder" || $result == "werder" || $result == "WERDER") {
        echo "<img src='images/werder.png' width='30px' height='30px'>";
    }
    if ($result == "Wolfsburg" || $result == "wolfsburg" || $result == "WOLFSBURG") {
        echo "<img src='images/wolfsburg.png' width='30px' height='30px'>";
    }
    if ($result == "Barca" || $result == "barca" || $result == "BARCA") {
        echo "<img src='images/barca.png' width='30px' height='30px'>";
    }
    if ($result == "Real" || $result == "real" || $result == "REAL") {
        echo "<img src='images/real.png' width='30px' height='30px'>";
    }
    if ($result == "Seville" || $result == "seville" || $result == "SEVILLE") {
        echo "<img src='images/seville.png' width='30px' height='30px'>";
    }
    if ($result == "Bilbao" || $result == "bilbao" || $result == "BILBAO") {
        echo "<img src='images/bilbao.png' width='30px' height='30px'>";
    }
    if ($result == "Valence" || $result == "valence" || $result == "VALENCE") {
        echo "<img src='images/valence.png' width='30px' height='30px'>";
    }
    if ($result == "Sociedad" || $result == "sociedad" || $result == "SOCIEDAD") {
        echo "<img src='images/sociedad.png' width='30px' height='30px'>";
    }
    if ($result == "Atletico" || $result == "atletico" || $result == "ATLETICO") {
        echo "<img src='images/atletico.png' width='30px' height='30px'>";
    }
    if ($result == "Malaga" || $result == "malaga" || $result == "MALAGA") {
        echo "<img src='images/malaga.png' width='30px' height='30px'>";
    }
    if ($result == "Liverpool" || $result == "liverpool" || $result == "LIVERPOOL") {
        echo "<img src='images/liverpool.png' width='30px' height='30px'>";
    }
    if ($result == "Arsenal" || $result == "arsenal" || $result == "ARSENAL") {
        echo "<img src='images/arsenal.png' width='30px' height='30px'>";
    }
    if ($result == "Newcastle" || $result == "newcastle" || $result == "NEWCASTLE") {
        echo "<img src='images/newcastle.png' width='30px' height='30px'>";
    }
    if ($result == "Tottenham" || $result == "tottenham" || $result == "TOTTENHAM") {
        echo "<img src='images/tottenham.png' width='30px' height='30px'>";
    }
    if ($result == "Manchester United" || $result == "MAN U" || $result == "manu" || $result == "MANCHESTER UNITED") {
        echo "<img src='images/manu.png' width='30px' height='30px'>";
    }
    if ($result == "Manchester City" || $result == "CITY" || $result == "city") {
        echo "<img src='images/city.png' width='30px' height='30px'>";
    }
    if ($result == "Chelsea" || $result == "chelsea" || $result == "CHELSEA") {
        echo "<img src='images/chelsea.png' width='30px' height='30px'>";
    }
    if ($result == "Everton" || $result == "everton" || $result == "EVERTON") {
        echo "<img src='images/everton.png' width='30px' height='30px'>";
    }
    echo "<input type='hidden' name='equipe_ext_$i' value='$result'>";
    echo "</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
<br><br>
<center>
    <input type="submit" class="btn-info" value="Mettre a jour">
</center>
<br><br>

<h3>Classement</h3>
<table class="table table-bordered table-striped table-condensed table-hover">
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
$sql = "select equipe from classement where nom_tournoi = '$name' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;";
$request = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$i = 1;
while ($ligne = mysql_fetch_array($request)) {
    if ($i == 1) {
        echo "<tr class='success'>";
    } else {
        echo "<tr>";
    }
    ?>
    <td style="text-align:center;">
        <?php echo $i; ?>
    </td>
    <td style="text-align:center;vertical-align:middle;">
    <?php
    if ($ligne[0] == "France" || $ligne[0] == "france" || $ligne[0] == "FRANCE") {
        echo "<img src='images/france.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Espagne" || $ligne[0] == "espagne" || $ligne[0] == "ESPAGNE") {
        echo "<img src='images/espagne.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Portugal" || $ligne[0] == "portugal" || $ligne[0] == "PORTUGAL") {
        echo "<img src='images/portugal.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Russie" || $ligne[0] == "russie" || $ligne[0] == "RUSSIE") {
        echo "<img src='images/russie.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Angleterre" || $ligne[0] == "angleterre" || $ligne[0] == "ANGLETERRE") {
        echo "<img src='images/angleterre.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Suede" || $ligne[0] == "suede" || $ligne[0] == "SUEDE") {
        echo "<img src='images/suede.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "belgique" || $ligne[0] == "Belgique" || $ligne[0] == "BELGIQUE") {
        echo "<img src='images/belgique.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "allemagne" || $ligne[0] == "Allemagne" || $ligne[0] == "ALLEMAGNE") {
        echo "<img src='images/allemagne.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Italie" || $ligne[0] == "italie" || $ligne[0] == "ITALIE") {
        echo "<img src='images/italie.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Pays-Bas" || $ligne[0] == "pays-bas" || $ligne[0] == "PAYS-BAS") {
        echo "<img src='images/pays-bas.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Argentine" || $ligne[0] == "argentine" || $ligne[0] == "ARGENTINE") {
        echo "<img src='images/argentine.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Mexique" || $ligne[0] == "mexique" || $ligne[0] == "MEXIQUE") {
        echo "<img src='images/mexique.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Bresil" || $ligne[0] == "bresil" || $ligne[0] == "BRESIL") {
        echo "<img src='images/bresil.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Etats-Unis" || $ligne[0] == "etats-unis" || $ligne[0] == "ETATS-UNIS") {
        echo "<img src='images/etats-unis.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "uruguay" || $ligne[0] == "Uruguay" || $ligne[0] == "URUGUAY") {
        echo "<img src='images/uruguay.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "maroc" || $ligne[0] == "Maroc" || $ligne[0] == "MAROC") {
        echo "<img src='images/maroc.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "algerie" || $ligne[0] == "Algerie" || $ligne[0] == "ALGERIE") {
        echo "<img src='images/algerie.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "tunisie" || $ligne[0] == "Tunisie" || $ligne[0] == "TUNISIE") {
        echo "<img src='images/tunisie.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "afriquedusud" || $ligne[0] == "Afrique Du Sud" || $ligne[0] == "AFRIQUE DU SUD") {
        echo "<img src='images/afriquedusud.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "senegal" || $ligne[0] == "Senegal" || $ligne[0] == "SENEGAL") {
        echo "<img src='images/senegal.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "egypte" || $ligne[0] == "Egypte" || $ligne[0] == "EGYPTE") {
        echo "<img src='images/egypte.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "mali" || $ligne[0] == "Mali" || $ligne[0] == "MALI") {
        echo "<img src='images/mali.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "ghana" || $ligne[0] == "Ghana" || $ligne[0] == "GHANA") {
        echo "<img src='images/ghana.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "cameroun" || $ligne[0] == "Cameroun" || $ligne[0] == "CAMEROUN") {
        echo "<img src='images/cameroun.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "coteivoire" || $ligne[0] == "cote d'ivoire" || $ligne[0] == "COTE D'IVOIRE") {
        echo "<img src='images/coteivoire.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "chine" || $ligne[0] == "Chine" || $ligne[0] == "CHINE") {
        echo "<img src='images/chine.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "japon" || $ligne[0] == "Japon" || $ligne[0] == "JAPON") {
        echo "<img src='images/japon.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "turquie" || $ligne[0] == "Turquie" || $ligne[0] == "TURQUIE") {
        echo "<img src='images/turquie.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "nouvellezelande" || $ligne[0] == "Nouvelle Zelande" || $ligne[0] == "NOUVELLE ZELANDE") {
        echo "<img src='images/nouvellezelande.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "australie" || $ligne[0] == "Australie" || $ligne[0] == "AUSTRALIE") {
        echo "<img src='images/australie.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Braga" || $ligne[0] == "braga" || $ligne[0] == "BRAGA") {
        echo "<img src='images/braga.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Sporting" || $ligne[0] == "sporting" || $ligne[0] == "SPORTING") {
        echo "<img src='images/sporting.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Porto" || $ligne[0] == "porto" || $ligne[0] == "PORTO") {
        echo "<img src='images/porto.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Benfica" || $ligne[0] == "benfica" || $ligne[0] == "BENFICA") {
        echo "<img src='images/benfica.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Galatasaray" || $ligne[0] == "galatasaray" || $ligne[0] == "GALATASARAY") {
        echo "<img src='images/galatasaray.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Juventus" || $ligne[0] == "juventus" || $ligne[0] == "JUVENTUS") {
        echo "<img src='images/juventus.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "fenerbahce" || $ligne[0] == "Fenerbahce" || $ligne[0] == "FENERBAHCE") {
        echo "<img src='images/fenerbahce.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Milan" || $ligne[0] == "milan" || $ligne[0] == "MILAN") {
        echo "<img src='images/milan.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Roma" || $ligne[0] == "rome" || $ligne[0] == "ROMA") {
        echo "<img src='images/rome.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Inter" || $ligne[0] == "inter" || $ligne[0] == "INTER") {
        echo "<img src='images/inter.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Naples" || $ligne[0] == "naples" || $ligne[0] == "NAPLES") {
        echo "<img src='images/naples.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Lazio" || $ligne[0] == "lazio" || $ligne[0] == "LAZIO") {
        echo "<img src='images/lazio.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "PSG" || $ligne[0] == "psg" || $ligne[0] == "Paris") {
        echo "<img src='images/psg.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Om" || $ligne[0] == "om" || $ligne[0] == "OM") {
        echo "<img src='images/om.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Lyon" || $ligne[0] == "lyon" || $ligne[0] == "LYON" || $ligne[0] == "OL" || $ligne[0] == "ol") {
        echo "<img src='images/lyon.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Lille" || $ligne[0] == "lille" || $ligne[0] == "LILLE" || $ligne[0] == "Losc" || $ligne[0] == "LOSC") {
        echo "<img src='images/lille.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Monaco" || $ligne[0] == "monaco" || $ligne[0] == "MONACO") {
        echo "<img src='images/monaco.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Dortmund" || $ligne[0] == "dortmund" || $ligne[0] == "DORTMUND") {
        echo "<img src='images/dortmund.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Leverkusen" || $ligne[0] == "leverkusen" || $ligne[0] == "LEVERKUSEN") {
        echo "<img src='images/leverkusen.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Shalke" || $ligne[0] == "shalke" || $ligne[0] == "SHALKE") {
        echo "<img src='images/shalke.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Bayern" || $ligne[0] == "bayern" || $ligne[0] == "BAYERN") {
        echo "<img src='images/bayern.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Hambourg" || $ligne[0] == "hambourg" || $ligne[0] == "HAMBOURG") {
        echo "<img src='images/hambourg.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Werder" || $ligne[0] == "werder" || $ligne[0] == "WERDER") {
        echo "<img src='images/werder.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Wolfsburg" || $ligne[0] == "wolfsburg" || $ligne[0] == "WOLFSBURG") {
        echo "<img src='images/wolfsburg.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Barca" || $ligne[0] == "barca" || $ligne[0] == "BARCA") {
        echo "<img src='images/barca.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Real" || $ligne[0] == "real" || $ligne[0] == "REAL") {
        echo "<img src='images/real.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Seville" || $ligne[0] == "seville" || $ligne[0] == "SEVILLE") {
        echo "<img src='images/seville.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Sociedad" || $ligne[0] == "sociedad" || $ligne[0] == "SOCIEDAD") {
        echo "<img src='images/sociedad.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Bilbao" || $ligne[0] == "bilbao" || $ligne[0] == "BILBAO") {
        echo "<img src='images/bilbao.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Valence" || $ligne[0] == "valence" || $ligne[0] == "VALENCE") {
        echo "<img src='images/valence.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Atletico" || $ligne[0] == "atletico" || $ligne[0] == "ATLETICO") {
        echo "<img src='images/atletico.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Malaga" || $ligne[0] == "malaga" || $ligne[0] == "MALAGA") {
        echo "<img src='images/malaga.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Liverpool" || $ligne[0] == "liverpool" || $ligne[0] == "LIVERPOOL") {
        echo "<img src='images/liverpool.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Arsenal" || $ligne[0] == "arsenal" || $ligne[0] == "ARSENAL") {
        echo "<img src='images/arsenal.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Newcastle" || $ligne[0] == "newcastle" || $ligne[0] == "NEWCASTLE") {
        echo "<img src='images/newcastle.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Tottenham" || $ligne[0] == "tottenham" || $ligne[0] == "TOTTENHAM") {
        echo "<img src='images/tottenham.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Manchester United" || $ligne[0] == "MAN U" || $ligne[0] == "manu" || $ligne[0] == "MANCHESTER UNITED") {
        echo "<img src='images/manu.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Manchester City" || $ligne[0] == "CITY" || $ligne[0] == "city") {
        echo "<img src='images/city.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Chelsea" || $ligne[0] == "chelsea" || $ligne[0] == "CHELSEA") {
        echo "<img src='images/chelsea.png' width='30px' height='30px'>";
    }
    if ($ligne[0] == "Everton" || $ligne[0] == "everton" || $ligne[0] == "EVERTON") {
        echo "<img src='images/everton.png' width='30px' height='30px'>";
    }
    ?>
    </td>
    <td style="text-align:center;">
        <?php
        echo strtoupper($ligne[0]);
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select joueur from joueur where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $value = mysql_result($requete, 0);
        echo $value;
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select mj_classement from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select victoire from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select nul from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select defaite from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select bp from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select bc from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select diff from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    <td style="text-align:center;">
        <?php
        $sql = "select points from classement where nom_tournoi = '$name' and equipe = '$ligne[0]';";
        $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
        $nblignes = mysql_num_rows($requete);
        if ($nblignes != 0) {
            $resultat = mysql_result($requete, 0);
            echo $resultat;
        }
        ?>
    </td>
    </tr>
    <?php $i++;
} ?>
</tbody>
</table>
<br><br>
<table class="table table-bordered table-striped table-condensed table-hover">
    <thead>
    <th>Joueur</th>
    <?php
    $sql = "select equipe from classement where nom_tournoi = '$name' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;";
    $request = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $i = 1;
    while ($ligne = mysql_fetch_array($request)) {?>
    <th>
        <p>
    <?php
    $sql = "select joueur from joueur where nom_tournoi = '$name' and equipe = '$ligne[0]';";
    $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $value = mysql_result($requete, 0);
    echo $value;
    ?>
        </p>
    </th>
    <?php }?>
    </thead>
    <tbody>
    <?php
    $sql = "select equipe from classement where nom_tournoi = '$name' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;";
    $request = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $i = 1;
    while ($ligne = mysql_fetch_array($request)) {?>
    <tr>
        <td>
            <?php
            $sql = "select joueur from joueur where nom_tournoi = '$name' and equipe = '$ligne[0]';";
            $requete = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
            $value = mysql_result($requete, 0);
            echo $value;
            ?>
        </td>
        <?php
        $sql2 = "select equipe from classement where nom_tournoi = '$name' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;";
        $request2 = mysql_query($sql2) or die('Erreur SQL !<br>' . $sqlcount2 . '<br>' . mysql_error());
        $j = 1;
        while ($val = mysql_fetch_array($request2)) {?>
            <?php
            if($val[0] == $value){
                echo "<td style='bgcolor:black'></td>";
            } else {
                echo "<td></td>";
            }
            ?>
        <?php }?>
    </tr>
    <?php }?>
    </tbody>
</table>

<br>
</fieldset>
</form>
</div>
</div>
<div class="row-fluid">
    <div class="offset3 span3">
        <a class="btn btn-medium btn-warning" href="../tournoi" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>
    </div>
    <?php
    if ($nb > 7) {
        ?>
        <div class="span2">
            <a class="btn btn-medium btn-success" href="quart_final.php?name=<?php echo $name; ?>"
               width="100px" height="30px">Quart de Finale</a>
        </div>
    <?php } ?>
    <div class="span3">
        <a class="btn btn-medium btn-success" href="demie_final.php?name=<?php echo $name; ?>" width="100px"
           height="30px">Demie Finale</a>
    </div>
</div>
<br><br><br><br><br><br>
</body>
<script src="../js/jquery.js"></script>
<script>
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
</script>
</html>