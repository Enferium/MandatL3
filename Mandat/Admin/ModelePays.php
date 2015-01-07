<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:45
 */

class ModelePays extends Modele{

    public function getCountry() {
        $sql = 'SELECT * FROM pays';
        $pays = $this->executerRequete($sql);
        return $pays;
    }

    public function getPays($idPays) {
        $sql = 'SELECT * FROM pays WHERE id_pays=?';
        $pays = $this->executerRequete($sql, array($idPays));
        if ($pays->rowCount() == 1)
            return $pays->fetch();
        else
            throw new Exception("Aucun Pays ne correspond a l'identifiant : '$idPays'");
    }
}