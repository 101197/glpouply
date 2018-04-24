<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include 'php/navbar.php';
if (isset($_SESSION['idutilisateur']) && ($unutilisateur->getActiviteUser() == 1 )) {
    //test quand le bouton submitformaddcompo éxécute le formulaire
    if(isset($_POST['submitformaddcompo'])) {
      //met les informations du formulaire dans des variables
      $nomcomposant = htmlspecialchars($_POST['nomComposant']);
      $numserie = htmlspecialchars($_POST['numSerie']);
      $adressemac = htmlspecialchars($_POST['adresseMAC']);
      $modelecomposant = htmlspecialchars($_POST['modeleComposant']);
      $fabricantcomposant = htmlspecialchars($_POST['fabricantComposant']);
      $typecomposant = htmlspecialchars($_POST['typeComposant']);
      $idsalle = intval(htmlspecialchars($_POST['idSalle']));

      //insère le nouveau composant à la bdd
      $reqcomposant = $bdd->prepare("INSERT INTO COMPOSANT(nomComposant, numSerie, adresseMAC, modeleComposant, fabricantComposant, typeComposant, idSalle) VALUES(?, ?, ?, ?, ?, ?, ?)");
      $reqcomposant->execute(array($nomcomposant, $numserie, $adressemac, $modelecomposant, $fabricantcomposant, $typecomposant, null));
    }

    ?>

    <h1>Cette page est une page technique qui sera supprimée quand le code sera copié/collé dans la vraie page</h1>

    <form method="post">
      <input type="text" name="nomComposant" value="" placeholder="Nom du composant">
      <input type="text" name="numSerie" value="" placeholder="Numéro de série">
      <input type="text" name="adresseMAC" value=""placeholder="Adresse MAC">
      <input type="text" name="modeleComposant" value="" placeholder="Modèle du composant">
      <input type="text" name="fabricantComposant" value="" placeholder="Fabricant du composant">
      <input type="text" name="typeComposant" value="" placeholder="Type de composant">
      <input type="text" name="idSalle" value="" placeholder="Id de la salle">
      <input type="submit" name="submitformaddcompo" value="submit">
    </form>

    <?php
    } else {
      echo 'Vous devez être connecté !'; 
    }
    include 'php/footer.php'; ?>
  </body>
</html>
