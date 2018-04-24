<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>utilisateur</title>
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
              <th>Nom</th>
              <th>Prénom</th>
              <th>Activité</th>
              <th>E-mail</th>
              <th>Téléphone</th>
              <th>Adresse</th>
              <th>Mot de passe</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $requser = $bdd->prepare("SELECT * FROM UTILISATEUR");
            $requser->execute();
            $dbrep = $requser->fetchAll();
            foreach ($dbrep as $row){
              echo "<tr>";
              echo "<td>".$row['nomUser']."</td>"; //Affiche dans la colonne les infos de la bdd
              echo "<td>".$row['prenomUser']."</td>";
              echo "<td>".$row['activiteUser']."</td>";
              echo "<td>".$row['mailUser']."</td>";
              echo "<td>".$row['telUser']."</td>";
              echo "<td>".$row['adresseUser']."</td>";
              echo "<td>".$row['mdpUser']."</td>"; //propriétaire du ticket
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
