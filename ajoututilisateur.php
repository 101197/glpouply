<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout utilisateur</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/TR-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">

  </head>
  <body>
    <?php include 'php/navbar.php';

    //Vérification du droit d'accès
    if (isset($_SESSION['idutilisateur']) && ($unutilisateur->getActiviteUser() == 1 )) {

      ?>
      <div class="row register-form">
        <div class="col-md-8 offset-md-2">
          <form class="custom-form">
            <h1>Ajouter un  utilisateur</h1>
            <form class="register-form">
              <fieldset>
                <div class="form-row">
                  <div class="col-6 col-sm-6 col-md-6">
                    <div id="lp-name-wrapper"><input class="form-control" type="text" placeholder="Nom" id="lp-name"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div id="lp-lastname-wrapper"><input class="form-control" type="text" placeholder="Prénom" id="lp-lastname"></div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div id="lp-mail-wrapper"><input class="form-control" type="email" placeholder="Mail" id="lp-mail"></div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div id="customfield1-wrapper"><input class="form-control" type="password" placeholder="Mot de passe" id="customfield1"></div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div id="lp-title-wrapper"><input class="form-control" type="text" placeholder="Adresse" id="lp-title"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div id="lp-title-wrapper"><input class="form-control" type="telephone" placeholder="N° de téléphone" id="lp-title"></div>
                  </div>


                  <div class="col-6 col-sm-6 col-md-6">
                    <div id="lp-check1-wrapper">
                      <div class="form-check"><input class="form-check-input" type="checkbox" id="lp-check1"><label class="form-check-label checboxtext" for="lp-check1">Admin</label></div>
                    </div>
                  </div>

                  <div class="col-md-12"><input class="form-control d-none" type="text" id="lp-country"><input class="form-control d-none" type="text" id="lp-website"><input class="form-control d-none" type="text" id="lp-city"><input class="form-control d-none" type="text" id="customfield10">
                    <input class="form-control d-none" type="text" id="customfield9"><input class="form-control d-none" type="text" id="customfield8"><input class="form-control d-none" type="text" id="customfield7"><input class="form-control d-none" type="text" id="customfield6"><input class="form-control d-none" type="text"
                    id="customfield5"><input class="form-control d-none" type="text" id="customfield4"><input class="form-control d-none" type="text" id="customfield3"><input class="form-control d-none" type="text" id="customfield2"><input class="form-control d-none"
                    type="text" id="lp-select3"><input class="form-control d-none" type="text" id="lp-select2"><input class="form-control d-none" type="text" id="lp-check5"><input class="form-control d-none" type="text" id="lp-check4"><input class="form-control d-none"
                    type="text" id="lp-check3"><input class="form-control d-none" type="text" id="lp-check2"><input class="form-control d-none" type="text" id="lp-telareacode"><input class="form-control d-none" type="text" id="lp-telcountrycode"></div>
                    <div class="col-12 col-sm-12 col-md-12">
                      <div class="set_2_button color5 set_2_btn-2 icon-down"><span>Ajouter le composant</span></div>
                    </div>
                    <div class="col-md-12">
                      <div class="push-50"></div>
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
