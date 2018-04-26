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
      if (isset($_GET['idComposant'])) {

        //teste s'il y a un id set
        if (!empty($_GET['idComposant'])) {

          //si le bouton "Valider" est clické
          if (isset($_POST['formmodifiercomposant'])) {

            //variables
            $idcomposant = $_GET['idComposant'];
            $nomcomposant = htmlspecialchars($_POST['nomComposant']);
            $numserie = htmlspecialchars($_POST['numSerie']);
            $adressemac = htmlspecialchars($_POST['adresseMac']);
            $modelecomposant = htmlspecialchars($_POST['modeleComposant']);
            $fabricantcomposant = htmlspecialchars($_POST['fabricantComposant']);
            $typecomposant = htmlspecialchars($_POST['typeComposant']);
            $idsalle = intval(htmlspecialchars($_POST['idSalle']));
            }

            //teste si les champs ne sont pas vides
            if (!empty($_POST['nomComposant']) && !empty($_POST['numSerie']) && !empty($_POST['fabricantComposant']) && !empty($_POST['typeComposant'])) {

              //charge les informations actuelles du composant

              //sql SELECT * FROM composant where
              $reqcomposant = $bdd->prepare("SELECT * FROM composant WHERE idComposant = ?");
              $reqpcomposant->execute(array($_GET['idComposant']));
              $dbrep = $reqcomposant->fetch();

              //le résultat remplit les variables
              $nomcomposant = $dbrep["nomComposant"];
              $numserie = $dbrep["numSerie"];
              $adressemac = $dbrep["adresseMac"];
              $modelecomposant = $dbrep["modeleComposant"];
              $fabricantcomposant = $dbrep["fabricantComposant"];
              $typecomposant = $dbrep["typeComposant"];
              $idsalle = $dbrep["idSalle"];
          }
            ?>
            <div>
              <button type="submit" name="formmodifierproduit" class="btn btn-success btn-lg float-right" id="btndone">Modifier</button>
            </div>

            <?php
        } else {
            ?>
            <div class="container mt-3 text-center">
              <font color="red">Erreur : aucun composant selectionné</font>
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
          };
    } else {
      ?>
      <div class="container mt-3 text-center">
        <font color="red">Vous n'avez pas les droits pour accéder à cette page</font>
      </div>
      <?php
    }
    ?>


    <?php include 'php/footer.php'; ?>
  </body>
</html>
