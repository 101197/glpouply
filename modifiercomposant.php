<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier un composant</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,300italic,700italic">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/TR-Form.css">
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

<!-- tableau qui marche

        <form method="post">
          <input type="text" name="nomComposant" value="<?php echo $dbrep["nomComposant"]; ?>">
          <input type="text" name="numSerie" value="<?php echo $dbrep["numSerie"]; ?>">
          <input type="text" name="adresseMac" value="<?php echo $dbrep["adresseMac"]; ?>">
          <input type="text" name="modeleComposant" value="<?php echo $dbrep["modeleComposant"]; ?>">
          <input type="text" name="fabricantComposant" value="<?php echo $dbrep["fabricantComposant"]; ?>">
          <input type="text" name="typeComposant" value="<?php echo $dbrep["typeComposant"]; ?>">
          <input type="text" name="idSalle" value="<?php echo $dbrep["idSalle"]; ?>">
          <div>
            <button type="submit" name="formmodifiercomposant">Modifier</button>
          </div>
        </form>
-->

        <div class="row register-form">
          <div class="col-md-8 offset-md-2">
            <form class="custom-form">
              <h1>Modifier un  composant</h1>
              <form class="register-form" method="post">
                <fieldset>
                  <div class="form-row">

                    <div class="col-6 col-sm-6 col-md-6">
                      <div><label>Nom</label><input class="form-control" type="text" name="nomComposant" value="<?php echo $dbrep["nomComposant"]; ?>"></div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6">
                      <div><label>N° de série</label><input class="form-control" type="text" name="numSerie" value="<?php echo $dbrep["numSerie"]; ?>"></div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6">
                      <div><label>Adresse Mac</label><input class="form-control" type="text" name="adresseMac" value="<?php echo $dbrep["adresseMac"]; ?>"></div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6">
                      <div><label>Modèle</label><input class="form-control" type="text" name="modeleComposant" value="<?php echo $dbrep["modeleComposant"]; ?>"></div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6">
                      <div><label>Fabricant</label><input class="form-control" type="text" name="fabricantComposant" value="<?php echo $dbrep["fabricantComposant"]; ?>"></div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6">
                      <div><label>Type</label><input class="form-control" type="text" name="typeComposant" value="<?php echo $dbrep["typeComposant"]; ?>"></div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-12">
                      <div><label>Salle</label>
                        <div class="input-group">
                          <select class="form-control" name="idSalle">
                            <?php
                            $reqcomposant = $bdd->prepare("SELECT * FROM SALLE");
                            $reqcomposant->execute();
                            $dbrep = $reqcomposant->fetchAll();
                            foreach ($dbrep as $row) {
                              echo '<option value="'.$row['idSalle'].'">'.$row['libelleSalle'].'</option>';
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12">
                      <button type="submit" name="formmodifiercomposant" class="set_2_button color5 set_2_btn-2 icon-down">Modifier</button>
                    </div>

                </fieldset>
            </form>
          </form>
        </div>
      </div>
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
