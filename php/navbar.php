<!DOCTYPE html>
<html>

<?php
include 'include.php';

if (isset($_SESSION['utilisateur'])){ //teste si l'utilisateur existe
  $user = new utilisateur;
  $user = $_SESSION['utilisateur'];
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php
if (isset($_SESSION['utilisateur'])){ //teste si l'utilisateur existe
  ?>
  <div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
      <div class="container"><a class="navbar-brand" href="accueil.php">GLPoulpi</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav mr-auto">
            <li class="dropdown">
              <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="parc.php">Parc </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" role="presentation" href="parc.php">Parc</a>
                <?php
                //echo $user->getUser();
                //if ($user->getActiviteUser() == 1 ){
                  //echo '<a class="dropdown-item" role="presentation" href="ajoutercomposant.php">Ajouter composant</a>';
                //}
                ?>
              </div>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Assistance </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" role="presentation" href="tickets.php">Tickets</a>
                <a class="dropdown-item" role="presentation" href="notes.php">Notes</a>
              </div>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Administration </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" role="presentation" href="utilisateur.php">Utilisateur</a>
                <a class="dropdown-item" role="presentation" href="role.php">Rôle</a>
              </div>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Mon compte </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" role="presentation" href="profil.php">Profil</a>
                <a class="dropdown-item" role="presentation" href="deconnexion.php">Deconnexion</a>
              </div>
            </li>
          </ul>
          <span class="navbar-text actions">
            <a class="btn btn-light action-button" role="button" href="#">Préférences</a>
              <a class="btn btn-light action-button" role="button" href="php/deconnexion.php">Deconnexion</a>
          </span>
        </div>
      </div>
    </nav>
  </div>
  <?php
}
?>

</html>
