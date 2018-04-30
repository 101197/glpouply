<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parc</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/TR-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
  </head>
  <body>
    <?php include 'php/navbar.php'; ?>

    <h1 class="text-center">Parc</h1><br/>
    <div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom composant</th>
                    <th>N° de série</th>
                    <th>Adresse Mac</th>
                    <th>Modèle</th>
                    <th>Fabricant</th>
                    <th>Type</th>
                    <th>Salle</th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php
                  $reqcomposant = $bdd->prepare("SELECT nomComposant, numSerie, adresseMac, modeleComposant, fabricantComposant, typeComposant, COMPOSANT.idSalle, libelleSalle FROM `COMPOSANT`, `SALLE` WHERE COMPOSANT.idSalle = SALLE.idSalle");
                  $reqcomposant->execute();
                  $dbrep = $reqcomposant->fetchAll();
                  foreach ($dbrep as $row){
                    echo "<tr>";
                    echo "<td>".$row['nomComposant']."</td>"; //Affiche dans la colonne les infos de la bdd
                    echo "<td>".$row['numSerie']."</td>";
                    echo "<td>".$row['adresseMac']."</td>";
                    echo "<td>".$row['modeleComposant']."</td>";
                    echo "<td>".$row['fabricantComposant']."</td>";
                    echo "<td>".$row['typeComposant']."</td>";
                    echo "<td>".$row['idSalle']."</td>";
                    echo "</tr>";
                  }
                  ?>
                </tr>
            </tbody>
        </table>
      </div>
    </div>

    <?php include 'php/footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
