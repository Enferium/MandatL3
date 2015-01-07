<?php

function __autoload($class_name) {
	include $class_name . '.php';
}

$etu =  new ModeleEtudiant();
$etudiant = $etu->getEtudiants();

$pa =  new ModelePays();
$pays = $pa->getCountry();

$dr =  new ModeleDroits();
$droit = $dr->getDroits();

$di =  new ModeleDiplome();
$diplome = $di->getDiplomes();

include(dirname(__FILE__).'/vue_admin.php');