<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter tickets</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <body>
    <?php include 'php/navbar.php'; ?>
    <div class="container">
      <h1>Cette page est une page technique qui sera supprimée quand le code sera copié/collé dans la vraie page</h1>

      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Statut</th>
              <th>Date début note</th>
              <th>Date fin note</th>
              <th>Urgence</th>
              <th>Description</th>
              <th>Propriétaire</th>
            </tr>

            <?php
            $reqticket = $bdd->prepare("SELECT * FROM TICKETS");
            $reqticket->execute();
            $dbrep = $reqticket->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['titreTicket']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['statutTicket']."</td>";
              echo "<td>".$row['dateOuvertureTicket']."</td>";
              echo "<td>".$row['dateClotureTicket']."</td>";
              echo "<td>".$row['prioriteTicket']."</td>";
              echo "<td>".$row['descTicket']."</td>";
              echo "<td>".$row['idUser']."</td>"; //propriétaire du ticket
              echo '<td><button onclick="document.location.href = \'modifierticket.php?idTicket='.$row["idTicket"].'\'">Modifier</button></td>';
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <?php include 'php/footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
