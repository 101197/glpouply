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

          $idcomposant = $_GET['idComposant'];

          //si le bouton "Valider" est clické
          if (isset($_POST['formmodifiercomposant'])) {
            //teste si les champs ne sont pas vides
            if (!empty($_POST['nomComposant']) && !empty($_POST['numSerie']) && !empty($_POST['fabricantComposant']) && !empty($_POST['typeComposant'])) {

              //variables
              $nomcomposant = htmlspecialchars($_POST['nomComposant']);
              $numserie = htmlspecialchars($_POST['numSerie']);
              $adressemac = htmlspecialchars($_POST['adresseMac']);
              $modelecomposant = htmlspecialchars($_POST['modeleComposant']);
              $fabricantcomposant = htmlspecialchars($_POST['fabricantComposant']);
              $typecomposant = htmlspecialchars($_POST['typeComposant']);
              $idsalle = intval(htmlspecialchars($_POST['idSalle']));

              //le PDO
              $reqcomposant = $bdd->prepare("UPDATE `COMPOSANT` SET `nomComposant` = ?, `numSerie` = ?, `adresseMac` = ?, `modeleComposant` = ?, `fabricantComposant` = ?, `typeComposant` = ? WHERE `idComposant` = ?");
              $reqcomposant->execute(array($nomcomposant, $numserie, $adressemac, $modelecomposant, $fabricantcomposant, $typecomposant, $idcomposant));
              header("Location: composant.php");
            }
            else {
              echo "Les champs nom, numéro de série, fabricant et type doivent être complétés !";
            }
          }

        //charge les informations actuelles du composant

        //sql SELECT * FROM composant where
        $reqcomposant = $bdd->prepare("SELECT * FROM COMPOSANT WHERE idComposant = ?");
        $reqcomposant->execute(array($_GET['idComposant']));
        $dbrep = $reqcomposant->fetch();

        //le résultat remplit les variables
        $nomcomposant = $dbrep["nomComposant"];
        $numserie = $dbrep["numSerie"];
        $adressemac = $dbrep["adresseMac"];
        $modelecomposant = $dbrep["modeleComposant"];
        $fabricantcomposant = $dbrep["fabricantComposant"];
        $typecomposant = $dbrep["typeComposant"];
        $idsalle = $dbrep["idSalle"];
        ?>

        <form method="post">
          <input type="text" name="nomComposant" value="<?php echo $dbrep["nomComposant"]; ?>">
          <input type="text" name="numSerie" value="<?php echo $dbrep["numSerie"]; ?>">
          <input type="text" name="adresseMac" value="<?php echo $dbrep["adresseMac"]; ?>">
          <input type="text" name="modeleComposant" value="<?php echo $dbrep["modeleComposant"]; ?>">
          <input type="text" name="fabricantComposant" value="<?php echo $dbrep["fabricantComposant"]; ?>">
          <input type="text" name="typeComposant" value="<?php echo $dbrep["typeComposant"]; ?>">
          <input type="text" name="idSalle" value="<?php echo $dbrep["idSalle"]; ?>">
          <div>
            <button type="submit" name="formmodifiercomposant" class="btn btn-success btn-lg float-right">Modifier</button>
          </div>
        </form>


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
