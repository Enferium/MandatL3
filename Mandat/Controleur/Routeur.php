<?php
require_once dirname(__FILE__).'/ControleurAdmin.php';
require_once dirname(__FILE__).'/ControleurConnexion.php';
require_once dirname(__FILE__).'/ControleurScol.php';
require_once dirname(__FILE__).'/../Vue/Vue.php';

class Routeur {

  private $ctrlAdmin;
  private $ctrlConnec;

  public function __construct() {
    $this->ctrlAdmin = new ControleurAdmin();
    $this->ctrlConnec = new ControleurConnexion();
    $this->ctrlScol = new ControleurScol();
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
      elseif ($_GET['action'] == 'ajoutPays') {
        $this->ctrlAdmin->ajoutPays(array($_POST['code_pays'],$_POST['alpha2'],$_POST['alpha3'],$_POST['nom_en_gb'],$_POST['nom_fr_fr']));
        header('Location: index.php?action=Admin&tab=pays'); 
      }
      elseif ($_GET['action'] == 'modifierPays') {
        $this->ctrlAdmin->modifierPays(array($_POST['code_pays'],$_POST['alpha2'],$_POST['alpha3'],$_POST['nom_en_gb'],$_POST['nom_fr_fr'],$_POST['id']));
        header('Location: index.php?action=Admin&tab=pays');
      }
      elseif ($_GET['action'] == 'supprimerPays') {
        $this->ctrlAdmin->supprimerPays(array($_GET['id']));
        header('Location: index.php?action=Admin&tab=pays');
      }
      elseif ($_GET['action'] == 'ajoutDroit') {
        $this->ctrlAdmin->ajoutDroit(array($_POST['id_ent'],$_POST['code_droit'],$_POST['mdp']));
        header('Location: index.php?action=Admin&tab=droit');
      }
      elseif ($_GET['action'] == 'modifierDroit') {
        $this->ctrlAdmin->modifierDroit(array($_POST['id_ent'],$_POST['code_droit'],$_POST['mdp'],$_POST['id']));
        header('Location: index.php?action=Admin&tab=droit');
      }
      elseif ($_GET['action'] == 'supprimerDroit') {
        $this->ctrlAdmin->supprimerDroit(array($_GET['id']));
        header('Location: index.php?action=Admin&tab=droit');
      }
      elseif ($_GET['action'] == 'ajoutDiplome') {
        $this->ctrlAdmin->ajoutDiplome(array($_POST['libele_diplome']));
        header('Location: index.php?action=Admin&tab=diplome');
      }
      elseif ($_GET['action'] == 'modifierDiplome') {
        $this->ctrlAdmin->modifierDiplome(array($_POST['libele_diplome'],$_POST['id']));
        header('Location: index.php?action=Admin&tab=diplome');
      }
      elseif ($_GET['action'] == 'supprimerDiplome') {
        $this->ctrlAdmin->supprimerDiplome(array($_GET['id']));
        header('Location: index.php?action=Admin&tab=diplome');
      }
      elseif ($_GET['action'] == 'Gestion') {
        echo "La page de gestion n'est pas implementer";
      }
      elseif ($_GET['action'] == 'Scol') {
        $this->ctrlScol->scol();
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
