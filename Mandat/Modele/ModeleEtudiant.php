<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:14
 */
require_once dirname(__FILE__).'/Modele.php';

class ModeleEtudiant extends Modele {


    public function getEtudiants($a, $b) {
        $sql = 'SELECT * FROM etudiant ORDER BY `etudiant`.`nom` ASC LIMIT '.$a.', '.$b.'';
        $etu = $this->executerRequete($sql);
        return $etu;
    }

    public function getNbPages() {
        $messagesParPage = 10;
        $sql = 'SELECT COUNT(*) AS total FROM etudiant';
        $res=$this->executerRequete($sql);
        $donnees_total=$res->fetch(PDO::FETCH_ASSOC);
        $total=$donnees_total['total'];
        $nombreDePages=ceil($total/$messagesParPage);
        return $nombreDePages;
    }

    public function getEtudiant($idEtu) {
        $sql = 'SELECT * FROM etudiant WHERE id_etudiant=?';
        $etu = $this->executerRequete($sql, array($idEtu));
        if ($etu->rowCount() == 1)
            return $etu->fetch();
        else
            throw new Exception("Aucun Etudiant ne correspond a l'identifiant : '$idEtu'");
    }

    public function ajoutEtudiant($param) {
        $sql = 'INSERT INTO etudiant (nom, prenom, identite_payeur) VALUES (?, ?, ?)';
        $etu = $this->executerRequete($sql, $param);
    }

    public function modifierEtudiant($param) {
        $sql = 'UPDATE etudiant SET nom=?, prenom=?, identite_payeur=? WHERE id_etudiant=? ';
        $etu = $this->executerRequete($sql, $param);
    }

    public function supprimerEtudiant($param) {
        $sql = 'DELETE FROM etudiant WHERE id_etudiant=?';
        $etu = $this->executerRequete($sql, $param);
    }
}