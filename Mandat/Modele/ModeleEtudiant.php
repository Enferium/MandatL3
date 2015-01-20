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
        $sql = 'SELECT etudiant.nom, etudiant.prenom, etudiant.identite_payeur, pays.nom_fr_fr, diplome.libele_diplome, etudiant.id_etudiant FROM diplome, pays, etudiant, est_en, est_originaire_de WHERE diplome.id_diplome = est_en.id_diplome AND etudiant.id_etudiant = est_en.id_etudiant AND pays.id_pays = est_originaire_de.id_pays AND etudiant.id_etudiant = est_originaire_de.id_etudiant  ORDER BY `etudiant`.`nom` ASC LIMIT '.$a.', '.$b.'';
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
        $sql = "CALL ajoutEtudiant(?, ?, ?, ?, ?)";
        $etu = $this->executerRequete($sql, $param);
        return $etu;
    }

    public function modifierEtudiant($param) {
        $sql = "CALL modifierEtudiant(?, ?, ?, ?, ?, ?)";
        $etu = $this->executerRequete($sql, $param);
    }

    public function supprimerEtudiant($param) {
        $sql = 'DELETE FROM etudiant WHERE id_etudiant=?';
        $etu = $this->executerRequete($sql, $param);
    }
}