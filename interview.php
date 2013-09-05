<?php
include 'contenu/param.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
    <title>Taoupats de Daux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link href="css/photos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/diapositive.css">
    <link rel="stylesheet" href="css/diapo.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/couleur.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon/favicon.png">
</head>
<body>
<!-- Header Starts -->
<header>
    <div class="container">
        <div class="row">
            <div class="span6">
                <div class="logo">
                    <h1>
                        <a href="index.php">TAOUPATS <span class="color">DE DAUX</span>
                        </a>
                    </h1>

                    <div class="hmeta">Site du Club de Foot de Daux</div>
                </div>
            </div>
            <div class="span6">
                <div class="form">
                    <div class="hmeta">Club de Foot de Daux</div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Navigation bar starts -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse"
               data-target=".nav-collapse"> <span>Menu</span>
            </a>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="index.php"><i class="icon-home">&nbsp;</i>Accueil</a>
                    </li>
                    <!-- Refer Bootstrap navbar doc -->
                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown"><i class="icon-folder-open">&nbsp;</i>Saison
                            2013-2014 <b class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="calendrier.php"><i class="icon-calendar">&nbsp;</i>Calendrier Taoupats</a></li>
                            <li><a href="resultats.php"><i class="icon-trophy">&nbsp;</i>Calendrier D2</a></li>
                            <li><a href="classement.php"><i class="icon-list-ol">&nbsp;</i>Classement</a></li>
                            <li><a href="stats.php"><i class="icon-dribbble">&nbsp;</i>Stats</a></li>
                            <li><a href="match.php"><i class="icon-info-sign">&nbsp;</i>Dernier Match</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown"><i class="icon-briefcase">&nbsp;</i>Archives<b
                                class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="archive-sondage.php"><i class="icon-signal">&nbsp;</i>Sondages</a></li>
                            <li class="hidden-phone"><a href="archive-inter.php"><i class="icon-eye-open">&nbsp;</i>Interviews</a>
                            </li>
                            <li><a href="archive-calendrier.php"><i class="icon-calendar">&nbsp;</i>Calendrier 2012-2013</a>
                            </li>
                            <li><a href="archive-classement.php"><i class="icon-list-ol">&nbsp;</i>Classement 2012-2013</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-phone"><a href="photos.php"><i class="icon-camera">&nbsp;</i>Photos</a>
                    </li>
                    <li><a href="trombi.php"><i class="icon-user">&nbsp;&nbsp;</i>Trombi</a>
                    </li>
                    <li class="visible-desktop"><a href="sondage.php"><i
                                class="icon-signal">&nbsp;</i>Sondages</a></li>
                    <li class="visible-phone visible-tablet"><a href="sondage-mobile.php"><i
                                class="icon-signal">&nbsp;</i>Sondages</a></li>
                    <li><a href="#"><i class="icon-eye-open">&nbsp;</i>Interviews</a>
                    </li>
                    <li><a href="contact.php"><i class="icon-envelope">&nbsp;</i>Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Navigation bar ends -->
<!-- Slider starts -->
<div class="full-slider">
    <!-- Slider (Flex Slider) -->
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <!-- Slider content -->
                            <div class="flex-caption">
                                <div class="col-l">
                                    <h2>Articles des Taoupats</h2>
                                    <h6>Consulter les articles de la Dépêche du Midi sur les
                                        Taoupats de Daux.</h6>
                                </div>
                                <!-- Right column -->
                                <div class="col-r">
                                    <div class="button">
                                        <a
                                            href="http://www.ladepeche.fr/article/2013/06/25/1657389-daux-foobtall-fin-de-saison-en-beaute.html#xtor=EPR-1"
                                            target="_blank"><i class="icon-circle-arrow-down"></i>
                                            Article du 25 Juin 2013</a>
                                    </div>
                                    <br>

                                    <div class="button">
                                        <a
                                            href="http://www.ladepeche.fr/article/2012/04/19/1334214-daux-les-taoupats-terminent-leur-en-bonne-position.html"
                                            target="_blank"><i class="icon-circle-arrow-down"></i>
                                            Article du 19 Avril 2012</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex-caption flex-center">
                                <h2>District Haute-Garonne Midi Toulousain</h2>
                                <h6>Rendez-vous sur le site du district pour les dernières
                                    infos du district.</h6>
                                <!-- Button -->
                                <div class="button">
                                    <a href="http://foot31-dmt.fff.fr/cg/6509/www/index.shtml" target="_blank"><i
                                            class="icon-circle-arrow-down"></i>&nbsp;District HGMT</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="flex-caption flex-center">
                                <h2>Recrutement Taoupats</h2>
                                <h6>Pour toutes demandes d'informations concernant le
                                    recrutement des Taoupats de Daux, rendez-vous dans la section
                                    Contact.</h6>
                                <!-- Button -->
                                <div class="button">
                                    <a href="contact.php"><i class="icon-circle-arrow-down"></i>&nbsp;Contact</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- Slider content -->
                            <div class="flex-caption">
                                <!-- Left column -->
                                <div class="col-l">
                                    <h2>Fin de la Saison 2012-2013</h2>
                                    <h6>Les Taoupats terminent 6ème de la poule C en division 2.</h6>
                                </div>
                                <div class="col-r">
                                    <h5>Les TROPIKs Champions</h5>

                                    <p>Les Tropiks terminent 1er de la poule avec 84 points et 19
                                        victoires sur les 24 joués. Ils terminent meilleure défense
                                        (26 buts encaissés) et 2ème meilleure attaque derrière Rodéo
                                        (79 buts marqués).</p>
                                    <!-- Button -->
                                    <div class="button">
                                        <a href="archive-classement.php"><i class="icon-circle-arrow-down"></i> Voir le
                                            Classement</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- Slider content -->
                            <div class="flex-caption">
                                <!-- Left column -->
                                <div class="col-l">
                                    <h2>Maçonnerie à Daux</h2>
                                    <h6>Rendez-vous sur le Site</h6>

                                    <div class="button">
                                        <a href="http://www.maconnerie-massot.com/" class="link-social"
                                           target="_blank"><i class="icon-circle-arrow-down"></i>&nbsp;Massot
                                            Multiservice</a>
                                    </div>
                                </div>
                                <!-- Right column -->
                                <div class="col-r">
                                    <!-- Use the class "flex-back" to add background inside flex slider -->
                                    <h2>Chambres d'hôtes et gîtes à Daux</h2>
                                    <h6>Plus de renseignements sur</h6>

                                    <div class="button">
                                        <a href="http://www.domainedepeyrolade.com/" class="link-social"
                                           target="_blank"><i class="icon-circle-arrow-down"></i>&nbsp;Domaine
                                            de Peyrolade</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Slider Ends -->
<!-- C O N T E N T -->
<div class="container">
<div class="row-fluid">
<div class="span12">
<h2>INTERVIEW</h2>
<h4>Saison 2013-2014</h4>
<br>

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
</div>
</div>
</div>
<!-- Social -->
<div class="social-links">
    <div class="container">
        <div class="row">
            <div class="span12">
                <p class="big">
                    <span>Rendez-vous sur</span> <a href="#"><i class="icon-facebook"></i>Facebook</a>
                    <a href="#"><i class="icon-google-plus"></i>Google Plus</a> <a href="#"><i
                            class="icon-twitter"></i>Twitter</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="copy">
                    <p>Réalisé par julien, @jujupiwi.</p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>

<!-- JS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.isotope.js"></script>
<script src="js/jquery.photos.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/modernizr.custom.28468.js"></script>
<script src="js/filter.js"></script>
<script src="js/cycle.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/easing.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39140201-1']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>
