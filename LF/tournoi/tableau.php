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

$sqlcount = $mysqli->query("select mode from tournoi where nom_tournoi = '$name' and login = '$login';");
$row = $sqlcount->fetch_array();
$mode = $row[0];

$sqlcount = $mysqli->query("select nombre_tournoi from tournoi where nom_tournoi = '$name' and login = '$login';");
$row = $sqlcount->fetch_array();
$nb = $row[0];

if ($mode == 'coupe' && $nb == 8) {
    header('Location: quarts.php?name=' . $name . '&nb=' . $nb . '');
    exit();
} else if ($mode == 'coupe' && $nb == 16) {
    header('Location: huitiemes.php?name=' . $name . '&nb=' . $nb . '');
    exit();
}

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
    /****************    ar    ***************/
    if ($result_dom == "allboys") {
        echo "<img src='images/allboys.png' width='30px' height='30px'>";
    }
    if ($result_dom == "argentinosjuniors") {
        echo "<img src='images/argentinosjuniors.png' width='30px' height='30px'>";
    }
    if ($result_dom == "arsenalsarandi") {
        echo "<img src='images/arsenalsarandi.png' width='30px' height='30px'>";
    }
    if ($result_dom == "atlrafaela") {
        echo "<img src='images/atlrafaela.png' width='30px' height='30px'>";
    }
    if ($result_dom == "banfield") {
        echo "<img src='images/banfield.png' width='30px' height='30px'>";
    }
    if ($result_dom == "belgrano") {
        echo "<img src='images/belgrano.png' width='30px' height='30px'>";
    }
    if ($result_dom == "boca") {
        echo "<img src='images/boca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "casla") {
        echo "<img src='images/casla.png' width='30px' height='30px'>";
    }
    if ($result_dom == "catigre") {
        echo "<img src='images/catigre.png' width='30px' height='30px'>";
    }
    if ($result_dom == "colon") {
        echo "<img src='images/colon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "estudianteslp") {
        echo "<img src='images/estudianteslp.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gimnasialaplata") {
        echo "<img src='images/gimnasialaplata.png' width='30px' height='30px'>";
    }
    if ($result_dom == "godoycruz") {
        echo "<img src='images/godoycruz.png' width='30px' height='30px'>";
    }
    if ($result_dom == "huracan") {
        echo "<img src='images/huracan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "independiente") {
        echo "<img src='images/independiente.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lanus") {
        echo "<img src='images/lanus.png' width='30px' height='30px'>";
    }
    if ($result_dom == "newellsoldboys") {
        echo "<img src='images/newellsoldboys.png' width='30px' height='30px'>";
    }
    if ($result_dom == "olimpo") {
        echo "<img src='images/olimpo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "quilmes") {
        echo "<img src='images/quilmes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "racingclub") {
        echo "<img src='images/racingclub.png' width='30px' height='30px'>";
    }
    if ($result_dom == "river") {
        echo "<img src='images/river.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sanmartinsj") {
        echo "<img src='images/sanmartinsj.png' width='30px' height='30px'>";
    }
    if ($result_dom == "unionsantafe") {
        echo "<img src='images/unionsantafe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "velezsarsfield") {
        echo "<img src='images/velezsarsfield.png' width='30px' height='30px'>";
    }
    /****************    at    ***************/
    if ($result_dom == "austriawien") {
        echo "<img src='images/austriawien.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcadmira") {
        echo "<img src='images/fcadmira.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grodig") {
        echo "<img src='images/grodig.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kapfenbergersv") {
        echo "<img src='images/kapfenbergersv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rapidwien") {
        echo "<img src='images/rapidwien.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rbsalzburg") {
        echo "<img src='images/rbsalzburg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sturmgraz") {
        echo "<img src='images/sturmgraz.png' width='30px' height='30px'>";
    }
    if ($result_dom == "svmattersburg") {
        echo "<img src='images/svmattersburg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "svried") {
        echo "<img src='images/svried.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wackerinnsbruck") {
        echo "<img src='images/wackerinnsbruck.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wienerneustadt") {
        echo "<img src='images/wienerneustadt.png' width='30px' height='30px'>";
    }
    /****************    au    ***************/
    if ($result_dom == "adelaideunited") {
        echo "<img src='images/adelaideunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "brisbaneroar") {
        echo "<img src='images/brisbaneroar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ccmariners") {
        echo "<img src='images/ccmariners.png' width='30px' height='30px'>";
    }
    if ($result_dom == "goldcoastunited") {
        echo "<img src='images/goldcoastunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "melbourneheart") {
        echo "<img src='images/melbourneheart.png' width='30px' height='30px'>";
    }
    if ($result_dom == "melbournevictory") {
        echo "<img src='images/melbournevictory.png' width='30px' height='30px'>";
    }
    if ($result_dom == "newcastlejets") {
        echo "<img src='images/newcastlejets.png' width='30px' height='30px'>";
    }
    if ($result_dom == "perthglory") {
        echo "<img src='images/perthglory.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sydneyfc") {
        echo "<img src='images/sydneyfc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "westernsydneywfc") {
        echo "<img src='images/westernsydneywfc.png' width='30px' height='30px'>";
    }
    /****************    az    ***************/
    if ($result_dom == "bakufk") {
        echo "<img src='images/bakufk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "interpik") {
        echo "<img src='images/interpik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lankaran") {
        echo "<img src='images/lankaran.png' width='30px' height='30px'>";
    }
    if ($result_dom == "neftci") {
        echo "<img src='images/neftci.png' width='30px' height='30px'>";
    }
    if ($result_dom == "qarabag") {
        echo "<img src='images/qarabag.png' width='30px' height='30px'>";
    }
    /****************    be    ***************/
    if ($result_dom == "afctubize") {
        echo "<img src='images/afctubize.png' width='30px' height='30px'>";
    }
    if ($result_dom == "antwerp") {
        echo "<img src='images/antwerp.png' width='30px' height='30px'>";
    }
    if ($result_dom == "aseupen") {
        echo "<img src='images/aseupen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "beerschot") {
        echo "<img src='images/beerschot.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bossudour") {
        echo "<img src='images/bossudour.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cerclebrugge") {
        echo "<img src='images/cerclebrugge.png' width='30px' height='30px'>";
    }
    if ($result_dom == "charleroi") {
        echo "<img src='images/charleroi.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cubbrugge") {
        echo "<img src='images/cubbrugge.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eendrachtaalst") {
        echo "<img src='images/eendrachtaalst.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcbrussels") {
        echo "<img src='images/fcbrussels.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcdender") {
        echo "<img src='images/fcdender.png' width='30px' height='30px'>";
    }
    if ($result_dom == "genk") {
        echo "<img src='images/genk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gent") {
        echo "<img src='images/gent.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kortrijk") {
        echo "<img src='images/kortrijk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kskheist") {
        echo "<img src='images/kskheist.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ksvroeselare") {
        echo "<img src='images/ksvroeselare.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kvktienen") {
        echo "<img src='images/kvktienen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kvoostende") {
        echo "<img src='images/kvoostende.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lierse") {
        echo "<img src='images/lierse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lokeren") {
        echo "<img src='images/lokeren.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lommelunited") {
        echo "<img src='images/lommelunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mechelen") {
        echo "<img src='images/mechelen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mons") {
        echo "<img src='images/mons.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ohl") {
        echo "<img src='images/ohl.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rsca") {
        echo "<img src='images/rsca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rscl") {
        echo "<img src='images/rscl.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sintniklaas") {
        echo "<img src='images/sintniklaas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sinttruidense") {
        echo "<img src='images/sinttruidense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vise") {
        echo "<img src='images/vise.png' width='30px' height='30px'>";
    }
    if ($result_dom == "waaslandbeveren") {
        echo "<img src='images/waaslandbeveren.png' width='30px' height='30px'>";
    }
    if ($result_dom == "westerlo") {
        echo "<img src='images/westerlo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wetteren") {
        echo "<img src='images/wetteren.png' width='30px' height='30px'>";
    }
    if ($result_dom == "whitestar") {
        echo "<img src='images/whitestar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zultewaregem") {
        echo "<img src='images/zultewaregem.png' width='30px' height='30px'>";
    }
    /****************    bg    ***************/
    if ($result_dom == "cskasofiya") {
        echo "<img src='images/cskasofiya.png' width='30px' height='30px'>";
    }
    if ($result_dom == "levskisofiya") {
        echo "<img src='images/levskisofiya.png' width='30px' height='30px'>";
    }
    if ($result_dom == "litexlovech") {
        echo "<img src='images/litexlovech.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lokoplovdiv") {
        echo "<img src='images/lokoplovdiv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lokosofiya") {
        echo "<img src='images/lokosofiya.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slaviasofiya") {
        echo "<img src='images/slaviasofiya.png' width='30px' height='30px'>";
    }
    /****************    bih    ***************/
    if ($result_dom == "boracbanjaluka") {
        echo "<img src='images/boracbanjaluka.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkleotar") {
        echo "<img src='images/fkleotar.png' width='30px' height='30px'>";
    }
    /****************    blr    ***************/
    if ($result_dom == "bate") {
        echo "<img src='images/bate.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dinamominsk") {
        echo "<img src='images/dinamominsk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "shakhtyorsoligorsk") {
        echo "<img src='images/shakhtyorsoligorsk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slaviyamozyr") {
        echo "<img src='images/slaviyamozyr.png' width='30px' height='30px'>";
    }
    /****************    br    ***************/
    if ($result_dom == "acgoianiense") {
        echo "<img src='images/acgoianiense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "americamineiro") {
        echo "<img src='images/americamineiro.png' width='30px' height='30px'>";
    }
    if ($result_dom == "atleticomineiro") {
        echo "<img src='images/atleticomineiro.png' width='30px' height='30px'>";
    }
    if ($result_dom == "avai") {
        echo "<img src='images/avai.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bahia") {
        echo "<img src='images/bahia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "botafogo") {
        echo "<img src='images/botafogo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ceara") {
        echo "<img src='images/ceara.png' width='30px' height='30px'>";
    }
    if ($result_dom == "corinthians") {
        echo "<img src='images/corinthians.png' width='30px' height='30px'>";
    }
    if ($result_dom == "coritiba") {
        echo "<img src='images/coritiba.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cruzeiro") {
        echo "<img src='images/cruzeiro.png' width='30px' height='30px'>";
    }
    if ($result_dom == "figueirense") {
        echo "<img src='images/figueirense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "flamengo") {
        echo "<img src='images/flamengo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fluminense") {
        echo "<img src='images/fluminense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gremio") {
        echo "<img src='images/gremio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "internacional") {
        echo "<img src='images/internacional.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nrecife") {
        echo "<img src='images/nrecife.png' width='30px' height='30px'>";
    }
    if ($result_dom == "palmeiras") {
        echo "<img src='images/palmeiras.png' width='30px' height='30px'>";
    }
    if ($result_dom == "paranaense") {
        echo "<img src='images/paranaense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pontepreta") {
        echo "<img src='images/pontepreta.png' width='30px' height='30px'>";
    }
    if ($result_dom == "portuguesa") {
        echo "<img src='images/portuguesa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "santos") {
        echo "<img src='images/santos.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saopaulo") {
        echo "<img src='images/saopaulo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "srecife") {
        echo "<img src='images/srecife.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vasco") {
        echo "<img src='images/vasco.png' width='30px' height='30px'>";
    }
    /****************    ca    ***************/
    if ($result_dom == "serbianwhiteeagles") {
        echo "<img src='images/serbianwhiteeagles.png' width='30px' height='30px'>";
    }
    if ($result_dom == "torontofc") {
        echo "<img src='images/torontofc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vanwcaps") {
        echo "<img src='images/vanwcaps.png' width='30px' height='30px'>";
    }
    /****************    cg    ***************/
    if ($result_dom == "buducnostpodgo") {
        echo "<img src='images/buducnostpodgo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkbokelj") {
        echo "<img src='images/fkbokelj.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fksutjeska") {
        echo "<img src='images/fksutjeska.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mladostpodgorica") {
        echo "<img src='images/mladostpodgorica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mogrenbudva") {
        echo "<img src='images/mogrenbudva.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ofkgrbalj") {
        echo "<img src='images/ofkgrbalj.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ofkpetrovac") {
        echo "<img src='images/ofkpetrovac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rudarpljevlja") {
        echo "<img src='images/rudarpljevlja.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zetagolubovci") {
        echo "<img src='images/zetagolubovci.png' width='30px' height='30px'>";
    }
    /****************    ch    ***************/
    if ($result_dom == "fcbasel") {
        echo "<img src='images/fcbasel.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcluzern") {
        echo "<img src='images/fcluzern.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcsion") {
        echo "<img src='images/fcsion.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fczurich") {
        echo "<img src='images/fczurich.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grasshopper") {
        echo "<img src='images/grasshopper.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lausanne") {
        echo "<img src='images/lausanne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nxamax") {
        echo "<img src='images/nxamax.png' width='30px' height='30px'>";
    }
    if ($result_dom == "servette") {
        echo "<img src='images/servette.png' width='30px' height='30px'>";
    }
    if ($result_dom == "thun") {
        echo "<img src='images/thun.png' width='30px' height='30px'>";
    }
    if ($result_dom == "youngboys") {
        echo "<img src='images/youngboys.png' width='30px' height='30px'>";
    }
    /****************    cl    ***************/
    if ($result_dom == "colocolo") {
        echo "<img src='images/colocolo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "unionespanola") {
        echo "<img src='images/unionespanola.png' width='30px' height='30px'>";
    }
    if ($result_dom == "univcatolica") {
        echo "<img src='images/univcatolica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "univdechile") {
        echo "<img src='images/univdechile.png' width='30px' height='30px'>";
    }
    /****************    co    ***************/
    if ($result_dom == "atleticonacional") {
        echo "<img src='images/atleticonacional.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cdamerica") {
        echo "<img src='images/cdamerica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "independientemed") {
        echo "<img src='images/independientemed.png' width='30px' height='30px'>";
    }
    if ($result_dom == "millonariosfc") {
        echo "<img src='images/millonariosfc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "oncecaldas") {
        echo "<img src='images/oncecaldas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "santafe") {
        echo "<img src='images/santafe.png' width='30px' height='30px'>";
    }
    /****************    cy    ***************/
    if ($result_dom == "acomonia") {
        echo "<img src='images/acomonia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "anorthosisfamagusta") {
        echo "<img src='images/anorthosisfamagusta.png' width='30px' height='30px'>";
    }
    if ($result_dom == "apoel") {
        echo "<img src='images/apoel.png' width='30px' height='30px'>";
    }
    if ($result_dom == "limassol") {
        echo "<img src='images/limassol.png' width='30px' height='30px'>";
    }
    /****************    cz    ***************/
    if ($result_dom == "mladaboleslav") {
        echo "<img src='images/mladaboleslav.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sigmaolomouc") {
        echo "<img src='images/sigmaolomouc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slaviapraha") {
        echo "<img src='images/slaviapraha.png' width='30px' height='30px'>";
    }
    if ($result_dom == "spartapraha") {
        echo "<img src='images/spartapraha.png' width='30px' height='30px'>";
    }
    if ($result_dom == "viktoriaplzen") {
        echo "<img src='images/viktoriaplzen.png' width='30px' height='30px'>";
    }
    /****************    de    ***************/
    if ($result_dom == "1fcunionberlin") {
        echo "<img src='images/1fcunionberlin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "alemanniaaachen") {
        echo "<img src='images/alemanniaaachen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "augsburg") {
        echo "<img src='images/augsburg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bayern") {
        echo "<img src='images/bayern.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dortmund") {
        echo "<img src='images/dortmund.png' width='30px' height='30px'>";
    }
    if ($result_dom == "efrankfurt") {
        echo "<img src='images/efrankfurt.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcenergiecottbus") {
        echo "<img src='images/fcenergiecottbus.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcerzgebirgeaue") {
        echo "<img src='images/fcerzgebirgeaue.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fchansarostock") {
        echo "<img src='images/fchansarostock.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fortunadusseldorf") {
        echo "<img src='images/fortunadusseldorf.png' width='30px' height='30px'>";
    }
    if ($result_dom == "francfort") {
        echo "<img src='images/francfort.png' width='30px' height='30px'>";
    }
    if ($result_dom == "freiburg") {
        echo "<img src='images/freiburg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "greuther") {
        echo "<img src='images/greuther.png' width='30px' height='30px'>";
    }
    if ($result_dom == "greutherfurth") {
        echo "<img src='images/greutherfurth.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hamburger") {
        echo "<img src='images/hamburger.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hannover") {
        echo "<img src='images/hannover.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hertha") {
        echo "<img src='images/hertha.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hoffenheim") {
        echo "<img src='images/hoffenheim.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ingolstadt") {
        echo "<img src='images/ingolstadt.png' width='30px' height='30px'>";
    }
    if ($result_dom == "karlsruhersc") {
        echo "<img src='images/karlsruhersc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "klautern") {
        echo "<img src='images/klautern.png' width='30px' height='30px'>";
    }
    if ($result_dom == "koln") {
        echo "<img src='images/koln.png' width='30px' height='30px'>";
    }
    if ($result_dom == "leverkusen") {
        echo "<img src='images/leverkusen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mainz") {
        echo "<img src='images/mainz.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mgladbach") {
        echo "<img src='images/mgladbach.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nurnberg") {
        echo "<img src='images/nurnberg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sanktpauli") {
        echo "<img src='images/sanktpauli.png' width='30px' height='30px'>";
    }
    if ($result_dom == "schalke") {
        echo "<img src='images/schalke.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sgdynamodresden") {
        echo "<img src='images/sgdynamodresden.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stuttgart") {
        echo "<img src='images/stuttgart.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tsv1860munchen") {
        echo "<img src='images/tsv1860munchen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "werder") {
        echo "<img src='images/werder.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wolfsburg") {
        echo "<img src='images/wolfsburg.png' width='30px' height='30px'>";
    }
    /****************    dk    ***************/
    if ($result_dom == "aalborgbk") {
        echo "<img src='images/aalborgbk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "achorsens") {
        echo "<img src='images/achorsens.png' width='30px' height='30px'>";
    }
    if ($result_dom == "agfaarhus") {
        echo "<img src='images/agfaarhus.png' width='30px' height='30px'>";
    }
    if ($result_dom == "brondbyif") {
        echo "<img src='images/brondbyif.png' width='30px' height='30px'>";
    }
    if ($result_dom == "esbjerg") {
        echo "<img src='images/esbjerg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kobenhavn") {
        echo "<img src='images/kobenhavn.png' width='30px' height='30px'>";
    }
    if ($result_dom == "midtjylland") {
        echo "<img src='images/midtjylland.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nordsjaelland") {
        echo "<img src='images/nordsjaelland.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nordsjalland") {
        echo "<img src='images/nordsjalland.png' width='30px' height='30px'>";
    }
    if ($result_dom == "odensebk") {
        echo "<img src='images/odensebk.png' width='30px' height='30px'>";
    }
    /****************    dz    ***************/
    if ($result_dom == "crbelouizdad") {
        echo "<img src='images/crbelouizdad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "essetif") {
        echo "<img src='images/essetif.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jskabylie") {
        echo "<img src='images/jskabylie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mcalger") {
        echo "<img src='images/mcalger.png' width='30px' height='30px'>";
    }
    if ($result_dom == "usmalger") {
        echo "<img src='images/usmalger.png' width='30px' height='30px'>";
    }
    /****************    ee    ***************/
    if ($result_dom == "fcflora") {
        echo "<img src='images/fcflora.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fclevadia") {
        echo "<img src='images/fclevadia.png' width='30px' height='30px'>";
    }
    /****************    eg    ***************/
    if ($result_dom == "alahly") {
        echo "<img src='images/alahly.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zamalek") {
        echo "<img src='images/zamalek.png' width='30px' height='30px'>";
    }
    /****************    en    ***************/
    if ($result_dom == "arsenal") {
        echo "<img src='images/arsenal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "astonvilla") {
        echo "<img src='images/astonvilla.png' width='30px' height='30px'>";
    }
    if ($result_dom == "barnsley") {
        echo "<img src='images/barnsley.png' width='30px' height='30px'>";
    }
    if ($result_dom == "birminghamcity") {
        echo "<img src='images/birminghamcity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "blackburn") {
        echo "<img src='images/blackburn.png' width='30px' height='30px'>";
    }
    if ($result_dom == "blackpool") {
        echo "<img src='images/blackpool.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bolton") {
        echo "<img src='images/bolton.png' width='30px' height='30px'>";
    }
    if ($result_dom == "brightonhovealbion") {
        echo "<img src='images/brightonhovealbion.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bristolcity") {
        echo "<img src='images/bristolcity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "burnley") {
        echo "<img src='images/burnley.png' width='30px' height='30px'>";
    }
    if ($result_dom == "charltonathletic") {
        echo "<img src='images/charltonathletic.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chelsea") {
        echo "<img src='images/chelsea.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cheltenham") {
        echo "<img src='images/cheltenham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "conventrycity") {
        echo "<img src='images/conventrycity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "crystalpalace") {
        echo "<img src='images/crystalpalace.png' width='30px' height='30px'>";
    }
    if ($result_dom == "derbycounty") {
        echo "<img src='images/derbycounty.png' width='30px' height='30px'>";
    }
    if ($result_dom == "doncasterrovers") {
        echo "<img src='images/doncasterrovers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "everton") {
        echo "<img src='images/everton.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fulham") {
        echo "<img src='images/fulham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hartlepool") {
        echo "<img src='images/hartlepool.png' width='30px' height='30px'>";
    }
    if ($result_dom == "huddersfield") {
        echo "<img src='images/huddersfield.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hullcity") {
        echo "<img src='images/hullcity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ipswichtown") {
        echo "<img src='images/ipswichtown.png' width='30px' height='30px'>";
    }
    if ($result_dom == "leedsutd") {
        echo "<img src='images/leedsutd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "leicestercity") {
        echo "<img src='images/leicestercity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "liverpool") {
        echo "<img src='images/liverpool.png' width='30px' height='30px'>";
    }
    if ($result_dom == "city") {
        echo "<img src='images/mancity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "manu") {
        echo "<img src='images/manutd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "middlesbrough") {
        echo "<img src='images/middlesbrough.png' width='30px' height='30px'>";
    }
    if ($result_dom == "millwall") {
        echo "<img src='images/millwall.png' width='30px' height='30px'>";
    }
    if ($result_dom == "newcastle") {
        echo "<img src='images/newcastle.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nforest") {
        echo "<img src='images/nforest.png' width='30px' height='30px'>";
    }
    if ($result_dom == "norwich") {
        echo "<img src='images/norwich.png' width='30px' height='30px'>";
    }
    if ($result_dom == "peterboroughunited") {
        echo "<img src='images/peterboroughunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "portsmouth") {
        echo "<img src='images/portsmouth.png' width='30px' height='30px'>";
    }
    if ($result_dom == "qpr") {
        echo "<img src='images/qpr.png' width='30px' height='30px'>";
    }
    if ($result_dom == "reading") {
        echo "<img src='images/reading.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sheffieldunited") {
        echo "<img src='images/sheffieldunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sheffieldwednesday") {
        echo "<img src='images/sheffieldwednesday.png' width='30px' height='30px'>";
    }
    if ($result_dom == "southampton") {
        echo "<img src='images/southampton.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stoke") {
        echo "<img src='images/stoke.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sunderland") {
        echo "<img src='images/sunderland.png' width='30px' height='30px'>";
    }
    if ($result_dom == "torquay") {
        echo "<img src='images/torquay.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tottenham") {
        echo "<img src='images/tottenham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "watford") {
        echo "<img src='images/watford.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wba") {
        echo "<img src='images/wba.png' width='30px' height='30px'>";
    }
    if ($result_dom == "westham") {
        echo "<img src='images/westham.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wigan") {
        echo "<img src='images/wigan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wolves") {
        echo "<img src='images/wolves.png' width='30px' height='30px'>";
    }
    /****************    es    ***************/
    if ($result_dom == "atletico") {
        echo "<img src='images/atletico.png' width='30px' height='30px'>";
    }
    if ($result_dom == "barca") {
        echo "<img src='images/barca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "barcab") {
        echo "<img src='images/barcab.png' width='30px' height='30px'>";
    }
    if ($result_dom == "betis") {
        echo "<img src='images/betis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bilbao") {
        echo "<img src='images/bilbao.png' width='30px' height='30px'>";
    }
    if ($result_dom == "celta vigo") {
        echo "<img src='images/celta vigo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "espanyol") {
        echo "<img src='images/espanyol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "getafe") {
        echo "<img src='images/getafe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gijon") {
        echo "<img src='images/gijon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "granada") {
        echo "<img src='images/granada.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lacorogne") {
        echo "<img src='images/lacorogne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "levante") {
        echo "<img src='images/levante.png' width='30px' height='30px'>";
    }
    if ($result_dom == "malaga") {
        echo "<img src='images/malaga.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mallorca") {
        echo "<img src='images/mallorca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "osasuna") {
        echo "<img src='images/osasuna.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rayo") {
        echo "<img src='images/rayo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "real") {
        echo "<img src='images/real.png' width='30px' height='30px'>";
    }
    if ($result_dom == "realb") {
        echo "<img src='images/realb.png' width='30px' height='30px'>";
    }
    if ($result_dom == "santander") {
        echo "<img src='images/santander.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sevilla") {
        echo "<img src='images/sevilla.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sociedad") {
        echo "<img src='images/sociedad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "valence") {
        echo "<img src='images/valencia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "valladolid") {
        echo "<img src='images/valladolid.png' width='30px' height='30px'>";
    }
    if ($result_dom == "villareal") {
        echo "<img src='images/villareal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zaragoza") {
        echo "<img src='images/zaragoza.png' width='30px' height='30px'>";
    }
    /****************    fi    ***************/
    if ($result_dom == "fchonka") {
        echo "<img src='images/fchonka.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hjkhelsinki") {
        echo "<img src='images/hjkhelsinki.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jjkjyvaskyla") {
        echo "<img src='images/jjkjyvaskyla.png' width='30px' height='30px'>";
    }
    /****************    fo    ***************/
    if ($result_dom == "b36torshavn") {
        echo "<img src='images/b36torshavn.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hbtorshavn") {
        echo "<img src='images/hbtorshavn.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kiklaksvik") {
        echo "<img src='images/kiklaksvik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vikingur") {
        echo "<img src='images/vikingur.png' width='30px' height='30px'>";
    }
    /****************    fr    ***************/
    if ($result_dom == "acaa") {
        echo "<img src='images/acaa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "acajaccio") {
        echo "<img src='images/acajaccio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "aja") {
        echo "<img src='images/aja.png' width='30px' height='30px'>";
    }
    if ($result_dom == "amiens") {
        echo "<img src='images/amiens.png' width='30px' height='30px'>";
    }
    if ($result_dom == "angers") {
        echo "<img src='images/angers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "asm") {
        echo "<img src='images/asm.png' width='30px' height='30px'>";
    }
    if ($result_dom == "asnl") {
        echo "<img src='images/asnl.png' width='30px' height='30px'>";
    }
    if ($result_dom == "assaintpriest") {
        echo "<img src='images/assaintpriest.png' width='30px' height='30px'>";
    }
    if ($result_dom == "asse") {
        echo "<img src='images/asse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bastia") {
        echo "<img src='images/bastia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bayonne") {
        echo "<img src='images/bayonne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bdx") {
        echo "<img src='images/bdx.png' width='30px' height='30px'>";
    }
    if ($result_dom == "beauvais") {
        echo "<img src='images/beauvais.png' width='30px' height='30px'>";
    }
    if ($result_dom == "besancon") {
        echo "<img src='images/besancon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bourgperonnas") {
        echo "<img src='images/bourgperonnas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "brest") {
        echo "<img src='images/brest.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cabastia") {
        echo "<img src='images/cabastia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "caen") {
        echo "<img src='images/caen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cannes") {
        echo "<img src='images/cannes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chateauroux") {
        echo "<img src='images/chateauroux.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cherbourg") {
        echo "<img src='images/cherbourg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "clermont") {
        echo "<img src='images/clermont.png' width='30px' height='30px'>";
    }
    if ($result_dom == "colmar") {
        echo "<img src='images/colmar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "creteil") {
        echo "<img src='images/creteil.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dijon") {
        echo "<img src='images/dijon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eag") {
        echo "<img src='images/eag.png' width='30px' height='30px'>";
    }
    if ($result_dom == "epinal") {
        echo "<img src='images/epinal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "estac") {
        echo "<img src='images/estac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eswasquehal") {
        echo "<img src='images/eswasquehal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "evian") {
        echo "<img src='images/evian.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcdijonparc") {
        echo "<img src='images/fcdijonparc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcmulhouse") {
        echo "<img src='images/fcmulhouse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcn") {
        echo "<img src='images/fcn.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcsete") {
        echo "<img src='images/fcsete.png' width='30px' height='30px'>";
    }
    if ($result_dom == "frejusstraphael") {
        echo "<img src='images/frejusstraphael.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gf38") {
        echo "<img src='images/gf38.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gfcoajaccio") {
        echo "<img src='images/gfcoajaccio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hac") {
        echo "<img src='images/hac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "istres") {
        echo "<img src='images/istres.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jadrancy") {
        echo "<img src='images/jadrancy.png' width='30px' height='30px'>";
    }
    if ($result_dom == "laval") {
        echo "<img src='images/laval.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lemans") {
        echo "<img src='images/lemans.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lens") {
        echo "<img src='images/lens.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lorient") {
        echo "<img src='images/lorient.png' width='30px' height='30px'>";
    }
    if ($result_dom == "losc") {
        echo "<img src='images/losc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "luzenac") {
        echo "<img src='images/luzenac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "martigues") {
        echo "<img src='images/martigues.png' width='30px' height='30px'>";
    }
    if ($result_dom == "metz") {
        echo "<img src='images/metz.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mhsc") {
        echo "<img src='images/mhsc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nimesolympique") {
        echo "<img src='images/nimesolympique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "niort") {
        echo "<img src='images/niort.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ogcn") {
        echo "<img src='images/ogcn.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ol") {
        echo "<img src='images/ol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "om") {
        echo "<img src='images/om.png' width='30px' height='30px'>";
    }
    if ($result_dom == "orleans") {
        echo "<img src='images/orleans.png' width='30px' height='30px'>";
    }
    if ($result_dom == "parisfc") {
        echo "<img src='images/parisfc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "poiresurvie") {
        echo "<img src='images/poiresurvie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "psg") {
        echo "<img src='images/psg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "quevilly") {
        echo "<img src='images/quevilly.png' width='30px' height='30px'>";
    }
    if ($result_dom == "redstar") {
        echo "<img src='images/redstar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "reims") {
        echo "<img src='images/reims.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rennes") {
        echo "<img src='images/rennes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rouen") {
        echo "<img src='images/rouen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sedan") {
        echo "<img src='images/sedan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sochaux") {
        echo "<img src='images/sochaux.png' width='30px' height='30px'>";
    }
    if ($result_dom == "strasbourg") {
        echo "<img src='images/strasbourg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "toulouse") {
        echo "<img src='images/toulouse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tours") {
        echo "<img src='images/tours.png' width='30px' height='30px'>";
    }
    if ($result_dom == "usbco") {
        echo "<img src='images/usbco.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vafc") {
        echo "<img src='images/vafc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vannes") {
        echo "<img src='images/vannes.png' width='30px' height='30px'>";
    }
    /****************    gr    ***************/
    if ($result_dom == "aek") {
        echo "<img src='images/aek.png' width='30px' height='30px'>";
    }
    if ($result_dom == "olympiakos") {
        echo "<img src='images/olympiacos.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pana") {
        echo "<img src='images/pana.png' width='30px' height='30px'>";
    }
    if ($result_dom == "paok") {
        echo "<img src='images/paok.png' width='30px' height='30px'>";
    }
    /****************    hu    ***************/
    if ($result_dom == "bphonved") {
        echo "<img src='images/bphonved.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ferencvarosi") {
        echo "<img src='images/ferencvarosi.png' width='30px' height='30px'>";
    }
    if ($result_dom == "videoton") {
        echo "<img src='images/videoton.png' width='30px' height='30px'>";
    }
    /****************    ie    ***************/
    if ($result_dom == "bohemian") {
        echo "<img src='images/bohemian.png' width='30px' height='30px'>";
    }
    if ($result_dom == "braywanderers") {
        echo "<img src='images/braywanderers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "corkcity") {
        echo "<img src='images/corkcity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "derrycity") {
        echo "<img src='images/derrycity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "droghedaunited") {
        echo "<img src='images/droghedaunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dundalk") {
        echo "<img src='images/dundalk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "monaghanunited") {
        echo "<img src='images/monaghanunited.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saintpatricksathletic") {
        echo "<img src='images/saintpatricksathletic.png' width='30px' height='30px'>";
    }
    if ($result_dom == "shamrockrovers") {
        echo "<img src='images/shamrockrovers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "shelbourne") {
        echo "<img src='images/shelbourne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sligorovers") {
        echo "<img src='images/sligorovers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ucdublin") {
        echo "<img src='images/ucdublin.png' width='30px' height='30px'>";
    }
    /****************    il    ***************/
    if ($result_dom == "hapoelks") {
        echo "<img src='images/hapoelks.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hapoelta") {
        echo "<img src='images/hapoelta.png' width='30px' height='30px'>";
    }
    /****************    isl    ***************/
    if ($result_dom == "framreykjavik") {
        echo "<img src='images/framreykjavik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "iaakranes") {
        echo "<img src='images/iaakranes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "krreykjavik") {
        echo "<img src='images/krreykjavik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "valurreykjavik") {
        echo "<img src='images/valurreykjavik.png' width='30px' height='30px'>";
    }
    /****************    it    ***************/
    if ($result_dom == "acmilan") {
        echo "<img src='images/acmilan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "albinoleffe") {
        echo "<img src='images/albinoleffe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "asbari") {
        echo "<img src='images/asbari.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ascittadella") {
        echo "<img src='images/ascittadella.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ascolicalcio") {
        echo "<img src='images/ascolicalcio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "asgubbio") {
        echo "<img src='images/asgubbio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "asroma") {
        echo "<img src='images/asroma.png' width='30px' height='30px'>";
    }
    if ($result_dom == "atalanta") {
        echo "<img src='images/atalanta.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bologna") {
        echo "<img src='images/bologna.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bresciacalcio") {
        echo "<img src='images/bresciacalcio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cagliari") {
        echo "<img src='images/cagliari.png' width='30px' height='30px'>";
    }
    if ($result_dom == "calciopadova") {
        echo "<img src='images/calciopadova.png' width='30px' height='30px'>";
    }
    if ($result_dom == "catania") {
        echo "<img src='images/catania.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cesena") {
        echo "<img src='images/cesena.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chievo") {
        echo "<img src='images/chievo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "delfinopescara") {
        echo "<img src='images/delfinopescara.png' width='30px' height='30px'>";
    }
    if ($result_dom == "empoli") {
        echo "<img src='images/empoli.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fccrotone") {
        echo "<img src='images/fccrotone.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fiorentina") {
        echo "<img src='images/fiorentina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "genoa") {
        echo "<img src='images/genoa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "giovanilenocerina") {
        echo "<img src='images/giovanilenocerina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grosseto") {
        echo "<img src='images/grosseto.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hellasverona") {
        echo "<img src='images/hellasverona.png' width='30px' height='30px'>";
    }
    if ($result_dom == "inter") {
        echo "<img src='images/inter.png' width='30px' height='30px'>";
    }
    if ($result_dom == "juventus") {
        echo "<img src='images/juve.png' width='30px' height='30px'>";
    }
    if ($result_dom == "juvestabia") {
        echo "<img src='images/juvestabia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lazio") {
        echo "<img src='images/lazio.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lecce") {
        echo "<img src='images/lecce.png' width='30px' height='30px'>";
    }
    if ($result_dom == "livorno") {
        echo "<img src='images/livorno.png' width='30px' height='30px'>";
    }
    if ($result_dom == "modena") {
        echo "<img src='images/modena.png' width='30px' height='30px'>";
    }
    if ($result_dom == "naples") {
        echo "<img src='images/napoli.png' width='30px' height='30px'>";
    }
    if ($result_dom == "novara") {
        echo "<img src='images/novara.png' width='30px' height='30px'>";
    }
    if ($result_dom == "palermo") {
        echo "<img src='images/palermo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "parma") {
        echo "<img src='images/parma.png' width='30px' height='30px'>";
    }
    if ($result_dom == "reggina") {
        echo "<img src='images/reggina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sampdoria") {
        echo "<img src='images/sampdoria.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sassuolo") {
        echo "<img src='images/sassuolo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "siena") {
        echo "<img src='images/siena.png' width='30px' height='30px'>";
    }
    if ($result_dom == "torinofc") {
        echo "<img src='images/torinofc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "udinese") {
        echo "<img src='images/udinese.png' width='30px' height='30px'>";
    }
    if ($result_dom == "varese") {
        echo "<img src='images/varese.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vicenza") {
        echo "<img src='images/vicenza.png' width='30px' height='30px'>";
    }
    /****************    jp    ***************/
    if ($result_dom == "albirexniigata") {
        echo "<img src='images/albirexniigata.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cerezoosaka") {
        echo "<img src='images/cerezoosaka.png' width='30px' height='30px'>";
    }
    if ($result_dom == "consadolesapporo") {
        echo "<img src='images/consadolesapporo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fctokyo") {
        echo "<img src='images/fctokyo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gambaosaka") {
        echo "<img src='images/gambaosaka.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jubiloiwata") {
        echo "<img src='images/jubiloiwata.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kashimaantlers") {
        echo "<img src='images/kashimaantlers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kashiwareysol") {
        echo "<img src='images/kashiwareysol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kawasakifrontale") {
        echo "<img src='images/kawasakifrontale.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nagoyagrampus") {
        echo "<img src='images/nagoyagrampus.png' width='30px' height='30px'>";
    }
    if ($result_dom == "omiyaardija") {
        echo "<img src='images/omiyaardija.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sagantosu") {
        echo "<img src='images/sagantosu.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sanfreccehiroshima") {
        echo "<img src='images/sanfreccehiroshima.png' width='30px' height='30px'>";
    }
    if ($result_dom == "shimizuspulse") {
        echo "<img src='images/shimizuspulse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "urawareddiamonds") {
        echo "<img src='images/urawareddiamonds.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vegaltasendai") {
        echo "<img src='images/vegaltasendai.png' width='30px' height='30px'>";
    }
    if ($result_dom == "visselkobe") {
        echo "<img src='images/visselkobe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "yokohamafmarinos") {
        echo "<img src='images/yokohamafmarinos.png' width='30px' height='30px'>";
    }
    /****************    kr    ***************/
    if ($result_dom == "busanipark") {
        echo "<img src='images/busanipark.png' width='30px' height='30px'>";
    }
    if ($result_dom == "daejeoncitizen") {
        echo "<img src='images/daejeoncitizen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcseoul") {
        echo "<img src='images/fcseoul.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gyeongnam") {
        echo "<img src='images/gyeongnam.png' width='30px' height='30px'>";
    }
    if ($result_dom == "incheonutd") {
        echo "<img src='images/incheonutd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jejuutd") {
        echo "<img src='images/jejuutd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jeonbukhm") {
        echo "<img src='images/jeonbukhm.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pohangsteelers") {
        echo "<img src='images/pohangsteelers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "seongnamicfc") {
        echo "<img src='images/seongnamicfc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "suwonbluewings") {
        echo "<img src='images/suwonbluewings.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ulsanhfc") {
        echo "<img src='images/ulsanhfc.png' width='30px' height='30px'>";
    }
    /****************    lt    ***************/
    if ($result_dom == "fbkkaunas") {
        echo "<img src='images/fbkkaunas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkekranas") {
        echo "<img src='images/fkekranas.png' width='30px' height='30px'>";
    }
    /****************    lu    ***************/
    if ($result_dom == "differdange") {
        echo "<img src='images/differdange.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dudelange") {
        echo "<img src='images/dudelange.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grevenmacher") {
        echo "<img src='images/grevenmacher.png' width='30px' height='30px'>";
    }
    /****************    lv    ***************/
    if ($result_dom == "fcdaugava") {
        echo "<img src='images/fcdaugava.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkventspils") {
        echo "<img src='images/fkventspils.png' width='30px' height='30px'>";
    }
    if ($result_dom == "skontofc") {
        echo "<img src='images/skontofc.png' width='30px' height='30px'>";
    }
    /****************    ma    ***************/
    if ($result_dom == "asfarrabat") {
        echo "<img src='images/asfarrabat.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kenitraac") {
        echo "<img src='images/kenitraac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rajacasablanca") {
        echo "<img src='images/rajacasablanca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wydadcasablanca") {
        echo "<img src='images/wydadcasablanca.png' width='30px' height='30px'>";
    }
    /****************    md    ***************/
    if ($result_dom == "daciachisinau") {
        echo "<img src='images/daciachisinau.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sherifftiraspol") {
        echo "<img src='images/sherifftiraspol.png' width='30px' height='30px'>";
    }
    /****************    mk    ***************/
    if ($result_dom == "11oktomvri") {
        echo "<img src='images/11oktomvri.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bregalnicastip") {
        echo "<img src='images/bregalnicastip.png' width='30px' height='30px'>";
    }
    if ($result_dom == "horizontturnovo") {
        echo "<img src='images/horizontturnovo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "metalurgskopje") {
        echo "<img src='images/metalurgskopje.png' width='30px' height='30px'>";
    }
    if ($result_dom == "napredokkicevo") {
        echo "<img src='images/napredokkicevo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rabotnickiskopje") {
        echo "<img src='images/rabotnickiskopje.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tetekstetovo") {
        echo "<img src='images/tetekstetovo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vardarskopje") {
        echo "<img src='images/vardarskopje.png' width='30px' height='30px'>";
    }
    /****************    mx    ***************/
    if ($result_dom == "atlantefc") {
        echo "<img src='images/atlantefc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cdguadalajara") {
        echo "<img src='images/cdguadalajara.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cfmonterrey") {
        echo "<img src='images/cfmonterrey.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cfpachuca") {
        echo "<img src='images/cfpachuca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "clubamerica") {
        echo "<img src='images/clubamerica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "clubatlas") {
        echo "<img src='images/clubatlas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "clubtijuana") {
        echo "<img src='images/clubtijuana.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cruzazul") {
        echo "<img src='images/cruzazul.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dtolucafc") {
        echo "<img src='images/dtolucafc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "estudiantestecos") {
        echo "<img src='images/estudiantestecos.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcleon") {
        echo "<img src='images/fcleon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jaguareschiapas") {
        echo "<img src='images/jaguareschiapas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "monarcasmorelia") {
        echo "<img src='images/monarcasmorelia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pueblafc") {
        echo "<img src='images/pueblafc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "queretarofc") {
        echo "<img src='images/queretarofc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sanluisfc") {
        echo "<img src='images/sanluisfc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "santoslaguna") {
        echo "<img src='images/santoslaguna.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tigresuanl") {
        echo "<img src='images/tigresuanl.png' width='30px' height='30px'>";
    }
    if ($result_dom == "unam") {
        echo "<img src='images/unam.png' width='30px' height='30px'>";
    }
    /****************    nat    ***************/
    if ($result_dom == "afghanistan") {
        echo "<img src='images/afghanistan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "afriquedusud") {
        echo "<img src='images/afriquedusud.png' width='30px' height='30px'>";
    }
    if ($result_dom == "albanie") {
        echo "<img src='images/albanie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "algerie") {
        echo "<img src='images/algerie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "allemagne") {
        echo "<img src='images/allemagne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "andorre") {
        echo "<img src='images/andorre.png' width='30px' height='30px'>";
    }
    if ($result_dom == "angleterre") {
        echo "<img src='images/angleterre.png' width='30px' height='30px'>";
    }
    if ($result_dom == "angola") {
        echo "<img src='images/angola.png' width='30px' height='30px'>";
    }
    if ($result_dom == "anguilla") {
        echo "<img src='images/anguilla.png' width='30px' height='30px'>";
    }
    if ($result_dom == "antiguaetbarbuda") {
        echo "<img src='images/antiguaetbarbuda.png' width='30px' height='30px'>";
    }
    if ($result_dom == "arabiesaoudite") {
        echo "<img src='images/arabiesaoudite.png' width='30px' height='30px'>";
    }
    if ($result_dom == "argentine") {
        echo "<img src='images/argentine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "armenie") {
        echo "<img src='images/armenie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "aruba") {
        echo "<img src='images/aruba.png' width='30px' height='30px'>";
    }
    if ($result_dom == "australie") {
        echo "<img src='images/australie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "autriche") {
        echo "<img src='images/autriche.png' width='30px' height='30px'>";
    }
    if ($result_dom == "azerbaidjan") {
        echo "<img src='images/azerbaidjan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bahamas") {
        echo "<img src='images/bahamas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bahrein") {
        echo "<img src='images/bahrein.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bangladesh") {
        echo "<img src='images/bangladesh.png' width='30px' height='30px'>";
    }
    if ($result_dom == "barbade") {
        echo "<img src='images/barbade.png' width='30px' height='30px'>";
    }
    if ($result_dom == "belarus") {
        echo "<img src='images/belarus.png' width='30px' height='30px'>";
    }
    if ($result_dom == "belgique") {
        echo "<img src='images/belgique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "belize") {
        echo "<img src='images/belize.png' width='30px' height='30px'>";
    }
    if ($result_dom == "benin") {
        echo "<img src='images/benin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bermudes") {
        echo "<img src='images/bermudes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bhoutan") {
        echo "<img src='images/bhoutan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bih") {
        echo "<img src='images/bih.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bolivie") {
        echo "<img src='images/bolivie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bosnieetherzegovine") {
        echo "<img src='images/bosnieetherzegovine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "botswana") {
        echo "<img src='images/botswana.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bresil") {
        echo "<img src='images/bresil.png' width='30px' height='30px'>";
    }
    if ($result_dom == "brunei") {
        echo "<img src='images/brunei.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bulgarie") {
        echo "<img src='images/bulgarie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "burkinafaso") {
        echo "<img src='images/burkinafaso.png' width='30px' height='30px'>";
    }
    if ($result_dom == "burundi") {
        echo "<img src='images/burundi.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cambodge") {
        echo "<img src='images/cambodge.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cameroun") {
        echo "<img src='images/cameroun.png' width='30px' height='30px'>";
    }
    if ($result_dom == "canada") {
        echo "<img src='images/canada.png' width='30px' height='30px'>";
    }
    if ($result_dom == "capvert") {
        echo "<img src='images/capvert.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chili") {
        echo "<img src='images/chili.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chine") {
        echo "<img src='images/chine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chypre") {
        echo "<img src='images/chypre.png' width='30px' height='30px'>";
    }
    if ($result_dom == "colombie") {
        echo "<img src='images/colombie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "comores") {
        echo "<img src='images/comores.png' width='30px' height='30px'>";
    }
    if ($result_dom == "congo") {
        echo "<img src='images/congo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "coreedunord") {
        echo "<img src='images/coreedunord.png' width='30px' height='30px'>";
    }
    if ($result_dom == "coreedusud") {
        echo "<img src='images/coreedusud.png' width='30px' height='30px'>";
    }
    if ($result_dom == "costarica") {
        echo "<img src='images/costarica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cotedivoire") {
        echo "<img src='images/cotedivoire.png' width='30px' height='30px'>";
    }
    if ($result_dom == "crnagora") {
        echo "<img src='images/crnagora.png' width='30px' height='30px'>";
    }
    if ($result_dom == "croatie") {
        echo "<img src='images/croatie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cuba") {
        echo "<img src='images/cuba.png' width='30px' height='30px'>";
    }
    if ($result_dom == "curacao") {
        echo "<img src='images/curacao.png' width='30px' height='30px'>";
    }
    if ($result_dom == "danemark") {
        echo "<img src='images/danemark.png' width='30px' height='30px'>";
    }
    if ($result_dom == "djibouti") {
        echo "<img src='images/djibouti.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dominique") {
        echo "<img src='images/dominique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eau") {
        echo "<img src='images/eau.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ecosse") {
        echo "<img src='images/ecosse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "egypte") {
        echo "<img src='images/egypte.png' width='30px' height='30px'>";
    }
    if ($result_dom == "equateur") {
        echo "<img src='images/equateur.png' width='30px' height='30px'>";
    }
    if ($result_dom == "erythree") {
        echo "<img src='images/erythree.png' width='30px' height='30px'>";
    }
    if ($result_dom == "espagne") {
        echo "<img src='images/espagne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "estonie") {
        echo "<img src='images/estonie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "etatsunis") {
        echo "<img src='images/etatsunis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ethiopie") {
        echo "<img src='images/ethiopie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fidji") {
        echo "<img src='images/fidji.png' width='30px' height='30px'>";
    }
    if ($result_dom == "finlande") {
        echo "<img src='images/finlande.png' width='30px' height='30px'>";
    }
    if ($result_dom == "france") {
        echo "<img src='images/france.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fyrom") {
        echo "<img src='images/fyrom.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gabon") {
        echo "<img src='images/gabon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gambie") {
        echo "<img src='images/gambie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "georgie") {
        echo "<img src='images/georgie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ghana") {
        echo "<img src='images/ghana.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grece") {
        echo "<img src='images/grece.png' width='30px' height='30px'>";
    }
    if ($result_dom == "grenade") {
        echo "<img src='images/grenade.png' width='30px' height='30px'>";
    }
    if ($result_dom == "guam") {
        echo "<img src='images/guam.png' width='30px' height='30px'>";
    }
    if ($result_dom == "guatemala") {
        echo "<img src='images/guatemala.png' width='30px' height='30px'>";
    }
    if ($result_dom == "guinee") {
        echo "<img src='images/guinee.png' width='30px' height='30px'>";
    }
    if ($result_dom == "guineeequatoriale") {
        echo "<img src='images/guineeequatoriale.png' width='30px' height='30px'>";
    }
    if ($result_dom == "guinéebissau") {
        echo "<img src='images/guinéebissau.png' width='30px' height='30px'>";
    }
    if ($result_dom == "haiti") {
        echo "<img src='images/haiti.png' width='30px' height='30px'>";
    }
    if ($result_dom == "honduras") {
        echo "<img src='images/honduras.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hongkong") {
        echo "<img src='images/hongkong.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hongrie") {
        echo "<img src='images/hongrie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilemaurice") {
        echo "<img src='images/ilemaurice.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilescaimans") {
        echo "<img src='images/ilescaimans.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilescook") {
        echo "<img src='images/ilescook.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilesferoe") {
        echo "<img src='images/ilesferoe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilessalomon") {
        echo "<img src='images/ilessalomon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilesturquesetcaiques") {
        echo "<img src='images/ilesturquesetcaiques.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilesviergeamericaine") {
        echo "<img src='images/ilesviergeamericaine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ilesviergebritanique") {
        echo "<img src='images/ilesviergebritanique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "inde") {
        echo "<img src='images/inde.png' width='30px' height='30px'>";
    }
    if ($result_dom == "indonesie") {
        echo "<img src='images/indonesie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "irak") {
        echo "<img src='images/irak.png' width='30px' height='30px'>";
    }
    if ($result_dom == "iran") {
        echo "<img src='images/iran.png' width='30px' height='30px'>";
    }
    if ($result_dom == "irlande") {
        echo "<img src='images/irlande.png' width='30px' height='30px'>";
    }
    if ($result_dom == "irlandedunord") {
        echo "<img src='images/irlandedunord.png' width='30px' height='30px'>";
    }
    if ($result_dom == "islande") {
        echo "<img src='images/islande.png' width='30px' height='30px'>";
    }
    if ($result_dom == "israel") {
        echo "<img src='images/israel.png' width='30px' height='30px'>";
    }
    if ($result_dom == "italie") {
        echo "<img src='images/italie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jamaique") {
        echo "<img src='images/jamaique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "japon") {
        echo "<img src='images/japon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jordanie") {
        echo "<img src='images/jordanie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kazakhstan") {
        echo "<img src='images/kazakhstan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kenya") {
        echo "<img src='images/kenya.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kirghizistan") {
        echo "<img src='images/kirghizistan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "koweit") {
        echo "<img src='images/koweit.png' width='30px' height='30px'>";
    }
    if ($result_dom == "laos") {
        echo "<img src='images/laos.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lesotho") {
        echo "<img src='images/lesotho.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lettonie") {
        echo "<img src='images/lettonie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "liban") {
        echo "<img src='images/liban.png' width='30px' height='30px'>";
    }
    if ($result_dom == "liberia") {
        echo "<img src='images/liberia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "libye") {
        echo "<img src='images/libye.png' width='30px' height='30px'>";
    }
    if ($result_dom == "liechtenstein") {
        echo "<img src='images/liechtenstein.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lituanie") {
        echo "<img src='images/lituanie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "luxembourg") {
        echo "<img src='images/luxembourg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "macao") {
        echo "<img src='images/macao.png' width='30px' height='30px'>";
    }
    if ($result_dom == "macedoine") {
        echo "<img src='images/macedoine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "madagascar") {
        echo "<img src='images/madagascar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "malaisie") {
        echo "<img src='images/malaisie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "malawi") {
        echo "<img src='images/malawi.png' width='30px' height='30px'>";
    }
    if ($result_dom == "maldives") {
        echo "<img src='images/maldives.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mali") {
        echo "<img src='images/mali.png' width='30px' height='30px'>";
    }
    if ($result_dom == "malte") {
        echo "<img src='images/malte.png' width='30px' height='30px'>";
    }
    if ($result_dom == "maroc") {
        echo "<img src='images/maroc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mauritanie") {
        echo "<img src='images/mauritanie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mexique") {
        echo "<img src='images/mexique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "moldavie") {
        echo "<img src='images/moldavie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mongolie") {
        echo "<img src='images/mongolie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "montenegro") {
        echo "<img src='images/montenegro.png' width='30px' height='30px'>";
    }
    if ($result_dom == "montserrat") {
        echo "<img src='images/montserrat.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mozambique") {
        echo "<img src='images/mozambique.png' width='30px' height='30px'>";
    }
    if ($result_dom == "myanmar") {
        echo "<img src='images/myanmar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "namibie") {
        echo "<img src='images/namibie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nepal") {
        echo "<img src='images/nepal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nicaragua") {
        echo "<img src='images/nicaragua.png' width='30px' height='30px'>";
    }
    if ($result_dom == "niger") {
        echo "<img src='images/niger.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nigeria") {
        echo "<img src='images/nigeria.png' width='30px' height='30px'>";
    }
    if ($result_dom == "norvege") {
        echo "<img src='images/norvege.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nouvellecaledonie") {
        echo "<img src='images/nouvellecaledonie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nouvellezelande") {
        echo "<img src='images/nouvellezelande.png' width='30px' height='30px'>";
    }
    if ($result_dom == "oman") {
        echo "<img src='images/oman.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ouganda") {
        echo "<img src='images/ouganda.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ouzbekistan") {
        echo "<img src='images/ouzbekistan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pakistan") {
        echo "<img src='images/pakistan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "palestine") {
        echo "<img src='images/palestine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "panama") {
        echo "<img src='images/panama.png' width='30px' height='30px'>";
    }
    if ($result_dom == "papouasienouvelleguinee") {
        echo "<img src='images/papouasienouvelleguinee.png' width='30px' height='30px'>";
    }
    if ($result_dom == "paraguay") {
        echo "<img src='images/paraguay.png' width='30px' height='30px'>";
    }
    if ($result_dom == "paysbas") {
        echo "<img src='images/paysbas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "paysdegalles") {
        echo "<img src='images/paysdegalles.png' width='30px' height='30px'>";
    }
    if ($result_dom == "perou") {
        echo "<img src='images/perou.png' width='30px' height='30px'>";
    }
    if ($result_dom == "philippines") {
        echo "<img src='images/philippines.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pologne") {
        echo "<img src='images/pologne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "portugal") {
        echo "<img src='images/portugal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "puertorico") {
        echo "<img src='images/puertorico.png' width='30px' height='30px'>";
    }
    if ($result_dom == "qatar") {
        echo "<img src='images/qatar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rdcongo") {
        echo "<img src='images/rdcongo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "repcentrafricaine") {
        echo "<img src='images/repcentrafricaine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "repdominicaine") {
        echo "<img src='images/repdominicaine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "reptcheque") {
        echo "<img src='images/reptcheque.png' width='30px' height='30px'>";
    }
    if ($result_dom == "reunion") {
        echo "<img src='images/reunion.png' width='30px' height='30px'>";
    }
    if ($result_dom == "roumanie") {
        echo "<img src='images/roumanie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "russie") {
        echo "<img src='images/russie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rwanda") {
        echo "<img src='images/rwanda.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saintelucie") {
        echo "<img src='images/saintelucie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saintkittsetnevis") {
        echo "<img src='images/saintkittsetnevis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saintmarin") {
        echo "<img src='images/saintmarin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saintmartin") {
        echo "<img src='images/saintmartin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saintvicentetlesgrenadines") {
        echo "<img src='images/saintvicentetlesgrenadines.png' width='30px' height='30px'>";
    }
    if ($result_dom == "salvador") {
        echo "<img src='images/salvador.png' width='30px' height='30px'>";
    }
    if ($result_dom == "samoa") {
        echo "<img src='images/samoa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "samoaamericaines") {
        echo "<img src='images/samoaamericaines.png' width='30px' height='30px'>";
    }
    if ($result_dom == "saomeeprincipe") {
        echo "<img src='images/saomeeprincipe.png' width='30px' height='30px'>";
    }
    if ($result_dom == "senegal") {
        echo "<img src='images/senegal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "serbie") {
        echo "<img src='images/serbie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "seychelles") {
        echo "<img src='images/seychelles.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sierraleone") {
        echo "<img src='images/sierraleone.png' width='30px' height='30px'>";
    }
    if ($result_dom == "singapour") {
        echo "<img src='images/singapour.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slovaquie") {
        echo "<img src='images/slovaquie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slovenie") {
        echo "<img src='images/slovenie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "somalie") {
        echo "<img src='images/somalie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "soudan") {
        echo "<img src='images/soudan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "srbija") {
        echo "<img src='images/srbija.png' width='30px' height='30px'>";
    }
    if ($result_dom == "srilanka") {
        echo "<img src='images/srilanka.png' width='30px' height='30px'>";
    }
    if ($result_dom == "suede") {
        echo "<img src='images/suede.png' width='30px' height='30px'>";
    }
    if ($result_dom == "suisse") {
        echo "<img src='images/suisse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "surinam") {
        echo "<img src='images/surinam.png' width='30px' height='30px'>";
    }
    if ($result_dom == "swaziland") {
        echo "<img src='images/swaziland.png' width='30px' height='30px'>";
    }
    if ($result_dom == "syrie") {
        echo "<img src='images/syrie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tadjikistan") {
        echo "<img src='images/tadjikistan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tahiti") {
        echo "<img src='images/tahiti.png' width='30px' height='30px'>";
    }
    if ($result_dom == "taiwan") {
        echo "<img src='images/taiwan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tanzanie") {
        echo "<img src='images/tanzanie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tchad") {
        echo "<img src='images/tchad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "thailande") {
        echo "<img src='images/thailande.png' width='30px' height='30px'>";
    }
    if ($result_dom == "timororiental") {
        echo "<img src='images/timororiental.png' width='30px' height='30px'>";
    }
    if ($result_dom == "togo") {
        echo "<img src='images/togo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tonga") {
        echo "<img src='images/tonga.png' width='30px' height='30px'>";
    }
    if ($result_dom == "triniteettobago") {
        echo "<img src='images/triniteettobago.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tunisie") {
        echo "<img src='images/tunisie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "turkmenistan") {
        echo "<img src='images/turkmenistan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "turquie") {
        echo "<img src='images/turquie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ukraine") {
        echo "<img src='images/ukraine.png' width='30px' height='30px'>";
    }
    if ($result_dom == "uruguay") {
        echo "<img src='images/uruguay.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vanuatu") {
        echo "<img src='images/vanuatu.png' width='30px' height='30px'>";
    }
    if ($result_dom == "venezuela") {
        echo "<img src='images/venezuela.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vietnam") {
        echo "<img src='images/vietnam.png' width='30px' height='30px'>";
    }
    if ($result_dom == "yemen") {
        echo "<img src='images/yemen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zambie") {
        echo "<img src='images/zambie.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zanzibar") {
        echo "<img src='images/zanzibar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zimbabwe") {
        echo "<img src='images/zimbabwe.png' width='30px' height='30px'>";
    }
    /****************    nl    ***************/
    if ($result_dom == "adodenhaag") {
        echo "<img src='images/adodenhaag.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ajax") {
        echo "<img src='images/ajax.png' width='30px' height='30px'>";
    }
    if ($result_dom == "az") {
        echo "<img src='images/az.png' width='30px' height='30px'>";
    }
    if ($result_dom == "degraafschap") {
        echo "<img src='images/degraafschap.png' width='30px' height='30px'>";
    }
    if ($result_dom == "feyenoord") {
        echo "<img src='images/feyenoord.png' width='30px' height='30px'>";
    }
    if ($result_dom == "groningen") {
        echo "<img src='images/groningen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "heerenveen") {
        echo "<img src='images/heerenveen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "heracles") {
        echo "<img src='images/heracles.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nac") {
        echo "<img src='images/nac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nec") {
        echo "<img src='images/nec.png' width='30px' height='30px'>";
    }
    if ($result_dom == "psv") {
        echo "<img src='images/psv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rodajc") {
        echo "<img src='images/rodajc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sbvexcelsior") {
        echo "<img src='images/sbvexcelsior.png' width='30px' height='30px'>";
    }
    if ($result_dom == "twente") {
        echo "<img src='images/twente.png' width='30px' height='30px'>";
    }
    if ($result_dom == "utrecht") {
        echo "<img src='images/utrecht.png' width='30px' height='30px'>";
    }
    if ($result_dom == "venlo") {
        echo "<img src='images/venlo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vitesse") {
        echo "<img src='images/vitesse.png' width='30px' height='30px'>";
    }
    if ($result_dom == "waalwijk") {
        echo "<img src='images/waalwijk.png' width='30px' height='30px'>";
    }
    /****************    no    ***************/
    if ($result_dom == "molde") {
        echo "<img src='images/molde.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rosenborg") {
        echo "<img src='images/rosenborg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "skbrann") {
        echo "<img src='images/skbrann.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sogndal") {
        echo "<img src='images/sogndal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stromsgodset") {
        echo "<img src='images/stromsgodset.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tromso") {
        echo "<img src='images/tromso.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vikingfk") {
        echo "<img src='images/vikingfk.png' width='30px' height='30px'>";
    }
    /****************    nz    ***************/
    if ($result_dom == "wellingtonphoenix") {
        echo "<img src='images/wellingtonphoenix.png' width='30px' height='30px'>";
    }
    /****************    pl    ***************/
    if ($result_dom == "bialystok") {
        echo "<img src='images/bialystok.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gliwice") {
        echo "<img src='images/gliwice.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lechpoznan") {
        echo "<img src='images/lechpoznan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "legiawarszawa") {
        echo "<img src='images/legiawarszawa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lubin") {
        echo "<img src='images/lubin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "poloniawarszawa") {
        echo "<img src='images/poloniawarszawa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slaskwroclaw") {
        echo "<img src='images/slaskwroclaw.png' width='30px' height='30px'>";
    }
    if ($result_dom == "wislakrakow") {
        echo "<img src='images/wislakrakow.png' width='30px' height='30px'>";
    }
    /****************    pt    ***************/
    if ($result_dom == "academica") {
        echo "<img src='images/academica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "beiramar") {
        echo "<img src='images/beiramar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "benfica") {
        echo "<img src='images/benfica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "braga") {
        echo "<img src='images/braga.png' width='30px' height='30px'>";
    }
    if ($result_dom == "estorilpraia") {
        echo "<img src='images/estorilpraia.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fcporto") {
        echo "<img src='images/fcporto.png' width='30px' height='30px'>";
    }
    if ($result_dom == "feirense") {
        echo "<img src='images/feirense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gilvicente") {
        echo "<img src='images/gilvicente.png' width='30px' height='30px'>";
    }
    if ($result_dom == "leiria") {
        echo "<img src='images/leiria.png' width='30px' height='30px'>";
    }
    if ($result_dom == "maritimo") {
        echo "<img src='images/maritimo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "moreirensefc") {
        echo "<img src='images/moreirensefc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nacionalm") {
        echo "<img src='images/nacionalm.png' width='30px' height='30px'>";
    }
    if ($result_dom == "olhanense") {
        echo "<img src='images/olhanense.png' width='30px' height='30px'>";
    }
    if ($result_dom == "pacos") {
        echo "<img src='images/pacos.png' width='30px' height='30px'>";
    }
    if ($result_dom == "portimonensesc") {
        echo "<img src='images/portimonensesc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rioave") {
        echo "<img src='images/rioave.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sportingcp") {
        echo "<img src='images/sportingcp.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vitoriafc") {
        echo "<img src='images/vitoriafc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vitoriasc") {
        echo "<img src='images/vitoriasc.png' width='30px' height='30px'>";
    }
    /****************    ro    ***************/
    if ($result_dom == "cfrcluj") {
        echo "<img src='images/cfrcluj.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dinamobucuresti") {
        echo "<img src='images/dinamobucuresti.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rapidbucuresti") {
        echo "<img src='images/rapidbucuresti.png' width='30px' height='30px'>";
    }
    if ($result_dom == "steauabucuresti") {
        echo "<img src='images/steauabucuresti.png' width='30px' height='30px'>";
    }
    /****************    rs    ***************/
    if ($result_dom == "aluminjumnis") {
        echo "<img src='images/aluminjumnis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "antimonzajaca") {
        echo "<img src='images/antimonzajaca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "balkanmirijevo") {
        echo "<img src='images/balkanmirijevo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "banatzrenjanin") {
        echo "<img src='images/banatzrenjanin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bezanija") {
        echo "<img src='images/bezanija.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bigbullradnicki") {
        echo "<img src='images/bigbullradnicki.png' width='30px' height='30px'>";
    }
    if ($result_dom == "boraccacak") {
        echo "<img src='images/boraccacak.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bskborca") {
        echo "<img src='images/bskborca.png' width='30px' height='30px'>";
    }
    if ($result_dom == "carkonstantinnis") {
        echo "<img src='images/carkonstantinnis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "crvenazvezda") {
        echo "<img src='images/crvenazvezda.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cukaricki") {
        echo "<img src='images/cukaricki.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dinamopancevo") {
        echo "<img src='images/dinamopancevo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dinamovranje") {
        echo "<img src='images/dinamovranje.png' width='30px' height='30px'>";
    }
    if ($result_dom == "donjisrem") {
        echo "<img src='images/donjisrem.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkbask") {
        echo "<img src='images/fkbask.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkmokragora") {
        echo "<img src='images/fkmokragora.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkobilic") {
        echo "<img src='images/fkobilic.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkpristina") {
        echo "<img src='images/fkpristina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fksocanica") {
        echo "<img src='images/fksocanica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fksopot") {
        echo "<img src='images/fksopot.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fksvrljig") {
        echo "<img src='images/fksvrljig.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fktrepca") {
        echo "<img src='images/fktrepca.png' width='30px' height='30px'>";
    }
    for ($j = 1; $j < 21; $j++) {
        $var = "libre" . $j;
        if ($result_dom == $var) {
            echo "<img src='images/libre1.png' width='30px' height='30px'>";
        }
    }
    if ($result_dom == "fkvrsac") {
        echo "<img src='images/fkvrsac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkzemun") {
        echo "<img src='images/fkzemun.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkzitoradja") {
        echo "<img src='images/fkzitoradja.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hajdukbeograd") {
        echo "<img src='images/hajdukbeograd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hajdukkula") {
        echo "<img src='images/hajdukkula.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ibarleposavic") {
        echo "<img src='images/ibarleposavic.png' width='30px' height='30px'>";
    }
    if ($result_dom == "indjija") {
        echo "<img src='images/indjija.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jagodina") {
        echo "<img src='images/jagodina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "javor") {
        echo "<img src='images/javor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jedinstvosurcin") {
        echo "<img src='images/jedinstvosurcin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kolubara") {
        echo "<img src='images/kolubara.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lokomotivabeograd") {
        echo "<img src='images/lokomotivabeograd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "macvasabac") {
        echo "<img src='images/macvasabac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "metalacgm") {
        echo "<img src='images/metalacgm.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mladiradnikpozarevac") {
        echo "<img src='images/mladiradnikpozarevac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mladostlucani") {
        echo "<img src='images/mladostlucani.png' width='30px' height='30px'>";
    }
    if ($result_dom == "napredakkrusevac") {
        echo "<img src='images/napredakkrusevac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "novipazar") {
        echo "<img src='images/novipazar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ofkbeograd") {
        echo "<img src='images/ofkbeograd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ofkmladenovac") {
        echo "<img src='images/ofkmladenovac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ofknis") {
        echo "<img src='images/ofknis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "partizan") {
        echo "<img src='images/partizan.png' width='30px' height='30px'>";
    }
    if ($result_dom == "proleterns") {
        echo "<img src='images/proleterns.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rad") {
        echo "<img src='images/rad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radjevackrupanj") {
        echo "<img src='images/radjevackrupanj.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radnicki1923") {
        echo "<img src='images/radnicki1923.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radnickinis") {
        echo "<img src='images/radnickinis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radnickiobrenovac") {
        echo "<img src='images/radnickiobrenovac.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radnickipirot") {
        echo "<img src='images/radnickipirot.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radnickirudovci") {
        echo "<img src='images/radnickirudovci.png' width='30px' height='30px'>";
    }
    if ($result_dom == "radnickisombor") {
        echo "<img src='images/radnickisombor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rfknovisad") {
        echo "<img src='images/rfknovisad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rudarkm") {
        echo "<img src='images/rudarkm.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sindjelicnis") {
        echo "<img src='images/sindjelicnis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slavijabeograd") {
        echo "<img src='images/slavijabeograd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slobodapsu") {
        echo "<img src='images/slobodapsu.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slobodauzice") {
        echo "<img src='images/slobodauzice.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slogakraljevo") {
        echo "<img src='images/slogakraljevo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slogaranilug") {
        echo "<img src='images/slogaranilug.png' width='30px' height='30px'>";
    }
    if ($result_dom == "smederevo") {
        echo "<img src='images/smederevo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sptksubotica") {
        echo "<img src='images/sptksubotica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "srem") {
        echo "<img src='images/srem.png' width='30px' height='30px'>";
    }
    if ($result_dom == "starogracko") {
        echo "<img src='images/starogracko.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sumadijajagnjilo") {
        echo "<img src='images/sumadijajagnjilo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "takovogm") {
        echo "<img src='images/takovogm.png' width='30px' height='30px'>";
    }
    if ($result_dom == "teleoptik") {
        echo "<img src='images/teleoptik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vlasinavlasotince") {
        echo "<img src='images/vlasinavlasotince.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vojvodina") {
        echo "<img src='images/vojvodina.png' width='30px' height='30px'>";
    }
    /****************    ru    ***************/
    if ($result_dom == "alaniyavladikavkaz") {
        echo "<img src='images/alaniyavladikavkaz.png' width='30px' height='30px'>";
    }
    if ($result_dom == "amkar") {
        echo "<img src='images/amkar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "anji") {
        echo "<img src='images/anji.png' width='30px' height='30px'>";
    }
    if ($result_dom == "baltikakaliningrad") {
        echo "<img src='images/baltikakaliningrad.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cska") {
        echo "<img src='images/cska.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dinamo") {
        echo "<img src='images/dinamo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fkshinnik") {
        echo "<img src='images/fkshinnik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "krasnodar") {
        echo "<img src='images/krasnodar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "krylya") {
        echo "<img src='images/krylya.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kuban") {
        echo "<img src='images/kuban.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lokomotiv") {
        echo "<img src='images/lokomotiv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mordoviasaransk") {
        echo "<img src='images/mordoviasaransk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nalchik") {
        echo "<img src='images/nalchik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rostov") {
        echo "<img src='images/rostov.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rubin") {
        echo "<img src='images/rubin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sibirnovosibirsk") {
        echo "<img src='images/sibirnovosibirsk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "spartak") {
        echo "<img src='images/spartak.png' width='30px' height='30px'>";
    }
    if ($result_dom == "terek") {
        echo "<img src='images/terek.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tomtomsk") {
        echo "<img src='images/tomtomsk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "torpedomoskva") {
        echo "<img src='images/torpedomoskva.png' width='30px' height='30px'>";
    }
    if ($result_dom == "volga") {
        echo "<img src='images/volga.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zenit") {
        echo "<img src='images/zenit.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zhemchuzhinasochi") {
        echo "<img src='images/zhemchuzhinasochi.png' width='30px' height='30px'>";
    }
    /****************    sa    ***************/
    if ($result_dom == "alahli") {
        echo "<img src='images/alahli.png' width='30px' height='30px'>";
    }
    if ($result_dom == "alhilal") {
        echo "<img src='images/alhilal.png' width='30px' height='30px'>";
    }
    if ($result_dom == "najran") {
        echo "<img src='images/najran.png' width='30px' height='30px'>";
    }
    /****************    sct    ***************/
    if ($result_dom == "aberdeen") {
        echo "<img src='images/aberdeen.png' width='30px' height='30px'>";
    }
    if ($result_dom == "celtic") {
        echo "<img src='images/celtic.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dundeefc") {
        echo "<img src='images/dundeefc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dundeeutd") {
        echo "<img src='images/dundeeutd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dunfermline") {
        echo "<img src='images/dunfermline.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hearts") {
        echo "<img src='images/hearts.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hibernian") {
        echo "<img src='images/hibernian.png' width='30px' height='30px'>";
    }
    if ($result_dom == "inverness") {
        echo "<img src='images/inverness.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kilmarnock") {
        echo "<img src='images/kilmarnock.png' width='30px' height='30px'>";
    }
    if ($result_dom == "motherwell") {
        echo "<img src='images/motherwell.png' width='30px' height='30px'>";
    }
    if ($result_dom == "partickthistle") {
        echo "<img src='images/partickthistle.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rangers") {
        echo "<img src='images/rangers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "rosscountyfc") {
        echo "<img src='images/rosscountyfc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stjohnstone") {
        echo "<img src='images/stjohnstone.png' width='30px' height='30px'>";
    }
    if ($result_dom == "stmirren") {
        echo "<img src='images/stmirren.png' width='30px' height='30px'>";
    }
    /****************    se    ***************/
    if ($result_dom == "aik") {
        echo "<img src='images/aik.png' width='30px' height='30px'>";
    }
    if ($result_dom == "djurgardens") {
        echo "<img src='images/djurgardens.png' width='30px' height='30px'>";
    }
    if ($result_dom == "elfsborg") {
        echo "<img src='images/elfsborg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "halmstads") {
        echo "<img src='images/halmstads.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hif") {
        echo "<img src='images/hif.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ifkgoteborg") {
        echo "<img src='images/ifkgoteborg.png' width='30px' height='30px'>";
    }
    if ($result_dom == "malmoff") {
        echo "<img src='images/malmoff.png' width='30px' height='30px'>";
    }
    /****************    si    ***************/
    if ($result_dom == "ndgorica") {
        echo "<img src='images/ndgorica.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nkmaribor") {
        echo "<img src='images/nkmaribor.png' width='30px' height='30px'>";
    }
    /****************    sk    ***************/
    if ($result_dom == "mskzilina") {
        echo "<img src='images/mskzilina.png' width='30px' height='30px'>";
    }
    if ($result_dom == "slovanbratislava") {
        echo "<img src='images/slovanbratislava.png' width='30px' height='30px'>";
    }
    if ($result_dom == "spartaktrnava") {
        echo "<img src='images/spartaktrnava.png' width='30px' height='30px'>";
    }
    /****************    sm    ***************/
    if ($result_dom == "domagnano") {
        echo "<img src='images/domagnano.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sptrefiori") {
        echo "<img src='images/sptrefiori.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sptrepenne") {
        echo "<img src='images/sptrepenne.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ssmurata") {
        echo "<img src='images/ssmurata.png' width='30px' height='30px'>";
    }
    /****************    tn    ***************/
    if ($result_dom == "clubafricain") {
        echo "<img src='images/clubafricain.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cssfaxien") {
        echo "<img src='images/cssfaxien.png' width='30px' height='30px'>";
    }
    if ($result_dom == "esperancesportivetunis") {
        echo "<img src='images/esperancesportivetunis.png' width='30px' height='30px'>";
    }
    if ($result_dom == "essahel") {
        echo "<img src='images/essahel.png' width='30px' height='30px'>";
    }
    if ($result_dom == "jskairouanaise") {
        echo "<img src='images/jskairouanaise.png' width='30px' height='30px'>";
    }
    /****************    tr    ***************/
    if ($result_dom == "ankaragucu") {
        echo "<img src='images/ankaragucu.png' width='30px' height='30px'>";
    }
    if ($result_dom == "antalyaspor") {
        echo "<img src='images/antalyaspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "besiktas") {
        echo "<img src='images/besiktas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bucaspor") {
        echo "<img src='images/bucaspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "bursaspor") {
        echo "<img src='images/bursaspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "eskisehirspor") {
        echo "<img src='images/eskisehirspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "fenerbahce") {
        echo "<img src='images/fenerbahce.png' width='30px' height='30px'>";
    }
    if ($result_dom == "galatasaray") {
        echo "<img src='images/galatasaray.png' width='30px' height='30px'>";
    }
    if ($result_dom == "gaziantepspor") {
        echo "<img src='images/gaziantepspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "genclerbirligi") {
        echo "<img src='images/genclerbirligi.png' width='30px' height='30px'>";
    }
    if ($result_dom == "istanbulbb") {
        echo "<img src='images/istanbulbb.png' width='30px' height='30px'>";
    }
    if ($result_dom == "karabukspor") {
        echo "<img src='images/karabukspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kasimpasa") {
        echo "<img src='images/kasimpasa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kayserispor") {
        echo "<img src='images/kayserispor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "konyaspor") {
        echo "<img src='images/konyaspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "manisaspor") {
        echo "<img src='images/manisaspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "mersin") {
        echo "<img src='images/mersin.png' width='30px' height='30px'>";
    }
    if ($result_dom == "orduspor") {
        echo "<img src='images/orduspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "samsunspor") {
        echo "<img src='images/samsunspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sivasspor") {
        echo "<img src='images/sivasspor.png' width='30px' height='30px'>";
    }
    if ($result_dom == "trabzonspor") {
        echo "<img src='images/trabzonspor.png' width='30px' height='30px'>";
    }
    /****************    ua    ***************/
    if ($result_dom == "arsenalkyiv") {
        echo "<img src='images/arsenalkyiv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chornodesa") {
        echo "<img src='images/chornodesa.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dnipro") {
        echo "<img src='images/dnipro.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dynamokyiv") {
        echo "<img src='images/dynamokyiv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "imariupol") {
        echo "<img src='images/imariupol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "karpatylviv") {
        echo "<img src='images/karpatylviv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "kryvbas") {
        echo "<img src='images/kryvbas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "metalistkharkiv") {
        echo "<img src='images/metalistkharkiv.png' width='30px' height='30px'>";
    }
    if ($result_dom == "metalurhdonetsk") {
        echo "<img src='images/metalurhdonetsk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "obolon") {
        echo "<img src='images/obolon.png' width='30px' height='30px'>";
    }
    if ($result_dom == "oleksandria") {
        echo "<img src='images/oleksandria.png' width='30px' height='30px'>";
    }
    if ($result_dom == "shakhtar") {
        echo "<img src='images/shakhtar.png' width='30px' height='30px'>";
    }
    if ($result_dom == "tavsimferopol") {
        echo "<img src='images/tavsimferopol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "volynlutsk") {
        echo "<img src='images/volynlutsk.png' width='30px' height='30px'>";
    }
    if ($result_dom == "vpoltava") {
        echo "<img src='images/vpoltava.png' width='30px' height='30px'>";
    }
    if ($result_dom == "zorya") {
        echo "<img src='images/zorya.png' width='30px' height='30px'>";
    }
    /****************    us    ***************/
    if ($result_dom == "cfire") {
        echo "<img src='images/cfire.png' width='30px' height='30px'>";
    }
    if ($result_dom == "chivas") {
        echo "<img src='images/chivas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "colorapids") {
        echo "<img src='images/colorapids.png' width='30px' height='30px'>";
    }
    if ($result_dom == "colucrew") {
        echo "<img src='images/colucrew.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dallas") {
        echo "<img src='images/dallas.png' width='30px' height='30px'>";
    }
    if ($result_dom == "dcutd") {
        echo "<img src='images/dcutd.png' width='30px' height='30px'>";
    }
    if ($result_dom == "hdynamo") {
        echo "<img src='images/hdynamo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "impact") {
        echo "<img src='images/impact.png' width='30px' height='30px'>";
    }
    if ($result_dom == "lagalaxy") {
        echo "<img src='images/lagalaxy.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nerevo") {
        echo "<img src='images/nerevo.png' width='30px' height='30px'>";
    }
    if ($result_dom == "newyorkrb") {
        echo "<img src='images/newyorkrb.png' width='30px' height='30px'>";
    }
    if ($result_dom == "philaunion") {
        echo "<img src='images/philaunion.png' width='30px' height='30px'>";
    }
    if ($result_dom == "ptimbers") {
        echo "<img src='images/ptimbers.png' width='30px' height='30px'>";
    }
    if ($result_dom == "realsl") {
        echo "<img src='images/realsl.png' width='30px' height='30px'>";
    }
    if ($result_dom == "seasounders") {
        echo "<img src='images/seasounders.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sjearthquakes") {
        echo "<img src='images/sjearthquakes.png' width='30px' height='30px'>";
    }
    if ($result_dom == "sportingkc") {
        echo "<img src='images/sportingkc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "torontofc") {
        echo "<img src='images/torontofc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "whitecaps") {
        echo "<img src='images/whitecaps.png' width='30px' height='30px'>";
    }
    /****************    uy    ***************/
    if ($result_dom == "capenarol") {
        echo "<img src='images/capenarol.png' width='30px' height='30px'>";
    }
    if ($result_dom == "danubiofc") {
        echo "<img src='images/danubiofc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "defensorsc") {
        echo "<img src='images/defensorsc.png' width='30px' height='30px'>";
    }
    if ($result_dom == "nacional") {
        echo "<img src='images/nacional.png' width='30px' height='30px'>";
    }
    /****************    wal    ***************/
    if ($result_dom == "bangorcity") {
        echo "<img src='images/bangorcity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "cardiffcity") {
        echo "<img src='images/cardiffcity.png' width='30px' height='30px'>";
    }
    if ($result_dom == "llanelli") {
        echo "<img src='images/llanelli.png' width='30px' height='30px'>";
    }
    if ($result_dom == "swansea") {
        echo "<img src='images/swansea.png' width='30px' height='30px'>";
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
    <link rel="stylesheet" href="../assets/css/themes/red.css" id="style_color">
    <link rel="stylesheet" href="../assets/css/themes/headers/header1-red.css" id="style_color-header-1">
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
                <a class="btn-u btn-u-yellow" href="#" onclick="match();"
                   style="width: :100px;height: 30px;margin-top: -4px;">
                    &nbsp;&nbsp;Match Restant&nbsp;&nbsp;</a>
                <a class="btn-u btn-u-sea" href="#" onclick="matchAll();"
                   style="width: :100px;height: 30px;margin-top: -4px;">
                    &nbsp;&nbsp;Tous les Matchs&nbsp;&nbsp;</a>
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
        <a class="btn-u btn-u-red" href="updatejoueur.php?name=<?php echo $name; ?>" width="100px" height="30px">&nbsp;&nbsp;Modifier
            joueurs&nbsp;&nbsp;</a>
        <!--        <a class="btn-u btn-u-green" href="forfait.php?name=--><?php //echo $name; ?><!--&nb=-->
        <?php //echo $nb; ?><!--" width="100px"-->
        <!--           height="30px">-->
        <!--            &nbsp;&nbsp;Forfait-->
        <!--            joueurs&nbsp;&nbsp;</a>-->
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
    //$(".numbersOnly").each(function (index) {
    //  if ($(this).val() != '') {
    //    $(this).parent().parent().hide();
    //}
    //});

    function match() {
        $(".numbersOnly").each(function (index) {
            if ($(this).val() != '') {
                $(this).parent().parent().hide();
            }
        });
    }
    function matchAll() {
        $("table tr").each(function () {
            if ($(this).val() == '') {
                $(this).show();
            }
        });
    }
</script>
</body>
</html>