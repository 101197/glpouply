<?php

class Utilisateur{

  //variables
  private $nomUser;
  private $prenomUser;
  private $mailUser;
  private $telUser;
  private $adresseUser;
  private $activiteUser;
  private $langueUser;

  function __construct(){
    $this->nomUser;
    $this->mailUser;
    $this->telUser;
    $this->adresseUser;
    $this->activiteUser;
    $this->langueUser;
  }

  function setNomUser($pNomUser){
    $this->nomUser = $pNomUser;
  }

  function getNomUser(){
    return $this->nomUser;
  }

  function setPrenomUser($pPrenomUser) {
    $this->prenomUser = $pPrenomUser;
  }

  function getPrenomUser () {
    return $this->prenomUser;
  }

  function setMailUser($pMailUser){
    $this->mailUser = $pMailUser;
  }

  function getMailUser(){
    return $this->mailUser;
  }

  function setTelUser($pTelUser){
    $this->telUser = $pTelUser;
  }

  function getTelUser(){
    return $this->telUser;
  }

  function setAdresseUser($pAdresseUser){
    $this->adresseUser = $pAdresseUser;
  }

  function getAdresseUser(){
    return $this->adresseUser;
  }

  function setActiviteUser($pActiviteUser){
    $this->activiteUser = $pActiviteUser;
  }

  function getActiviteUser(){
    return $this->activiteUser;
  }

  function setLangueUser($pLangueUSer){
    $this->langueUser = $pLangueUSer;
  }

  function getLangueUser(){
    return $this->langueUser;
  }

}
 ?>
