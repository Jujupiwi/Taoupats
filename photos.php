<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ansi">
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
    <link rel="stylesheet" href="css/slideshow.css"/>

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
                            <li><a href="calendrier.php"><i class="icon-calendar">&nbsp;</i>Calendrier</a>
                            </li>
                            <li><a href="classement.php"><i class="icon-list-ol">&nbsp;</i>Classement</a>
                            </li>
                            <li><a href="match.php"><i class="icon-info-sign">&nbsp;</i>Dernier
                                    Match</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle"
                                            data-toggle="dropdown"><i class="icon-briefcase">&nbsp;</i>Archives<b
                                class="caret"></b> </a>
                        <ul class="dropdown-menu">
                            <li><a href="archive-sondage.php"><i class="icon-signal">&nbsp;</i>Sondages</a></li>
                            <li><a href="archive-inter.php"><i class="icon-eye-open">&nbsp;</i>Interviews</a>
                            </li>
                            <li><a href="archive-calendrier.php"><i class="icon-calendar">&nbsp;</i>Calendrier 2012-2013</a>
                            </li>
                            <li><a href="archive-classement.php"><i class="icon-list-ol">&nbsp;</i>Classement 2012-2013</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="icon-camera">&nbsp;</i>Photos</a>
                    </li>
                    <li><a href="trombi.php"><i class="icon-user">&nbsp;&nbsp;</i>Trombi</a></li>
                    <li class="visible-desktop"><a href="sondage.php"><i
                                class="icon-signal">&nbsp;</i>Sondages</a></li>
                    <li><a href="interview.php"><i class="icon-eye-open">&nbsp;</i>Interviews</a>
                    </li>
                    <li><a href="contact.php"><i class="icon-envelope-alt">&nbsp;</i>Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Navigation bar ends -->
<!-- C O N T E N T -->
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <h2>PHOTOS</h2>
            <h4>Saison 2012-2013</h4>
            <center>
                <div id="show" class="slideshow"></div>
            </center>
        </div>
    </div>
</div>

<!-- Social -->
<div class="social-links">
    <div class="container">
        <div class="row">
            <div class="span12">
                <p class="big">
                    <span>Rendez-vous sur</span> <a href="#"><i
                            class="icon-facebook"></i>Facebook</a> <a href="#"><i
                            class="icon-twitter"></i>Twitter</a> <a href="#"><i
                            class="icon-google-plus"></i>Google Plus</a>
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
                    <p>R�alis� par julien, @jujupiwi.</p>
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
<script src="js/mootools.js"></script>
<script src="js/slideshow.js"></script>
<script src="js/slideshow.kenburns.js"></script>
<script>
    $(document).ready(function () {
        $('.carousel').carousel({interval: 7000});
    });
</script>
<script>
    //<![CDATA[
    window.addEvent('domready', function () {
        var data = {
            '1.JPG': { thumbnail: '1.JPG'},
            '2.JPG': { thumbnail: '2.JPG'},
            '3.JPG': { thumbnail: '3.JPG'},
            '4.JPG': { thumbnail: '4.JPG'},
            '5.JPG': { thumbnail: '5.JPG'},
            '6.JPG': { thumbnail: '6.JPG'},
            '7.JPG': { thumbnail: '7.JPG'},
            '8.JPG': { thumbnail: '8.JPG'},
            '9.JPG': { thumbnail: '9.JPG'},
            '10.JPG': {thumbnail: '10.JPG'},
            '11.JPG': {thumbnail: '11.JPG'},
            '12.JPG': {thumbnail: '12.JPG'},
            '13.JPG': {thumbnail: '13.JPG'},
            '14.JPG': {thumbnail: '14.JPG'},
            '15.JPG': {thumbnail: '15.JPG'},
            '16.JPG': {thumbnail: '16.JPG'},
            '17.JPG': {thumbnail: '17.JPG'},
            '18.JPG': {thumbnail: '18.JPG'},
            '19.JPG': {thumbnail: '19.JPG'},
            '20.JPG': {thumbnail: '20.JPG'},
            '21.JPG': {thumbnail: '21.JPG'},
            '22.JPG': {thumbnail: '22.JPG'},
            '23.JPG': {thumbnail: '23.JPG'},
            '24.JPG': {thumbnail: '24.JPG'},
            '25.JPG': {thumbnail: '25.JPG'},
            '26.JPG': {thumbnail: '26.JPG'},
            '27.JPG': {thumbnail: '27.JPG'},
            '28.JPG': {thumbnail: '28.JPG'},
            '29.JPG': {thumbnail: '29.JPG'},
            '30.JPG': {thumbnail: '30.JPG'},
            '31.JPG': {thumbnail: '31.JPG'},
            '32.JPG': {thumbnail: '32.JPG'},
        };
        var myShow = new Slideshow.KenBurns('show', data, {delay: 2500, controller: true, height: 400, hu: '/images/carousel/', thumbnails: true, width: 600, captions: true, pan: 100, zoom: [0, 0]});
    });
    //]]>
</script>
</body>
</html>
