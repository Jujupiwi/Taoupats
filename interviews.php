<?php
include 'contenu/param.php';
?>
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
            <a class="navbar-brand" href="index.php">TAOUPATS <span style="color:khaki;">DE DAUX</span></a>
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
                    <a href="#"><i class="icon-eye-open">&nbsp;</i>INTERVIEWS</a>
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
<div class="panel panel-default">
<div class="panel-heading">
    <h1 class="panel-title"><i class="icon icon-eye-open">&nbsp;</i>Une interview par semaine</h1>
</div>
<div class="panel-body">
<div class="row">
    <div class="col-md-6 pull-right">
        <img alt="120x180" data-src="bootstrap/js/bootstrap.js/120x180"
             style="width: 120px; height: 180px;"
             src="images/team/<?php echo $prenom; ?>.jpg">
    </div>
    <div class="col-md-6">
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
<div class="row">
<div class="col-md-12">
<table
    class="table table-striped table-bordered table-hover">
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
<script>
    $('.popup').tooltip();
</script>
</html>
