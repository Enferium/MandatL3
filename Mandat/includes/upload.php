<?php
$dossier = '../recepisse/';
$fichier = basename($_FILES['uploadRecipisse']['name']);
$taille_maxi = 500000;
$taille = filesize($_FILES['uploadRecipisse']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['uploadRecipisse']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier =$_GET['id']."-".($_GET['nb']+1).$extension;
     if(move_uploaded_file($_FILES['uploadRecipisse']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          header('Location: ../index.php?action=ajoutRecepisse&fichier='.$fichier.'&id='.$_GET['id']);
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>
