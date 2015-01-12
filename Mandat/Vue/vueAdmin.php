<?php

$this->titre = "vue Administration";
if($_SESSION){
	if ($_SESSION['droit'] == 3) {
		?>

		<div class="container">
			<div class="row">
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						Choix de la table à modifier
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=etudiant">Etudiant</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=pays">Pays</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=droit">Droits</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=diplome">Diplome</a></li>
					</ul>
				</div>
			</div>
		</div>


		<?php
		


		if (isset($_GET["tab"]) && $_GET["tab"] =="etudiant" ) {
			?>
			<div class="container">
				<div class="row">
					<div class="btn-group" role="group" aria-label="...">
						<a href="?action=Admin&tab=etudiant&Action2=ajout" class="btn btn-info" role="button">Ajouter</a>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<table class="table table-striped" >
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Identité Payeur</th>
							<th>Action</th>
						</tr>	
						<?php
						while($rec = $etudiant->fetch(PDO::FETCH_OBJ)){
							echo '<tr>';
							if(isset($_GET['Action2'])&&isset($_GET['id'])){
								if($_GET['Action2']=="modifierEtudiant" && $_GET['id']==$rec->id_etudiant){
									echo'
									<form action="index.php?action=modifierEtudiant" method="post">
										<input value="',$rec->id_etudiant,'" name="id" type="hidden" id="id" />
										<td><input value="',$rec->nom,'" name="nom" type="text" id="nom" /></td>
										<td><input value="',$rec->prenom,'" name="prenom" type="text" id="prenom" /></td>	
										<td><input value="',$rec->identite_payeur,'" name="identite_payeur" type="text" id="identite_payeur" /></td>
										<td><input type="submit" value="Modifier" class="btn btn-xs btn-primary btn-success" /></td>
									</form>';
									}else{
										echo '<td>',$rec->nom,'</td>
										<td>',$rec->prenom,'</td>
										<td>',$rec->identite_payeur,'</td>
										<td><a href="index.php?action=Admin&tab=etudiant&Action2=modifierEtudiant&id=',$rec->id_etudiant,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerEtudiant&id=',$rec->id_etudiant,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
									}
								} else {
									echo '<td>',$rec->nom,'</td>
										<td>',$rec->prenom,'</td>
										<td>',$rec->identite_payeur,'</td>
										<td><a href="index.php?action=Admin&tab=etudiant&Action2=modifierEtudiant&id=',$rec->id_etudiant,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerEtudiant&id=',$rec->id_etudiant,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
								}
						}
					if (isset($_GET['Action2'])) {
						if ($_GET['Action2']=="ajout") {
							?>
							<form action="index.php?action=ajoutEtudiant" method="post">
								<tr>
									<td><input name="nom" type="text" id="nom" /></td>
									<td><input name="prenom" type="text" id="prenom" /></td>	
									<td><input name="identite_payeur" type="text" id="identite_payeur" /></td>
									<td><input type="submit" value="Ajouter" class="btn btn-xs btn-primary btn-success" /></td>
								</tr>
							</form>
							<?php
						}
					}	
					?>
				</table>
			</div>
		</div>

		<?php
	}

	if (isset($_GET["tab"]) && $_GET["tab"] =="pays" ) {
		?>
		<div class="container">
			<div class="row">
				<div class="btn-group" role="group" aria-label="...">
					<a href="#" class="btn btn-info" role="button">Ajouter</a>
					<a href="#" class="btn btn-warning" role="button">Modifier</a>
					<a href="#" class="btn btn-danger" role="button">Supprimer</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<table class="table table-striped" >
					<tr>
						<th>Id Pays</th>
						<th>Code Pays</th>
						<th>Alpha 2</th>
						<th>Alpha 3</th>
						<th>Nom en Anglais</th>
						<th>Nom en Français</th>
					</tr>	
					<?php
					while($rec = $pays->fetch(PDO::FETCH_OBJ)){
						echo '
						<tr>
							<td>',$rec->id_pays,'</td>
							<td>',$rec->code_pays,'</td>
							<td>',$rec->alpha2,'</td>
							<td>',$rec->alpha3,'</td>
							<td>',$rec->nom_en_gb,'</td>
							<td>',$rec->nom_fr_fr,'</td>
						</tr>';
					}
					?>
				</table>
			</div>
		</div>
		<?php
	}



	if (isset($_GET["tab"]) && $_GET["tab"] =="droit" ) {
		?>
		<div class="container">
			<div class="row">
				<div class="btn-group" role="group" aria-label="...">
					<a href="#" class="btn btn-info" role="button">Ajouter</a>
					<a href="#" class="btn btn-warning" role="button">Modifier</a>
					<a href="#" class="btn btn-danger" role="button">Supprimer</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<table class="table table-striped" >
					<tr>
						<th>Id ENT</th>
						<th>Code Droit</th>
						<th>Mot de Passe</th>
					</tr>	
					<?php
					while($rec = $droit->fetch(PDO::FETCH_OBJ)){
						echo '
						<tr>
							<td>',$rec->id_ent,'</td>
							<td>',$rec->code_droit,'</td>
							<td>',$rec->mdp,'</td>
						</tr>';
					}
					?>
				</table>
			</div>
		</div>
		<?php
	}




	if (isset($_GET["tab"]) && $_GET["tab"] =="diplome" ) {
		?>
		<div class="container">
			<div class="row">
				<div class="btn-group" role="group" aria-label="...">
					<a href="#" class="btn btn-info" role="button">Ajouter</a>
					<a href="#" class="btn btn-warning" role="button">Modifier</a>
					<a href="#" class="btn btn-danger" role="button">Supprimer</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<table class="table table-striped" >
					<tr>
						<th>Id diplome</th>
						<th>Libellé Diplome</th>
					</tr>	
					<?php
					while($rec = $diplome->fetch(PDO::FETCH_OBJ)){
						echo '
						<tr>
							<td>',$rec->id_diplome,'</td>
							<td>',$rec->libele_diplome,'</td>
						</tr>';
					}
					?>
				</table>
			</div>
		</div>
		<?php
	}

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