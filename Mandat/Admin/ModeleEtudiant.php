<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:14
 */

class ModeleEtudiant extends Modele {


    public function getEtudiants() {
        $sql = 'SELECT * FROM etudiant';
        $etu = $this->executerRequete($sql);
        return $etu;
    }

    public function getEtudiant($idEtu) {
        $sql = 'SELECT * FROM etudiant WHERE id_etudiant=?';
        $etu = $this->executerRequete($sql, array($idEtu));
        if ($etu->rowCount() == 1)
            return $etu->fetch();
        else
            throw new Exception("Aucun Etudiant ne correspond a l'identifiant : '$idEtu'");
    }
}