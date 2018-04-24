<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tickets tec</title>
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

      <h1>Cette page est une page technique qui sera supprimée quand le code sera copié/collé dans la vraie page</h1>

      <form method="post">
        <input type="text" name="titreTicket" value="" placeholder="Titre du ticket">
        <input type="text" name="statutTicket" value="" placeholder="Statut du ticket">
        <label>Prioritaire</label><input type="checkbox" name="prioriteTicket[]" value="cocher"> <!--checkbox car c'est un booléen-->
        <input type="text" name="descTicket" value="" placeholder="Description du ticket">
        <select class="" name="idComposant">
          <?php
          $reqcomposant = $bdd->prepare("SELECT * FROM COMPOSANT");
          $reqcomposant->execute();
          $dbrep = $reqcomposant->fetchAll();
          foreach ($dbrep as $row) {
            echo '<option value="'.$row['idComposant'].'">'.$row['nomComposant'].'</option>';
          }

          ?>
        </select>
        <input type="submit" name="submitformaddticket" value="submit">
      </form>
<?php }

?>
    </div>
  </body>
</html>
