<?php

    // GESTION DE LA L'AFFICHAGE DES EQUIPES SUR LA PAGE INDEX.PHP

    // On charge le fichier permettant de se connecter à la bdd
    include 'connexion.php';

    // on prépare les requêtes pour la suite du code 
    $requete_nbr_equipe = $bdd->query('SELECT COUNT(*) FROM equipe');
    $requete_equipe_sans_entraineur = $bdd->query('SELECT * FROM equipe LEFT JOIN entraineur ON equipe.id = entraineur.id_equipe WHERE id_equipe IS NULL');
    $requete_nom_entraineur = $bdd->query('SELECT * FROM entraineur INNER JOIN equipe WHERE entraineur.id_equipe = equipe.id');
    $requete_joueur_dans_equipe = $bdd->query('SELECT * FROM joueur INNER JOIN equipe WHERE joueur.id_equipe = equipe.id');

    // boucle pour parcourir toutes les données de la requete $requete_nbr_equipe
    while ($data = $requete_nbr_equipe->fetch()) {
        // on teste si la reponse de la requete est vide
        if (!$data){
            // message d'erreur
            echo 'La liste des équipes n\'existe pas ou est vide.';
            break;
        }
        else {
            // défini dnas $nbr_equipe la contenu dans data à l'emplacement 0 du tableau
            $nbr_equipe = $data[0];
        }
    }

    // boucle pour parcourir toutes les données de la requete $requete_equipe_sans_entraineur
    while ($data = $requete_equipe_sans_entraineur->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des équipes n\'existe pas ou est vide.';
            break;
        }
        else {
            // dans un tableau ($tableau_nom_equipe) est défini un tableau qui contient une valeur liée à la clé "nom_entraineur" et une deuxième valeur dans la clé "nom_equipe"
            $tableau_nom_equipe[] = [
                "nom_entraineur" => "Pas d'entraîneur",
                "nom_equipe" => $data["nom_equipe"]
            ];
        }
    }

    // boucle pour parcourir toutes les données de la requete $requete_nom_entraineur
    while ($data = $requete_nom_entraineur->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des entraineurs n\'existe pas ou est vide.';
            break;
        }
        else {
            // dans un tableau ($tableau_nom_entraineur) est défini un tableau qui contient une valeur liée à la clé "nom_entraineur" et une deuxième valeur dans la clé "nom_equipe"
            $tableau_nom_entraineur[] = [
                "nom_entraineur" => $data['prenom_ent'] . " " . $data['nom_ent'],
                "nom_equipe" => $data['nom_equipe']
            ];
        }
    }


    // merge les deux tableau $tableau_nom_entraineur et $tableau_nom_equipe dans un unique $tab_nom_entraineur_et_equipe
    $tab_nom_entraineur_et_equipe = array_merge($tableau_nom_entraineur, $tableau_nom_equipe);

    // boucle pour parcourir toutes les données de la requete $requete_joueur_dans_equipe
    while ($data = $requete_joueur_dans_equipe->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des joueurs n\'existe pas ou est vide.';
            break;
        }
        else {
            // parcours le tableau $tab_nom_entraineur_et_equipe
            foreach ($tab_nom_entraineur_et_equipe as $key => $value) {
                // parcours le tableau du tableau $tab_nom_entraineur_et_equipe
                foreach ($value as $key1 => $value1) {
                    // test si la valeur1 (valeur d'une clé $key1) est égale à la valeur data avec pour key "nom_equipe"
                    if ($value1 == $data["nom_equipe"]) {
                        // ajoute au tableau $tab_nom_entraineur_et_equipe à la clé $key la valeur de data de la clé "nom_joueur"
                        array_push($tab_nom_entraineur_et_equipe[$key], $data["nom_joueur"]);
                    }
                }
            }
        }
    }
    
    // fonction d'affichage du nom du joueur (utilisé dans index.php)
    function nom_joueur($tab_nom_entraineur_et_equipe, $i, $emplacement_joueur) {
        // test si le tableau $tab_nom_entraineur_et_equipe à la le nom du joueur dans le sous tableau $i à l'emplacement $emplacement_joueur (0 ou 1)
        if (isset($tab_nom_entraineur_et_equipe[$i][$emplacement_joueur])) {
            // retourne le nom du joueur
            return $tab_nom_entraineur_et_equipe[$i][$emplacement_joueur];
        }
        else {
            // sinon retourne le String "Vide"
            return "Vide";
        }
    }

?>