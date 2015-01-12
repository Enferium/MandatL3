<?php
require_once dirname(__FILE__).'/ControleurAdmin.php';
require_once dirname(__FILE__).'/ControleurConnexion.php';
require_once dirname(__FILE__).'/../Vue/Vue.php';

class Routeur {

  private $ctrlAdmin;
  private $ctrlConnec;

  public function __construct() {
    $this->ctrlAdmin = new ControleurAdmin();
    $this->ctrlConnec = new ControleurConnexion();
  }

  // Traite une requête entrante
  public function routerRequete() {
    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'Admin') {
        $this->ctrlAdmin->admin();
      }
      elseif ($_GET['action'] == 'ajoutEtudiant') {
        $this->ctrlAdmin->ajoutEtudiant(array($_POST['nom'], $_POST['prenom'], $_POST['identite_payeur']));
        header('Location: index.php?action=Admin&tab=etudiant'); 
      }
      elseif ($_GET['action'] == 'modifierEtudiant') {
        $this->ctrlAdmin->modifierEtudiant(array($_POST['nom'], $_POST['prenom'], $_POST['identite_payeur'], $_POST['id']));
        header('Location: index.php?action=Admin&tab=etudiant'); 
      }
      elseif ($_GET['action'] == 'supprimerEtudiant') {
        $this->ctrlAdmin->supprimerEtudiant(array($_GET['id']));
        header('Location: index.php?action=Admin&tab=etudiant'); 
      }
      elseif ($_GET['action'] == 'Gestion') {
        echo "La page de gestion n'est pas implementer";
      }
      elseif ($_GET['action'] == 'Scol') {
        echo "La page de scolarité n'est pas implementer";;
      }
      elseif ($_GET['action'] == 'Connexion') {
        $this->ctrlConnec->connec();
      }
      elseif ($_GET['action'] == 'Connexion1') {
        $res = $this->ctrlConnec->seConnecter($_POST['pseudo'],$_POST['password']);
          $this->ctrlConnec->connecM($res);
      }
      elseif ($_GET['action'] == 'Deconnexion') {
        $this->ctrlConnec->seDeconnecter();
        header('Location: index.php'); 
      }
      else throw new Exception("Action non valide");
    }
    else  $this->ctrlConnec->connec();
  }
}
