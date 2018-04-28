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



try {
  $bdd = new PDO('mysql:host=ppe2.ddns.net;dbname=glpoulpi', 'glpoulpi', 'glpoulpi');//crée une connexion a la bdd
} catch (Exception $e) {
  die('Erreur :'.$e->getMessage());
}

  $erreur = "";
  if(isset($_POST['formconnexion'])) {
    $pseudoconnect = htmlspecialchars($_POST['nomUser']);
    //Hachage du mot de passe
    $salt = 'SuperSalt';
    $pass_hache = sha1($pseudoconnect . hash('sha256', $salt) . $_POST['mdpUser']);
    if(!empty($pseudoconnect) AND !empty($_POST['mdpUser'])) {
      $requser = $bdd->prepare("SELECT * FROM UTILISATEUR WHERE nomUser = ? AND mdpUser = ?");
      $requser->execute(array($pseudoconnect, $pass_hache));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
        $userinfo = $requser->fetch();
        //mets l'id de l'utilisateur dans la session
        $_SESSION['idutilisateur'] = $userinfo['idUser'];

        header('Location: accueil.php');
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
    <form class="custom-form" method="post">
      <h1>Connexion GLPoulpi</h1>
      <div class="form-row form-group">
        <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Identifiant </label></div>
        <div class="col-sm-6 input-column"><input class="form-control" name="nomUser" type="text"></div>
      </div>

      <div class="form-row form-group">
        <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Mot de passe </label></div>
        <div class="col-sm-6 input-column"><input class="form-control" name="mdpUser" type="password"></div>
      </div>

      <button class="btn btn-light submit-button" type="submit" name="formconnexion">Se connecter</button>
    </form>
  </div>
</div>
  <div class="">
    <?php echo $erreur; ?>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
