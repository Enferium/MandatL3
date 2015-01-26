<?php

require_once dirname(__FILE__).'/../Modele/ModeleRecepisse.php';

require_once dirname(__FILE__).'/../Vue/Vue.php';

class ControleurRecepisse {

  private $rece;

  public function __construct() {
    $this->rece =  new ModeleRecepisse();
  }


  public function rece($param) {

    $rece = $this->rece->getRecepisseEtu($param);
    $nbRece = $this->rece->getNbRecepisseEtu($param);
    $vue = new Vue("Recepisse");
    $vue->generer(array("recepisse"=>$rece,"nb"=>$nbRece));
  }

  public function ajoutRecepisse($param) {
    $this->rece->ajoutRecepisse($param);
  }

  public function supprimerRecepisseEtu($param){
    $this->rece->supprimerRecepisseEtu($param);
  }

  public function supprimerRecepisse($param) {
    $this->rece->supprimerRecepisse($param);
  }
}
