<?php
session_start();

  ini_set("display_errors", "Off");
  ini_set("log_errors", "On");
  ini_set("error_log", dirname(__file__)."/logs/log_error_php.txt");

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js" type="text/javascript"></script>
    <title>Association sportive</title>
  </head>

  <body>

    <header class = "header">
      <nav class = "nav">
        <ul class="nav nav-pills nav-fill">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#historique">Historique</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#actualite">Actualité</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#equipe-titre">Equipe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-titre">Contact</a>
          </li>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Connexion</button>
        </ul>
      </nav>
    </header>

    <main id="main-index">
      <div class="main_centered">
        <section class="flex">
          <div class="img-placing">
            <img src="assets/img/badminton_historique.jpg" alt="Joueur de badminton avec volant." id="historique" class="nav-fix-40">
          </div>
          <div class="text">
            <div class="text-centering">
              <h1>Notre histoire</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.
              </p>
            </div>
          </div>
        </section>

        <section class="flex section-event">
          <div class="events">
            <h1 id="actualite" class="nav-fix-40">Nos prochains événements</h1>
            <div class="event">
              <h2 class="event_title">Lorem ipsum dolor sit amet</h2>
              <p class="event_location">Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia</p>
              <p class="event_hour">15h00</p>
              <p class="event_city">Id est laborum</p>
            </div>
            <div class="event">
              <h2 class="event_title">Lorem ipsum dolor sit amet</h2>
              <p class="event_location">Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia</p>
              <p class="event_hour">15h00</p>
              <p class="event_city">Id est laborum</p>
            </div>
            <div class="event">
              <h2 class="event_title">Lorem ipsum dolor sit amet</h2>
              <p class="event_location">Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia</p>
              <p class="event_hour">15h00</p>
              <p class="event_city">Id est laborum</p>
            </div>
          </div>
          <div class="news">
            <h1>Nos actualités</h1>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.
            </p>
          </div>
        </section>

        <section class="nos-equipes">
          <div class="position-equipe">
            <h1 id="equipe-titre" class="nav-fix-40">Nos équipes</h1>
            <div class="equipes">

              <?php
              // On charge le fichier block_equipe.php qui défini les informations d'affichage des équipes
              include 'templates/block_equipe.php';


              for ($i=0; $i < $nbr_equipe; $i++) { 
                echo 
                '
                <div class="equipe">
                  <h3 class="titre-equipe">'.$tab_nom_entraineur_et_equipe[$i]["nom_equipe"].'<span class="info-bulle">Équipe</span></h3>
                  <h4 class="nom-entraineur">'.$tab_nom_entraineur_et_equipe[$i]["nom_entraineur"].'<span class="info-bulle">Entraîneur</span></h4>
                  <div class="joueurs">
                    <div class="joueur-1">
                        <p>'.nom_joueur($tab_nom_entraineur_et_equipe, $i, 0).'</p>
                    </div>
                    <div class="joueur-2">
                      <p>'.nom_joueur($tab_nom_entraineur_et_equipe, $i, 1).'<span class="info-bulle">Joueurs</span></p>
                    </div>
                  </div>
                </div>
                ';
              }

              ?>
              
            </div>
          </div>
          <button id="bouton-plus-equipe" type="button">Voir plus</button>
        </section>

        <section class="flex contact">
          <h1 id="contact-titre" class="nav-fix-40">Nous contacter</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
          <hr>
        </section>
      </div>
    </main>

    <div id="connection">
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="POST" action="index.php" class="formulaire">
                  <div>
                      <label>Identifiant : </label>
                      <input type="text" name="identifiant" id="connexion-identifiant" required>
                  </div>
                  <br>
                  <div>
                      <label>Mot de passe : </label>
                      <input type="password" name="password" id="connexion-password" required>
                  </div>
                  <div id="boutons-connexion">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Valider</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="connexion-annuler">Annuler</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <?php

    // GESTION DE LA CONNEXION A L'ESPACE UTILISATEUR

    // On charge le fichier permettant de se connecter à la bdd
    include 'templates/connexion.php';

    // une requête par table d'utilisateurs dans la BDD (on récupère chaque table en entier)
    $requete_pres = $bdd->query('SELECT * FROM president');
    $requete_ent = $bdd->query('SELECT * FROM entraineur');
    $requete_joueur = $bdd->query('SELECT * FROM joueur');

    // on parcourt la table president
    while ($data = $requete_pres->fetch()) {
      // si pas de données dans la table...
      if (!$data) {
        // message d'erreur
        echo 'La liste des présidents n\'existe pas ou est vide.';
        break;
      }
      else {
        // dans les tableaux $identifiants et $mdps ajoute la variable $data des clés "identifiant_pres" et "mdp_pres" 
        $identifiants["president"][] = $data["identifiant_pres"];
        $mdps["president"][] = $data["mdp_pres"];
      }
    }

    // même histoire avec les entraîneurs et joueurs...

    while ($data = $requete_ent->fetch()) {
      if (!$data) {
        echo 'La liste des entraîneurs n\'existe pas ou est vide.';
        break;
      }
      else {
        $identifiants["entraineur"][] = $data["identifiant_ent"];
        $mdps["entraineur"][] = $data["mdp_ent"];
      }
    }

    while ($data = $requete_joueur->fetch()) {
      if (!$data) {
        echo 'La liste des joueurs n\'existe pas ou est vide.';
        break;
      }
      else {
        $identifiants["joueur"][] = $data["identifiant_joueur"];
        $mdps["joueur"][] = $data["mdp_joueur"];
      }
    }

    // variables permettant de récupérer l'identifiant et le mdp saisis par l'utilisateur
    $identifiant_utilisateur = null;
    $password_utilisateur = null;


    // boucle pour parcourir le tableau $identifiants 
    foreach ($identifiants as $key => $value) {
      foreach ($value as $key1 => $value1) {
        
        // test sir la valeur du POST de clé "identifiant" correspond à $value1 du tableau $identifiants
        if ($_POST['identifiant'] === $value1) {
          // ajoute les deux clés dans des variables
          $cle_nom = $key1;
          $cle_type_nom = $key;
        }
      }
    }

    // boucle pour parcourir le tableau $mdps 
    foreach ($mdps as $key => $value) {
      foreach ($value as $key1 => $value1) {

        // test sir la valeur du POST de clé "password" correspond à $value1 du tableau $mdps
        if ($_POST['password'] === $value1) {
          // ajoute les deux clés dans des variables
          $cle_password = $key1;
          $cle_type_password = $key;
        }
      }
    }

    // si on n'a pas encore récupéré la saisie de l'utilisateur, et que sa saisie est bien existante et sous forme de chaine...
    if (($identifiant_utilisateur === null || $password_utilisateur === null) && !empty($_POST) && array_key_exists('identifiant', $_POST) && array_key_exists('password', $_POST) && is_string($_POST['identifiant']) && is_string($_POST['password'])) {
      // test des clés des deux tableaux $identifiants et $mdps
      if ($cle_nom === $cle_password && $cle_type_nom === $cle_type_password) {
        // on récupère la saisie
        $identifiant_utilisateur = htmlspecialchars($_POST["identifiant"]);
        $password_utilisateur = htmlspecialchars($_POST["password"]);
  
        // on déclare 3 variables de session
        $_SESSION['log'] = [
          "identifiant" => $identifiant_utilisateur,
          "password" => $password_utilisateur,
          "type_utilisateur" => $cle_type_nom,
        ];

        // on redirige l'utilisateur vers l'espace utilisateur
        echo "<script type='text/javascript'>window.location.replace('templates/espace_utilisateur.php');</script>";
        
      }
    }

    // TODO
    // 
    // si l'utilisateur est déjà connecté, il faudrait remplacer le bouton "connexion" par "espace utilisateur" sur la page d'accueil
    // (en l'état, il est possible de se reconnecter alors qu'on l'est déjà...)
    // 
    // il faudrait envoyer vers la page "espace_utilisateur" une information concernant le type d'utilisateur connecté :
    // president, entraineur, joueur
    // pour pouvoir personnaliser l'affichage de l'espace utilisateur
    // peut-être en variable de session ?
    // quoiqu'il y a déjà l'identifiant et le mot de passe en variable de session, peut-être que ça peut être exploité en ce sens ?
    // 
    // afficher des erreurs en cas de saisie incorrecte du formulaire de connexion (dans la fenêtre modale)

    ?>
  </body>
</html>
