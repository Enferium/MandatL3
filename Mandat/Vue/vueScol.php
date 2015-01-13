<?php

$this->titre = "vue Scolarité";
if(isset($_SESSION)){
	if ($_SESSION['droit'] == 1) {		
		
		?>

		<div class="container">
			<div class="row">
				<table class="table table-striped" >
					<tr>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Identité Payeur</th>
					</tr>	
					<?php
					while($rec = $etudiant->fetch(PDO::FETCH_OBJ)){
						echo '<tr>
						<td>',$rec->nom,'</td>
						<td>',$rec->prenom,'</td>
						<td>',$rec->identite_payeur,'</td>
						</tr>';
					}
				?>
			</table>
		</div>
	</div>

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