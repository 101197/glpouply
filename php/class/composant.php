<?php

class Composant {


  //variables
  private $nomPeriph;
  private $lieuPeriph;
  private $typePeriph;
  private $modelePeriph;
  private $numSerie;
  private $fabricantPeriph;
  private $dateDerniereMofif;

  function __construct(){
    $this->nomPeriph;
    $this->lieuPeriph;
    $this->typePeriph;
    $this->modelePeriph;
    $this->numSerie;
    $this->fabricantPeriph;
    $this->dateDerniereModif;
}

  function setNomPeriph($pNomPeriph){
    $this->nomPeriph = $pNomPeriph;
  }

  function getNomPeriph(){
    return $this->nomPeriph;
  }

  function setLieuPeriph($pLieuPeriph){
    $this->lieuPeriph = $pLieuPeriph;
  }

  function getLieuPeriph(){
    return $this->lieuPeriph;
  }

  function setTypePeriph($pTypePeriph){
    $this->typePeriph = $pTypePeriph;
  }

  function getTypePeriph(){
    return $this->typePeriph;
  }

  function setModelePeriph($pModelePeriph){
    $this->modelePeriph = $pModelePeriph;
  }

  function getModelePeriph(){
    return $this->modelePeriph;
  }

  function setNumSerie($pNumSerie){
    $this->numSerie = $pNumSerie;
  }

  function getNumSerie(){
    return $this->numSerie;
  }

  function setFabricantPeriph($pFabricantPeriph){
    $this->fabricantPeriph = $pFabricantPeriph;
  }

  function getFabricantPeriph(){
    return $this->fabricantPeriph;
  }

  function setDateDerniereModif($pDateDerniereModif){
    $this->dateDerniereModif = $pDateDerniereModif;
  }

  function getDateDerniereModif(){
    return $this->dateDerniereModif;
  }

}

 ?>
