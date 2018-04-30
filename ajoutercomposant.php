<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un composant</title>
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

    if (isset($_SESSION['idutilisateur']) && ($unutilisateur->getActiviteUser() == 1 )) {
    //test quand le bouton submitformaddcompo éxécute le formulaire
    if(isset($_POST['submitformaddcompo'])) {
      //met les informations du formulaire dans des variables
      $nomcomposant = htmlspecialchars($_POST['nomComposant']);
      $numserie = htmlspecialchars($_POST['numSerie']);
      $adressemac = htmlspecialchars($_POST['adresseMAC']);
      $modelecomposant = htmlspecialchars($_POST['modeleComposant']);
      $fabricantcomposant = htmlspecialchars($_POST['fabricantComposant']);
      $typecomposant = htmlspecialchars($_POST['typeComposant']);
      $idsalle = intval(htmlspecialchars($_POST['idSalle']));
      //insère le nouveau composant à la bdd
      $reqcomposant = $bdd->prepare("INSERT INTO COMPOSANT(nomComposant, numSerie, adresseMAC, modeleComposant, fabricantComposant, typeComposant, idSalle) VALUES(?, ?, ?, ?, ?, ?, ?)");
      $reqcomposant->execute(array($nomcomposant, $numserie, $adressemac, $modelecomposant, $fabricantcomposant, $typecomposant, null));
    }
    ?>

    <div class="row register-form">
      <div class="col-md-8 offset-md-2">
        <form class="custom-form">
          <h1>Ajouter un  composant</h1>
          <form class="register-form" method="post">
            <fieldset>
              <div class="form-row">
                <div class="col-6 col-sm-6 col-md-6">
                  <div><input class="form-control" type="text" name="nomComposant" placeholder="Nom"></div>
                </div>

                <div class="col-6 col-sm-6 col-md-6">
                  <div><input class="form-control" type="text" name="numSerie" placeholder="Numéro de série"></div>
                </div>

                <div class="col-12 col-sm-6 col-md-12">
                  <div><input class="form-control" type="text" name="modeleComposant" placeholder="Modèle de composant"></div>
                </div>

                <div class="col-12 col-sm-6 col-md-12">
                  <div><input class="form-control" type="text" name="typeComposant" placeholder="Type de composant"></div>
                </div>

                <div class="col-12 col-sm-6 col-md-12">
                  <div><input class="form-control" type="text" name="fabricantComposant" placeholder="Fabricant du composant"></div>
                </div>

                <div class="col-12 col-sm-6 col-md-12">
                  <div><input class="form-control" type="text" name="adresseMAC" placeholder="Adresse Mac du composant"></div>
                </div>

                <!-- dropdown pour les salles -->
                <div class="input-group">
                  <select class="form-control" name="idSalle"><optgroup label="Salle"><option value="12" selected>Salle 1</option><option value="13">Salle 2</option><option value="14">Salle 3</option></optgroup></select>
                </div>

                  <div class="col-12 col-sm-12 col-md-12">
                    <button type="submit" name="submitformaddcompo" class="set_2_button color5 set_2_btn-2 icon-down">Valider</button>
                  </div>

                </div>
              </fieldset>
            </form>
          </form>
        </div>
      </div>

      <?php
      } else {
        echo 'Vous devez être connecté !';
      }
      include 'php/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
