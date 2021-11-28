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
        if (array_key_exists('nom_entraineur', $_POST) && array_key_exists('prenom_entraineur', $_POST) && array_key_exists('identifiant_connexion_entraineur', $_POST) && array_key_exists('mot_de_passe_entraineur', $_POST)) {

            // création de variables pour faciliter la notation
            $nom = $_POST["nom_entraineur"];
            $prenom = $_POST["prenom_entraineur"];
            $login = $_POST['identifiant_connexion_entraineur'];
            $mdp = $_POST['mot_de_passe_entraineur'];

            // vérification du type de données saisies dans le formulaire
            if (is_string($nom) && is_string($prenom) && is_string($login) && is_string($mdp)) {

                // on ajoute les données dans un nouvel enregistrement dans la table des entraineurs
                $bdd->exec('INSERT INTO entraineur (nom_ent, prenom_ent, identifiant_ent, mdp_ent) VALUES ("'.$nom.'", "'.$prenom.'", "'.$login.'", "'.$mdp.'")');

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