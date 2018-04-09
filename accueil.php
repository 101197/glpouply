<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'php/navbar.php'; ?>

    <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
              <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Vue personnelle</a></li>
              <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">Vue groupe</a></li>
              <li class="nav-item"><a class="nav-link" href="#item-1-3" id="item-1-3-tab" data-toggle="tab" role="tab" aria-controls="item-1-3" aria-selected="false">Vue globale</a></li>
              <li class="nav-item"><a class="nav-link" href="#item-1-5" id="item-1-5-tab" data-toggle="tab" role="tab" aria-controls="item-1-5" aria-selected="false">Tous</a></li>
          </ul>
        </div>
        <div class="card-body">
            <div id="nav-tabContent" class="tab-content">
                <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                    <h4>Vue personnelle</h4>
                    <p>A completer</p>

                    <?php include "tableau.html";?>



                </div>
                <div
                    id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                    <h4>Vue groupe</h4>
                </div>
                <div
                    id="item-1-3" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-3-tab">
                    <h4>Vue globale</h4>
                    <p>A completer</p>
                </div>
                <div
                    id="item-1-5" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-5-tab">
                    <h4>Tous</h4>
                    <p>A completer</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    //test si un client est connecté
    if (isset($_SESSION['idUser'])) {

      //affiche les pages de gestion de l'admin
      if ($_SESSION['idUser'] == 'Admin') {
        $adminoption = '<a class="dropdown-item" role="presentation" href="/ajoututilisateur.php">Ajouter un utilisateur</a>';
      }else {
        $adminoption = ' ';
      }

    ?>

    <?php include 'php/footer.php'; ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
