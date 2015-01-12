<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:58
 */
require_once dirname(__FILE__).'/Modele.php';

class ModeleDroits extends Modele{
    public function getDroits() {
        $sql = 'SELECT * FROM droits';
        $droit = $this->executerRequete($sql);
        return $droit;
    }

    public function getDroit($idEnt) {
        $sql = 'SELECT * FROM droits WHERE id_ent=?';
        $droit = $this->executerRequete($sql, array($idEnt));
        if ($droit->rowCount() == 1)
            return $droit->fetch();
        else
            throw new Exception("Aucun Utilisateur n'a été trouver ne correspond a l'identifiant : '$idEnt'");
    }

    public function combinaison_connexion_valide($idEnt, $mdp) {


    $sql="SELECT * FROM droits WHERE id_ent =? AND mdp =?";
    $co = $this->executerRequete($sql,array($idEnt,$mdp));

    if ($result = $co->fetch(PDO::FETCH_OBJ)) {
        return $result;
    }
    return false;
    }

}