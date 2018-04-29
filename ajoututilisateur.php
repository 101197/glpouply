<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout utilisateur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,300italic,700italic">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/TR-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">

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

      <div class="row register-form">
        <div class="col-md-8 offset-md-2">
          <form class="custom-form">
            <h1>Ajouter un  utilisateur</h1>
            <form class="register-form" method="post">
              <fieldset>
                <div class="form-row">
                  <div class="col-6 col-sm-6 col-md-6">
                    <div><input class="form-control" type="text" name="nomUser" value="" placeholder="Nom"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div><input class="form-control" type="text" name="prenomUser" value="" placeholder="Prénom"></div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div><input class="form-control" type="text" name="mailUser" value="" placeholder="Mail"></div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div><input class="form-control" type="text" name="mdpUser" value="" placeholder="Mot de passe"></div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div><input class="form-control" type="text" name="adresseUser" value="" placeholder="Adresse"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div><input class="form-control" type="text" name="telUser" value="" placeholder="N° de téléphone"></div>
                  </div>


                  <div class="col-6 col-sm-6 col-md-6">
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="activiteUser[]" value="cocher">
                        <label class="form-check-label checboxtext">Admin</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-12">
                    <button type="submit" name="submitformadduser" class="set_2_button color5 set_2_btn-2 icon-down">Valider</button>
                  </div>

                  </div>
                </fieldset>
              </form>
            </form>
          </div>
        </div>
        <?php

      }else {
          echo "Vous devez être admin pour accéder à cette page !";
      }
      ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
