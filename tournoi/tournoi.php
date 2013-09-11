<?php
include 'connexionBase.php';

$nb = $_GET['nb'];
$name = $_GET['name'];
$mode = $_GET['mode'];
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sqlcount = "select count(nom_tournoi) from tournoi where nom_tournoi = '$name';";
$requete = $mysqli->query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$row = $requete->fetch_assoc();
if ($row['count(nom_tournoi)'] != 0) {
    header("Refresh: 0;URL=creaoumodif.php?nom=exist");
}
if ($mode == "champ") {
    $nom_mode = "Championnat";
} else if ($mode == "elim") {
    $nom_mode = "Elimination Directe";
} else {
    $nom_mode = "Championnat + Elimination Directe";
}

?>
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top:100px">
<div class="row-fluid">
<div class="offset1 span10">
<form id="formJUJU" class="form-horizontal well" method="post" action="base.php" name="form">
<fieldset>
<center>
<div class="row-fluid">
    <div class="span12">
        <h3>TOURNOI : <?php echo strtoupper($name); ?></h3><br>
        <h5>Type de Tournoi : <?php echo strtoupper($nom_mode); ?></h5>
    </div>
</div>
<br><br>
<div class="row-fluid">
    <div class="span12">
        <?php for ($i = 1; $i <= $nb; $i++) { ?>
            <div class="row-fluid">
                <div class="span3">
                    Jr <?php echo $i; ?>: <input type="text" name="joueur<?php echo $i; ?>"
                                                 style="width:200px; height:30px;"
                                                 placeholder="Joueur <?php echo $i; ?>">
                </div>
                <div class="span3">
                    Eq <?php echo $i; ?>:
                    <select name="countrySelect<?php echo $i; ?>" id="countrySelect<?php echo $i; ?>"
                            onchange="affiche_div('countrySelect<?php echo $i; ?>','<?php echo $i; ?>','autre<?php echo $i; ?>')">
                        <option value="rien" selected="selected"></option>
                        <option value="Club">Club</option>
                        <option value="Pays">Pays</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="span3">
                    <div id="div_a_afficher<?php echo $i; ?>" style="display:none"
                         onchange="affiche_div('ligue<?php echo $i; ?>','<?php echo $i; ?>','club_ligue')"
                         name="div_a_afficher<?php echo $i; ?>">
                        <select name="ligue<?php echo $i; ?>" id="ligue<?php echo $i; ?>">
                            <option value="rien"></option>
                            <option value="premiere_league">Premier League</option>
                            <option value="liga">Liga</option>
                            <option value="serie_a">Serie A</option>
                            <option value="bundesliga">Bundesliga</option>
                            <option value="ligue_1">Ligue 1</option>
                            <option value="super_lig">Super Lig</option>
                            <option value="d1_portugal">D1 Portugual</option>
                        </select>
                    </div>
                    <div id="autre<?php echo $i; ?>" style="display:none"
                         onchange="affiche_div('country<?php echo $i; ?>','<?php echo $i; ?>','country_ligue')">
                        <select name="country<?php echo $i; ?>" id="country<?php echo $i; ?>">
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
                <div class="span2">
                    <div id="premier_league<?php echo $i; ?>" name="premier_league<?php echo $i; ?>"
                         style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test13" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="arsenal">Arsenal</option>
                            <option value="chelsea">Chelsea</option>
                            <option value="everton">Everton</option>
                            <option value="liverpool">Liverpool</option>
                            <option value="newcastle">Newcastle</option>
                            <option value="city">Manchester City</option>
                            <option value="manu">Manchester United</option>
                            <option value="tottenham">Tottenham</option>
                        </select>
                    </div>
                    <div id="europe<?php echo $i; ?>" name="europe<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test12" onchange="valid(<?php echo $i; ?>)">
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
                        <select name="lol<?php echo $i; ?>" id="test11" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="argentine">Argentine</option>
                            <option value="bresil">Bresil</option>
                            <option value="mexique">Mexique</option>
                            <option value="uruguay">Uruguay</option>
                        </select>
                    </div>
                    <div id="am_nord<?php echo $i; ?>" name="am_nord<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test10" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="etats-unis">Etats-Unis</option>
                        </select>
                    </div>
                    <div id="asie<?php echo $i; ?>" name="asie<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test9" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="chine">Chine</option>
                            <option value="japon">Japon</option>
                            <option value="turquie">Turquie</option>
                        </select>
                    </div>
                    <div id="afrique<?php echo $i; ?>" name="afrique<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test8" onchange="valid(<?php echo $i; ?>)">
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
                        <select name="lol<?php echo $i; ?>" id="test7" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="nouvellezelande">Nouvelle Zelande</option>
                            <option value="australie">Australie</option>
                        </select>
                    </div>
                    <div id="liga<?php echo $i; ?>" name="liga<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test6" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="atletico">Atletico Madrid</option>
                            <option value="barca">FC Barcelone</option>
                            <option value="bilbao">Bilbao</option>
                            <option value="malaga">Malaga</option>
                            <option value="real">Real Madrid</option>
                            <option value="seville">FC Seville</option>
                            <option value="valence">Valence</option>
                        </select>
                    </div>
                    <div id="serie_a<?php echo $i; ?>" name="serie_a<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test5" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="juventus">Juventus</option>
                            <option value="milan">Milan AC</option>
                            <option value="inter">Inter Milan</option>
                            <option value="naples">Naples</option>
                            <option value="lazio">Lazio Rome</option>
                            <option value="rome">AS Roma</option>
                        </select>
                    </div>
                    <div id="bundes<?php echo $i; ?>" name="bundes<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test4" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="bayern">Bayern Munich</option>
                            <option value="dortmund">Borussia Dortmund</option>
                            <option value="leverkusen">Bayer Leverkusen</option>
                            <option value="hambourg">Hambourg</option>
                            <option value="shalke">Shalke 04</option>
                            <option value="werder">Werder Breme</option>
                            <option value="wolfsburg">Wolfsburg</option>
                        </select>
                    </div>
                    <div id="ligue_1<?php echo $i; ?>" name="ligue_1<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test3" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="om">OM</option>
                            <option value="ol">OL</option>
                            <option value="lille">Lille</option>
                            <option value="psg">PSG</option>
                        </select>
                    </div>
                    <div id="super_lig<?php echo $i; ?>" name="super_lig<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test2" onchange="valid(<?php echo $i; ?>)">
                            <option value="rien"></option>
                            <option value="fenerbahce">Fenerbahce</option>
                            <option value="galatasaray">Galatasaray</option>
                        </select>
                    </div>
                    <div id="d1_portugal<?php echo $i; ?>" name="d1_portugal<?php echo $i; ?>" style="display:none">
                        <select name="lol<?php echo $i; ?>" id="test1" onchange="valid(<?php echo $i; ?>);">
                            <option value="rien"></option>
                            <option value="benfica">Benfica Lisbonne</option>
                            <option value="braga">Braga</option>
                            <option value="porto">FC Porto</option>
                            <option value="sporting">Sporting Portugal</option>
                        </select>
                    </div>
                    <div id="image<?php echo $i; ?>">
                    </div>
                </div>
                <input type="hidden" name="equipe<?php echo $i; ?>" id="equipe<?php echo $i; ?>">
            </div>
            <br><br>------------------------------------------<br><br>
        <?php } ?>
    </div>
</div>
<br><br>
Aller - Retour : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="ar" id="oui" value="oui" checked>&nbsp;&nbsp;Oui &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="ar" id="non" value="non">&nbsp;&nbsp;Non
<br><br><br>
<input type="hidden" value="<?php echo $nb; ?>" name="Nb">
<input type="hidden" value="<?php echo $name; ?>" name="Name">
<input type="hidden" value="<?php echo $mode; ?>" name="Mode">
<input type="hidden" value="<?php echo $ar; ?>" name="Type">
<input type="submit" class="btn-info" value="Continuer"/>
<div class="span2">
    <a class="btn btn-medium btn-success"
       href="random.php?nb=<?php echo $nb; ?>&name=<?php echo $name; ?>&mode=<?php echo $mode; ?>" width="100px"
       height="30px">Choix des Equipes</a>
</div>
<br><br>
</center>
</fieldset>
</form>
</div>
</div>
</body>
<script src="../js/jquery.js"></script>
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
        //puis on teste(atention ce qui est renvoy� ici c'est $data['code']
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
</html>