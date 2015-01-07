<?php
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
include(dirname(__FILE__).'/includes/identifiants.php');
include(dirname(__FILE__).'/includes/header.php');
include(dirname(__FILE__).'/includes/menu.php');
include(dirname(__FILE__).'/includes/footer.php');

if (isset($_SESSION['droit'])) {
	if ($_SESSION['droit'] == 1) {
		?>
			<a href="Scolarite/vue_scolarite.php">Afficher</a>
		<?php
	} else if ($_SESSION['droit'] == 2) {
		?>
			<a href="Gestionnaire/vue_gestionnaire.php">Afficher</a>
		<?php
	} else if ($_SESSION['droit'] == 3) {
		?>
			<a href="Admin/vue_admin.php">Afficher</a>
		<?php
	} else {

	}
}

?>
