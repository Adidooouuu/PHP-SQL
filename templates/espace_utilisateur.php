<?php
session_start();

  ini_set("display_errors", "Off");
  ini_set("log_errors", "On");
  ini_set("error_log", dirname(__file__)."/../logs/log_error_php.txt");
  // var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Espace membre</title> <?php // TODO: faire en sorte que ça s'actualise en fonction du membre connecté ?>
  </head>
  <body>
    <header class = "header_membre">
      <nav class = "nav_membre">
        <?php
        // affiche un message de "bienvenue" personnalisé en fonction du nom et prenom sauvegardé dans la SESSION
        echo '<p class="espace-membre espace-membre-flex">Bienvenue ' . $_SESSION['log']['prenom_utilisateur'] . ' ' . $_SESSION['log']['nom_utilisateur'] . '</p>';
        // test le "type_utilisateur" de la SESSION et affiche un message en conséquence
        if ($_SESSION['log']['type_utilisateur'] === "president") {
          echo '<p class="espace-membre espace-membre-flex">Président</p>';
        } else if ($_SESSION['log']['type_utilisateur'] === "entraineur") {
          echo '<p class="espace-membre espace-membre-flex">Entraîneur</p>';
        } else if ($_SESSION['log']['type_utilisateur'] === "joueur") {
          echo '<p class="espace-membre espace-membre-flex">Joueur</p>';
        }
        ?>
        <div class="to_flex_end">
          <a href="../index.php" class="btn btn-primary btn_primary_membre espace-membre-flex">Accueil</a>
          <a href="deconnexion.php" class="btn btn-primary btn_primary_membre espace-membre-flex">Déconnexion</a>
        </div>
      </nav>
    </header>
    <main>
      <div class="main_centered flex">
      <?php

      var_dump($_SESSION);

      // GESTION DE L'AFFICHAGE ET DES FONCTIONNALITES SELON LE TYPE D'UTILISATEUR CONNECTE

      // On charge le fichier permettant de se connecter à la bdd
      include 'connexion.php';

      if (!empty($_SESSION['log']['type_utilisateur']) && array_key_exists('type_utilisateur', $_SESSION['log']) && is_string($_SESSION['log']['type_utilisateur'])) {
        // pour ENTRAINEUR
        if ($_SESSION['log']['type_utilisateur'] === "entraineur") {

          $nom_ent = $bdd->query( 'SELECT * from entraineur WHERE identifiant_ent="'.$_SESSION['log']['identifiant'].'"'); //est censé prendre son nom
          $prenom_ent = $bdd->query('SELECT * FROM entraineur WHERE identifiant_ent="'.$_SESSION['log']['identifiant'].'"'); //idem pour son prénom
          //Du coup, pour dépanner si ça bugue, ↓
          echo '
          <section id="entraineur">
            <form class="form_team_management" action="espace_utilisateur.php" method="post">
              <fieldset>
                <legend>Gestion de l\'équipe</legend>
                <p>Votre équipe : </p> <?php //TODO : appeler le nom de l\'équipe?>
                <div class="nom_equipe">
                  <label for="nom_equipe">Nouveau nom de l\'équipe : </label>
                  <input type="text" name="nom_equipe" id="nom_equipe">
                </div>
                <div class="categorie">
                  <label for="categorie">Catégorie : </label>
                  <select class="categorie" name="categorie" id="categorie">
                    <option value="">&nbsp;</option>
                    <option value="minibad">MiniBad</option>
                    <option value="poussins">Poussins</option>
                    <option value="benjamins">Benjamins</option>
                    <option value="minimes">Minimes</option>
                    <option value="cadets">Cadets</option>
                    <option value="juniors">Juniors</option>
                    <option value="seniors">Seniors</option>
                    <option value="veteran_1">Vétéran 1</option>
                    <option value="veteran_2">Vétéran 2</option>
                    <option value="veteran_3">Vétéran 3</option>
                    <option value="veteran_4">Vétéran 4</option>
                    <option value="veteran_6">Vétéran 6</option>
                    <option value="veteran_7">Vétéran 7</option>
                    <option value="veteran_8">Vétéran 8</option>
                  </select>
                </div>
                <div class="joueur_1">
                  <label for="joueur_1">Joueur 1 : </label>
                  <select class="joueur_1" name="joueur_1" id="joueur_1">
                    <option value="">&nbsp;</option>
                    <option value="identifiant_joueur_1">Joueur 1</option>
                    <option value="identifiant_joueur_2">Joueur 2</option>
                    <option value="identifiant_joueur_3">Joueur 3</option>
                    <option value="identifiant_joueur_4">Joueur 4</option>
                  </select>
                </div>
                <div class="joueur_2">
                  <label for="joueur_2">Joueur 2 : </label>
                  <select class="joueur_2" name="joueur_2" id="joueur_2">
                    <option value="">&nbsp;</option>
                    <option value="identifiant_joueur_1">Joueur 1</option>
                    <option value="identifiant_joueur_2">Joueur 2</option>
                    <option value="identifiant_joueur_3">Joueur 3</option>
                    <option value="identifiant_joueur_4">Joueur 4</option>
                  </select>
                </div>
                <button class="button" type="submit" name="button">Modifier l\'équipe</button>
                <p class="avertissements">Aucun champs n\'est obligatoire</p>
              </fieldset>
            </form>
          </section>
        ';
        }

        // pour PRESIDENT
        if ($_SESSION['log']['type_utilisateur'] === "president") {

          // on récupère entièrement la table des joueurs pour pouvoir voir la liste
          $requete_joueur = $bdd->query('SELECT * FROM joueur');
          // idem pour les entraineurs
          $requete_ent = $bdd->query('SELECT * FROM entraineur');
          $requete_entraineur = $bdd->query('SELECT * FROM entraineur');
          // idem pour les catégories
          $requete_categorie = $bdd->query('SELECT * FROM categorie');

          $nom_pres = $bdd->query( 'SELECT * from president WHERE identifiant_pres="'.$_SESSION['log']['identifiant'].'"'); //est censé prendre son nom
          $prenom_pres = $bdd->query('SELECT * FROM president WHERE identifiant_pres="'.$_SESSION['log']['identifiant'].'"'); //idem pour son prénom

          echo '
          <section id="president">
            <form class="form_president" action="ajout_equipe.php" method="post">
              <fieldset>
                <legend>Création d\'équipe</legend>
                <div class="nom_equipe">
                  <label for="nom_equipe_crea">Nom de l\'équipe<span class="red">*</span> : </label>
                  <input type="text" name="nom_equipe" id="nom_equipe_crea" required>
                </div>
                <div class="categorie">
                  <label for="categorie">Catégorie<span class="red">*</span> : </label>
                  <select class="categorie" name="categorie" id="categorie_president" required>
                    <option value="">&nbsp;</option>';
                    // ici on boucle les catégories
                    while ($data_categ = $requete_categorie->fetch()) {
                      if (!$data_categ) {
                        // s'il y en a aucun on affiche cette erreur
                        echo '<option>La liste des catégories n\'existe pas ou est vide.</option>';
                        break;
                      }
                      else {
                        // sinon on affiche nom de la catégorie dans la liste d'options, avec son id en tant que value (unique)
                        // que l'on va récupérer ensuite avec $_POST['categorie']
                        echo "<option value=".$data_categ["id"].">".$data_categ["nom_categorie"]."</option>";
                      }
                    }
                    echo '</select>
                </div>
                <div class="entraineur">
                  <label for="entraineur">Entraineur<span class="red">*</span> : </label>
                  <select class="entraineur" name="entraineur" id="nom_entraineur" required>
                    <option value="">&nbsp;</option>';
                    // ici on boucle les entraîneurs
                    while ($data_ent = $requete_ent->fetch()) {
                      if (!$data_ent) {
                        // s'il y en a aucun on affiche cette erreur
                        echo '<option>La liste des entraîneurs n\'existe pas ou est vide.</option>';
                        break;
                      }
                      else {
                        // sinon on affiche prénom / nom de l'entraîneur dans la liste d'options, avec son id en tant que value (unique)
                        // que l'on va récupérer ensuite avec $_POST['entraineur']
                        echo "<option value=".$data_ent["id"].">".$data_ent["prenom_ent"]." ".$data_ent["nom_ent"]."</option>";
                      }
                    }
                    echo '</select>
                </div>
                <button class="button" type="submit" name="button">Créer l\'équipe</button>
                <p class="avertissements">(<span class="red">*</span>) champs obligatoire</p>
              </fieldset>
            </form>

            <div class="formulaire_ajout_retrait_joueur">
              <form action="ajout_joueur.php" method="post">
                <fieldset>
                  <legend>Ajout de joueur</legend>
                  <div class="nom_joueur">
                    <label for="nom_joueur">Nom<span class="red">*</span> : </label>
                    <input type="text" name="nom_joueur" id="nom_joueur" required>
                  </div>
                  <div class="prenom_joueur">
                    <label for="prenom_joueur">Prénom<span class="red">*</span> : </label>
                    <input type="text" name="prenom_joueur" id="prenom_joueur" required>
                  </div>
                  <div class="age">
                    <label for="age">Age<span class="red">*</span> : </label>
                    <input type="number" name="age" id="age" required>
                  </div>
                  <div class="identifiant_connexion">
                    <label for="identifiant_connexion">Attribuer un identifiant de connexion<span class="red">*</span> : </label>
                    <input type="text" name="identifiant_connexion" id="identifiant_connexion" required>
                  </div>
                  <div class="mot_de_passe">
                    <label for="mot_de_passe">Attribuer un mot de passe<span class="red">*</span> : </label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" required>
                  </div>
                  <button class="button" type="submit" name="button">Ajouter le joueur</button>
                </fieldset>
              </form>
              <p class="avertissements">(<span class="red">*</span>) champs obligatoire</p>
              <hr>
              <form action="suppression_joueur.php" method="post">
                <fieldset>
                  <legend>Retrait de joueur</legend>
                  <div class="joueur">
                    <label for="joueur">Nom du joueur<span class="red">*</span> : </label>
                    <select class="joueur" name="joueur" id="joueur" required>
                      <option value="">&nbsp;</option>';
                      // ici on boucle les joueurs
                      while ($data_joueur = $requete_joueur->fetch()) {
                        if (!$data_joueur) {
                          // s'il y en a aucun on affiche cette erreur
                          echo '<option>La liste des joueurs n\'existe pas ou est vide.</option>';
                          break;
                        }
                        else {
                          // sinon on affiche prénom / nom du joueur dans la liste d'options, avec son id en tant que value (unique)
                          // que l'on va récupérer ensuite avec $_POST['joueur']
                          echo "<option value=".$data_joueur["id"].">".$data_joueur["prenom_joueur"]." ".$data_joueur["nom_joueur"]."</option>";
                        }
                      }
                      echo '</select>
                  </div>
                  <div class="mot_de_passe_president">
                    <label for="mot_de_passe_president">Mot de passe "Président"<span class="red">*</span> : </label>
                    <input type="password" name="mot_de_passe_president" id="mot_de_passe_president" required>
                  </div>
                  <button class="button" type="submit" name="button">Supprimer le joueur</button>
                </fieldset>
              </form>
              <p class="avertissements">(<span class="red">*</span>) champs obligatoire</p>
            </div>

            <div class="formulaire_ajout_retrait_entraineur">
              <form action="ajout_entraineur.php" method="post">
                <fieldset>
                  <legend>Ajout d\'entraineur</legend>
                  <div class="nom_entraineur">
                    <label for="nom_entraineur">Nom<span class="red">*</span> : </label>
                    <input type="text" name="nom_entraineur" id="nom_entraineur_ajout" required>
                  </div>
                  <div class="prenom_entraineur">
                    <label for="prenom_entraineur">Prénom<span class="red">*</span> : </label>
                    <input type="text" name="prenom_entraineur" id="prenom_entraineur" required>
                  </div>
                  <div class="identifiant_connexion_entraineur">
                    <label for="identifiant_connexion_entraineur">Attribuer un identifiant de connexion<span class="red">*</span> : </label>
                    <input type="text" name="identifiant_connexion_entraineur" id="identifiant_connexion_entraineur" required>
                  </div>
                  <div class="mot_de_passe_entraineur">
                    <label for="mot_de_passe_entraineur">Attribuer un mot de passe<span class="red">*</span> : </label>
                    <input type="password" name="mot_de_passe_entraineur" id="mot_de_passe_entraineur" required>
                  </div>
                  <button class="button" type="submit" name="button">Ajouter l\'entraineur</button>
                </fieldset>
              </form>
              <p class="avertissements">(<span class="red">*</span>) champs obligatoire</p>
              <hr>
              <form action="suppression_entraineur.php" method="post">
                <fieldset>
                  <legend>Retrait d\'entraineur</legend>
                  <div class="entraineur">
                    <label for="entraineur">Nom de l\'entraineur<span class="red">*</span> : </label>
                    <select class="entraineur" name="entraineur" id="nom_de_l_entraineur" required>
                      <option value="">&nbsp;</option>';
                      // ici on boucle les entraineurs
                      while ($data_entraineur = $requete_entraineur->fetch()) {
                        if (!$data_entraineur) {
                          // s'il y en a aucun on affiche cette erreur
                          echo '<option>La liste des joueurs n\'existe pas ou est vide.</option>';
                          break;
                        }
                        else {
                          // sinon on affiche prénom / nom de l'entraineur dans la liste d'options, avec son id en tant que value (unique)
                          // que l'on va récupérer ensuite avec $_POST['entraineur']
                          echo "<option value=".$data_entraineur["id"].">".$data_entraineur["prenom_ent"]." ".$data_entraineur["nom_ent"]."</option>";
                        }
                      }
                      echo '
                    </select>
                  </div>
                  <div class="mot_de_passe_president">
                    <label for="mot_de_passe_president">Mot de passe "Président"<span class="red">*</span> : </label>
                    <input type="password" name="mot_de_passe_president" id="mot_de_passe_president_suppression_entraineur" required>
                  </div>
                  <button class="button" type="submit" name="button">Supprimer l\'entraineur</button>
                </fieldset>
              </form>
              <p class="avertissements">(<span class="red">*</span>) champs obligatoire</p>
            </div>

        </section>
        ';
        }
        if ($_SESSION['log']['type_utilisateur'] === "joueur") {
          echo '
          <p>Il n\'y a pas d\'espace utilisateur pour un joueur</p>
          ';
        }
      }
      ?>
      </div>
    </main>
  </body>
</html>
