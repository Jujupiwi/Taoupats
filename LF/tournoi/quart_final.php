<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top:100px;padding-left:200px;">
<?php
include 'connexionBase.php';
$name = $_GET['name'];
// on se connecte � MySQL
$db = mysql_connect($serv, $login, $pwd);
// on s�lectionne la base
mysql_select_db("taoupats");
$sql = "select equipe from classement where nom_tournoi = '$name' order by points desc, diff desc, bp desc, bc, victoire desc, defaite;";
$request = mysql_query($sql) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$i = 1;
while ($ligne = mysql_fetch_array($request)) {
    if ($i == 1) {
        $equipe1 = $ligne[0];
    } else if ($i == 2) {
        $equipe2 = $ligne[0];
    } else if ($i == 3) {
        $equipe3 = $ligne[0];
    } else if ($i == 4) {
        $equipe4 = $ligne[0];
    } else if ($i == 5) {
        $equipe5 = $ligne[0];
    } else if ($i == 6) {
        $equipe6 = $ligne[0];
    } else if ($i == 7) {
        $equipe7 = $ligne[0];
    } else if ($i == 8) {
        $equipe8 = $ligne[0];
    }
    $i++;
}
?>
<font>Quart Finale 1</font>
<font style="position:absolute;left:1540px;">Quart Finale 2</font>
<br>
<input type="text" style="width:200px; height:30px;" readonly class="dom_qf1"
       value="<?php echo strtoupper($equipe1); ?>"/>
<input type="text" style="width:40px; height:30px;" class="score_dom_qf1"/>
<input type="text" style="width:200px; height:30px; position:absolute;left:1540px;" readonly class="dom_qf2"
       value="<?php echo strtoupper($equipe2); ?>"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:1744px;" class="score_dom_qf2"/>
<br>
Vs
<font style="position:absolute;left:1540px;">Vs</font>
<br>
<input type="text" style="width:200px; height:30px; position:absolute;left:1540px;" readonly class="ext_qf2"
       value="<?php echo strtoupper($equipe7); ?>"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:1744px;" class="score_ext_qf2"/>
<input type="text" style="width:200px; height:30px;" readonly class="ext_qf1"
       value="<?php echo strtoupper($equipe8); ?>"/>
<input type="text" style="width:40px; height:30px;" class="score_ext_qf1"/>
<br><br>
<font style="position:absolute;left:470px;">Demie Finale 1</font>
<font style="position:absolute;left:1280px;">Demie Finale 2</font>
<br>
<input type="text" style="width:200px; height:30px;position:absolute;left:470px;" readonly class="dom_df1"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:674px;" class="score_dom_df1"/>
<input type="text" style="width:200px; height:30px;position:absolute;left:1280px;" readonly class="dom_df2"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:1484px;" class="score_dom_df2"/>
<font style="position:absolute;left:970px;">Finale</font>
<br><br>
<font style="position:absolute;left:470px;">Vs</font>
<font style="position:absolute;left:1280px;">Vs</font>
<input type="text" style="width:200px; height:30px;position:absolute;left:750px;" readonly class="dom_f"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:954px;" class="score_dom_f"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:998px;" class="score_ext_f"/>
<input type="text" style="width:200px; height:30px;position:absolute;left:1042px;" readonly class="ext_f"/>
<br>
<input type="text" style="width:200px; height:30px;position:absolute;left:470px;" readonly class="ext_df1"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:674px;" class="score_ext_df1"/>
<input type="text" style="width:200px; height:30px;position:absolute;left:1280px;" readonly class="ext_df2"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:1484px;" class="score_ext_df2"/>
<br><br><br>
<font>Quart Finale 3</font>
<font style="position:absolute;left:1540px;">Quart Finale 4</font>
<br>
<input type="text" style="width:200px; height:30px;" readonly class="dom_qf3"
       value="<?php echo strtoupper($equipe4); ?>"/>
<input type="text" style="width:40px; height:30px;" class="score_dom_qf3"/>
<input type="text" style="width:200px; height:30px; position:absolute;left:1540px;" readonly class="dom_qf4"
       value="<?php echo strtoupper($equipe3); ?>"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:1744px;" class="score_dom_qf4"/>
<br>
Vs
<font style="position:absolute;left:1540px;">Vs</font>
<br>
<input type="text" style="width:200px; height:30px;" readonly class="ext_qf3"
       value="<?php echo strtoupper($equipe5); ?>"/>
<input type="text" style="width:40px; height:30px;" class="score_ext_qf3"/>
<input type="text" style="width:200px; height:30px; position:absolute;left:1540px;" readonly class="ext_qf4"
       value="<?php echo strtoupper($equipe6); ?>"/>
<input type="text" style="width:40px; height:30px;position:absolute;left:1744px;" class="score_ext_qf4"/>
<br><br><img src="images/ldc.jpg" style="position:absolute;left:700px;">
<br><br><br><br><br><br><br>
<a class="btn btn-medium btn-warning" href="../tournoi" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>

</body>
<script src="../js/jquery.js"></script>
<script>
    jQuery('.score_dom_df1').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_dom_df2').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_ext_df1').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_ext_df2').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_dom_f').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.score_ext_f').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    $("input[type='text']").keyup(function () {
        if ($('input[class=score_dom_qf1]').val() > $('input[class=score_ext_qf1]').val()) {
            var text = $('input[class=dom_qf1]').val();
            $('input[class=dom_qf1]').css("background-color", "#8AF7A4");
            $('input[class=ext_qf1]').css("background-color", "#F78A8A");
            $('input[class=dom_df1]').val(text);
        }
        if ($('input[class=score_dom_qf1]').val() < $('input[class=score_ext_qf1]').val()) {
            var text = $('input[class=ext_qf1]').val();
            $('input[class=dom_qf1]').css("background-color", "#F78A8A");
            $('input[class=ext_qf1]').css("background-color", "#8AF7A4");
            $('input[class=dom_df1]').val(text);
        }
        if ($('input[class=score_dom_qf2]').val() > $('input[class=score_ext_qf2]').val()) {
            var text = $('input[class=dom_qf2]').val();
            $('input[class=dom_qf2]').css("background-color", "#8AF7A4");
            $('input[class=ext_qf2]').css("background-color", "#F78A8A");
            $('input[class=dom_df2]').val(text);
        }
        if ($('input[class=score_dom_qf2]').val() < $('input[class=score_ext_qf2]').val()) {
            var text = $('input[class=ext_qf2]').val();
            $('input[class=dom_qf2]').css("background-color", "#F78A8A");
            $('input[class=ext_qf2]').css("background-color", "#8AF7A4");
            $('input[class=dom_df2]').val(text);
        }
        if ($('input[class=score_dom_qf3]').val() > $('input[class=score_ext_qf3]').val()) {
            var text = $('input[class=dom_qf3]').val();
            $('input[class=dom_qf3]').css("background-color", "#8AF7A4");
            $('input[class=ext_qf3]').css("background-color", "#F78A8A");
            $('input[class=ext_df1]').val(text);
        }
        if ($('input[class=score_dom_qf3]').val() < $('input[class=score_ext_qf3]').val()) {
            var text = $('input[class=ext_qf3]').val();
            $('input[class=dom_qf3]').css("background-color", "#F78A8A");
            $('input[class=ext_qf3]').css("background-color", "#8AF7A4");
            $('input[class=ext_df1]').val(text);
        }
        if ($('input[class=score_dom_qf4]').val() > $('input[class=score_ext_qf4]').val()) {
            var text = $('input[class=dom_qf4]').val();
            $('input[class=dom_qf4]').css("background-color", "#8AF7A4");
            $('input[class=ext_qf4]').css("background-color", "#F78A8A");
            $('input[class=ext_df2]').val(text);
        }
        if ($('input[class=score_dom_qf4]').val() < $('input[class=score_ext_qf4]').val()) {
            var text = $('input[class=ext_qf4]').val();
            $('input[class=dom_qf4]').css("background-color", "#F78A8A");
            $('input[class=ext_qf4]').css("background-color", "#8AF7A4");
            $('input[class=ext_df2]').val(text);
        }
        if ($('input[class=score_dom_df1]').val() > $('input[class=score_ext_df1]').val()) {
            var text = $('input[class=dom_df1]').val();
            $('input[class=dom_df1]').css("background-color", "#8AF7A4");
            $('input[class=ext_df1]').css("background-color", "#F78A8A");
            $('input[class=dom_f]').val(text);
        }
        if ($('input[class=score_dom_df1]').val() < $('input[class=score_ext_df1]').val()) {
            var text = $('input[class=ext_df1]').val();
            $('input[class=dom_df1]').css("background-color", "#F78A8A");
            $('input[class=ext_df1]').css("background-color", "#8AF7A4");
            $('input[class=dom_f]').val(text);
        }
        if ($('input[class=score_dom_df2]').val() > $('input[class=score_ext_df2]').val()) {
            var text = $('input[class=dom_df2]').val();
            $('input[class=dom_df2]').css("background-color", "#8AF7A4");
            $('input[class=ext_df2]').css("background-color", "#F78A8A");
            $('input[class=ext_f]').val(text);
        }
        if ($('input[class=score_dom_df2]').val() < $('input[class=score_ext_df2]').val()) {
            var text = $('input[class=ext_df2]').val();
            $('input[class=dom_df2]').css("background-color", "#F78A8A");
            $('input[class=ext_df2]').css("background-color", "#8AF7A4");
            $('input[class=ext_f]').val(text);
        }
        if ($('input[class=score_dom_f]').val() < $('input[class=score_ext_f]').val()) {
            $('input[class=dom_f]').css("background-color", "#F78A8A");
            $('input[class=ext_f]').css("background-color", "#8AF7A4");
        }

        if ($('input[class=score_dom_f]').val() > $('input[class=score_ext_f]').val()) {
            $('input[class=dom_f]').css("background-color", "#8AF7A4");
            $('input[class=ext_f]').css("background-color", "#F78A8A");
        }
    });
</script>
</html>