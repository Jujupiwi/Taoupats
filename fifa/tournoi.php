<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jguerrin
 * Date: 13/09/13
 * Time: 14:17
 */
if (!isset($_GET["array0"])) {
    $array = array();
    foreach ($_POST as $key => $val) {
        $array[] = $key;
    }
    $count = count($array);
    unset($array[$count - 1]);
    $count = count($array);
    unset($array[$count - 1]);
    $nbequipe = $_POST['nbequipe'];
    $nomTournoi = $_POST['nomTournoi'];
    $joueur = [];
} else {
    $nbequipe = $_GET['nbequipe'];
    $nomTournoi = $_GET['nomTournoi'];
    $array = array();
    $joueur = array();
    for ($i = 0; $i < $nbequipe; $i++) {
        $var = 'array' . $i;
        $var1 = 'equipe' . $i;
        array_push($array, $_GET[$var]);
        array_push($joueur, $_GET[$var1]);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="ISO-8859-1">
    <title>Tournoi FIFA 14</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site du club de foot des taoupats de daux">
    <meta name="keywords" content="Foot,Daux,Taoupats">
    <meta name="author" content="Julien Guerrin">
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link rel='stylesheet' href='typicons/font/typicons.css'/>
</head>
<body style="margin-top: 100px;">
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Tournoi FiFa : <?php echo $nomTournoi; ?></h1><br>

            <form role="form" id="forma"
                  action="enregistrement.php?nbequipe=<?php echo $nbequipe; ?>&nomTournoi=<?php echo $nomTournoi; ?>"
                  method="POST">
                <?php $i = 0;
                foreach ($array as &$value) {
                    $val = strtoupper($value);
                    echo "<div class='row'>";
                    echo "<div class='col-lg-6'>";
                    if (isset($_GET['array0'])) {
                        $team = $joueur[$i];
                        $team = strtoupper($team);
                        echo "<input type='text' class='form-control input-lg input-choix'  value='$team' disabled/>";
                    } else {
                        echo "<input type='text' class='form-control input-lg input-choix' />";
                    }
                    echo "</div>";
                    echo "<div class='col-lg-6'>";
                    echo "<input type='text' disabled class='form-control input-lg' name='$team' value='$val'/>";
                    echo "</div>";
                    echo "</div>";
                    $i++;
                }
                ?>
                <br>
                <div class="col-lg-offset-4 col-lg-5">
                    <a href="nouveau.php">
                        <button type="button" class="btn btn-danger btn-lg">Annuler</button>
                    </a>
                    <a href="random.php?nb=<?php echo $nbequipe; ?>&name=<?php echo $nomTournoi;
                    $i = 0;
                    foreach ($array as &$value) {
                        echo "&array" . $i . "=" . $value;
                        $i = $i + 1;
                    } ?>">
                        <button type="button" class="btn btn-danger btn-lg">Choix Auto</button>
                    </a>
                    <a class="btn btn-medium btn-success btn-lg" onclick="continuer();" width="100px" height="30px">Continuer</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
    function continuer() {
        if ($('.input-choix').val() != "") {
            $(':input').removeAttr("disabled");
            $('#forma').submit();
        }
    }
</script>
</html>