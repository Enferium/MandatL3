<?php
session_start();
require 'Controleur/Routeur.php';

$routeur = new Routeur();
$routeur->routerRequete();


include(dirname(__FILE__).'/includes/footer.php');