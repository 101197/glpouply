<?php

class Ticket {

//variables
private $titreTicket;
private $statutTicket;
private $dateDerniereModifTicket;
private $dateOuvertureTicket;
private $prioriteTicket;
private $urgenceTicket;

function __construct(){
  $this->titreTicket;
  $this->statutTicket;
  $this->dateDerniereModifTicket;
  $this->dateOuvertureTicket;
  $this->prioriteTicket;
  $this->urgenceTicket;
}

function setTitreTicket($pTitreTicket){
  $this->titreTicket = $pTitreTicket;
}

function getTitreTicket(){
  return $this->titreTicket;
}

function setStatutTicket($pStatutTicket){
  $this->statutTicket = $pStatutTicket;
}

function getStatutTicket(){
  return $this->statutTicket;
}

function setDateDerniereModifTicket($pDateDerniereModifTicket){
  $this->dateDerniereModifTicket = $pDateDerniereModifTicket;
}

function getDateDerniereModifTicket(){
  return $this->dateDerniereModifTicket;
}

function setDateOuvertureTicket($pDateOuvertureTicket){
  $this->dateOuvertureTicket = $pDateOuvertureTicket;
}

function getDateOuvertureTicket(){
  return $this->dateOuvertureTicket;
}

function setPrioriteTicket($pPrioriteTicket){
  $this->prioriteTicket = $pPrioriteTicket;
}

function getPrioriteTicket(){
  return $this->prioriteTicket;
}

function setUrgenceTicket($pUrganceTicket){
  $this->urgenceTicket = $pUrgenceTicket;
}

function getUrgenceTicket(){
  return $this->urgenceTicket;
}

}

?>
