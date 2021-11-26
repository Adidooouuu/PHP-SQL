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
        <button type="button" class="btn btn-primary btn_primary_membre">Déconnexion</button>
      </nav>
    </header>
    <main>
      <div class="main_centered flex">
        <div class="connected_member">
          <div class="connected_member_picture">
            <img src="../assets/img/president.jpg" alt="Photo membre">
          </div>
          <div class="connected_member_data">
            <p>Éric ZEMMOUR</p>
            <p>Vétéran 2</p>
            <div class="connected_member_team">
              <p>Les BG</p>
              <p>Vétéran</p>
            </div>
          </div>
        </div>

        <section id="entraineur">

          <form class="form_team_management" action="espace_utilisateur.php" method="post">
            <fieldset>
              <legend>Gestion de l'équipe (entraineur)</legend>
              <div class="nom_equipe">
                <label for="nom_equipe">Equipe sélectionnée : </label>
                <select class="nom_equipe" name="nom_equipe" id="choix_equipe_ent" required>
                  <option value="">&nbsp;</option>
                  <option value="equipe_1">Equipe 1</option>
                  <option value="equipe_2">Equipe 2</option>
                  <option value="equipe_3">Equipe 3</option>
                  <option value="equipe_4">Equipe 4</option>
                </select>
              </div>
              <div class="nom_equipe">
                <label for="nom_equipe">Nom de l'équipe de l'entraineur: </label>
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
              <button class="button" type="submit" name="button">Modifier l'équipe</button>
              <p class="avertissements">Aucun champs n'est obligatoire</p>
            </fieldset>
          </form>

        </section>

        <section id="president">

            <form class="form_president" action="espace_utilisateur.php" method="post">
              <fieldset>
                <legend>Création d'équipe (président)</legend>
                <div class="nom_equipe">
                  <label for="nom_equipe_crea">Nom de l'équipe : </label>
                  <input type="text" name="nom_equipe" id="nom_equipe_crea">
                </div>
                <div class="categorie">
                  <label for="categorie">Catégorie : </label>
                  <select class="categorie" name="categorie" id="categorie_president">
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
                <div class="entraineur">
                  <label for="entraineur">Entraineur : </label>
                  <select class="entraineur" name="entraineur" id="nom_entraineur">
                    <option value="">&nbsp;</option>
                    <option value="identifiant_entraineur">Entraineur 1</option>
                    <option value="identifiant_entraineur">Entraineur 2</option>
                    <option value="identifiant_entraineur">Entraineur 3</option>
                    <option value="identifiant_entraineur">Entraineur 4</option>
                  </select>
                </div>
                <button class="button" type="submit" name="button">Modifier l'équipe</button>
                <p class="avertissements">Aucun champs n'est obligatoire</p>
              </fieldset>
            </form>

            <div class="formulaire_ajout_retrait_joueur">
              <form action="espace_utilisateur.php" method="post">
                <fieldset>
                  <legend>Ajout de joueur (président)</legend>
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
                    <input type="text" name="age" id="age" required>
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
              <form action="espace_utilisateur.php" method="post">
                <fieldset>
                  <legend>Retrait de joueur (président)</legend>
                  <div class="joueur">
                    <label for="joueur">Nom du joueur<span class="red">*</span> : </label>
                    <select class="joueur" name="joueur" id="joueur" required>
                      <option value="">&nbsp;</option>
                      <option value="nom_joueur_1">Joueur 1</option>
                      <option value="nom_joueur_2">Joueur 2</option>
                      <option value="nom_joueur_3">Joueur 3</option>
                      <option value="nom_joueur_4">Joueur 4</option>
                    </select>
                  </div>
                  <div class="mot_de_passe_president">
                    <label for="mot_de_passe_president">Mot de passe "Président"<span class="red">*</span> : </label>
                    <input type="password" name="mot_de_passe_president" id="mot_de_passe_president" required>
                  </div>
                  <button class="button" type="submit" name="button">Supprimer le joueur</button>
                </fieldset>
              </form>
            </div>

            <div class="formulaire_ajout_retrait_entraineur">
              <form action="espace_utilisateur.php" method="post">
                <fieldset>
                  <legend>Ajout d'entraineur</legend>
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
                  <button class="button" type="submit" name="button">Ajouter l'entraineur</button>
                </fieldset>
              </form>
              <form action="espace_utilisateur.php" method="post">
                <fieldset>
                  <legend>Retrait d'entraineur</legend>
                  <div class="entraineur">
                    <label for="entraineur">Nom de l'entraineur<span class="red">*</span> : </label>
                    <select class="entraineur" name="entraineur" id="nom_de_l_entraineur" required>
                      <option value="">&nbsp;</option>
                      <option value="nom_entraineur_1">entraineur 1</option>
                      <option value="nom_entraineur_2">entraineur 2</option>
                      <option value="nom_entraineur_3">entraineur 3</option>
                      <option value="nom_entraineur_4">entraineur 4</option>
                    </select>
                  </div>
                  <div class="mot_de_passe_president">
                    <label for="mot_de_passe_president">Mot de passe "Président"<span class="red">*</span> : </label>
                    <input type="password" name="mot_de_passe_president" id="mot_de_passe_president_suppression_entraineur" required>
                  </div>
                  <button class="button" type="submit" name="button">Supprimer l'entraineur</button>
                </fieldset>
              </form>
            </div>
        </section>

      </div>
    </main>
  </body>
</html>
