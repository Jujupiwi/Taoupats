<?php
$exist = "exist";
include 'connexionBase.php';

$db = mysql_connect($serv, $login, $pwd);
// on s�lectionne la base
mysql_select_db("taoupats");
?>
<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top:100px">
<div class="row-fluid">
    <div class="offset4 span4">
        <form class="form-horizontal well" method="post" action="tournoi.php">
            <fieldset>
                <center>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="alert alert-block hide" id="nameTournoi">
                                <button type="button" class="close" id="closeNT">�</button>
                                <h4>Attention!</h4> Le Nom de Tournoi obligatoire!
                            </div>
                        </div>
                    </div>
                    <h2>Charger un Tournoi</h2>
                </center>
                <br><br>
                <div class="row-fluid">
                    <div class="offset2 span8">
                        Nom du Tournoi : <span style="color:red;">*</span>
                        <select style="width:250px;" id="name">
                            <?php
                            $sql = "select nom_tournoi from tournoi;";
                            $request = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
                            while ($ligne = mysql_fetch_array($request)) {
                                ?>
                                <option value="<?php echo $ligne[0]; ?>"><?php echo $ligne[0]; ?></option>
                            <?php } ?>

                        </select>
                        <br><br><br>
                    </div>
                </div>
                <center>
                    <div class="row-fluid">
                        <div class="offset4 span4">
                            <a class="btn btn-medium btn-block btn-info" id="guillaume">Continuer</a>
                        </div>
                    </div>
                </center>
					<span style="font-size:12px">
						<span style="color:red;">*</span> : Champ Obligatoire
					</span>
            </fieldset>
        </form>
    </div>
</div>
<div class="row-fluid">
    <div class="offset4 span4">
        <a class="btn btn-medium btn-warning" href="../tournoi" width="100px" height="30px">&nbsp;&nbsp;Retour&nbsp;&nbsp;</a>
    </div>
</div>
</body>
<script src="../js/jquery.js"></script>
<script>
    $("#guillaume").click(function () {
        if (document.getElementById('name').value != "") {
            document.location.href = "tableau.php?name=" + document.getElementById('name').value;
        }
    });

</script>
</html>