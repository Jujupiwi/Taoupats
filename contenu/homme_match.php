<?php
include 'contenu/param.php';
// on se connecte � MySQL et a la base
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//variables
$ip = $_SERVER['REMOTE_ADDR'];
$isVoted = 0;
$arrayResult = array();
$total = 0;

// on envoie la requ�te
$res = $mysqli->query("select ip from sondage where nom_sondage = '$match'");
while ($row = $res->fetch_assoc()) {
    if ($row['ip'] == $ip) {
        $isVoted = 1;
    }
}

for ($i = 0; $i < $nbJoueurs; $i++) {
    $sqlcount = "select count(choix) from sondage where nom_sondage = '$match' and choix='$array[$i]';";
    $requete = $mysqli->query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
    $row = $requete->fetch_array();
    $total = $total + $row[0];
    $arrayResult[$i] = $row[0];
}

// ***************************************************************************************************************************
if ($isVoted == 1) {
    ?>
    <p>Vous avez d�j� r�pondu au sondage</p>
    <p>Voici les resultats</p>
    <br>
    <table
        class="table table-bordered table-striped table-condensed table-hover">
        <thead>
        <tr>
            <th>Equipe</th>
            <th width="55%">Progression</th>
            <th>%</th>
            <th>Nb Votes : <?php echo $total; ?>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < $nbJoueurs; $i++) { ?>
            <tr>
                <td><?php echo $array[$i]; ?></td>
                <td>
                    <div class="progress progress-striped active">
                        <?php if ($arrayResult[$i] > 3) { ?>
                            <div class="bar bar-success"
                                 style="width: <?php echo $arrayResult[$i] * 100 / $total; ?>%;"></div>
                        <?php } else if ($arrayResult[$i] == 3) { ?>
                            <div class="bar bar-info"
                                 style="width: <?php echo $arrayResult[$i] * 100 / $total; ?>%;"></div>
                        <?php } else if ($arrayResult[$i] == 2) { ?>
                            <div class="bar bar-warning"
                                 style="width: <?php echo $arrayResult[$i] * 100 / $total; ?>%;"></div>
                        <?php } else { ?>
                            <div class="bar bar-danger"
                                 style="width: <?php echo $arrayResult[$i] * 100 / $total; ?>%;"></div>
                        <?php } ?>
                    </div>
                </td>
                <td><?php echo round($arrayResult[$i] * 100 / $total); ?> %</td>
                <td><?php echo $arrayResult[$i]; ?> votes</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <form class="form-horizontal well" action="/test/insert.php"
          method="post">
        <table
            class="table table-bordered table-striped table-condensed table-hover"
            style="width: 500px; height: 100px;">
            <?php
            for ($i = 0; $i < $nbJoueurs; $i++) {
                ?>
                <tr>
                    <td>
                        <div class="span3">
                            <div class="pull-left">
                                <div class="thumbnail" id="thumb_sondage">
                                    <img alt="90x150" data-src="bootstrap/js/bootstrap.js/90x150"
                                         style="width: 90px; height: 150px;"
                                         src="images/team/<?php echo $array[$i]; ?>.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="span3" id="name_sondage">
                            <label class="radio"><input type="radio" name="optionsRadios"
                                                        id="optionsRadios1" value="<?php echo $array[$i]; ?>"
                                                        checked> <?php echo $array[$i]; ?>
                            </label>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <center>
            <input type="submit" name="valider" value="Envoyer"
                   class="btn btn-success"/>
        </center>
    </form>
<?php } ?>