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
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle"
                           data-toggle="dropdown"><i class="icon-folder-open">&nbsp;</i>
                            Saison 2013-2014 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="calendrier.php"><i class="icon-calendar">&nbsp;</i>Calendrier Taoupats</a></li>
                            <li><a href="#"><i class="icon-trophy">&nbsp;</i>Calendrier D2</a></li>
                            <li><a href="classement.php"><i class="icon-list-ol">&nbsp;</i>Classement</a></li>
                            <li><a href="stats.php"><i class="icon-dribbble">&nbsp;</i>Stats</a></li>
                            <li><a href="match.php"><i class="icon-info-sign">&nbsp;</i>Dernier Match</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-briefcase">&nbsp;</i>Archives<b
                                class="caret"></b>
                        </a>
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
                    <li class="hidden-phone"><a href="photos.php"><i class="icon-camera">&nbsp;</i>Photos</a></li>
                    <li><a href="trombi.php"><i class="icon-user">&nbsp;&nbsp;</i>Trombi</a></li>
                    <li class="visible-desktop"><a href="sondage.php"><i class="icon-signal">&nbsp;</i>Sondages</a></li>
                    <li class="visible-phone visible-tablet"><a href="sondage-mobile.php"><i class="icon-signal">
                                &nbsp;</i>Sondages</a></li>
                    <li><a href="interview.php"><i class="icon-eye-open">&nbsp;</i>Interviews</a></li>
                    <li><a href="contact.php"><i class="icon-envelope">&nbsp;</i>Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Navigation bar ends -->
<!-- C O N T E N T -->
<div class="container">
    <div class="row-fluid" style="margin-top: 100px">
        <div class="span12" style="text-align: center">
            <h2>RESULTATS par journée</h2>
            <h4>Saison 2013-2014</h4>
            <br>
            <?php
            for ($i = 1; $i <= 22; $i++) {
                echo "<div class='hide' style='width: 100%' id='Journee$i'>";
                include 'journees/Journee' . $i . '.php';
                echo "</div>";
            }
            ?>

            <div class="pagination" id="allers">
                <ul>
                    <li class="disabled"><a href="#">Matchs Allers</a></li>
                    <li id="Jou1"><a href="#" id="J1">J1</a></li>
                    <li id="Jou2"><a href="#" id="J2">J2</a></li>
                    <li id="Jou3"><a href="#" id="J3">J3</a></li>
                    <li id="Jou4"><a href="#" id="J4">J4</a></li>
                    <li id="Jou5"><a href="#" id="J5">J5</a></li>
                    <li id="Jou6"><a href="#" id="J6">J6</a></li>
                    <li id="Jou7"><a href="#" id="J7">J7</a></li>
                    <li id="Jou8"><a href="#" id="J8">J8</a></li>
                    <li id="Jou9"><a href="#" id="J9">J9</a></li>
                    <li id="Jou10"><a href="#" id="J10">J10</a></li>
                    <li id="Jou11"><a href="#" id="J11">J11</a></li>
                    <li><a href="#" id="retour">Matchs Retours</a></li>
                </ul>
            </div>
            <div class="pagination hide" id="retours">
                <ul>
                    <li><a href="#" id="aller">Matchs Allers</a></li>
                    <li id="Jou12"><a href="#" id="J12">J12</a></li>
                    <li id="Jou13"><a href="#" id="J13">J13</a></li>
                    <li id="Jou14"><a href="#" id="J14">J14</a></li>
                    <li id="Jou15"><a href="#" id="J15">J15</a></li>
                    <li id="Jou16"><a href="#" id="J16">J16</a></li>
                    <li id="Jou17"><a href="#" id="J17">J17</a></li>
                    <li id="Jou18"><a href="#" id="J18">J18</a></li>
                    <li id="Jou19"><a href="#" id="J19">J19</a></li>
                    <li id="Jou20"><a href="#" id="J20">J20</a></li>
                    <li id="Jou21"><a href="#" id="J21">J21</a></li>
                    <li id="Jou22"><a href="#" id="J22">J22</a></li>
                    <li class="disabled"><a href="#" id="retour">Matchs Retours</a></li>
                </ul>
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
<script type="text/javascript">
$(document).ready(function () {
    $('#Journee3').show("fast");
    hideClassJou();
    $('#Jou3').addClass("disabled");
});
$('#retour').click(function () {
    hideJournees();
    $('#allers').hide("fast");
    $('#retours').show("fast");
    $('#Journee12').show("fast");
    hideClassJou();
    $('#Jou12').addClass("disabled");
});
$('#aller').click(function () {
    hideJournees();
    $('#retours').hide("fast");
    $('#allers').show("fast");
    $('#Journee1').show("fast");
    hideClassJou();
    $('#Jou1').addClass("disabled");
});
$('#J1').click(function () {
    hideJournees();
    $('#Journee1').show("fast");
    hideClassJou();
    $('#Jou1').addClass("disabled");
});
$('#J2').click(function () {
    hideJournees();
    $('#Journee2').show("fast");
    hideClassJou();
    $('#Jou2').addClass("disabled");
});
$('#J3').click(function () {
    hideJournees();
    $('#Journee3').show("fast");
    hideClassJou();
    $('#Jou3').addClass("disabled");
});
$('#J4').click(function () {
    hideJournees();
    $('#Journee4').show("fast");
    hideClassJou();
    $('#Jou4').addClass("disabled");
});
$('#J5').click(function () {
    hideJournees();
    $('#Journee5').show("fast");
    hideClassJou();
    $('#Jou5').addClass("disabled");
});
$('#J6').click(function () {
    hideJournees();
    $('#Journee6').show("fast");
    hideClassJou();
    $('#Jou6').addClass("disabled");
});
$('#J7').click(function () {
    hideJournees();
    $('#Journee7').show("fast");
    hideClassJou();
    $('#Jou7').addClass("disabled");
});
$('#J8').click(function () {
    hideJournees();
    $('#Journee8').show("fast");
    hideClassJou();
    $('#Jou8').addClass("disabled");
});
$('#J9').click(function () {
    hideJournees();
    $('#Journee9').show("fast");
    hideClassJou();
    $('#Jou9').addClass("disabled");
});
$('#J10').click(function () {
    hideJournees();
    $('#Journee10').show("fast");
    hideClassJou();
    $('#Jou10').addClass("disabled");
});
$('#J11').click(function () {
    hideJournees();
    $('#Journee11').show("fast");
    hideClassJou();
    $('#Jou11').addClass("disabled");
});
$('#J12').click(function () {
    hideJournees();
    $('#Journee12').show("fast");
    hideClassJou();
    $('#Jou12').addClass("disabled");
});
$('#J13').click(function () {
    hideJournees();
    $('#Journee13').show("fast");
    hideClassJou();
    $('#Jou13').addClass("disabled");
});
$('#J14').click(function () {
    hideJournees();
    $('#Journee14').show("fast");
    hideClassJou();
    $('#Jou14').addClass("disabled");
});
$('#J15').click(function () {
    hideJournees();
    $('#Journee15').show("fast");
    hideClassJou();
    $('#Jou15').addClass("disabled");
});
$('#J16').click(function () {
    hideJournees();
    $('#Journee16').show("fast");
    hideClassJou();
    $('#Jou16').addClass("disabled");
});
$('#J17').click(function () {
    hideJournees();
    $('#Journee17').show("fast");
    hideClassJou();
    $('#Jou17').addClass("disabled");
});
$('#J18').click(function () {
    hideJournees();
    $('#Journee18').show("fast");
    hideClassJou();
    $('#Jou18').addClass("disabled");
});
$('#J19').click(function () {
    hideJournees();
    $('#Journee19').show("fast");
    hideClassJou();
    $('#Jou19').addClass("disabled");
});
$('#J20').click(function () {
    hideJournees();
    $('#Journee20').show("fast");
    hideClassJou();
    $('#Jou20').addClass("disabled");
});
$('#J21').click(function () {
    hideJournees();
    $('#Journee21').show("fast");
    hideClassJou();
    $('#Jou21').addClass("disabled");
});
$('#J22').click(function () {
    hideJournees();
    $('#Journee22').show("fast");
    hideClassJou();
    $('#Jou22').addClass("disabled");
});

function hideJournees() {
    $('#Journee1').hide("fast");
    $('#Journee2').hide("fast");
    $('#Journee3').hide("fast");
    $('#Journee4').hide("fast");
    $('#Journee5').hide("fast");
    $('#Journee6').hide("fast");
    $('#Journee7').hide("fast");
    $('#Journee8').hide("fast");
    $('#Journee9').hide("fast");
    $('#Journee10').hide("fast");
    $('#Journee11').hide("fast");
    $('#Journee12').hide("fast");
    $('#Journee13').hide("fast");
    $('#Journee14').hide("fast");
    $('#Journee15').hide("fast");
    $('#Journee16').hide("fast");
    $('#Journee17').hide("fast");
    $('#Journee18').hide("fast");
    $('#Journee19').hide("fast");
    $('#Journee20').hide("fast");
    $('#Journee21').hide("fast");
    $('#Journee22').hide("fast");
}
function hideClassJou() {
    $('#Jou1').removeClass("disabled");
    $('#Jou2').removeClass("disabled");
    $('#Jou3').removeClass("disabled");
    $('#Jou4').removeClass("disabled");
    $('#Jou5').removeClass("disabled");
    $('#Jou6').removeClass("disabled");
    $('#Jou7').removeClass("disabled");
    $('#Jou8').removeClass("disabled");
    $('#Jou9').removeClass("disabled");
    $('#Jou10').removeClass("disabled");
    $('#Jou11').removeClass("disabled");
    $('#Jou12').removeClass("disabled");
    $('#Jou13').removeClass("disabled");
    $('#Jou14').removeClass("disabled");
    $('#Jou15').removeClass("disabled");
    $('#Jou16').removeClass("disabled");
    $('#Jou17').removeClass("disabled");
    $('#Jou18').removeClass("disabled");
    $('#Jou19').removeClass("disabled");
    $('#Jou20').removeClass("disabled");
    $('#Jou21').removeClass("disabled");
    $('#Jou22').removeClass("disabled");
}
</script>
</body>
</html>
