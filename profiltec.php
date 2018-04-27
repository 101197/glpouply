<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <body>
    <?php include 'php/navbar.php';

    //teste si la propriétée id est présente
    if (isset($_GET['idUser'])) {

      //teste s'il y a un id set
      if (!empty($_GET['idUser'])) {

        $iduser = $_GET['idUser'];

        //si le bouton "Valider" est clické
        if (isset($_POST['formmodifierprofil'])) {

          //variables
          $nomuser = htmlspecialchars($_POST['nomUser']);
          $prenomuser = htmlspecialchars($_POST['prenomUser']);
          $mailuser = htmlspecialchars($_POST['mailUser']);
          $teluser = intval(htmlspecialchars($_POST['telUser']));
          $adresseuser = htmlspecialchars($_POST['adresseUser']);
          $mdpuser = htmlspecialchars($_POST['mdpUser']);

          //le PDO
          $reqprofil = $bdd->prepare("UPDATE `UTILISATEUR` SET `nomUser` = ?, `prenomUser` = ?, `mailUser` = ?, `telUser` = ?, `adresseUser` = ?, `mdpUser` = ? WHERE idUser = ?");
          $reqprofil->execute(array($nomuser, $prenomuser, $mailuser, $teluser, $adresseuser, $mdpuser, $iduser));
          header("Location: accueil.php");

        } else {
          echo "Les champs doivent être complétés !";
        }
        //charge les information actuelles de l'utilisateur

        //sql SELECT * FROM utilisateur where
        $reqprofil = $bdd->prepare("SELECT * FROM UTILISATEUR WHERE idUser = ?");
        $reqprofil->execute(array($_GET['idUser']));
        $dbrep = $reqprofil->fetch();

        //le résultat remplit les variables
        $nomuser = $dbrep['nomUser'];
        $prenomuser = $dbrep['prenomUser'];
        $mailuser = $dbrep['mailUser'];
        $teluser = $dbrep['telUser'];
        $adresseuser = $dbrep['adresseUser'];
        $mdpuser = $dbrep['mdpUser'];

        ?>
        <form method="post">
          <input type="text" name="nomUser" value="<?php echo $dbrep["nomUser"]; ?>">
          <input type="text" name="prenomUser" value="<?php echo $dbrep["prenomUser"]; ?>">
          <input type="text" name="mailUser" value="<?php echo $dbrep["mailUser"]; ?>">
          <input type="text" name="telUser" value="<?php echo $dbrep["telUser"]; ?>">
          <input type="text" name="adresseUser" value="<?php echo $dbrep["adresseUser"]; ?>">
          <input type="text" name="mdpUser" value="<?php echo $dbrep["mdpUser"]; ?>">
          <div>
            <button type="submit" name="formmodifierprofil" class="btn btn-success btn-lg float-right">Modifier</button>
          </div>
        </form>
        <?php
      } else {
        ?>
        <div class="container mt-3 text-center">
          <font color="red">Erreur : aucun utilisateur selectionné</font>
          <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('composant.php')">Retour</button>
        </div>
        <?php
      }
    } else {
      ?>
      <div class="container mt-3 text-center">
        <font color="red">Erreur : propriétée id introuvable</font>
        <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('composant.php')">Retour</button>
      </div>
      <?php
    }
    include 'php/footer.php';?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
  </body>
</html>
