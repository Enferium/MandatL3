<?php

require_once dirname(__FILE__).'/../Modele/ModelePays.php';

require_once dirname(__FILE__).'/../Vue/Vue.php';

class ControleurConnexion {

  private $dr;

  public function __construct() {

    $this->dr =  new ModeleDroits();
  }


  public function connec() {
    $vue = new Vue("Connexion");
    $vue->generer(array());
  }

    public function connecM($res) {

    $droit = $this->dr->getDroits(1,1);
    $vue = new Vue("Connexion");
    $vue->generer(array('res'=>$res));
  }

  public function seConnecter($id,$mdp){
    $res=$this->dr->combinaison_connexion_valide($id,$mdp);
    return $res;
  }

  public function seDeconnecter(){
    session_destroy();
  }
}
