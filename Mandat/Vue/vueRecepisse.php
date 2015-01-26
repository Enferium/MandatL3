<?php

$this->titre = "Récépissé";
if(isset($_SESSION)){
	if ($_SESSION['droit'] == 1) {
		
		?>

		<div class="container">
			<div class="row">
				<?php
				while($rec = $recepisse->fetch(PDO::FETCH_OBJ)){
					echo'<a href="index.php?action=supprimerRecepisse&id=',$rec->id_recepisse,'&fichier=',$rec->chemin,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>';
					echo $rec->chemin,'<br>';

				}
				?>
			</div>
		</div>


<?php
echo '<form method="POST" action="../includes/upload.php?id=',$_GET['id'],'&nb=',$nb,'" enctype="multipart/form-data">';
?>
     <input type="hidden" name="MAX_FILE_SIZE" value="500000">
     Fichier : <input type="file" name="uploadRecipisse">
     <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>	


		<?php





	} else {
		?>
		Vous n'avez pas les droits pour acc&egrave;der &agrave; cette page !
		<?php
	}
} else {
	?>
	Veuillez vous connecter
	<?php
}
?>