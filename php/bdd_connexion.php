<?php
try {
  $bdd = new PDO('mysql:host=ppe2.ddns.net;dbname=glpoulpi', 'glpoulpi', 'glpoulpi');//crée une connexion a la bdd
} catch (Exception $e) {
  echo "une erreur".$e->getMessage();
}

?>
