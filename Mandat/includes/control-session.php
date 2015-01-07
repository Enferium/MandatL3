<?php
    session_start();
    if ((!isset($_SESSION['pseudo'])) || ($_SESSION['pseudo'] == '')) {
    	echo '<p>Vous devez vous <a href="../connexion.php">connecter</a>.</p>'."\n";
    	exit();
    }
?>