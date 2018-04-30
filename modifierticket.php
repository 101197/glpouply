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
      if (isset($_GET['idTicket'])) {

        //teste s'il y a un id set
        if (!empty($_GET['idTicket'])) {

          $idticket = $_GET['idTicket'];


            //si le bouton "Valider" est clické
            if (isset($_POST['formmodifierticket'])) {

              //teste si les champs ne sont pas vides
              if (!empty($_POST['statutTicket'])) {

              //variables
              $statutticket = htmlspecialchars($_POST['statutTicket']);

              if (isset($_POST['prioriteTicket'])) {
                $prioriteticket = 1;
              } else {
                $prioriteticket = 0;
              }

              //le pdo
              $reqticket = $bdd->prepare("UPDATE `TICKETS` SET `statutTicket`= ?,`prioriteTicket`= ? WHERE idTicket = ?");
              $reqticket->execute(array($statutticket, $prioriteticket, $idticket));
              header("Location: tickets.php");
            }
            else {
            echo "Les champs statut et priorité doivent être complétés !";
          }
        }

          if (isset($_POST['cloreTicket'])) {
            $dateclotureticket = date('Y-m-d H:i:s');

            //le pdo
            $reqticket = $bdd->prepare("UPDATE `TICKETS` SET `statutTicket` = 'traite', `dateClotureTicket` = ? WHERE idTicket = ?");
            $reqticket->execute(array($dateclotureticket, $idticket));
            header("Location: tickets.php");
          }

          //charge les informations actuelles du ticket

          //sql SELECT * FROM composant where
          $reqticket = $bdd->prepare("SELECT * FROM TICKETS WHERE idTicket = ?");
          $reqticket->execute(array($_GET['idTicket']));
          $dbrep = $reqticket->fetch();

          //le résultat remplit les variables
          $titreTicket = $dbrep['titreTicket'];
          $descTicket = $dbrep['descTicket'];
          $dateOuvertureTicket = $dbrep['dateOuvertureTicket'];
          $statutticket = $dbrep["statutTicket"];
          $prioriteticket = $dbrep["prioriteTicket"];
          $idcomposant = $dbrep['idComposant'];

          $reqcomposant = $bdd->prepare("SELECT * FROM  COMPOSANT WHERE idComposant = ?");
          $reqcomposant->execute(array($idcomposant));
          $dbrepcompo = $reqcomposant->fetch();
          $nomComposant = $dbrepcompo['nomComposant'];
    ?>


    <div class="row register-form">
      <div class="col-md-8 offset-md-2">
        <form class="custom-form">
          <h1>Modifier un  ticket</h1>
          <form class="register-form" method="post">
            <fieldset>
              <div class="form-row">

                <div class="col-6 col-sm-6 col-md-6">
                  <div><label>Titre</label><input class="form-control" type="text" name="titreTicket" value="<?php echo $dbrep["titreTicket"]; ?>"></div>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <div><label>Description</label><input class="form-control" type="text" name="descTicket" value="<?php echo $dbrep["descTicket"]; ?>"></div>
                </div>

                <div class="col-6 col-sm-6 col-md-6">
                  <div><label>Date d'ouverture</label><input class="form-control" type="text" name="dateOuvertureTicket" value="<?php echo $dbrep["dateOuvertureTicket"]; ?>"></div>
                </div>

                <div class="col-6 col-sm-6 col-md-6">
                  <div><label>Statut</label></div>
                  <form method="post">
                    <select class="form-control" name="statutTicket">
                      <?php
                      if ($statutticket == "nontraite") {
                        ?>
                        <option value="nontraite" selected>Non traité</option>
                        <option value="encours">En cours de traitement</option>
                        <option value="traite">Traité</option>
                        <?php
                      } else if ($statutticket == "encours") {
                        ?>
                        <option value="nontraite">Non traité</option>
                        <option value="encours" selected>En cours de traitement</option>
                        <option value="traite">Traité</option>
                        <?php
                      }else {
                        ?>
                        <option value="nontraite">Non traité</option>
                        <option value="encours">En cours de traitement</option>
                        <option value="traite" selected>Traité</option>
                        <?php
                      }
                      ?>
                    </select>
                </div>


                <div class="col-6 col-sm-6 col-md-6">
                  <div class="form-check2">

                  <?php
                  if($prioriteticket == 1) {
                    ?>
                    <label class="form-check-label checboxtext">Priorité</label><input class="form-check-input" type="checkbox" name="prioriteTicket[]" value="cocher" checked>
                    <?php
                  } else {
                    ?>
                    <label class="form-check-label checboxtext">Priorité</label><input class="form-check-input" type="checkbox" name="prioriteTicket[]" value="cocher">
                    <?php
                  }
                  ?>
                  </div>
                  <button type="submit" name="cloreTicket" class="btn btn-danger btn-danger2 form-btn">Clore le ticket</button>
                </div>

                <div class="col-6 col-sm-6 col-md-6">
                  <div><label>Composant</label>
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
                  </div>
                </div>



                <div class="col-12 col-sm-12 col-md-12">
                  <button type="submit" name="formmodifierticket" class="set_2_button color5 set_2_btn-2 icon-down">Modifier</button>
                </div>


              </form>
              <?php
              } else {
              ?>
              <div class="container mt-3 text-center">
                <font color="red">Erreur : aucun ticket selectionné</font>
                <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('tickets.php')">Retour</button>
              </div>
              <?php
              }
              } else {
              ?>
              <div class="container mt-3 text-center">
                <font color="red">Erreur : propriétée id introuvable</font>
                <button type="button" class="btn btn-danger btn-lg" onclick="document.location.replace('tickets.php')">Retour</button>
              </div>
              <?php
              };
              } else {
              ?>
              <div class="container mt-3 text-center">
              <font color="red">Vous n'avez pas les droits pour accéder à cette page</font>
              </div>
              <?php
            }
            ?>

            </div>
            </fieldset>
        </form>
      </form>
    </div>
    </div>
      <?php include 'php/footer.php'; ?>
    </body>
</html>
