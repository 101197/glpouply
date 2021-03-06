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

    <div class="table-responsive">
        <table class="table">
                <tr>
                    <th>Identifiant</th>
                    <th>Entité</th>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>
                    <th>Lieu</th>
                    <th>Actif</th>
                    <th>Langue</th>
                    <th></th>
                </tr>
                <tbody>
                  <tr>
                    <td>Cell 1</td>
                    <td>Cell 2</td>
                    <td>Cell 3</td>
                    <td>Cell 4</td>
                    <td>Cell 5</td>
                    <td>Cell 6</td>
                    <td>Cell 7</td>
                    <td>Cell 8</td>
                    <td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierticket.php?idTicket='.$row["idTicket"].'\'">Modifier</button></td>
                  </tr>
                  <tr>
                    <td>Cell 3</td>
                    <td>Cell 4</td>
                    <td>Cell 3</td>
                    <td>Cell 4</td>
                    <td>Cell 5</td>
                    <td>Cell 6</td>
                    <td>Cell 7</td>
                    <td>Cell 8</td>
                    <td><button class="btn btn-primary form-btn" onclick="document.location.href = \'modifierticket.php?idTicket='.$row["idTicket"].'\'">Modifier</button></td>
                  </tr>
                </tbody>

        </table>
    </div>

    <?php include 'php/footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
