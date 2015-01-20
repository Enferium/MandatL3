<?php

require_once dirname(__FILE__).'/../Modele/ModeleEtudiant.php';
require_once dirname(__FILE__).'/../Modele/ModelePays.php';
require_once dirname(__FILE__).'/../Modele/ModeleDiplome.php';

require_once dirname(__FILE__).'/../Vue/Vue.php';

class ControleurScol {

  private $etu;
  private $pa;
  private $di;

  public function __construct() {
    $this->etu =  new ModeleEtudiant();
    $this->pa =  new ModelePays();
    $this->di =  new ModeleDiplome();
  }


  public function scol($a,$b) {
  	$nb_etu = $this->etu->getNbPages();
  	
  	$select_pays = $this->pa->getPaysPourSelect();
    $select_diplome = $this->di->getDiplomePourSelect();

    $etudiant = $this->etu->getEtudiants($a,$b);
    $vue = new Vue("Scol");
    $vue->generer(array('etudiant'=>$etudiant, "select_pays"=>$select_pays, "select_diplome"=>$select_diplome, "nb_etu"=>$nb_etu));
  }

  public function ajoutEtudiant($param) {
    $this->etu->ajoutEtudiant($param);
  }
}
