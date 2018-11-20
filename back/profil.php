<?php
require_once 'inc/init.inc.php';

// 1 - redirection si l'internaute n'est pas connecté :
if (!internauteEstConnecte()) {  // si le membre n'est pas connecté, il ne doit pas avoir accès à la page profil
    header('location:connexion.php');  // nous l'invitons à se connecter
    exit();
}

// 2 - préparation du profil à afficher :
// debug($_SESSION);
extract($_SESSION['t_users']);  // extrait tous les indices de l'array sous forme de variables auxquelles on affecte la valeur dans l'array. Exemple : $_SESSION['t_users']['username'] devient $pseuso = $_SESSION['t_users']['username'];

//---------------------- AFFICHAGE --------------------------
require_once 'inc/haut.inc.php';
?>
    <h2 class="mt-3 mb-4 text-center text-dark marge"><strong class="mt-1"><?php echo $comments . ' : ' .  $firstname; ?></strong></h2>
      
    <div class="card mx-auto" style="width: 20rem;">

        <img class="card-img-top rounded-circle" src="img/photoProfil.jpg" alt="Andree">

    <div class="card-body">
      <h5 class="card-title text-dark"><?php echo $firstname . ' ' . $lastname; ?></h5>
      <i class="fas fa-map-marker-alt text-info"></i> <address class="card-text text-dark"><?php echo $address; ?><br>
    <?php echo $zip .' '. $city; ?> <br>
    <?php echo $country; ?><br>
    </address>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item text-dark"><i class="fas fa-phone text-info"></i> <?php echo $phone; ?></li>
    <li class="list-group-item"><i class="fas fa-at text-info"></i> <a href="https://www.google.com/intl/fr/gmail/about/" class="text-dark">a.baptiste.m@gmail.com</a></li>
  </ul>
</div>

<?php
require_once 'inc/bas.inc.php';