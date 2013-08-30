<?php
include 'param.php';
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
$res = $mysqli->query("select ip from sondage where nom_sondage = '$noteMatch'");
while ($row = $res->fetch_assoc()) {
    if ($row['ip'] == $ip) {
        $isVoted = 1;
    }
}

//Requete Note
$sqlcount = "select SUM(choix) from sondage where nom_sondage = '$noteMatch';";
$requete = $mysqli->query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$row = $requete->fetch_array();
$notes = $row[0];

//Requete Nombre de Votes
$sqlcount = "select count(choix) from sondage where nom_sondage = '$noteMatch';";
$requete = $mysqli->query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$row = $requete->fetch_array();
$nbVote = $row[0];

if ($isVoted == 1) {
    ?>
    <p>Vous avez déjà donné une note</p>
    <p>Voici les resultats</p>
    <br>
    <table class="table table-bordered table-striped table-condensed table-hover">
        <thead>
        <tr>
            <th>Equipe</th>
            <th width="55%">Progression</th>
            <th>/20</th>
            <th>Nb Votes</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Taoupats</td>
            <td>
                <div class="progress progress-striped active">
                    <div class="bar bar-danger" style="width: <?php echo ($notes / $nbVote) * 100 / 20; ?>%;"></div>
                </div>
            </td>
            <td><?php echo sprintf('%.2f', $notes / $nbVote); ?></td>
            <td><?php echo $nbVote; ?> votes</td>
        </tr>
        </tbody>
    </table>
<?php } else { ?>
    <p>Notez l'équipe pour le Match face à <?php echo strtoupper($match); ?></p>
    <p>Merci pour eux...</p>
    <form class="form-horizontal well" action="contenu/note.php" method="post">
        <select name="note">
            <option VALUE="0">0</option>
            <option VALUE="1">1</option>
            <option VALUE="2">2</option>
            <option VALUE="3">3</option>
            <option VALUE="4">4</option>
            <option VALUE="5">5</option>
            <option VALUE="6">6</option>
            <option VALUE="7">7</option>
            <option VALUE="8">8</option>
            <option VALUE="9">9</option>
            <option VALUE="10">10</option>
            <option VALUE="11">11</option>
            <option VALUE="12">12</option>
            <option VALUE="13">13</option>
            <option VALUE="14">14</option>
            <option VALUE="15">15</option>
            <option VALUE="16">16</option>
            <option VALUE="17">17</option>
            <option VALUE="18">18</option>
            <option VALUE="19">19</option>
            <option VALUE="20">20</option>
        </select>
        <br><br>
        <input type="submit" name="valider" value="Envoyer" class="btn btn-success"/>
    </form>
<?php } ?>