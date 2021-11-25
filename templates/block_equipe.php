<?php

    // GESTION DE LA L'AFFICHAGE DES EQUIPES SUR LA PAGE INDEX.PHP

    // On charge le fichier permettant de se connecter à la bdd
    include 'connexion.php';

    $requete_nbr_equipe = $bdd->query('SELECT COUNT(*) FROM equipe');
    $requete_nom_equipe = $bdd->query('SELECT * FROM equipe LEFT JOIN entraineur ON equipe.id = entraineur.id_equipe WHERE id_equipe IS NULL');
    $requete_nom_entraineur = $bdd->query('SELECT * FROM entraineur INNER JOIN equipe WHERE entraineur.id_equipe = equipe.id');
    $requete_nom_joueur = $bdd->query('SELECT * FROM joueur INNER JOIN equipe WHERE joueur.id_equipe = equipe.id');

    while ($data = $requete_nbr_equipe->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des équipes n\'existe pas ou est vide.';
            break;
        }
        else {
            $nbr_equipe = $data[0];
        }
    }
    
    while ($data = $requete_nom_equipe->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des équipes n\'existe pas ou est vide.';
            break;
        }
        else {
            
            $tableau_nom_equipe[] = [
                "nom_entraineur" => "Pas d'entraîneur",
                "nom_equipe" => $data["nom_equipe"]
            ];
        }
    }

    while ($data = $requete_nom_entraineur->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des équipes n\'existe pas ou est vide.';
            break;
        }
        else {
            $tableau_nom_entraineur[] = [
                "nom_entraineur" => $data['prenom_ent'] . " " . $data['nom_ent'],
                "nom_equipe" => $data['nom_equipe']
            ];
        }
    }


    $tab_nom_entraineur_et_equipe = array_merge($tableau_nom_entraineur, $tableau_nom_equipe);


    while ($data = $requete_nom_joueur->fetch()) {
        if (!$data){
            // message d'erreur
            echo 'La liste des équipes n\'existe pas ou est vide.';
            break;
        }
        else {
            foreach ($tab_nom_entraineur_et_equipe as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if ($value1 == $data["nom_equipe"]) {
                        array_push($tab_nom_entraineur_et_equipe[$key], $data["nom_joueur"]);
                    }
                }
            }
        }
    }
    
    function nom_joueur($tab_nom_entraineur_et_equipe, $i, $a) {
        if (isset($tab_nom_entraineur_et_equipe[$i][$a])) {
            return $tab_nom_entraineur_et_equipe[$i][$a];
        }
        else {
            return "Vide";
        }
    }
    
    
    /*
    var_dump($tableau_nom_entraineur);
    var_dump($tableau_nom_equipe);
    var_dump($tab_nom_entraineur_et_equipe);
    */
    

?>