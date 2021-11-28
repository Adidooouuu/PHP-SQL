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
        if (array_key_exists('nom_equipe', $_POST) || array_key_exists('categorie', $_POST) || array_key_exists('joueur_1', $_POST) || array_key_exists('joueur_2', $_POST)) {

            // création de variables pour faciliter la notation
            $nom = $_POST["nom_equipe"];
            $categorie = $_POST["categorie"];
            $joueur1 = $_POST["joueur_1"];
            $joueur2 = $_POST['joueur_2'];

            // création de la variable qui servira à comparer les noms de la bdd avec celui du formulaire
            $nom_equipe = $bdd->query( 'SELECT nom_equipe from equipe');
            $verification_nom = false;

            // on vérifie que le nom de l'équipe est rentré
            if (!empty($nom)){
                // tant qu'il existe des joueurs dans la base
                while ($nom_equipe_bdd = $nom_equipe->fetch()) {
                    // si le nom choisi est le même qu'un nom déjà existant dans la base
                    if ($nom == $nom_equipe_bdd[0]) {
                        // on sort de la boucle
                        break;
                    }
                    // sinon
                    else {
                        // la vérification est validée
                        $verification_nom = true;
                    }
                }
            // si l'entraineur n'a pas changé de nom d'équipe
            }

            // vérification du type de données saisies dans le formulaire
            if (is_string($nom) && is_string($categorie) && is_string($joueur1) && is_string($joueur2)) {

                //vérification du choix des deux joueurs. En effet, ces derniers ne doivent pas être les mêmes
                if ($joueur1 !== $joueur2) {

                    //vérification de la validité du nouveau nom 
                    if ($verification_nom == true){
                        // on met à jour la table équipe en fonction des modifications apportées
                        $bdd->exec('UPDATE equipe SET nom_equipe = '.$nom);
                    }


                } else {
                    echo "Vous n'avez pas sélectionné deux joueurs différents";
                }

            } else {
                echo "Au moins une donnée n'est pas au bon format.";
            }

        } else {
            echo "Au moins une information du formulaire est manquante.";
        }

    } else {
        echo "Le formulaire est vide.";
    }


    // rediriger vers l'espace utilisateur
   // header("Location: espace_utilisateur.php");
    //exit();

?>