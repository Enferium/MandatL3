<?php
include(dirname(__FILE__).'/../includes/control-session.php');
include(dirname(__FILE__).'/../includes/header.php');
include(dirname(__FILE__).'/../includes/menu.php');
/**
 * Created by PhpStorm.
 * User: thomas
 * Date: 17/12/2014
 * Time: 12:29
 */

if ($_SESSION['droit'] == 3) {
	
	class vue_admin {
	


	}

} else {
	?>
		Vous n'avez pas les droits pour acc&egrave;der &agrave; cette page !
	<?php
}