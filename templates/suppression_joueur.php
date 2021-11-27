<?php

    session_start();

    ini_set('display_errors', 'Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', dirname(__file__).'/log_error_php.txt');

    // On charge le fichier permettant de se connecter à la bdd
    include 'connexion.php';


    // vérification de l'existence de données saisies dans le formulaire et en variable de session
    if (!empty($_POST) && !empty($_SESSION)) {

    	// vérification de l'existence d'un mot de passe saisi dans le formulaire et d'identifiants en session
    	if (array_key_exists('mot_de_passe_president', $_POST) && array_key_exists('log', $_SESSION)) {

    		// création de variables pour faciliter la notation
    		$mdp_saisi = $_POST['mot_de_passe_president'];
    		$log_president = $_SESSION['log'];

    		// vérification de l'existence d'un mot de passe parmi les identifiants de session
    		if (array_key_exists('password', $log_president)) {

    			// création de variable pour faciliter la notation
    			$mdp_president = $log_president['password'];

    			// vérification que le mot de passe saisi dans le formulaire et celui présent en session soient des chaines
    			if (is_string($mdp_saisi) && is_string($mdp_president)) {

	    			// si le mdp saisi dans le formulaire correspond à celui présent en session...
	    			if ($mdp_saisi === $mdp_president) {

	    				// on supprime l'enregistrement demandé dans la table des joueurs
		    			$bdd->prepare("DELETE FROM joueur WHERE id = ?")->execute([$_POST['joueur']]);

	    			} else {
	    				echo "Le mot de passe saisi est incorrect.";
	    			}

    			} else {
    				echo "Le mot de passe saisi ou celui enregistré en session n'est pas une chaine.";
    			}

    		} else {
    			echo "Aucun mot de passe n'existe en session";
    			// (alors on peut se demander comment l'utilisateur a pu arriver ici)
    		}

    	} else {
    		echo "Le mot de passe est manquant dans le formulaire ou dans les données de session.";
    	}

    } else {
    	echo "Le formulaire est vide ou aucune donnée de session n'est enregistrée.";
    }

    // pour ces echo qui affichent des erreurs, je ne sais pas où se fait l'affichage...


    // rediriger vers l'espace utilisateur (où les données seront actualisées)
    header("Location: espace_utilisateur.php");
    exit();

?>