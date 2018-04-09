<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tickets</title>
  </head>
  <body>

    <div class="container">
      <h1>Ajouter un ticket</h1>
      <form action="" method="post">
        <div class="row bg-light rounded">
          <div class="col">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Nom du Produit :</label>
                  <input type="text" class="form-control" name="nomproduit" value="<?php echo $nomproduit ?>" id="">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Prix Unitaire HT :</label>
                  <input type="text" class="form-control" name="prix" value="<?php echo $prix ?>" id="">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Référence :</label>
                  <input type="text" class="form-control" name="reference" value="<?php echo $reference ?>" id="">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Quantité :</label>
                  <input type="text" class="form-control" name="quantite" value="<?php echo $quantite ?>" id="">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">Catégorie :</label>
                  <select class="form-control" name="categorie" id="">
                    <?php
                    //charge les categories
                    $reqcategorie = $bdd->prepare("SELECT * FROM categorie");
                    $reqcategorie->execute();
                    $categorieinfo = $reqcategorie->fetchAll();
                    foreach ($categorieinfo as $row) {
                      if ($row["IdCategorie"] == $categorie) {
                        echo '<option value="'.$row["IdCategorie"].'" selected="selected">'.$row["LibelleCategorie"].'</option>';
                      }else {
                        echo '<option value="'.$row["IdCategorie"].'">'.$row["LibelleCategorie"].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-inline m-2">
                  <label class="mr-1">taille :</label>
                  <select class="form-control" name="" id="taille">
                    <?php
                    //charge les categories
                    $reqcategorie = $bdd->prepare("SELECT * FROM taille");
                    $reqcategorie->execute();
                    $categorieinfo = $reqcategorie->fetchAll();
                    foreach ($categorieinfo as $row) {
                      if ($row["IdCategorie"] == $taille) {
                        echo '<option value="'.$row["idtaille"].'" selected="selected">'.$row["libelleTaille"].'</option>';
                      }else {
                        echo '<option value="'.$row["idtaille"].'">'.$row["libelleTaille"].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group m-2">
              <label class="mr-1">Description :</label>
              <textarea class="form-control" rows="5" name="description" id="" style="min-height:100px;"><?php echo $description ?></textarea>
            </div>
          </div>

  </body>
</html>
