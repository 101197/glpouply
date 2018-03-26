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
  <?php include 'php/navbar.php'; ?>


<?php
  //Vérification du droit d'accès
  if (isset($_SESSION['id']) && $_SESSION['pseudo'] == 'Admin') {

?>

    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form">
                <h1>Ajouter un  utilisateur à GLPoulpi</h1>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Identifiant </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                </div>

                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Mot de passe </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Confirmation mot de passe </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                </div>

                <button class="btn btn-light submit-button" type="button">Ajouter</button></form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
