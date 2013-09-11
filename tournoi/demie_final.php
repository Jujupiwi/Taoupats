<html>
<head>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
</head>
<body style="padding-top:100px;padding-left:100px;">
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
    }
    $i++;
}
?>
<div class="container">
    <div class="row">
        <div class="span4">
            <div class="row">
                <label for="<?php echo strtoupper($equipe1); ?>">Demi Finale 1</label>
                <input type="text" style="width:200px; height:30px;" readonly class="dom_df1"
                       value="<?php echo strtoupper($equipe1); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="score_dom_df1"/>
            </div>
            <div class="row">
                vs
            </div>
            <div class="row">
                <label for="<?php echo strtoupper($equipe4); ?>"></label>
                <input type="text" style="width:200px; height:30px;" readonly class="ext_df1"
                       value="<?php echo strtoupper($equipe4); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="score_ext_df1"/>
            </div>

        </div>
        <div class="offset4 span4">
            <div class="row">
                <label for="<?php echo strtoupper($equipe2); ?>">Demi Finale 2</label>
                <input type="text" style="width:200px; height:30px;" readonly class="dom_df2"
                       value="<?php echo strtoupper($equipe2); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="score_dom_df2"/>
            </div>
            <div class="row">
                vs
            </div>
            <div class="row">
                <label for="<?php echo strtoupper($equipe3); ?>"></label>
                <input type="text" style="width:200px; height:30px; " readonly class="ext_df2"
                       value="<?php echo strtoupper($equipe3); ?>"/>
                <input type="text" style="width:40px; height:30px;" class="score_ext_df2"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="offset2 span3">
            <input type="text" style="width:200px; height:30px;" readonly class="dom_f"/>
        </div>
        <div class="span1" style="padding-left: 20px;">
            vs
        </div>
        <div class="span3">
            <input type="text" style="width:200px; height:30px;" readonly class="ext_f"/>
        </div>
    </div>
    <div class="row">
        <div class="offset3 span3">
            <input type="text" style="width:40px; height:30px;" class="score_dom_f"/>
        </div>
        <div class="span1">

        </div>
        <div class="span3">
            <input type="text" style="width:40px; height:30px" class="score_ext_f"/>
        </div>
    </div>
    <div class="row">
        <div class="offset1" style="padding-left: 50px;">
            <img src="images/ldc.jpg">
        </div>
    </div>
    <div class="row">
        <div class="offset4" style="padding-left: 60px;">
            <a class="btn btn-medium btn-warning" href="../tournoi" width="100px" height="30px">&nbsp;&nbsp;Quitter&nbsp;&nbsp;</a>
        </div>
    </div>
</div>
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