<?php

require_once dirname(__FILE__).'/../Modele/ModeleEtudiant.php';
require_once dirname(__FILE__).'/../Modele/ModelePays.php';
require_once dirname(__FILE__).'/../Modele/ModeleDroits.php';
require_once dirname(__FILE__).'/../Modele/ModeleDiplome.php';

require_once dirname(__FILE__).'/../Vue/Vue.php';

class ControleurAdmin {

  private $etu;
  private $pa;
  private $dr;
  private $di;

  public function __construct() {
    $this->etu =  new ModeleEtudiant();
    $this->pa =  new ModelePays();
    $this->dr =  new ModeleDroits();
    $this->di =  new ModeleDiplome();
  }


  public function admin() {
    $etudiant = $this->etu->getEtudiants();
    $pays = $this->pa->getCountry();
    $droit = $this->dr->getDroits();
    $diplome = $this->di->getDiplomes();
    $vue = new Vue("Admin");
    $vue->generer(array('etudiant'=>$etudiant,'pays'=>$pays,'droit'=>$droit,"diplome"=>$diplome));
  }
}
