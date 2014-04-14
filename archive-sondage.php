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
                        <a href="index.html">TAOUPATS <span class="color">DE DAUX</span>
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
                    <li><a href="index.html"><i class="icon-home">&nbsp;</i>Accueil</a>
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
                            <li><a href="#"><i class="icon-signal">&nbsp;</i>Sondages</a></li>
                            <li><a href="archive-inter.php"><i class="icon-eye-open">&nbsp;</i>Interviews</a>
                            </li>
                            <li><a href="archive-calendrier.php"><i class="icon-calendar">&nbsp;</i>Calendrier 2012-2013</a>
                            </li>
                            <li><a href="archive-classement.php"><i class="icon-list-ol">&nbsp;</i>Classement 2012-2013</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown hidden-phone"><a href="#" class="dropdown-toggle"
                                                         data-toggle="dropdown"><i class="icon-camera">
                                &nbsp;</i>Photos<b
                                class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="photos.php"><i class="icon-film">&nbsp;</i>D'Aujourd'hui</a></li>
                            <li class="hidden-phone"><a href="photos-old.php"><i class="icon-camera-retro">&nbsp;</i>D'Hier</a>
                            </li>
                            <li class="hidden-phone"><a href="photos-annif.php"><i class="icon-gift">&nbsp;</i>40
                                    ans</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="trombi.php"><i class="icon-user">&nbsp;&nbsp;</i>Trombi</a>
                    </li>
                    <li class="visible-desktop"><a href="sondage.php"><i class="icon-signal">&nbsp;</i>Sondages</a>
                    </li>
                    <li class="visible-phone visible-tablet"><a href="sondage-mobile.php"><i
                                class="icon-signal">&nbsp;</i>Sondages</a></li>
                    <li><a href="interview.php"><i class="icon-eye-open">&nbsp;</i>Interviews</a>
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
                                    <a href="http://foot31-dmt.fff.fr/cg/6509/www/index.shtml"
                                       target="_blank"><i class="icon-circle-arrow-down"></i>&nbsp;District
                                        HGMT</a>
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
                                        <a href="archive-classement.php"><i class="icon-circle-arrow-down"></i>
                                            Voir le Classement</a>
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
            <h2>ARCHIVES SONDAGES</h2>
            <h4>Dernier Sondage : Fenouillet</h4>
            <br> <br>
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#homme" id="homme-match">Homme du match</a>
                </li>
                <li><a href="#note" id="note-match">Note du match</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="homme">
                    <?php include 'contenu/archive_homme_match.php'; ?>
                </div>
                <div class="tab-pane" id="note">
                    <?php include 'contenu/archive_note_match.php'; ?>
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
<script>
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
</script>
</body>
</html>
