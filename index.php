<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
    <title>Taoupats de Daux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="Site du club de foot des taoupats de daux">
    <meta name="keywords" content="Foot,Daux,Taoupats">
    <meta name="author" content="Julien Guerrin">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
</head>
<body style="background-color:#fffbd8;">
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target=".bs-navbar-collapse" data-toggle="collapse"
                    type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TAOUPATS <span style="color:khaki;">DE DAUX</span></a>
        </div>
        <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-folder-open">&nbsp;</i>SAISON
                        13-14 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="classement.php"><i class="icon-list-ol orange">&nbsp;</i>Classement</a></li>
                        <li><a href="calendrier.php"><i class="icon-calendar green">&nbsp;</i>Calendrier</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-info-sign red">&nbsp;</i>Dernier Match</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase">&nbsp;</i>ARCHIVES<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-signal purple">&nbsp;</i>Sondages</a></li>
                        <li><a href="#"><i class="icon-eye-open lblue">&nbsp;</i>Interviews</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-list-ol green">&nbsp;</i>Classement 12-13</a></li>
                        <li><a href="#"><i class="icon-calendar red">&nbsp;</i>Calendrier 12-13</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-camera">&nbsp;</i>PHOTOS</a>
                </li>
                <li>
                    <a href="#"><i class="icon-user">&nbsp;</i>TROMBI</a>
                </li>
                <li>
                    <a href="#"><i class="icon-signal">&nbsp;</i>SONDAGES</a>
                </li>
                <li>
                    <a href="interviews.php"><i class="icon-eye-open">&nbsp;</i>INTERVIEWS</a>
                </li>
                <li>
                    <a href="contact.php"><i class="icon-envelope">&nbsp;</i>CONTACT</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="container" style="margin-top: 70px; margin-bottom: -10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Taoupats De Daux</h1>

                <p>Club de foot des Taoupats de Daux!!</p>
                <!-- Début Block de Couleur -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="bor"></div>
                        <ul class="hover-block">
                            <li><a href="#" data-toggle="tooltip" data-placement="bottom" class="popup"
                                   data-original-title="Calendrier de la saison 2013-2014"> <img
                                        src="images/calendrier.jpg" alt="" width="100%"/>

                                    <div class="hover-content b-red">
                                        <h5>Calendrier</h5>
                                        Consulter le calendrier de la saison 2013-2014 des Taoupats.
                                    </div>
                                </a></li>
                            <li><a href="#" class="popup" data-toggle="tooltip" data-placement="bottom"
                                   data-original-title="Classement de la saison 2013-2014"> <img
                                        src="images/podium.jpg" alt="" width="100%"/>

                                    <div class="hover-content b-purple">
                                        <h5>Classement</h5>
                                        Consulter le classement de la poule D division 2.
                                    </div>
                                </a></li>
                            <li><a href="#" class="popup" data-toggle="tooltip" data-placement="bottom"
                                   data-original-title="Photos des Taoupats"> <!-- Image --> <img
                                        src="images/camera.jpg" alt="" width="100%"/>
                                    <!-- Content with background color Class -->
                                    <div class="hover-content b-orange">
                                        <h5>Photos</h5>
                                        Consulter les Photos des Taoupats.
                                    </div>
                                </a></li>
                            <li class="visible-desktop"><a href="#" class="popup" data-toggle="tooltip"
                                                           data-placement="bottom"
                                                           data-original-title="Sondage de la semaine"> <img
                                        src="images/sondage.jpg" alt="" width="100%"/>

                                    <div class="hover-content b-lblue">
                                        <h5>Sondages</h5>
                                        Retrouver un sondage par semaine dans cette section.
                                    </div>
                                </a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Fin block de couleur -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Informations</h1>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <p id="affichageDate"></p>
                    </li>
                    <li class="list-group-item">
                        <p id="affichage"></p>
                        <span class="time" id="jours"></span>
                        <span class="time" id="heures"></span>
                        <span class="time" id="minutes"></span>
                        <span class="time" id="secondes"></span>
                    </li>
                    <li class="list-group-item">
                        <p id="affichage-amical"></p>
                        <span class="time" id="jours-amical"></span>
                        <span class="time" id="heures-amical"></span>
                        <span class="time" id="minutes-amical"></span>
                        <span class="time" id="secondes-amical"></span>
                    </li>
                    <li class="list-group-item">
                        Article La Dépêche du <span class="label label-default">25 Juin 2013</span> :
                        <a target="_blank"
                           href="http://www.ladepeche.fr/article/2013/06/25/1657389-daux-foobtall-fin-de-saison-en-beaute.html#xtor=EPR-1">
                            "Daux : Fin de saison en beauté."</a>
                    </li>
                    <li class="list-group-item">Bilan saison 2012-2013, MJ : <span
                            class="label label-primary">35</span>, V : <span
                            class="label label-success">17</span>, N : <span
                            class="label label-warning">4</span>, D : <span
                            class="label label-danger">14</span></li>
                    <li class="list-group-item">
                        Article La Dépêche du <span class="label label-default">19 Avril 2012</span> :
                        <a target="_blank"
                           href="http://www.ladepeche.fr/article/2012/04/19/1334214-daux-les-taoupats-terminent-leur-en-bonne-position.html">
                            "Les Taoupats terminent leur saison en bonne position."</a>
                    </li>
                    <li class="list-group-item">
                        <span
                            class="label label-default">Nos sponsors :</span>
                        <a target="_blank"
                           href="http://www.domainedepeyrolade.com/">
                            Domaine de Peyrolade</a> , <a target="_blank"
                                                          href="http://www.maconnerie-massot.com/">
                            Massot Multi-Services</a>,
                        Pépinières Caussat
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <footer class="bs-footer" role="contentinfo">
        <div class="container">
            <div class="bs-social">
                <a target="_blank" href="http://www.facebook.com" style="text-decoration: none"><span
                        class="label label-default"><i class="icon icon-facebook">
                            &nbsp;&nbsp;</i>FACEBOOK</span></a>
                <a target="_blank" href="http://www.twitter.com" style="text-decoration: none"><span
                        class="label label-default"><i class="icon icon-twitter">&nbsp;&nbsp;</i>TWITTER</span></a>
                <a target="_blank" href="http://www.googleplus.com" style="text-decoration: none"><span
                        class="label label-default"><i class="icon icon-google-plus">&nbsp;&nbsp;</i>GOOGLE +</span></a>
            </div>
    </footer>

    <p class="pull-right text-muted"><I>Réalisé par Julien, @Jujupiwi.</I></p>

</div>

</body>
<script src="bootstrap/js/jQuery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function CompteARebours() {
        var date_actuelle = new Date(); // On déclare la date d'aujourd'hui.
        var annee = date_actuelle.getFullYear();
        var noel = new Date(annee, 8, 7, 20, 0, 0); // On déclare la date de Noël.
        if (noel.getTime() < date_actuelle.getTime()) // Si Noël est dépassé, on passe au Noël suivant !
            noel = new Date(annee, 8, 22, 15, 0, 0); // On re-déclare Noël pour qu'il ne soit pas passé.
        var tps_restant = noel.getTime() - date_actuelle.getTime(); // Temps restant en millisecondes
        //============ CONVERSIONS
        var s_restantes = tps_restant / 1000; // On convertit en secondes
        var i_restantes = s_restantes / 60;
        var H_restantes = i_restantes / 60;
        var d_restants = H_restantes / 24;
        s_restantes = Math.floor(s_restantes % 60); // Secondes restantes
        i_restantes = Math.floor(i_restantes % 60); // Minutes restantes
        H_restantes = Math.floor(H_restantes % 24); // Heures restantes
        d_restants = Math.floor(d_restants); // Jours restants
        var mois_fr = new Array('Janvier', 'Février', 'Mars', 'Avril',
            'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre');
        var texteDate = "Nous sommes le <strong>" + date_actuelle.getDate()
            + " " + mois_fr[date_actuelle.getMonth()] + " "
            + date_actuelle.getFullYear() + "</strong>,"
            + " et il est <strong>" + date_actuelle.getHours() + "h"
            + date_actuelle.getMinutes() + "</strong>.";
        var texte = "<strong>Match championnat <span class='label label-primary'>Nailloux</span> le <span class='label label-default'> Samedi 07 Septembre 2013 à 20h</span> :</strong>";
        document.getElementById("affichage").innerHTML = texte;
        document.getElementById("affichageDate").innerHTML = texteDate;
        document.getElementById("jours").innerHTML = "<strong><span class='badge'>"
            + d_restants + "</span> Jours</strong>";
        document.getElementById("heures").innerHTML = "<strong><span class='badge'>"
            + H_restantes + "</span> Heures</strong>";
        document.getElementById("minutes").innerHTML = "<strong><span class='badge'>"
            + i_restantes + "</span> Minutes</strong>";
        document.getElementById("secondes").innerHTML = "<strong><span class='badge'>"
            + s_restantes + "</span> Secondes</strong>";
    }
    function CompteRebours() {
        var date_actuelle = new Date(); // On déclare la date d'aujourd'hui.
        var annee = date_actuelle.getFullYear();
        var match = new Date(annee, 7, 31, 18, 0, 0); // On déclare la date de Noël.
        if (match.getTime() < date_actuelle.getTime()) // Si Noël est dépassé, on passe au Noël suivant !
            match = new Date(annee, 7, 31, 18, 0, 0); // On re-déclare Noël pour qu'il ne soit pas passé.
        var tps_restant = match.getTime() - date_actuelle.getTime(); // Temps restant en millisecondes
        //============ CONVERSIONS
        var s_restantes = tps_restant / 1000; // On convertit en secondes
        var i_restantes = s_restantes / 60;
        var H_restantes = i_restantes / 60;
        var d_restants = H_restantes / 24;
        s_restantes = Math.floor(s_restantes % 60); // Secondes restantes
        i_restantes = Math.floor(i_restantes % 60); // Minutes restantes
        H_restantes = Math.floor(H_restantes % 24); // Heures restantes
        d_restants = Math.floor(d_restants); // Jours restants
        var mois_fr = new Array('Janvier', 'Février', 'Mars', 'Avril',
            'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre',
            'Novembre', 'Décembre');
        var texte = "<strong>Match amical <span class='label label-primary'>Cologne</span> le <span class='label label-default'> Samedi 31 Aout 2013 à 18h</span> :</strong>";
        document.getElementById("affichage-amical").innerHTML = texte;
        document.getElementById("jours-amical").innerHTML = "<strong><span class='badge'>"
            + d_restants + "</span> Jours</strong>";
        document.getElementById("heures-amical").innerHTML = "<strong><span class='badge'>"
            + H_restantes + "</span> Heures</strong>";
        document.getElementById("minutes-amical").innerHTML = "<strong><span class='badge'>"
            + i_restantes + "</span> Minutes</strong>";
        document.getElementById("secondes-amical").innerHTML = "<strong><span class='badge'>"
            + s_restantes + "</span> Secondes</strong>";
    }
    setInterval(CompteRebours, 1000);
    setInterval(CompteARebours, 1000);
</script>
<script>
    $('.popup').tooltip();
</script>
</html>
