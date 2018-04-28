<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout utilisateur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <body>
    <?php include 'php/navbar.php';

    //Vérification du droit d'accès
    if (isset($_SESSION['idutilisateur']) && ($unutilisateur->getActiviteUser() == 1 )) {

      //test quand le bouton submitformaddcompo éxécute le formulaire
      if(isset($_POST['submitformadduser'])) {

          //met les informations du formulaire dans des variables
          $nomuser = htmlspecialchars($_POST['nomUser']);
          $requser = $bdd->prepare("SELECT nomUser FROM UTILSATEUR WHERE nomUser = ?");
          $requser->execute(array($nomuser));
          $nomexist = $requser->rowcount();
          if($nomexist == 0) {
            if (isset($_POST['activiteUser'])) {
              $activiteuser = 1;
            } else {
              $activiteuser = 0;
            }
            $prenomuser = htmlspecialchars($_POST['prenomUser']);
            $mailuser = htmlspecialchars($_POST['mailUser']);
            $teluser = intval($_POST['telUser']);
            $adresseuser = htmlspecialchars($_POST['adresseUser']);
            $mdpuser = htmlspecialchars($_POST['mdpUser']);
            $mdpuser2 = htmlspecialchars($_POST['mdpUser2']);
            if ($mdpuser = $mdpuser2) {
              $salt = 'SuperSalt';
              $pass_hache = sha1($nomuser . hash('sha256', $salt) . $_POST['mdpUser']);
              //insère le nouveau ticket à la bdd
              $requser = $bdd->prepare("INSERT INTO UTILISATEUR(nomUser, activiteUser, prenomUser, mailUser, telUser, adresseUser, mdpUser) VALUES(?, ?, ?, ?, ?, ?, ?)");
              $requser->execute(array($nomuser, $activiteuser, $prenomuser, $mailuser, $teluser, $adresseuser, $pass_hache));
            } else {
              echo "Vous devez mettre le même mot de passe";
            }
          } else {
            echo "L'utilisateur portant ce nom existe déjà";
          }
        }
        ?>

        <h1>Cette page est une page technique qui sera supprimée quand le code sera copié/collé dans la vraie page</h1>

        <form method="post">
          <input type="text" name="nomUser" value="" placeholder="Nom de l'utilisateur">
          <input type="text" name="prenomUser" value="" placeholder="Prénom de l'utilisateur">
          <input type="text" name="mailUser" value=""placeholder="Adresse mail">
          <input type="text" name="telUser" value="" placeholder="Numéro de téléphone">
          <input type="text" name="adresseUser" value="" placeholder="Adresse">
          <label>Admin</label><input type="checkbox" name="activiteUser[]" value="cocher">
          <input type="text" name="mdpUser" value="" placeholder="Mot de passe">
          <input type="text" name="mdpUser2" value="" placeholder="Confirmation mot de passe">
          <input type="submit" name="submitformadduser" value="submit">
        </form>
        <?php
      }else {
          echo "Vous devez être admin pour accéder à cette page !";
      }
      ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
