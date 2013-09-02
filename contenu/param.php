<?php

/*********************************************************
Connexion à la base
 *********************************************************/
/*$serv = 'localhost';
$login = 'root';
$pwd = '';
$data = 'taoupats';*/

$serv = 'mysql51-74.perso';
$login = 'taoupats';
$pwd = 'Audrey65';
$data = 'taoupats';

/*********************************************************
Liste des joueurs pour le match
 *********************************************************/
$joueur1 = 'MaximeP';
$joueur1_but = 0;
$joueur1_passe = 0;
$joueur1_ratio_but = 0;
$joueur1_ratio_passe = 0;
$joueur1_nb_match = 1;
$joueur1_homme_match = 0;
$joueur2 = 'Alexy';
$joueur2_but = 0;
$joueur2_passe = 0;
$joueur2_ratio_but = 0;
$joueur2_ratio_passe = 0;
$joueur2_nb_match = 1;
$joueur2_homme_match = 0;
$joueur3 = 'Tito';
$joueur3_but = 1;
$joueur3_passe = 0;
$joueur3_ratio_but = 1;
$joueur3_ratio_passe = 0;
$joueur3_nb_match = 1;
$joueur3_homme_match = 0;
$joueur4 = 'MaximeD';
$joueur4_but = 0;
$joueur4_passe = 0;
$joueur4_ratio_but = 0;
$joueur4_ratio_passe = 0;
$joueur4_nb_match = 1;
$joueur4_homme_match = 0;
$joueur5 = 'JB';
$joueur5_but = 0;
$joueur5_passe = 0;
$joueur5_ratio_but = 0;
$joueur5_ratio_passe = 0;
$joueur5_nb_match = 1;
$joueur5_homme_match = 0;
$joueur6 = 'Jordan';
$joueur6_but = 0;
$joueur6_passe = 1;
$joueur6_ratio_but = 0;
$joueur6_ratio_passe = 1;
$joueur6_nb_match = 1;
$joueur6_homme_match = 0;
$joueur7 = 'JulienB';
$joueur7_but = 0;
$joueur7_passe = 0;
$joueur7_ratio_but = 0;
$joueur7_ratio_passe = 0;
$joueur7_nb_match = 1;
$joueur7_homme_match = 0;
$joueur8 = 'Joffrey';
$joueur8_but = 0;
$joueur8_passe = 0;
$joueur8_ratio_but = 0;
$joueur8_ratio_passe = 0;
$joueur8_nb_match = 1;
$joueur8_homme_match = 0;
$joueur9 = 'Thomas';
$joueur9_but = 0;
$joueur9_passe = 0;
$joueur9_ratio_but = 0;
$joueur9_ratio_passe = 0;
$joueur9_nb_match = 1;
$joueur9_homme_match = 0;
$joueur10 = 'Zizou';
$joueur10_but = 0;
$joueur10_passe = 0;
$joueur10_ratio_but = 0;
$joueur10_ratio_passe = 0;
$joueur10_nb_match = 1;
$joueur10_homme_match = 0;
$joueur11 = 'Dede';
$joueur11_but = 0;
$joueur11_passe = 0;
$joueur11_ratio_but = 0;
$joueur11_ratio_passe = 0;
$joueur11_nb_match = 1;
$joueur11_homme_match = 0;
$joueur12 = 'Enzo';
$joueur12_but = 2;
$joueur12_passe = 0;
$joueur12_ratio_but = 2;
$joueur12_ratio_passe = 0;
$joueur12_nb_match = 1;
$joueur12_homme_match = 0;
$joueur13 = 'Tony';
$joueur13_but = 0;
$joueur13_passe = 0;
$joueur13_ratio_but = 0;
$joueur13_ratio_passe = 0;
$joueur13_nb_match = 1;
$joueur13_homme_match = 0;
$joueur14 = 'Paul';
$joueur14_but = 0;
$joueur14_passe = 0;
$joueur14_ratio_but = 0;
$joueur14_ratio_passe = 0;
$joueur14_nb_match = 1;
$joueur14_homme_match = 0;
$joueur15 = 'Laurent';
$joueur15_but = 0;
$joueur15_passe = 0;
$joueur15_ratio_but = 0;
$joueur15_ratio_passe = 0;
$joueur15_nb_match = 1;
$joueur15_homme_match = 0;
/*********************************************************
Liste des autres joueurs
 *********************************************************/
$joueur16 = 'JulienG';
$joueur16_but = 0;
$joueur16_passe = 0;
$joueur16_ratio_but = 0;
$joueur16_ratio_passe = 0;
$joueur16_nb_match = 0;
$joueur16_homme_match = 0;
$joueur17 = 'Lionel';
$joueur17_but = 0;
$joueur17_passe = 0;
$joueur17_ratio_but = 0;
$joueur17_ratio_passe = 0;
$joueur17_nb_match = 0;
$joueur17_homme_match = 0;
$joueur18 = 'Olivier';
$joueur18_but = 0;
$joueur18_passe = 0;
$joueur18_ratio_but = 0;
$joueur18_ratio_passe = 0;
$joueur18_nb_match = 0;
$joueur18_homme_match = 0;
$joueur19 = 'MaximeS';
$joueur19_but = 0;
$joueur19_passe = 0;
$joueur19_ratio_but = 0;
$joueur19_ratio_passe = 0;
$joueur19_nb_match = 0;
$joueur19_homme_match = 0;
$joueur20 = 'Gaetan';
$joueur20_but = 0;
$joueur20_passe = 0;
$joueur20_ratio_but = 0;
$joueur20_ratio_passe = 0;
$joueur20_nb_match = 0;
$joueur20_homme_match = 0;
$joueur21 = 'Florent';
$joueur21_but = 0;
$joueur21_passe = 0;
$joueur21_ratio_but = 0;
$joueur21_ratio_passe = 0;
$joueur21_nb_match = 0;
$joueur21_homme_match = 0;

$nbJoueurs = 15;
$array = array($joueur1, $joueur2, $joueur3, $joueur4, $joueur5, $joueur6, $joueur7, $joueur8, $joueur9, $joueur10, $joueur11, $joueur12, $joueur13, $joueur14, $joueur15);

/*********************************************************
Nom des sondages
 *********************************************************/
$match = 'cologne';
$noteMatch = 'note-cologne';
$commentMatch = 'comment-cologne';

/*********************************************************
Interview de la personne de la semaine
 *********************************************************/
$prenom = 'Jordan';
$nom = 'Cointe';
$np = 'JC';
$age = '25';

/*********************************************************
Début des questions
 *********************************************************/
$poste = 'Poste : euh bonne question ( attaquant ;) ) ';
$q1 = 'Touche pas a mon poste, canal football club , how i met your mother';
$q2 = 'Lincoln';
$q3 = 'Tom hanks';
$q4 = 'Onze mondial en couverture ca devait etre Zidane il me semble !!';
$q5 = 'De tout pas bien difficile de ce coter la ^^';
$q6 = 'La mienne me va amplement :D';
$q7 = 'Australie , angleterre ( pas tres original mais bien envie de rencontrer nos voisines anglaises pour discuter ^^ )';
$q8 = 'Beauzelle, Blagnac, cornecu et daux';
$q9 = 'Jo , jojo, le gros';
$q10 = 'Exigent , trop gentil';
$q11 = 'Trop gentil';
$q12 = 'Liverpool, et hors europe argentine ^^';
$q13 = 'Les italiens trop de simulation !!';
$q14 = 'Liverpool milan ac 0-3 a la mitemps 3-3 et victoire des reds en finale ^^';
$q15 = 'Batistuta une machine a but';
$q16 = "Mes premiers pas en tant que joueur sous les nouvelles couleurs du club ( le fayot le fayot le fayot ) , la victoire a villaudric a l'arraché";
$q17 = 'Les tropiks et au match retour les coteaux';
$q18 = 'JB  et son pull il aura marqué la tendance du moment chez les taoupats';
$q19 = 'Alexy je crois ;) ';
$q20 = "Das et d'ailleurs continue a etre sérieux l'année prochaine aussi...";
$q21 = 'Papy';
$q22 = "La bave du crapeau n'atteint pas la blanche colombe ";
$q23 = "Continuons sur cette lancer ca fait du bien de pouvoir jouer au ballon un peu et avec du sérieux dans ce que nous faisons nous allons prendre du plaisir par la meme occase c'est tout con :) ^^ ca serait sympa de garder le meme groupe l'année prochaine avec les memes joueurs... en plus de quelques uns et d'avoir de l'ambition si possible donc essayer de faire en sorte que l'on puisse realiser ceci pour l'année prochaine ^^  PS : ce match de Mondonville faut le gagner :) bisous et derien ce fut un plaisir d'avoir repondu a tes questions julien ;) ";