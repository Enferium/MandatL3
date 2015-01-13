<?php

require_once dirname(__FILE__).'/../Modele/ModeleEtudiant.php';

require_once dirname(__FILE__).'/../Vue/Vue.php';

class ControleurScol {

  private $etu;

  public function __construct() {
    $this->etu =  new ModeleEtudiant();
  }


  public function scol() {
    $etudiant = $this->etu->getEtudiants();
    $vue = new Vue("Scol");
    $vue->generer(array('etudiant'=>$etudiant));
  }
}
