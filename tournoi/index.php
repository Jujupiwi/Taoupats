<?php
$exist = "exist";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
</head>
<body style="padding-top:100px">
<div class="row-fluid">
    <div class="offset4 span4">
        <form class="form-horizontal well" method="post" action="tournoi.php">
            <fieldset>
                <center>
                    <h3>Créer ou Charger un Tournoi</h3>
                    <br><br><br>
                    <i class="icon-pencil"></i> <a href="creaoumodif.php" style="font-size:20px;color:#2C3E50;">Creation
                        d'un tournoi</a><br><br><br><br>
                    <i class="icon-file"></i> <a href="charge.php" style="font-size:20px;color:#2C3E50;">Charger un
                        tournoi</a><br><br><br><br>
                    <i class="icon-trash"></i> <a href="supprimer.php" style="font-size:20px;color:#2C3E50;">Supprimer
                        un tournoi</a><br><br><br><br>
                </center>
                <br>
            </fieldset>
        </form>
    </div>
</div>
</body>
<script src="../js/jquery.js"></script>
</html>