<?php
/*********************************************************
Interview de la personne de la semaine
 *********************************************************/
$prenom = 'André Filipe';
$nom = 'Passos Maciel';
$np = 'AF';
$age = '22';

/*********************************************************
Début des questions
 *********************************************************/
$poste = "Couteau suisse (défenseur central/milieu de terrain)";
$q1 = "iTélé au petit déj' et Le Petit Journal à l'apéro.";
$q2 = "Le Loup de Wall Street. Juste magique.";
$q3 = "Will Smith, surtout dans 'Je suis une légende'. Leonardo Di Caprio dans 'Shutter Island', 'Inception' et 'Le Loup de Wall Street'.";
$q4 = "Du fado et 'Apita o comboio'.";
$q5 = "'Exchange rate and International Finance', de Laurence Copeland. Et en lecture plaisir, 'Hunger Games' de Suzanne Collins.";
$q6 = "J'aime beaucoup l'Alfa Romeo Giulietta et la Peugeot RCZ.";
$q7 = "Brazil !";
$q8 = "J'ai débuté ma carrière au sein de l'Entente Aussonne/Merville dès l'âge de 8 ans, après 2 ans de karaté. Ensuite, l'Entente s'est agrandie avec Daux/Mondonville/Seilh, et ça a été mes plus beaux souvenirs footballistiques (grâce à Julien B., mon amoureux <3). J'ai ensuite rejoint les Seniors de Merville pendant 3 ans, où l'on a été Vice Champion de 3ème série. Puis j'ai rejoint les Taoupats de Daux, grâce aux conseils de mon agent.";
$q9 = "Dédé pour quasiment tout le monde, Filipe au boulot.";
$q10 = "La timidité";
$q11 = "L'écoute.";
$q12 = "Je n'ai pas d'équipe préférée en Ligue 1 mais je supporte de très loin le TFC. Et sinon, le FC Porto, le meilleur club portugais de tous les temps.";
$q13 = "le Barça post Eto'o-Henry-Messi. Maintenant, il n'y a que des danseuse, type Sergio Busquets.";
$q14 = "Portugal - Pays-Bas, Coupe du Monde 2006 en Allemagne. Avec Pauleta, Figo, Deco, Ronaldo, Scolari, etc... Sur le but, mon père s'est jeté par terre sur le ventre comme si c'était lui qui avait marqué.";
$q15 = "Pedro Miguel Pauleta !";
$q16 = "Taoupats 2-0 Léguevin, en début d'année. Le match contre Fenouillet était bien aussi, malgré la défaite.";
$q17 = "Fenouillet est très solide.";
$q18 = "Enzo Birello l'italien.";
$q19 = "Coquillat. Quand tu joues 5, tu ne peux pas ne pas l'entendre. Remarque, pas besoin de jouer 5 pour ça en fait.";
$q20 = "Florent C.";
$q21 = "Maxime P.";
$q22 = "'Devegarinho é que se vai ao longe'. C'est en allant doucement qu'on arrive loin.";
$q23 = "Je suis content de vous avoir rejoint. Grâce à mon agent et moi-même, le nombre du gang des portugais a été multiplié par 2, soit une hausse de 100%, ce qui est important pour la représentativité du paysage socio-multiculturel local. D'un point de vue footballistique, je vais essayer de provoquer plus de pénalties dans la surface adverse que dans la nôtre.";

?>
<div class="row-fluid">
    <div class="span12">
        <blockquote>
            <h5><i class="icon-eye-open icon-white"> </i> Interview de la
                semaine.
            </h5>
            <h6>
                <small><cite title="Source Title">Nom : <?php echo $nom; ?>
                    </cite></small>
            </h6>
            <h6>
                <small><cite title="Source Title">Prenom : <?php echo $prenom; ?>
                    </cite></small>
            </h6>
            <h6>
                <small><cite title="Source Title">Age : <?php echo $age; ?> ans
                    </cite></small>
            </h6>
            <h6>
                <small><cite title="Source Title">Poste : <?php echo $poste; ?>
                    </cite></small>
            </h6>
        </blockquote>
    </div>
</div>
<br>

<div class="row-fluid">
<div class="span2">
    <img alt="120x180" data-src="bootstrap/js/bootstrap.js/120x180"
         style="width: 120px; height: 180px;"
         src="images/team/Dede.jpg">
</div>
<div class="span10">
<table
    class="table table-bordered table-striped table-condensed table-hover">
<tbody>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;">
        <b><i class="icon-eye-open"></i> Pour apprendre &agrave; te
            connaitre un peu plus, voici quelques questions. <br> <br>
            Quelle est l&#146;&eacute;mission de t&eacute;l&eacute; que
            tu ne rate jamais ? </b>
    </td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q1; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Le dernier film que tu es
            all&eacute; voir au cinema ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q2; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Ton acteur
            pr&eacute;f&eacute;r&eacute; ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q3; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Quelle genre de musique
            &eacute;coutes tu ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q4; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Le dernier livre que tu as lu ? </b>
    </td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q5; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> La voiture que tu aimerais avoir ?

        </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q6; ?>
    </td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Un pays que tu voudrais visiter ?
        </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q7; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Peux tu me dire la liste de tes
            clubs en tant que joueur ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q8; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Un surnom ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q9; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Ton plus gros d&eacute;faut ? </b>
    </td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q10; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Ta plus grande qualit&eacute; ? </b>
    </td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q11; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Ton &eacute;quipe
            pr&eacute;fer&eacute;e en ligue 1 et en europe ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q12; ?>
    </td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Celle que tu d&eacute;teste le
            plus ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q13; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Quel est le match de foot qui
            t&#146;as fait le plus r&ecirc;v&eacute; &agrave; la
            t&eacute;l&eacute;? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q14; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Ton idole en &eacute;tant gosse ?
        </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q15; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Quel est ton meilleur souvenir de
            match en tant que joueur des taoupats ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q16; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Quelle est l&#146;&eacute;quipe de
            notre championnat qui t&#146;a le plus impressionn&eacute;e ?

        </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q17; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Parlons de l&#146;&eacute;quipe.
            Le plus fashion victim ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q18; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Le plus mauvais perdant ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q19; ?>
    </td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Le plus s&eacute;rieux ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q20; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Le plus chambreur ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q21; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Un dicton ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q22; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> Et enfin, un petit mot pour
            l&#146;&eacute;quipe ? </b></td>
</tr>
<tr>
    <td style="text-align: left;"><i class="icon-headphones"></i> <?php echo $np; ?>
        : <?php echo $q23; ?></td>
</tr>
<tr>
    <td style="text-align: left; color: #AEAFAE; font-size: 18px;"><b><i
                class="icon-eye-open"></i> <?php echo $prenom; ?>, merci
            d&#146;avoir r&eacute;pondu &agrave; toutes ces questions !
            Rendez-vous la semaine prochaine pour une nouvelle interview
            d&#146;un membre des taoupats ! </b></td>
</tr>
</tbody>
</table>
</div>
</div>