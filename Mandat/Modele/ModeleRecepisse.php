<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:14
 */
require_once dirname(__FILE__).'/Modele.php';

class ModeleRecepisse extends Modele {


    public function getRecepisse() {
        $sql = 'SELECT * from recepisse';
        $rece = $this->executerRequete($sql);
        return $rece;
    }

    public function getNbRecepisseEtu($param) {
        $sql = 'SELECT COUNT(*) AS total FROM recepisse WHERE id_etudiant=?';
        $res=$this->executerRequete($sql,$param);
        $donnees_total=$res->fetch(PDO::FETCH_ASSOC);
        $total=$donnees_total['total'];
        return $total;
    }

    public function getRecepisseEtu($param) {
        $sql = 'SELECT * FROM recepisse WHERE id_etudiant=?';
        $rece = $this->executerRequete($sql, $param);
        return $rece;
    }

    public function ajoutRecepisse($param) {
        $sql = 'INSERT INTO recepisse (id_etudiant,chemin) VALUES (?,?)';
        $rece = $this->executerRequete($sql, $param);
        return $rece;
    }

    public function supprimerRecepisseEtu($param) {
        $sql = 'DELETE FROM recepisse WHERE id_etudiant=?';
        $rece = $this->executerRequete($sql, $param);
    }

    public function supprimerRecepisse($param) {
        $sql = 'DELETE FROM recepisse WHERE id_recepisse=?';
        $rece = $this->executerRequete($sql, $param);
    }
}