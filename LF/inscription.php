<?php
include 'param.php';
//...
// Votre code
//...
// Connexion � la base de donn�es

$mysqli = new mysqli($serv, $user, $pwd, $data);
if ($mysqli->connect_errno) {
    $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// R�cup�ration des variables n�cessaires � l'activation
$login = $_GET['log'];
$cle = $_GET['cle'];

// R�cup�ration de la cl� correspondant au $login dans la base de donn�es
$stmt = $mysqli->query("SELECT cle,valide FROM membre WHERE login=" . $login . "");
$row = $stmt->fetch_array();
$actif = 0;
$clebdd = 0;
if ($row) {
    $clebdd = $row['cle']; // R�cup�ration de la cl�
    $actif = $row['actif']; // $actif contiendra alors 0 ou 1
}

// On teste la valeur de la variable $actif r�cup�r� dans la BDD
if ($actif == '1') // Si le compte est d�j� actif on pr�vient
{
    echo "Votre compte est d�j� actif !";
} else // Si ce n'est pas le cas on passe aux comparaisons
{
    if ($cle == $clebdd) // On compare nos deux cl�s
    {
        // Si elles correspondent on active le compte !
        echo "Votre compte a bien �t� activ� !";

        // La requ�te qui va passer notre champ actif de 0 � 1
        $stmt = $mysqli->query("UPDATE membres SET actif = 1 WHERE login=" . $login . "");
    } else // Si les deux cl�s sont diff�rentes on provoque une erreur...
    {
        echo "Erreur ! Votre compte ne peut �tre activ�...";
    }
}


//...	
// Fermeture de la connexion	
//...
// Votre code
//...
