<?php
include(dirname(__FILE__).'/../includes/control-session.php');
include(dirname(__FILE__).'/../includes/header.php');
include(dirname(__FILE__).'/../includes/menu.php');


if ($_SESSION['droit'] == 1) {
	
	class vue_scolarite {
	


	}

} else {
	?>
		Vous n'avez pas les droits pour acc&egrave;der &agrave; cette page !
	<?php
}