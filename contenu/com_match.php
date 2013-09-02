<?php
include 'param.php';
// on se connecte � MySQL et a la base
$mysqli = new mysqli($serv, $login, $pwd, $data);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion � MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


//Requete Nombre de Commentaires
$sqlcount = "SELECT count(`comment`)FROM `commentaires` WHERE `match`='$commentMatch';";
$requete = $mysqli->query($sqlcount) or die('Erreur SQL !<br>' . $sqlcount . '<br>' . mysql_error());
$row = $requete->fetch_array();
$nbComment = $row[0];?>

    <form class="form-horizontal well" action="contenu/comment.php" method="post">
        Nom :<br>
        <input type="text" name="name" placeholder="Nom" width="300px"/>
        <br>Commentaire :<br>
        <textarea rows="3" cols="8000" placeholder="Commentaire" name="commentary"></textarea>
        <br><br>
        <input type="submit" name="valider" value="Envoyer" class="btn btn-success"/>
    </form>
    <br><br>
<?php if ($nbComment != 0) {
    $res = $mysqli->query("SELECT * FROM `commentaires` WHERE `match`='$commentMatch';");
    echo "<table id='table_comment' class='table table-bordered table-striped table-condensed table-hover'>";
    echo "<thead>";
    echo "<th width='25%'>Nom</th>";
    echo "<th width='75%'>Commentaire</th>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr style='max-width:100px'><td>";
        echo $row['name'];
        echo "</td><td>";
        echo $row['comment'];
        echo "</td></tr>";
    }
    echo "</tbody></table>";
    echo "</div>";
}?>