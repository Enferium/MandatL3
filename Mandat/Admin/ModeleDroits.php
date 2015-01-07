<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:58
 */

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

}