<?php
include 'param.php';
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['init']) && $_POST['init'] == 'Envoyer') {
// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
    if ((isset($_POST['login']) && !empty($_POST['login'])) || (isset($_POST['mail']) && !empty($_POST['mail']))) {
        $mysqli = new mysqli($serv, $user, $pwd, $data);
        if ($mysqli->connect_errno) {
            $error = "Echec lors de la connexion a MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        // on recherche si ce login est déjà utilisé par un autre membre
        $login = $mysqli->real_escape_string($_POST['login']);
        $mail = $mysqli->real_escape_string($_POST['mail']);
        $res = $mysqli->query('SELECT count(*) FROM membre WHERE login="' . $login . '" or mail="' . $mail . '"');
        $row = $res->fetch_array();

        if ($row[0] == 1) {

            $res = $mysqli->query('SELECT pass FROM membre WHERE login="' . $login . '" or mail="' . $mail . '"');
            $row = $res->fetch_array();

            // Préparation du mail contenant le lien d'activation
            $destinataire = $mail;
            $sujet = "Mot de passe oublie";
            $entete = "From: forgotpassword@tournoisLF.com";

            // Le lien d'activation est composé du login(log) et de la clé(cle)
            $message = 'Bienvenue sur TournoisLF,

            Voici votre mot de passe : ' . md5($row[0]) . '


            ---------------
            Ceci est un mail automatique, Merci de ne pas y répondre.';
            mail($destinataire, $sujet, $message, $entete);
            header('Location: index.php?enreg=P');
            exit();
        } else {
            $error = 'Vous devez creer un compte dans un premier temps.';
            header('Location: password.php?enreg=O');
        }
    } else {
        $error = 'Au moins un des champs est vide.';
    }
}
