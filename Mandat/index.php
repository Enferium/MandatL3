<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
include("includes/identifiants.php");
include("includes/debut.php");
include("includes/menu.php");
include("includes/footer.php");


?>