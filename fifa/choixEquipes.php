<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jguerrin
 * Date: 13/09/13
 * Time: 14:17
 */
if (isset($_POST['selectEquipes'])) {
    $nbequipes = $_POST['selectEquipes'];
    $nomTournoi = $_POST['nomTournoi'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
    <title>Tournoi FIFA 14</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site du club de foot des taoupats de daux">
    <meta name="keywords" content="Foot,Daux,Taoupats">
    <meta name="author" content="Julien Guerrin">
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel='stylesheet' href='typicons/font/typicons.css'/>
</head>
<body style="margin-top: 100px;">
<div class="container">
<div class="jumbotron">
<div class="container">
<h1>Choix des équipes</h1>
Nombre : <?php echo $nbequipes; ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" class="btn btn-primary reset">Reset</button>
<br><a href="nouveau.php" style="width: 80px;" class="btn btn-danger" id="annule">Annuler</a>
<br><br>

<form role="form" class="form-group" id="formSubmit" action="tournoi.php" method="post">
<div class="row">
    <div class="col-lg-3" id="nation" style="text-align: center">
        <a href="#"><img src="images/nation.jpg" width="400px" height="280px"/><br>Nations</a>
    </div>
    <div class="col-lg-offset-3 col-lg-3" id="club" style="text-align: center">
        <a href="#"><img src="images/club.jpg" width="400px" height="280px"/><br>Clubs</a>
    </div>
</div>
<div id="affichnation" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="europe" style="text-align: center">
            <a href="#"><img src="images/europe.png" width="100px" height="60px"/><br>Europe</a>
        </div>
        <div class="col-lg-3" id="afrique" style="text-align: center">
            <a href="#"><img src="images/afrique.png" width="100px" height="60px"/><br>Afrique</a>
        </div>
        <div class="col-lg-3" id="amsud" style="text-align: center">
            <a href="#"><img src="images/amsud.png" width="60px" height="60px"/><br>Amerique du
                Sud</a>
        </div>
        <div class="col-lg-3" id="amnord" style="text-align: center">
            <a href="#"><img src="images/amnord.png" width="60px" height="60px"/><br>Amerique du
                Nord</a>
        </div>
        <div class="col-lg-3" id="asie" style="text-align: center">
            <a href="#"><img src="images/asie.png" width="100px" height="60px"/><br>Asie</a>
        </div>
        <div class="col-lg-3" id="oceanie" style="text-align: center">
            <a href="#"><img src="images/oceanie.png" width="60px"
                             height="60px"/><br>Oceanie</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourchoix">Retour</button>
        </div>
    </div>
</div>
<div id="affichoceanie" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="australie" style="text-align: center">
            <a href="#"><img src="images/australie.png" width="100px" height="60px"/><br>Australie</a>
            <input type="checkbox" name="australie"/>
        </div>
        <div class="col-lg-3" id="nouvellezelande" style="text-align: center">
            <a href="#"><img src="images/nouvellezelande.png" width="100px" height="60px"/><br>Nouvelle Zelande</a>
            <input type="checkbox" name="nouvellezelande"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retournation">Retour</button>
        </div>
    </div>
</div>
<div id="affichamnord" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="etats-unis" style="text-align: center">
            <a href="#"><img src="images/etats-unis.png" width="100px" height="60px"/><br>Etats-Unis</a>
            <input type="checkbox" name="etats-unis"/>
        </div>
        <div class="col-lg-3" id="canada" style="text-align: center">
            <a href="#"><img src="images/canada.png" width="100px" height="60px"/><br>Canada</a>
            <input type="checkbox" name="canada"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retournation">Retour</button>
        </div>
    </div>
</div>
<div id="affichasie" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="chine" style="text-align: center">
            <a href="#"><img src="images/chine.png" width="100px" height="60px"/><br>Chine</a>
            <input type="checkbox" name="chine"/>
        </div>
        <div class="col-lg-3" id="japon" style="text-align: center">
            <a href="#"><img src="images/japon.png" width="100px" height="60px"/><br>Japon</a>
            <input type="checkbox" name="japon"/>
        </div>
        <div class="col-lg-3" id="turquie" style="text-align: center">
            <a href="#"><img src="images/turquie.png" width="100px" height="60px"/><br>Turquie</a>
            <input type="checkbox" name="turquie"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retournation">Retour</button>
        </div>
    </div>
</div>
<div id="affichamsud" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="argentine" style="text-align: center">
            <a href="#"><img src="images/argentine.png" width="100px" height="60px"/><br>Argentine</a>
            <input type="checkbox" name="argentine"/>
        </div>
        <div class="col-lg-3" id="bresil" style="text-align: center">
            <a href="#"><img src="images/bresil.png" width="100px" height="60px"/><br>Bresil</a>
            <input type="checkbox" name="bresil"/>
        </div>
        <div class="col-lg-3" id="mexique" style="text-align: center">
            <a href="#"><img src="images/mexique.png" width="100px" height="60px"/><br>Mexique</a>
            <input type="checkbox" name="mexique"/>
        </div>
        <div class="col-lg-3" id="uruguay" style="text-align: center">
            <a href="#"><img src="images/uruguay.png" width="100px" height="60px"/><br>Uruguay</a>
            <input type="checkbox" name="uruguay"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retournation">Retour</button>
        </div>
    </div>
</div>
<div id="affichafrique" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="algerie" style="text-align: center">
            <a href="#"><img src="images/algerie.png" width="100px" height="60px"/><br>Algerie</a>
            <input type="checkbox" name="algerie"/>
        </div>
        <div class="col-lg-3" id="afriquedusud" style="text-align: center">
            <a href="#"><img src="images/afriquedusud.png" width="100px" height="60px"/><br>Afrique du Sud</a>
            <input type="checkbox" name="afriquedusud"/>
        </div>
        <div class="col-lg-3" id="cameroun" style="text-align: center">
            <a href="#"><img src="images/cameroun.png" width="100px" height="60px"/><br>Cameroun</a>
            <input type="checkbox" name="cameroun"/>
        </div>
        <div class="col-lg-3" id="cotedivoire" style="text-align: center">
            <a href="#"><img src="images/coteivoire.png" width="100px" height="60px"/><br>Cote d'ivoire</a>
            <input type="checkbox" name="cotedivoire"/>
        </div>
        <div class="col-lg-3" id="egypte" style="text-align: center">
            <a href="#"><img src="images/egypte.png" width="100px" height="60px"/><br>Egypte</a>
            <input type="checkbox" name="egypte"/>
        </div>
        <div class="col-lg-3" id="ghana" style="text-align: center">
            <a href="#"><img src="images/ghana.png" width="100px" height="60px"/><br>Ghana</a>
            <input type="checkbox" name="ghana"/>
        </div>
        <div class="col-lg-3" id="mali" style="text-align: center">
            <a href="#"><img src="images/mali.png" width="100px" height="60px"/><br>Mali</a>
            <input type="checkbox" name="mali"/>
        </div>
        <div class="col-lg-3" id="maroc" style="text-align: center">
            <a href="#"><img src="images/maroc.png" width="100px" height="60px"/><br>Maroc</a>
            <input type="checkbox" name="maroc"/>
        </div>
        <div class="col-lg-3" id="senegal" style="text-align: center">
            <a href="#"><img src="images/senegal.png" width="100px" height="60px"/><br>Senegal</a>
            <input type="checkbox" name="senegal"/>
        </div>
        <div class="col-lg-3" id="tunisie" style="text-align: center">
            <a href="#"><img src="images/tunisie.png" width="100px" height="60px"/><br>Tunisie</a>
            <input type="checkbox" name="tunisie"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retournation">Retour</button>
        </div>
    </div>
</div>
<div id="afficheurope" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="allemagne" style="text-align: center">
            <a href="#"><img src="images/allemagne.png" width="100px" height="60px"/><br>Allemagne</a>
            <input type="checkbox" name="allemagne"/>
        </div>
        <div class="col-lg-3" id="angleterre" style="text-align: center">
            <a href="#"><img src="images/angleterre.png" width="100px" height="60px"/><br>Angleterre</a>
            <input type="checkbox" name="angleterre"/>
        </div>
        <div class="col-lg-3" id="belgique" style="text-align: center">
            <a href="#"><img src="images/belgique.png" width="100px" height="60px"/><br>Belgique</a>
            <input type="checkbox" name="belgique"/>
        </div>
        <div class="col-lg-3" id="espagne" style="text-align: center">
            <a href="#"><img src="images/espagne.png" width="100px" height="60px"/><br>Espagne</a>
            <input type="checkbox" name="espagne"/>
        </div>
        <div class="col-lg-3" id="france" style="text-align: center">
            <a href="#"><img src="images/france.png" width="100px" height="60px"/><br>France</a>
            <input type="checkbox" name="france"/>
        </div>
        <div class="col-lg-3" id="italie" style="text-align: center">
            <a href="#"><img src="images/italie.png" width="100px" height="60px"/><br>Italie</a>
            <input type="checkbox" name="italie"/>
        </div>
        <div class="col-lg-3" id="pays-bas" style="text-align: center">
            <a href="#"><img src="images/pays-bas.png" width="100px" height="60px"/><br>Pays-bas</a>
            <input type="checkbox" name="pays-bas"/>
        </div>
        <div class="col-lg-3" id="portugal" style="text-align: center">
            <a href="#"><img src="images/portugal.png" width="100px" height="60px"/><br>Portugal</a>
            <input type="checkbox" name="portugal"/>
        </div>
        <div class="col-lg-3" id="russie" style="text-align: center">
            <a href="#"><img src="images/russie.png" width="100px" height="60px"/><br>Russie</a>
            <input type="checkbox" name="russie"/>
        </div>
        <div class="col-lg-3" id="suede" style="text-align: center">
            <a href="#"><img src="images/suede.png" width="100px" height="60px"/><br>Suede</a>
            <input type="checkbox" name="suede"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retournation">Retour</button>
        </div>
    </div>
</div>
<div id="affichligues" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="ligue1" style="text-align: center">
            <a href="#"><img src="images/ligue1.png" width="80px" height="80px"/><br>Ligue 1</a>
        </div>
        <div class="col-lg-3" id="liga" style="text-align: center">
            <a href="#"><img src="images/liga.png" width="200px" height="80px"/><br>Liga</a>
        </div>
        <div class="col-lg-3" id="bundesliga" style="text-align: center">
            <a href="#"><img src="images/bundesliga.png" width="80px" height="80px"/><br>Bundesliga</a>
        </div>
        <div class="col-lg-3" id="d1portugal" style="text-align: center">
            <a href="#"><img src="images/d1portugal.png" width="80px" height="80px"/><br>D1 Portugal</a>
        </div>
        <div class="col-lg-3" id="serieA" style="text-align: center">
            <a href="#"><img src="images/seriea.png" width="80px" height="80px"/><br>Serie A</a>
        </div>
        <div class="col-lg-3" id="superlig" style="text-align: center">
            <a href="#"><img src="images/superlig.png" width="80px"
                             height="80px"/><br>D1 Turquie</a>
        </div>
        <div class="col-lg-3" id="premierligue" style="text-align: center">
            <a href="#"><img src="images/premierleague.png" width="80px"
                             height="80px"/><br>Premier League</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourchoix">Retour</button>
        </div>
    </div>
</div>
<div id="affichligue1" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="om" style="text-align: center">
            <a href="#"><img src="images/om.png" width="80px" height="80px"/><br>Marseille</a>
            <input type="checkbox" name="marseille"/>
        </div>
        <div class="col-lg-3" id="ol" style="text-align: center">
            <a href="#"><img src="images/ol.png" width="80px" height="80px"/><br>Lyon</a>
            <input type="checkbox" name="lyon"/>
        </div>
        <div class="col-lg-3" id="lille" style="text-align: center">
            <a href="#"><img src="images/lille.png" width="80px" height="80px"/><br>Lille</a>
            <input type="checkbox" name="lille"/>
        </div>
        <div class="col-lg-3" id="psg" style="text-align: center">
            <a href="#"><img src="images/psg.png" width="80px" height="80px"/><br>PSG</a>
            <input type="checkbox" name="psg"/>
        </div>
        <div class="col-lg-3" id="monaco" style="text-align: center">
            <a href="#"><img src="images/monaco.png" width="80px" height="80px"/><br>Monaco</a>
            <input type="checkbox" name="monaco"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<div id="affichsuperlig" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="" style="text-align: center">
            <a href="#"><img src="images/fenerbahce.png" width="80px" height="80px"/><br>Fenerbahce</a>
            <input type="checkbox" name="fenerbahce"/>
        </div>
        <div class="col-lg-3" id="galatasaray" style="text-align: center">
            <a href="#"><img src="images/galatasaray.png" width="80px" height="80px"/><br>Galatasaray</a>
            <input type="checkbox" name="galatasaray"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<div id="affichd1portugal" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="benfica" style="text-align: center">
            <a href="#"><img src="images/benfica.png" width="80px" height="80px"/><br>Benfica Lisbonne</a>
            <input type="checkbox" name="benfica"/>
        </div>
        <div class="col-lg-3" id="braga" style="text-align: center">
            <a href="#"><img src="images/braga.png" width="80px" height="80px"/><br>Braga</a>
            <input type="checkbox" name="braga"/>
        </div>
        <div class="col-lg-3" id="porto" style="text-align: center">
            <a href="#"><img src="images/porto.png" width="80px" height="80px"/><br>FC Porto</a>
            <input type="checkbox" name="porto"/>
        </div>
        <div class="col-lg-3" id="sporting" style="text-align: center">
            <a href="#"><img src="images/sporting.png" width="80px" height="80px"/><br>Sporting Portugal</a>
            <input type="checkbox" name="sporting"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<div id="affichseriea" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="juventus" style="text-align: center">
            <a href="#"><img src="images/juventus.png" width="80px" height="80px"/><br>Juventus</a>
            <input type="checkbox" name="juventus"/>
        </div>
        <div class="col-lg-3" id="milan" style="text-align: center">
            <a href="#"><img src="images/milan.png" width="80px" height="80px"/><br>Milan AC</a>
            <input type="checkbox" name="milan"/>
        </div>
        <div class="col-lg-3" id="inter" style="text-align: center">
            <a href="#"><img src="images/inter.png" width="80px" height="80px"/><br>Inter Milan</a>
            <input type="checkbox" name="inter"/>
        </div>
        <div class="col-lg-3" id="naples" style="text-align: center">
            <a href="#"><img src="images/naples.png" width="80px" height="80px"/><br>Naples</a>
            <input type="checkbox" name="naples"/>
        </div>
        <div class="col-lg-3" id="lazio" style="text-align: center">
            <a href="#"><img src="images/lazio.png" width="80px" height="80px"/><br>Lazio Rome</a>
            <input type="checkbox" name="lazio"/>
        </div>
        <div class="col-lg-3" id="roma" style="text-align: center">
            <a href="#"><img src="images/rome.png" width="80px" height="80px"/><br>Roma</a>
            <input type="checkbox" name="roma"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<div id="affichbundesliga" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="bayern" style="text-align: center">
            <a href="#"><img src="images/bayern.png" width="80px" height="80px"/><br>Bayern Munich</a>
            <input type="checkbox" name="bayern"/>
        </div>
        <div class="col-lg-3" id="dortmund" style="text-align: center">
            <a href="#"><img src="images/dortmund.png" width="80px" height="80px"/><br>Borussia Dortmund</a>
            <input type="checkbox" name="dortmund"/>
        </div>
        <div class="col-lg-3" id="bayer" style="text-align: center">
            <a href="#"><img src="images/leverkusen.png" width="80px" height="80px"/><br>Bayer Leverkusen</a>
            <input type="checkbox" name="leverkusen"/>
        </div>
        <div class="col-lg-3" id="hambourg" style="text-align: center">
            <a href="#"><img src="images/hambourg.png" width="80px" height="80px"/><br>Hambourg</a>
            <input type="checkbox" name="hambourg"/>
        </div>
        <div class="col-lg-3" id="shalke" style="text-align: center">
            <a href="#"><img src="images/shalke.png" width="80px" height="80px"/><br>Shalke 04</a>
            <input type="checkbox" name="shalke"/>
        </div>
        <div class="col-lg-3" id="werder" style="text-align: center">
            <a href="#"><img src="images/werder.png" width="80px" height="80px"/><br>Werder Breme</a>
            <input type="checkbox" name="werder"/>
        </div>
        <div class="col-lg-3" id="wolfsburg" style="text-align: center">
            <a href="#"><img src="images/wolfsburg.png" width="80px" height="80px"/><br>Wolfsburg</a>
            <input type="checkbox" name="wolfsburg"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<div id="affichliga" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="atletico" style="text-align: center">
            <a href="#"><img src="images/atletico.png" width="80px" height="80px"/><br>Atletico Madrid</a>
            <input type="checkbox" name="atletico"/>
        </div>
        <div class="col-lg-3" id="barca" style="text-align: center">
            <a href="#"><img src="images/barca.png" width="80px" height="80px"/><br>FC Barcelone</a>
            <input type="checkbox" name="barcelone"/>
        </div>
        <div class="col-lg-3" id="bilbao" style="text-align: center">
            <a href="#"><img src="images/bilbao.png" width="80px" height="80px"/><br>Bilbao</a>
            <input type="checkbox" name="bilbao"/>
        </div>
        <div class="col-lg-3" id="malaga" style="text-align: center">
            <a href="#"><img src="images/malaga.png" width="80px" height="80px"/><br>Malaga</a>
            <input type="checkbox" name="malaga"/>
        </div>
        <div class="col-lg-3" id="real" style="text-align: center">
            <a href="#"><img src="images/real.png" width="80px" height="80px"/><br>Real Madrid</a>
            <input type="checkbox" name="real"/>
        </div>
        <div class="col-lg-3" id="seville" style="text-align: center">
            <a href="#"><img src="images/seville.png" width="80px" height="80px"/><br>FC Seville</a>
            <input type="checkbox" name="seville"/>
        </div>
        <div class="col-lg-3" id="valence" style="text-align: center">
            <a href="#"><img src="images/valence.png" width="80px" height="80px"/><br>FC Valence</a>
            <input type="checkbox" name="valence"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<div id="affichpremier" style="display: none;">
    <div class="row">
        <div class="col-lg-3" id="arsenal" style="text-align: center">
            <a href="#"><img src="images/arsenal.png" width="80px" height="80px"/><br>Arsenal</a>
            <input type="checkbox" name="arsenal"/>
        </div>
        <div class="col-lg-3" id="chelsea" style="text-align: center">
            <a href="#"><img src="images/chelsea.png" width="80px" height="80px"/><br>FC Chelsea</a>
            <input type="checkbox" name="chelsea"/>
        </div>
        <div class="col-lg-3" id="everton" style="text-align: center">
            <a href="#"><img src="images/everton.png" width="80px" height="80px"/><br>Everton</a>
            <input type="checkbox" name="everton"/>
        </div>
        <div class="col-lg-3" id="liverpool" style="text-align: center">
            <a href="#"><img src="images/liverpool.png" width="80px" height="80px"/><br>Liverpool</a>
            <input type="checkbox" name="liverpool"/>
        </div>
        <div class="col-lg-3" id="newcastle" style="text-align: center">
            <a href="#"><img src="images/newcastle.png" width="80px" height="80px"/><br>Newcastle</a>
            <input type="checkbox" name="newcastle"/>
        </div>
        <div class="col-lg-3" id="city" style="text-align: center">
            <a href="#"><img src="images/city.png" width="80px" height="80px"/><br>Manchester City</a>
            <input type="checkbox" name="city"/>
        </div>
        <div class="col-lg-3" id="united" style="text-align: center">
            <a href="#"><img src="images/manu.png" width="80px" height="80px"/><br>Manchester United</a>
            <input type="checkbox" name="united"/>
        </div>
        <div class="col-lg-3" id="tottenham" style="text-align: center">
            <a href="#"><img src="images/tottenham.png" width="80px" height="80px"/><br>Tottenham</a>
            <input type="checkbox" name="tottenham"/>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-offset-5 col-lg-6">
            <button type="button" class="btn btn-warning retourligues">Retour</button>
        </div>
    </div>
</div>
<br>
<div id="affichechoix">
    <p id="listeequipes"></p>
</div>
<input type="hidden" name="nbequipe" value="<?php echo $nbequipes; ?>">
<input type="hidden" name="nomTournoi" value="<?php echo $nomTournoi; ?>">
<input type="submit" class="btn btn-success pull-right" value="Valider"/>
</form>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
    $("#nation").click(function () {
        $("#affichnation").css("display", "block");
        $("#nation").css("display", "none");
        $("#club").css("display", "none");
        $("#annule").css("display", "none");
    });
    $("#club").click(function () {
        $("#affichligues").css("display", "block");
        $("#nation").css("display", "none");
        $("#club").css("display", "none");
        $("#annule").css("display", "none");
    });
    $(".retournation").click(function () {
        $("#affichnation").css("display", "block");
        $("#affichoceanie").css("display", "none");
        $("#affichasie").css("display", "none");
        $("#affichamsud").css("display", "none");
        $("#affichamnord").css("display", "none");
        $("#affichafrique").css("display", "none");
        $("#afficheurope").css("display", "none");
    });
    $(".retourligues").click(function () {
        $("#affichligues").css("display", "block");
        $("#affichligue1").css("display", "none");
        $("#affichsuperlig").css("display", "none");
        $("#affichd1portugal").css("display", "none");
        $("#affichseriea").css("display", "none");
        $("#affichbundesliga").css("display", "none");
        $("#affichliga").css("display", "none");
        $("#affichpremier").css("display", "none");
    });
    $(".retourchoix").click(function () {
        $("#nation").css("display", "block");
        $("#club").css("display", "block");
        $("#affichnation").css("display", "none");
        $("#annule").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#oceanie").click(function () {
        $("#affichoceanie").css("display", "block");
        $("#affichnation").css("display", "none");
    });
    $("#ligue1").click(function () {
        $("#affichligue1").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#premierligue").click(function () {
        $("#affichpremier").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#bundesliga").click(function () {
        $("#affichbundesliga").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#liga").click(function () {
        $("#affichliga").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#serieA").click(function () {
        $("#affichseriea").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#d1portugal").click(function () {
        $("#affichd1portugal").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#superlig").click(function () {
        $("#affichsuperlig").css("display", "block");
        $("#affichligues").css("display", "none");
    });
    $("#asie").click(function () {
        $("#affichasie").css("display", "block");
        $("#affichnation").css("display", "none");
    });
    $("#amsud").click(function () {
        $("#affichamsud").css("display", "block");
        $("#affichnation").css("display", "none");
    });
    $("#afrique").click(function () {
        $("#affichafrique").css("display", "block");
        $("#affichnation").css("display", "none");
    });
    $("#europe").click(function () {
        $("#afficheurope").css("display", "block");
        $("#affichnation").css("display", "none");
    });
    $("#amnord").click(function () {
        $("#affichamnord").css("display", "block");
        $("#affichnation").css("display", "none");
    });
    $(".reset").click(function () {
        var cases = $("input[type='checkbox']").attr('checked', false);
        obj1 = [];
        $("#listeequipes").text("");
    });
    var obj1 = [];
    $("input[type='checkbox']").click(function () {
        if (this.checked) {
            obj1.push($(this).attr('name'));
            console.log($(this).attr('name'), "true");
        } else {
            console.log($(this).attr('name'), "false");
            var output = [];
            var index = obj1.indexOf($(this).attr('name'));
            var j = 0;
            for (var i in obj1) {
                if (i != index) {
                    output[j] = obj1[i];
                    j++;
                }
            }
            obj1 = output;
        }
        $("#listeequipes").text(obj1.join(", ").toUpperCase());
    });
</script>
</html>