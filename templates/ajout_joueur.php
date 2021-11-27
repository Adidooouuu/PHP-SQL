<?php

    session_start();

    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', dirname(__file__).'/../logs/log_error_php.txt');

    // On charge le fichier permettant de se connecter à la bdd
    include 'connexion.php';


    // vérification de l'existence de données saisies dans le formulaire
    if (!empty($_POST)) {

        // vérification de l'existence des données attendues dans le formulaire
        if (array_key_exists('nom_joueur', $_POST) && array_key_exists('prenom_joueur', $_POST) && array_key_exists('age', $_POST) && array_key_exists('identifiant_connexion', $_POST) && array_key_exists('mot_de_passe', $_POST)) {

            // création de variables pour faciliter la notation
            $nom = $_POST["nom_joueur"];
            $prenom = $_POST["prenom_joueur"];
            $age = $_POST["age"];
            $login = $_POST['identifiant_connexion'];
            $mdp = $_POST['mot_de_passe'];

            // vérification du type de données saisies dans le formulaire
            if (is_string($nom) && is_string($prenom) && is_numeric($age) && is_string($login) && is_string($mdp)) {

                // on ajoute les données dans un nouvel enregistrement dans la table des joueurs
                $bdd->exec('INSERT INTO joueur (nom_joueur, prenom_joueur, age_joueur, identifiant_joueur, mdp_joueur) VALUES ("'.$nom.'", "'.$prenom.'", "'.$age.'", "'.$login.'", "'.$mdp.'")');

            } else {
                echo "Au moins une donnée n'est pas au bon format.";
            }

        } else {
            echo "Au moins une information du formulaire est manquante.";
        }

    } else {
        echo "Le formulaire est vide.";
    }

    // pour ces echo qui affichent des erreurs, je ne sais pas où se fait l'affichage...


    // rediriger vers l'espace utilisateur
    header("Location: espace_utilisateur.php");
    exit();

?>