<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un composant</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,300italic,700italic">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/TR-Form.css">
  </head>
  <body>
    <?php include 'php/navbar.php'; ?>

    <h1 class="text-center">Ajout d'un composant</h1>
    <form class="register-form" style="margin:10px;padding:70px;">
        <fieldset>
            <div class="form-row">
                <div class="col-6 col-sm-6 col-md-6">
                    <div id="lp-name-wrapper"><input class="form-control" type="text" placeholder="Nom" id="lp-name"></div>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                    <div id="lp-lastname-wrapper"><input class="form-control" type="text" placeholder="Numéro de série" id="lp-lastname"></div>
                </div>
                <div class="col-12 col-sm-6 col-md-12">
                    <div id="lp-mail-wrapper"><input class="form-control" type="text" placeholder="Modèle de composant" id="lp-mail"></div>
                </div>

                <div class="col-12 col-sm-6 col-md-12">
                    <div id="customfield1-wrapper"><input class="form-control" type="text" placeholder="Type de composant" id="customfield1"></div>
                </div>
                <div class="col-12 col-sm-6 col-md-12">
                    <div id="lp-title-wrapper"><input class="form-control" type="text" placeholder="Fabricant du composant" id="lp-title"></div>
                </div>
                <div class="col-12 col-sm-6 col-md-12">
                    <div id="lp-title-wrapper"><input class="form-control" type="text" placeholder="Adresse Mac du composant" id="lp-title"></div>
                </div>

                <!-- dropdown pour les salles -->
                <div id="lp-select1-wrapper" class="input-group">
                <select class="form-control" id="lp-select1"><optgroup label="Salle"><option value="12" selected>Salle 1</option><option value="13">Salle 2</option><option value="14">Salle 3</option></optgroup></select>
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
    <?php include 'php/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
