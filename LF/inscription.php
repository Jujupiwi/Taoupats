<?php
include 'param.php';
//...
// Votre code
//...
// Connexion à la base de données

$mysqli = new mysqli($serv, $user, $pwd, $data);
if ($mysqli->connect_errno) {
    $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Récupération des variables nécessaires à l'activation
$login = $_GET['log'];
$cle = $_GET['cle'];

// Récupération de la clé correspondant au $login dans la base de données
$stmt = $mysqli->query("SELECT cle,valide FROM membre WHERE login=" . $login . "");
$row = $stmt->fetch_array();
$actif = 0;
$clebdd = 0;
if ($row) {
    $clebdd = $row['cle']; // Récupération de la clé
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
}

// On teste la valeur de la variable $actif récupéré dans la BDD
if ($actif == '1') // Si le compte est déjà actif on prévient
{
    echo "Votre compte est déjà actif !";
} else // Si ce n'est pas le cas on passe aux comparaisons
{
    if ($cle == $clebdd) // On compare nos deux clés
    {
        // Si elles correspondent on active le compte !
        echo "Votre compte a bien été activé !";

        // La requête qui va passer notre champ actif de 0 à 1
        $stmt = $mysqli->query("UPDATE membres SET actif = 1 WHERE login=" . $login . "");
    } else // Si les deux clés sont différentes on provoque une erreur...
    {
        echo "Erreur ! Votre compte ne peut être activé...";
    }
}


//...	
// Fermeture de la connexion	
//...
// Votre code
//...
