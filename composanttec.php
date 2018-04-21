<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
    table {
      border-collapse: collapse;
      }
      table, td, th {
        border: 1px solid black;
      }
    </style>
  </head>
  <body>
    <?php include 'php/navbar.php'; ?>

    <h1>Cette page est une page technique qui sera supprimée quand le code sera copié/collé dans la vraie page</h1>

    <table>
      <tr>
        <th>Nom du composant</th> <th>Numéro de série</th> <th>Adresse MAC</th> <th>Modèle</th> <th>Fabricant</th> <th>Type</th> <th>Salle</th>
      </tr>
      <?php
      $reqcomposant = $bdd->prepare("SELECT * FROM COMPOSANT");
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
    </table>
    <?php include 'php/footer.php'; ?>
  </body>
</html>
