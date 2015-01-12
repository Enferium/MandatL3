<?php
/**
 * Created by PhpStorm.
 * User: mathieu
 * Date: 08/01/2015
 * Time: 15:09
 */

class Vue {


    private $fichier;

    private $titre;

    public function __construct($action) {
        $this->fichier = dirname(__FILE__).'/vue' . $action . '.php';
    }


    public function generer($donnees) {

        $contenu = $this->genererFichier($this->fichier, $donnees);

        $vue = $this->genererFichier(dirname(__FILE__).'/gabarit.php',
            array('titre' => $this->titre, 'contenu' => $contenu));

        echo $vue;
    }


    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}
