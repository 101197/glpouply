<?php
function getUser($piduser, $bdd){
  //selectionne l'utilisateur grâce à son idUser
  $requser = $bdd->prepare("SELECT nomUser, mailUser, adresseUser, prenomUser, telUser, activiteUser, idUser FROM UTILISATEUR WHERE idUser = ?");
  $requser->execute(array($piduser));
  $userinfo = $requser->fetch();
  //instencie un nouvelle utilisateur
  $unutilisateur = new Utilisateur;
  $unutilisateur->setNomUser($userinfo['nomUser']);
  $unutilisateur->setPrenomUser($userinfo['prenomUser']);
  $unutilisateur->setMailUser($userinfo['mailUser']);
  $unutilisateur->setTelUser($userinfo['telUser']);
  $unutilisateur->setAdresseUser($userinfo['adresseUser']);
  $unutilisateur->setActiviteUser($userinfo['activiteUser']);

  //renvoi l'utilisateur
  return $unutilisateur;
}

?>
