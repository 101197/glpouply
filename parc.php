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

    <h1 class="text-center">Parc</h1><br />
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>N° de série</th>
                    <th>Type</th>
                    <th>Modèle</th>
                    <th>Fabricant</th>
                    <th>Adresse Mac</th>
                    <th>Salle</th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Cell 1</td>
                    <td>Cell 2</td>
                    <td>Cell 3</td>
                    <td>Cell 4</td>
                    <td>Cell 5</td>
                    <td>Cell 6</td>
                    <td>Cell 7</td>
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
