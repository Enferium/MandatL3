<?php
// Connexion a la base de données avec PDO
try {
	$db = new PDO('mysql:host=localhost;dbname=mandat-projet', 'mandat-projet', 'mandat');
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}
?>