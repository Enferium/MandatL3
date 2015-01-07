<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=mandat', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>