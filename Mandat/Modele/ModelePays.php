<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:45
 */
require_once dirname(__FILE__).'/Modele.php';

class ModelePays extends Modele{

    public function getCountry($a,$b) {
        $sql = 'SELECT * FROM pays ORDER BY `pays`.`nom_fr_fr` ASC LIMIT '.$a.', '.$b.'';
        $pays = $this->executerRequete($sql);
        return $pays;
    }

    
    public function getNbPages() {
        $messagesParPage = 10;
        $sql = 'SELECT COUNT(*) AS total FROM pays';
        $res=$this->executerRequete($sql);
        $donnees_total=$res->fetch(PDO::FETCH_ASSOC);
        $total=$donnees_total['total'];
        $nombreDePages=ceil($total/$messagesParPage);
        return $nombreDePages;
    }

    public function getPays($idPays) {
        $sql = 'SELECT * FROM pays WHERE id_pays=?';
        $pays = $this->executerRequete($sql, array($idPays));
        if ($pays->rowCount() == 1)
            return $pays->fetch();
        else
            throw new Exception("Aucun Pays ne correspond a l'identifiant : '$idPays'");
    }

        public function ajoutPays($param) {
        $sql = 'INSERT INTO pays (code_pays, alpha2, alpha3, nom_en_gb, nom_fr_fr) VALUES (?, ?, ?, ?, ?)';
        $pays = $this->executerRequete($sql, $param);
    }

    public function modifierPays($param) {
        $sql = 'UPDATE pays SET code_pays=?, alpha2=?, alpha3=?, nom_en_gb=?, nom_fr_fr=? WHERE id_pays=? ';
        $pays = $this->executerRequete($sql, $param);
    }

    public function supprimerPays($param) {
        $sql = 'DELETE FROM pays WHERE id_pays=?';
        $pays = $this->executerRequete($sql, $param);
    }
}