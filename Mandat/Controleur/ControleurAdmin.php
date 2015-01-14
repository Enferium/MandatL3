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


  public function admin($a,$b) {
    $nb_pa = $this->pa->getNbPages();
    $nb_di = $this->di->getNbPages();
    $nb_etu = $this->etu->getNbPages();
    $nb_dr = $this->dr->getNbPages();

    $etudiant = $this->etu->getEtudiants($a, $b);
    $pays = $this->pa->getCountry($a,$b);
    $droit = $this->dr->getDroits($a, $b);
    $diplome = $this->di->getDiplomes($a, $b);
    $vue = new Vue("Admin");
    $vue->generer(array('etudiant'=>$etudiant,'pays'=>$pays,'droit'=>$droit,"diplome"=>$diplome, "nb_pa"=>$nb_pa, "nb_di"=>$nb_di, "nb_etu"=>$nb_etu, "nb_dr"=>$nb_dr));
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
