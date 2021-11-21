<?php
session_start();
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

    <header>
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#accueil">Accueil</a>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Connection
        </button>
      </ul>
    </header>

    <main>
      <section id="accueil">
        <h1>Section 1 : accueil</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
        <hr>
      </section>

      <section id="historique">
        <h1>Section2 : historique</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
        <hr>
      </section>

      <section id="actualite">
        <h1>Section 3 : actualite</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
        <hr>
      </section>

      <section id="equipe">
        <h1>Section 4 : equipe</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
        <hr>
      </section>

      <section id="contact">
        <h1>Section 5 : contact</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec ante tincidunt mi tristique pharetra. Sed tempus ornare augue eget lacinia. Vivamus accumsan ex id velit consequat mollis. Sed interdum erat eu arcu fermentum, a lacinia nisi convallis. In suscipit tellus pretium quam aliquam, nec sodales sem accumsan. Suspendisse potenti. Donec id ornare tortor. Morbi sit amet lectus quis sem dapibus volutpat eget in quam. Nam gravida pretium ligula, vitae lacinia justo vehicula euismod. Nullam convallis erat vel quam iaculis laoreet. Praesent volutpat a lacus nec malesuada. Ut imperdiet vehicula justo eget faucibus. Integer non neque sagittis, auctor lorem a, iaculis ex.</p>
        <hr>
      </section>

      <section id="connection">
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Connection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                 <form method="POST" action="index.php" class="formulaire">
                    <div>
                        <label>Identifiant : </label>
                        <input type="text" name="identifiant" id="connection-identifiant" required>
                    </div>
                    <br>
                    <div>
                        <label>Mot de passe : </label>
                        <input type="password" name="password" id="connection-password" required>
                    </div>
                    <div id="boutons-connection">
                      <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Valider</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="connection-annuler">Annuler</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
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
