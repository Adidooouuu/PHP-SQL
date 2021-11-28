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
        if (array_key_exists('nom_equipe', $_POST) && array_key_exists('categorie', $_POST) && array_key_exists('entraineur', $_POST)) {

            // création de variables pour faciliter la notation
            $nom = $_POST["nom_equipe"];
            $categorie = $_POST["categorie"];
            $entraineur = $_POST["entraineur"];

            // vérification du type de données saisies dans le formulaire
            if (is_string($nom)) {

                // on ajoute les données dans un nouvel enregistrement dans la table des équipes
                $bdd->exec('INSERT INTO equipe (nom_equipe, id_categorie) VALUES ("'.$nom.'", "'.$categorie.'")');
                // on récupère l'ID de la dernière équipe ajoutée
                $id_equipe = $bdd->query('SELECT LAST_INSERT_ID()')->fetchColumn();
                // on met à jour la table entraineur pour attribuer la nouvelle équipe au bon entraineur
                $bdd->exec('UPDATE entraineur SET id_equipe = "'.$id_equipe.'" WHERE id = "'.$entraineur.'"');

            } else {
                echo "Le nom n'est pas au bon format.";
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