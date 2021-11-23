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
            <a class="nav-link" href="#equipe">Equipe</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Connexion</button>
        </ul>
      </nav>
    </header>

    <main>
      <div class="main_centered">
        <section class="flex">
          <div class="img-placing">
            <img src="assets/img/badminton_historique.jpg" alt="Joueur de badminton avec volant." id="historique">
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

        <section class="flex">
          <div class="events">
            <h1 id="actualite">Nos prochains événements</h1>
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

        <section id="equipe" class="flex">
          <h1>Nos équipes</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
          <hr>
        </section>

        <section id="contact" class="flex">
          <h1>Nous contacter</h1>
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
    // Je commente le code demain !!
    // On charge le fichier permettant de se connecter à la bdd
    include 'templates/connexion.php';

    $requete = $bdd->query('SELECT * FROM president WHERE id = 1');

    while ($data = $requete->fetch()) {
      if (!$data) {
        echo 'La BDD n\'existe pas ou est vide.';
        break;
      }
      else {
        $identifiant_pres = $data["identifiant_pres"];
        $mdp_pres = $data["mdp_pres"];
      }
    }

    // ...
    if (!empty($_POST) && array_key_exists('identifiant', $_POST) && array_key_exists('password', $_POST) && is_string($_POST['identifiant']) && is_string($_POST['password'])) {
      if ($_POST['identifiant'] === $identifiant_pres && $_POST['password'] === $mdp_pres) {
        $identifiant = htmlspecialchars($_POST["identifiant"]);
        $password = htmlspecialchars($_POST["password"]);

        $_SESSION['log'] = [
          "identifiant" => $identifiant,
          "password" => $password
        ];
        echo "<script type='text/javascript'>window.location.replace('templates/espace_utilisateur.php');</script>";
      }
    }
    var_dump($_SESSION);
    var_dump($_POST);
    ?>
  </body>
</html>
