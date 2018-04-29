<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un ticket</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,400italic,300italic,700italic">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/TR-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
  </head>

  <body>
    <div class="container">
<?php include 'php/navbar.php';
    if (isset($_SESSION['idutilisateur'])) {
      //test quand le bouton submitformaddticket éxécute le formulaire
      if(isset($_POST['submitformaddticket'])) {
        //met les informations du formulaire dans des variables
        $titreticket = htmlspecialchars($_POST['titreTicket']);
        $statutticket = htmlspecialchars($_POST['statutTicket']);
        if (isset($_POST['prioriteTicket'])) {
          $prioriteticket = 1;
        } else {
          $prioriteticket = 0;
        }
        $descticket = htmlspecialchars($_POST['descTicket']);
        $idcomposant = intval(htmlspecialchars($_POST['idComposant']));
        $iduser = intval($_SESSION['idutilisateur']);

        //insère le nouveau ticket à la bdd
        $reqcomposant = $bdd->prepare("INSERT INTO TICKETS(titreTicket, statutTicket, prioriteTicket, descTicket, idComposant, idUser) VALUES(?, ?, ?, ?, ?, ?)");
        $reqcomposant->execute(array($titreticket, $statutticket, $prioriteticket, $descticket, $idcomposant, $iduser));
      }
      ?>

    <div class="row register-form">
      <div class="col-md-8 offset-md-2">
        <form class="custom-form">
          <h1>Ajouter un  ticket</h1>
            <form class="register-form" method="post">
              <fieldset>
                <div class="form-row">

                  <div class="col-6 col-sm-6 col-md-6">
                    <div><input class="form-control" type="text" name="titreTicket" value="" placeholder="Titre"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div class="input-group">
                      <select class="form-control">
                        <optgroup name="statutTicket" label="Statut">
                          <option value="12" selected="">Non traité</option>
                          <option value="13">En cours de traitement</option>
                          <option value="14">Traité</option>
                        </optgroup>
                      </select>
                    </div>
                  </div>

                  <div class="col-12 col-sm-6 col-md-12">
                    <div><input class="form-control" type="text" name="descTicket" value="" placeholder="Description"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div><input class="form-control" type="text" placeholder="Date ouverture"></div>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6">
                    <div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prioriteTicket[]" value="cocher">
                        <label class="form-check-label checboxtext">Priorité</label>
                      </div>
                    </div>
                  </div>

                  <!-- dropdown pour le composant utilisé -->
                  <div class="input-group">
                    <select class="form-control" name="idComposant">
                      <?php
                      $reqcomposant = $bdd->prepare("SELECT * FROM COMPOSANT");
                      $reqcomposant->execute();
                      $dbrep = $reqcomposant->fetchAll();
                      foreach ($dbrep as $row) {
                        echo '<option value="'.$row['idComposant'].'">'.$row['nomComposant'].'</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <!-- dropdown pour l'utilisateur -->
                  <div class="input-group">
                    <select class="form-control" name="idUser">
                      <?php
                      $reqcomposant = $bdd->prepare("SELECT * FROM UTILISATEUR");
                      $reqcomposant->execute();
                      $dbrep = $reqcomposant->fetchAll();
                      foreach ($dbrep as $row) {
                        echo '<option value="'.$row['idUser'].'">'.$row['nomUser'].'</option>';
                      }
                      ?>
                    </select>
                  </div>

                  <div class="col-12 col-sm-12 col-md-12">
                    <button type="submit" name="submitformaddticket" class="set_2_button color5 set_2_btn-2 icon-down">Valider</button>
                  </div>

                  </div>
                </fieldset>
              </form>
          </form>
        </div>
      </div>

    <?php }

    ?>
        </div>

    <?php include 'php/footer.php'; ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
