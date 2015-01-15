<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 07/01/15
 * Time: 19:58
 */
require_once dirname(__FILE__).'/Modele.php';

class ModeleDroits extends Modele{
    public function getDroits($a, $b) {
        $sql = 'SELECT * FROM droits ORDER BY `droits`.`id_ent` ASC LIMIT '.$a.', '.$b.'';
        $droit = $this->executerRequete($sql);
        return $droit;
    }

    public function getNbPages() {
        $messagesParPage = 10;
        $sql = 'SELECT COUNT(*) AS total FROM droits';
        $res=$this->executerRequete($sql);
        $donnees_total=$res->fetch(PDO::FETCH_ASSOC);
        $total=$donnees_total['total'];
        $nombreDePages=ceil($total/$messagesParPage);
        return $nombreDePages;
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


    public function ajoutDroit($param) {
        $sql = 'INSERT INTO droits (id_ent, code_droit, mdp) VALUES (?, ?, ?)';
        $dr = $this->executerRequete($sql, $param);
    }

    public function modifierDroit($param) {
        $sql = 'UPDATE droits SET id_ent=?, code_droit=?, mdp=? WHERE id_droit=? ';
        $dr = $this->executerRequete($sql, $param);
    }

    public function supprimerDroit($param) {
        $sql = 'DELETE FROM droits WHERE id_droit=?';
        $dr = $this->executerRequete($sql, $param);
    }

}