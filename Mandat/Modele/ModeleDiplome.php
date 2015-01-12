<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 20:02
 */
require_once dirname(__FILE__).'/Modele.php';

class ModeleDiplome extends Modele{
    public function getDiplomes() {
        $sql = 'SELECT * FROM diplome';
        $dip = $this->executerRequete($sql);
        return $dip;
    }

    public function getDiplome($idDip) {
        $sql = 'SELECT * FROM diplome WHERE id_diplome=?';
        $dip = $this->executerRequete($sql, array($idDip));
        if ($dip->rowCount() == 1)
            return $dip->fetch();
        else
            throw new Exception("Aucun diplome ne correspond a l'identifiant : '$idDip'");
    }

    public function ajoutDiplome($param) {
        $sql = 'INSERT INTO diplome (libele_diplome) VALUES (?)';
        $di = $this->executerRequete($sql, $param);
    }

    public function modifierDiplome($param) {
        $sql = 'UPDATE diplome SET libele_diplome=? WHERE id_diplome=? ';
        $di = $this->executerRequete($sql, $param);
    }

    public function supprimerDiplome($param) {
        $sql = 'DELETE FROM diplome WHERE id_diplome=?';
        $di = $this->executerRequete($sql, $param);
    }
}