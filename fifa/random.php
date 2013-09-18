<?php
$nb = $_GET['nb'];
$name = $_GET['name'];
?>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top:100px;">
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <?php for ($i = 0; $i < $nb; $i++) { ?>
                <div class="row">
                    <div class="col-lg-3">
                        Joueur <?php echo $i + 1; ?>: <input class="input-lg form-control" type="text"
                                                             style="height:40px;"
                                                             name="nom<?php echo $i; ?>" id="nom<?php echo $i; ?>"/>
                    </div>
                    <div class="col-lg-offset-3 col-lg-3">
                        Equipe <?php echo $i + 1; ?>: <input class="input-lg form-control" type="text"
                                                             style="height:40px;"
                                                             id="equipe<?php echo $i; ?>"
                                                             name="equipe<?php echo $i; ?>"
                                                             value='<?php echo strtoupper($_GET['array' . $i]); ?>'
                                                             disabled/>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-2">
                <a class="btn btn-medium btn-success" onclick="redirection(<?php echo $nb; ?>);"
                   width="100px" height="30px">Retour</a>
            </div>
            <div class="col-lg-2">
                <a class="btn btn-medium btn-success" onclick="rand(<?php echo $nb; ?>);" width="100px" height="30px">Auto</a>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/jquery.js"></script>
<script type="text/javascript">
    var showIdx = 0;
    function rand(nombre) {
        var interval;
        var monTableau = new Array();
        var nb = nombre;
        for (var i = 0; i < nb; i++) {
            monTableau.push($('#equipe' + i).val());
        }
        shuffle(monTableau);
        for (var i = 0; i < nb; i++) {
            $('#equipe' + i).hide("slow");
            $('#equipe' + i).val(monTableau[i]);
        }
        ty();
        interval = setInterval(ty, 5000);


    }
    function ty() {
        $('#equipe' + showIdx).show("slow");
        console.log(showIdx);
        showIdx++;
    }
    function shuffle(a) {
        var j = 0;
        var valI = '';
        var valJ = valI;
        var l = a.length - 1;
        while (l > -1) {
            j = Math.floor(Math.random() * l);
            valI = a[l];
            valJ = a[j];
            a[l] = valJ;
            a[j] = valI;
            l = l - 1;
        }
        return a;
    }
    function redirection(nb) {
        var nom = '<?php echo $name; ?>';
        var texte = "";
        for (var i = 0; i < nb; i++) {
            texte = texte.concat("&array" + i + "=" + $('#equipe' + i).val());
        }
        for (var i = 0; i < nb; i++) {
            texte = texte.concat("&equipe" + i + "=" + $('#nom' + i).val());
        }
        document.location = "tournoi.php?nbequipe=" + nb + "&nomTournoi=" + nom + texte;
    }
</script>
</html>