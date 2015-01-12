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

  public function ajoutEtudiant($param) {
    $this->etu->ajoutEtudiant($param);
  }

  public function modifierEtudiant($param) {
    $this->etu->modifierEtudiant($param);
  }

  public function supprimerEtudiant($param) {
    $this->etu->supprimerEtudiant($param);
  }

  public function ajoutPays($param) {
    $this->pa->ajoutPays($param);
  }

  public function modifierPays($param) {
    $this->pa->modifierPays($param);
  }

  public function supprimerPays($param) {
    $this->pa->supprimerPays($param);
  }

  public function ajoutDroit($param) {
    $this->dr->ajoutDroit($param);
  }

  public function modifierDroit($param) {
    $this->dr->modifierDroit($param);
  }

  public function supprimerDroit($param) {
    $this->dr->supprimerDroit($param);
  }

  public function ajoutDiplome($param) {
    $this->di->ajoutDiplome($param);
  }

  public function modifierDiplome($param) {
    $this->di->modifierDiplome($param);
  }

  public function supprimerDiplome($param) {
    $this->di->supprimerDiplome($param);
  }
}
