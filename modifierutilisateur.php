<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier composant</title>
  </head>
  <body>

    <?php include 'php/navbar.php';

    //Vérification du droit d'accès
        if (isset($_SESSION['idutilisateur']) && ($unutilisateur->getActiviteUser() == 1 )) {

          //teste si la propriétée id est présente
          if (isset($_GET['idUser'])) {

            //teste s'il y a un id set
            if (!empty($_GET['idUser'])) {

              $iduser = $_GET['idUser'];

              //si le bouton "Valider" est clické
              if (isset($_POST['formmodifieruser'])) {
                //teste si les champs ne sont pas vides
                if (!empty($_POST['nomUser']) && !empty($_POST['activiteUser']) && !empty($_POST['mdpUser'])) {

                  //variables
                  $nomuser = htmlspecialchars($_POST['nomUser']);
                  $prenomuser = htmlspecialchars($_POST['prenomUser']);
                  $mailuser = htmlspecialchars($_POST['mailUser']);
                  $teluser = intval(htmlspecialchars($_POST['telUser']));
                  $adresseuser = htmlspecialchars($_POST['adresseUser']);
                  $mdpuser = htmlspecialchars($_POST['mdpUser']);

                  if (isset($_POST['activiteUser'])) {
                    $activiteuser = 1;
                  } else {
                    $activiteuser = 0;
                  }

                  //le PDO
                  $requser = $bdd->prepare("UPDATE `UTILISATEUR` SET `nomUser` = ?, `prenomUser` = ?, `mailUser` = ?, `telUser` = ?, `adresseUser` = ?, `mdpUser` = ? WHERE idUser = ?");
                  $requser->execute(array($nomuser, $prenomuser, $mailuser, $teluser, $adresseuser, $mdpuser, $iduser));
                  header("Location: utilisateur.php");
                }
                else {
                  echo "Les champs nom, activité et mot de passe doivent être complétés !";
                }
              }

              //charge les information actuelles de l'utilisateur

              //sql SELECT * FROM utilisateur where
              $requser = $bdd->prepare("SELECT * FROM UTILISATEUR WHERE idUser = ?");
              $requser->execute(array($_GET['idUser']));
              $dbrep = $requser->fetch();

              //le résultat remplit les variables
              $nomuser = $dbrep['nomUser'];
              $prenomuser = $dbrep['prenomUser'];
              $mailuser = $dbrep['mailUser'];
              $teluser = $dbrep['telUser'];
              $activiteuser = $dbrep['activiteUser'];
              $adresseuser = $dbrep['adresseUser'];
              $mdpuser = $dbrep['mdpUser'];
              ?>

              <form method="post">
                <input type="text" name="nomUser" value="<?php echo $dbrep["nomUser"]; ?>">
                <input type="text" name="prenomUser" value="<?php echo $dbrep["prenomUser"]; ?>">
                <input type="text" name="mailUser" value="<?php echo $dbrep["mailUser"]; ?>">
                <input type="text" name="telUser" value="<?php echo $dbrep["telUser"]; ?>">
                <input type="text" name="activiteUser" value="<?php echo $dbrep["activiteUser"]; ?>">
                <input type="text" name="adresseUser" value="<?php echo $dbrep["adresseUser"]; ?>">
                <input type="text" name="mdpUser" value="<?php echo $dbrep["mdpUser"]; ?>">
                <div>
                  <button type="submit" name="formmodifieruser" class="btn btn-success btn-lg float-right">Modifier</button>
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
  } else {
    ?>
    <div class="container mt-3 text-center">
      <font color="red">Vous n'avez pas les droits pour accéder à cette page</font>
    </div>
    <?php
  }

     include 'php/footer.php'; ?>
    </body>
  </html>
