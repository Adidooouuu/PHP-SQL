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

                // on récupère les noms d'équipes déjà présents dans la BDD
                $requete_nom_equipe = $bdd->query('SELECT nom_equipe FROM equipe');
                // on crée un tableau qui va contenir ces noms d'équipes
                $nom_equipe = array();
                // on crée une variable avec une valeur booléenne qui va être utilisée pour dire si le nom
                // choisi par l'utilisateur est déjà enregistré en BDD
                $nom_deja_utilise = false;

                // on parcourt les noms d'équipes déjà présents dans la BDD
                while ($data = $requete_nom_equipe->fetch()) {
                    // si il n'y a aucune donnée
                    if (!$data) {
                        // message d'erreur
                        echo 'La liste des noms d\'équipes n\'existe pas ou est vide.';
                        break;
                    } else {
                        // sinon on ajoute le nom de l'équipe parcourue à notre nouveau tableau
                        array_push($nom_equipe, $data['nom_equipe']);
                    }
                }

                // on parcourt notre nouveau tableau de noms d'équipes jusqu'à la fin et tant que $nom_deja_utilise est faux
                for ($i = 0; $i < count($nom_equipe) && $nom_deja_utilise === false; $i++) {
                    echo $nom_equipe[$i]."<br>";
                    // si le nom d'équipe parcouru dans le nouveau tableau est celui saisi par l'utilisateur...
                    if ($nom_equipe[$i] === $nom) {
                        // $nom_deja_utilise devient vrai
                        $nom_deja_utilise = true;
                    }
                }

                // si le nom d'équipe saisi par l'utilisateur n'est pas déjà utilisé dans la BDD...
                if ($nom_deja_utilise === false) {
                    // on ajoute les données saisies dans un nouvel enregistrement dans la table des équipes
                    $bdd->exec('INSERT INTO equipe (nom_equipe, id_categorie) VALUES ("'.$nom.'", "'.$categorie.'")');
                    // on récupère l'ID de la dernière équipe ajoutée
                    $id_equipe = $bdd->query('SELECT LAST_INSERT_ID()')->fetchColumn();
                    // on met à jour la table entraineur pour attribuer la nouvelle équipe au bon entraineur
                    $bdd->exec('UPDATE entraineur SET id_equipe = "'.$id_equipe.'" WHERE id = "'.$entraineur.'"');
                } else {
                    echo "Le nom est déjà utilisé par une équipe existante.";
                }

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