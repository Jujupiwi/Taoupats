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
                        <li><a href="#"><i class="icon-calendar green">&nbsp;</i>Calendrier</a></li>
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
                <h2>Calendrier</h2>

                <p>Saison 2013-2014</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title"><i class="icon icon-calendar">&nbsp;</i>Calendrier des Taoupats de Daux</h1>
                </div>
                <div class="panel-body">
                    <table
                        class="table table-striped table-bordered table-hover">
                        <?php include 'contenu/calendrier_contenu.php'; ?>
                    </table>
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
                <a target="_blank" href="http://www.google+.com" style="text-decoration: none"><span
                        class="label label-default"><i class="icon icon-google-plus">&nbsp;&nbsp;</i>GOOGLE +</span></a>
            </div>
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
