<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Modifier ticket</title>
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

            <div>
              Titre du ticket : <?php echo $titreTicket; ?>
            </div>
            <div>
              Description du ticket : <?php echo $descTicket; ?>
            </div>
            <div>
              Date d'ouverture du ticket : <?php echo $dateOuvertureTicket; ?>
            </div>
            <div>
              Nom du composant : <?php echo $nomComposant; ?>
            </div>
            <form method="post">
              <select class="" name="statutTicket">
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


              <?php
              if($prioriteticket == 1) {
                ?>
                <label>Priorité</label><input type="checkbox" name="prioriteTicket[]" value="cocher" checked>
                <?php
              } else {
                ?>
                <label>Priorité</label><input type="checkbox" name="prioriteTicket[]" value="cocher">
                <?php
              }
              ?>

              <div>
                <button type="submit" name="formmodifierticket" class="btn btn-success btn-lg float-right">Modifier</button>
              </div>

              <form method="post">
                <button type="submit" name="cloreTicket" class="btn btn-success btn-lg float-right">Clore le ticket</button>
              </form>
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


    <?php include 'php/footer.php'; ?>
  </body>
</html>
