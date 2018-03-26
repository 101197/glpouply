<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
  <?php include 'php/navbar.php';

  if(isset($_POST['formconnexion'])) {
    $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
    $mdpconnect = sha1($_POST['mdpconnect']);
    if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT client.IDClient, client.Pseudo, client.Email FROM client WHERE Pseudo = ? AND MotDePasse = ?");
      $requser->execute(array($pseudoconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['IDClient'];
        $_SESSION['pseudo'] = $userinfo['Pseudo'];
        $_SESSION['mail'] = $userinfo['Email'];

        echo '<script> document.location.replace("accueil.php"); </script>';
      } else {
        $erreur = "<br />Mauvais pseudo ou mauvais mot de passe !";
      }
    } else {
      $erreur = "<br />Tous les champs doivent être complétés !";
    }
  }
?>



    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form">
                <h1>Connexion GLPoulpi</h1>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Identifiant </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text"></div>
                </div>

                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Mot de passe </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password"></div>
                </div>

                <button class="btn btn-light submit-button" type="button">Se connecter</button></form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
