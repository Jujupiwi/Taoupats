<?php
$exist = "exist";
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
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
                            <div class="alert alert-block alert-error hide" id="nameTournoi">
                                <button type="button" class="close" id="closeNT">x</button>
                                <h4>Attention!</h4> Le Nom de Tournoi obligatoire!
                            </div>
                            <div class="alert alert-block alert-error hide" id="nbJoueurs">
                                <button type="button" class="close" id="closeNB">x</button>
                                <h4>Attention!</h4> Le Nombre de Joueurs doit etre compris entre 4 et 16 et différent de
                                11, 13, 15!
                            </div>
                            <?php
                            if (isset($_GET['nom'])) {
                                if ($_GET['nom'] == $exist) {
                                    ?>
                                    <h4>Attention!</h4> Ce nom de tournoi existe déja!
                                <?php
                                }
                            } ?>
                        </div>
                    </div>
                    <h2>Création d'un Tournoi</h2>
                </center>
                <br><br>
                <div class="row-fluid">
                    <div class="offset1 span9">
                        Nom du Tournoi : <span style="color:red;">*</span> <input type="text"
                                                                                  style="width:200px; height:30px;"
                                                                                  placeholder="Nom Tournoi" id="name"/>
                        <br><br><br>
                        Nombre de Joueurs : <span style="color:red;">*</span> <input type="text" min="0" max="10"
                                                                                     style="width:50px; height:30px;"
                                                                                     placeholder="4/16" maxlength=2
                                                                                     class="numbersOnly" id="quant"/>
                        <br><br><br>
                        Mode de Tournoi : <span style="color:red;">*</span>
                        <select style="width:250px;" id="mode">
                            <option value="champ" selected="selected">Championnat</option>
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
                    <br>
                    <div class="row-fluid">
                        <div class="span12">
							<span id="gui" style="display:none;">
								<div class="row-fluid">
                                    <div class="span12">

                                    </div>
                                </div>
								<div class="offset4 span4">
                                    <center>
                                        <a class="btn btn-medium btn-block btn-warning"
                                           href="/tournoi/index.php?nom=non">Annuler Saisie</a>
                                    </center>
                                </div>
							</span>
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
        <a class="btn btn-medium btn-warning" href="../tournoi" width="100px" height="30px">
            &nbsp;&nbsp;Retour&nbsp;&nbsp;</a>
    </div>
</div>
</body>
<script src="../js/jquery.js"></script>
<script>
    $("#guillaume").click(function () {
        if (document.getElementById('name').value == "") {
            $("#nameTournoi").show("slow");
        } else {
            if (document.getElementById('quant').value > 16 || document.getElementById('quant').value < 4
                || document.getElementById('quant').value == 11 || document.getElementById('quant').value == 13
                || document.getElementById('quant').value == 15) {
                document.getElementById('quant').value = '';
                $("#nbJoueurs").show("slow");
            } else {
                $("#nbJoueurs").hide("slow");
                $("#nameTournoi").hide("slow");
                $("#gui").toggle("slow");
                $("#guillaume").hide();
                document.location.href = "tournoi.php?nb=" + document.getElementById('quant').value + "&name=" + document.getElementById('name').value + "&mode=" + document.getElementById('mode').value;
            }
        }
    });
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    $("#closeNT").click(function () {
        $("#nameTournoi").hide("slow");
    });
    $("#closeNom").click(function () {
        $("#nomTournoi").hide("slow");
    });
    $("#closeNB").click(function () {
        $("#nbJoueurs").hide("slow");
    });
</script>
</html>