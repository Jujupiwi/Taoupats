<?php
$prenom = 'Paul';
$nom = 'Dardenne';
$np = 'DP';
$age = '22';

/*********************************************************
Début des questions
 *********************************************************/
$poste = 'Attaquant';
$q1 = "Tpmp, canal football club et le journal du hard.";
$q2 = "Elysium";
$q3 = "Will Smith";
$q4 = "Un peu de tout mais pop rock";
$q5 = 'La biographie de raymond Domenech';
$q6 = "Une voiture tout court maintenant que j'ai le permis";
$q7 = "L'Irlande mais je l'ai déja fait sinon les USA";
$q8 = "Colomiers, Mondonville, Aussonne et Daux";
$q9 = "Polo";
$q10 = "La timidité";
$q11 = "La gentillesse et générosité";
$q12 = "Le TFC et le barca";
$q13 = "Peut etre Madrid, des milliards mais ca gagne plus.";
$q14 = "Un certain 12 Juillet 1998";
$q15 = "Mon papy mounet";
$q16 = "Le match amical contre aussonne l'année derniere, mon premier but avec les taoupats (merci Enzo)";
$q17 = "Pour l'instant aucune";
$q18 = "Pour pas dire encore enzo je vais dire mon cousin!";
$q19 = "Alexy Coquinou";
$q20 = "Olive";
$q21 = "Tony";
$q22 = "L'alcool ne mène à rien, ca tombe bien je compte aller nulle part.";
$q23 = "Un grand merci à cette grande famille jaune et noire pour c'est deux belles années et les autres à venir.
Je vous aime mes salopes <3";
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
         src="images/team/<?php echo $prenom; ?>.jpg">
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