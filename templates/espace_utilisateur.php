<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <script src="assets/js/script.js" type="text/javascript"></script>
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
        <div class="events_trainings_team_managment">
          <div class="personal_events">
            <form class="form_events" action="espace_utilisateur.php" method="post">
              <fieldset>
                <legend>Création d'événement</legend>
                <label for="team_selection_event">Sélection de l'équipe* : </label>
                <select class="team_selection" name="team_selection" id="team_selection_event" required>
                  <option value="">&nbsp;</option>
                  <option value="les_bg">Les BG</option>
                  <option value="les_boss">Les BOSS</option>
                </select>
                <div class="event_time">
                  <label for="event_time">Date et heure de l'événement* : </label>
                  <input type="datetime-local" name="event_time" id="event_time" value="" required>
                </div>
                <div class="event_location">
                  <label for="event_place">Lieu* : </label>
                  <input type="text" name="event_place" value="" id="event_place" placeholder="Stade [...], Ville" required>
                </div>
              </fieldset>
              <button type="submit" name="button">Ajouter l'événement</button>
            </form>
          </div>
          <div class="personal_trainings">
            <form class="form_training" action="espace_utilisateur.php" method="post">
              <fieldset>
                <legend>Création d'entrainement</legend>
                <p>Sélection de l'équipe* : </p>
                <div class="checkboxes">
                  <div class="checkbox">
                    <input type="checkbox" name="les_bg_training" value="les_bg_training" id="les_bg_training">
                    <label for="les_bg_training">Les BG</label>
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" name="les_boss_training" value="les_boss_training" id="les_boss_training">
                    <label for="les_boss_training">Les BOSS</label>
                  </div>
                </div>
                <div class="training_time">
                  <label for="training_time">Date et heure de l'entrainement* : </label>
                  <input type="datetime-local" name="training_time" id="training_time" value="" required>
                </div>
                <div class="event_location">
                  <label for="place_training">Lieu* : </label>
                  <input type="text" name="place" value="" id="place_training" placeholder="Stade [...], Ville" required>
                </div>
              </fieldset>
              <button type="submit" name="button">Ajouter l'entrainement</button>
            </form>
          </div>
          <div class="team_management">
            <form class="form_team_management" action="espace_utilisateur.php" method="post">
              <fieldset>
                <legend>Gestion de l'équipe</legend>
                <label for="team_management_selection">Sélection de l'équipe à gérer* : </label>
                <select class="team_management_selection" name="team_management_selection" id="team_management_selection" required>
                  <option value="">&nbsp;</option>
                  <option value="les_bg">Les BG</option>
                  <option value="les_boss">Les BOSS</option>
                </select>
                <p>Action* : </p>
                <div class="checkboxes" required>
                  <div class="checkbox">
                    <input type="checkbox" name="add_player" value="add_player" id="add_player">
                    <label for="add_player">Ajouter un joueur</label>
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" name="remove_player" value="remove_player" id="remove_player">
                    <label for="remove_player">Retirer un joueur</label>
                  </div>
                  <div class="checkbox">
                    <input type="checkbox" name="modify_player" value="modify_player" id="modify_player">
                    <label for="modify_player">Modifier un joueur</label>
                  </div>
                </div>
              </fieldset>
              <button type="submit" name="button">Modifier l'équipe</button>
            </form>
          </div>
        </div>

        <section id="entraineur">

          <form class="form_team_management" action="espace_utilisateur.php" method="post">
            <fieldset>
              <legend>Gestion de l'équipe</legend>
              <div class="nom_equipe">
                <label for="nom_equipe">Nom de l'équipe : </label>
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
          <div class="gestion_equipe_president">
            <form class="form_president" action="espace_utilisateur.php" method="post">
              <fieldset>
                <legend>Gestion de l'équipe</legend>
                <div class="nom_equipe">
                  <label for="nom_equipe">Equipe sélectionnée : </label>
                  <select class="nom_equipe" name="nom_equipe" id="choix_equipe">
                    <option value="">&nbsp;</option>
                    <option value="equipe_1">Equipe 1</option>
                    <option value="equipe_2">Equipe 2</option>
                    <option value="equipe_3">Equipe 3</option>
                    <option value="equipe_4">Equipe 4</option>
                  </select>
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
          </div>
        </section>

      </div>
    </main>
  </body>
</html>
