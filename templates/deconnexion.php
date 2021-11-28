<?php
  session_start();

  //Détruit les variables de la session
  session_unset();

  //Détruit les données associées à la session courante, hormis les variables globales et les cookies
  session_destroy();

  //écrit les données de session et ferme la session
  session_write_close();
  
  //Redirection vers l'accueil
  header("location:../index.php");
?>
