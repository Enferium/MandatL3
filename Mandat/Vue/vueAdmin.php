<?php

$this->titre = "vue Administration";
if(isset($_SESSION)){
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
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=etudiant&page=1">Etudiant</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=pays&page=1">Pays</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=droit&page=1">Droits</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="?action=Admin&tab=diplome&page=1">Diplôme</a></li>
					</ul>
				</div>
			</div>
		</div>
		<br/>

		<?php
		

		if (isset($_GET["tab"]) && $_GET["tab"] =="etudiant" ) {
			if(isset($_GET['page'])) {
				$pageActuelle=intval($_GET['page']);
				if($pageActuelle>$nb_etu) {
     				$pageActuelle=$nb_etu;
     			}
     		} else {
     			$pageActuelle=1;
 			}
 			$premiereEntree=($pageActuelle-1)*10;
			?>
			<div class="container">
				<div class="row">
					<h2 class="text-center">Etudiants</h2>
					<a href="?action=Admin&tab=etudiant&page=1&Action2=ajout" class="btn btn-info" role="button">Ajouter</a>
				</div>
			</div>
			<br/>

			<div class="container">
				<div class="row">
					<table class="table table-striped" >
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Identité Payeur</th>
							<th>Pays</th>
							<th>Diplôme</th>
							<th>Action</th>
						</tr>	
						<?php
						while($rec = $etudiant->fetch(PDO::FETCH_OBJ)){
							echo '<tr>';
							if(isset($_GET['Action2'])&&isset($_GET['id'])){
								if($_GET['Action2']=="modifierEtudiant" && $_GET['id']==$rec->id_etudiant){
									echo'
									<form action="index.php?action=modifierEtudiant&page=',$_GET['page'],'" method="post">
										<input value="',$rec->id_etudiant,'" name="id" type="hidden" id="id" />
										<td><input value="',$rec->nom,'" name="nom" type="text" id="nom" /></td>
										<td><input value="',$rec->prenom,'" name="prenom" type="text" id="prenom" /></td>	
										<td><input value="',$rec->identite_payeur,'" name="identite_payeur" type="text" id="identite_payeur" /></td>';
										echo "<td><select name='nom_fr_fr' id='nom_fr_fr'>";
				        					while ($row = $select_pays->fetch(PDO::FETCH_OBJ)) {
				        						if ($rec->nom_fr_fr == $row->nom_fr_fr) {
				        							echo "<option selected='selected'>$row->nom_fr_fr</option>";
				        						} else {
				         							echo "<option>$row->nom_fr_fr</option>";
				         						} 
				         					} 
				     					echo "</select></td>";
										echo "<td><select name='libele_diplome' id='libele_diplome'>";
				        					while ($row = $select_diplome->fetch(PDO::FETCH_OBJ)) { 
				         						if ($rec->libele_diplome == $row->libele_diplome) {
				        							echo "<option selected='selected'>$row->libele_diplome</option>";
				        						} else {
				         							echo "<option>$row->libele_diplome</option>";
				         						}  
				         					} 
				     					echo "</select></td>";	
										echo '<td><input type="submit" value="Modifier" class="btn btn-xs btn-primary btn-success" /></td>
									</form>';
									}else{
										echo '<td>',$rec->nom,'</td>
										<td>',$rec->prenom,'</td>
										<td>',$rec->identite_payeur,'</td>
										<td>',$rec->nom_fr_fr,'</td>
										<td>',$rec->libele_diplome,'</td>
										<td><a href="index.php?action=Admin&tab=etudiant&page=',$_GET['page'],'&Action2=modifierEtudiant&id=',$rec->id_etudiant,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerEtudiant&page=',$_GET['page'],'&id=',$rec->id_etudiant,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
									}
								} else {
									echo '<td>',$rec->nom,'</td>
										<td>',$rec->prenom,'</td>
										<td>',$rec->identite_payeur,'</td>
										<td>',$rec->nom_fr_fr,'</td>
										<td>',$rec->libele_diplome,'</td>
										<td><a href="index.php?action=Admin&tab=etudiant&page=',$_GET['page'],'&Action2=modifierEtudiant&id=',$rec->id_etudiant,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerEtudiant&page=',$_GET['page'],'&id=',$rec->id_etudiant,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
								}
						}
					if (isset($_GET['Action2'])) {
						if ($_GET['Action2']=="ajout") {
							echo '<form action="index.php?action=ajoutEtudiant&page=',$_GET['page'],'" method="post">';
								?>
								<tr>
									<td><input name="nom" type="text" id="nom" /></td>
									<td><input name="prenom" type="text" id="prenom" /></td>	
									<td><input name="identite_payeur" type="text" id="identite_payeur" /></td>
									<?php
										echo "<td><select name='nom_fr_fr' id='nom_fr_fr'>";
				        					while ($row = $select_pays->fetch(PDO::FETCH_OBJ)) { 
				         						echo "<option>$row->nom_fr_fr</option>"; 
				         					} 
				     					echo "</select></td>";
										echo "<td><select name='libele_diplome' id='libele_diplome'>";
				        					while ($row = $select_diplome->fetch(PDO::FETCH_OBJ)) { 
				         						echo "<option>$row->libele_diplome</option>"; 
				         					} 
				     					echo "</select></td>";
									?>
									<td><input type="submit" value="Ajouter" class="btn btn-xs btn-primary btn-success" /></td>
								</tr>
							</form>
							<?php
						}
					}	
					?>
				</table>
				<?php
				echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
				for($i=1; $i<=$nb_etu; $i++) //On fait notre boucle
				{
				     //On va faire notre condition
				     if($i==$pageActuelle) {
				     	echo ' [ '.$i.' ] '; 
				     }	
				     else {
				     	echo ' <a href="?action=Admin&tab=etudiant&page='.$i.'">'.$i.'</a> ';
				     }
				 }
				 echo '</p>';
				?>
			</div>
		</div>

		<?php
	}

	if (isset($_GET["tab"]) && $_GET["tab"] =="pays" ) {
			if(isset($_GET['page'])) {
				$pageActuelle=intval($_GET['page']);
				if($pageActuelle>$nb_pa) {
     				$pageActuelle=$nb_pa;
     			}
     		} else {
     			$pageActuelle=1;
 			}
 			$premiereEntree=($pageActuelle-1)*10;

			?>
			<div class="container">
				<div class="row">
					<h2 class="text-center">Pays</h2>
					<a href="?action=Admin&tab=pays&page=1&Action2=ajout" class="btn btn-info" role="button">Ajouter</a>
				</div>
			</div>
			<br/>

			<div class="container">
				<div class="row">
					<table class="table table-striped" >
						<tr>
							<th>Code Pays</th>
							<th>Alpha 2</th>
							<th>Alpha 3</th>
							<th>Nom en Anglais</th>
							<th>Nom en Français</th>
							<th>Action</th>
						</tr>	
						<?php
						while($rec = $pays->fetch(PDO::FETCH_OBJ)){
							echo '<tr>';
							if(isset($_GET['Action2'])&&isset($_GET['id'])){
								if($_GET['Action2']=="modifierPays" && $_GET['id']==$rec->id_pays){
									echo'
									<form action="index.php?action=modifierPays&page=',$_GET['page'],'" method="post">
										<input value="',$rec->id_pays,'" name="id" type="hidden" id="id" />
										<td><input value="',$rec->code_pays,'" name="code_pays" type="text" id="code_pays" /></td>
										<td><input value="',$rec->alpha2,'" name="alpha2" type="text" id="alpha2" /></td>	
										<td><input value="',$rec->alpha3,'" name="alpha3" type="text" id="alpha3" /></td>
										<td><input value="',$rec->nom_en_gb,'" name="nom_en_gb" type="text" id="nom_en_gb" /></td>
										<td><input value="',$rec->nom_fr_fr,'" name="nom_fr_fr" type="text" id="nom_fr_fr" /></td>
										<td><input type="submit" value="Modifier" class="btn btn-xs btn-primary btn-success" /></td>
									</form>';
									}else{
										echo '<td>',$rec->code_pays,'</td>
											<td>',$rec->alpha2,'</td>
											<td>',$rec->alpha3,'</td>
											<td>',$rec->nom_en_gb,'</td>
											<td>',$rec->nom_fr_fr,'</td>
										<td><a href="index.php?action=Admin&tab=pays&page=',$_GET['page'],'&Action2=modifierPays&id=',$rec->id_pays,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerPays&page=',$_GET['page'],'&id=',$rec->id_pays,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
									}
								} else {
									echo '<td>',$rec->code_pays,'</td>
										<td>',$rec->alpha2,'</td>
										<td>',$rec->alpha3,'</td>
										<td>',$rec->nom_en_gb,'</td>
										<td>',$rec->nom_fr_fr,'</td>
										<td><a href="index.php?action=Admin&tab=pays&page=',$_GET['page'],'&Action2=modifierPays&id=',$rec->id_pays,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerPays&page=',$_GET['page'],'&id=',$rec->id_pays,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
								}
						}
					if (isset($_GET['Action2'])) {
						if ($_GET['Action2']=="ajout") {
							echo '<form action="index.php?action=ajoutPays&page=',$_GET['page'],'" method="post">';
								?>
								<tr>
									<td><input name="code_pays" type="text" id="code_pays" /></td>
									<td><input name="alpha2" type="text" id="alpha2" /></td>	
									<td><input name="alpha3" type="text" id="alpha3" /></td>
									<td><input name="nom_en_gb" type="text" id="nom_en_gb" /></td>
									<td><input name="nom_fr_fr" type="text" id="nom_fr_fr" /></td>
									<td><input type="submit" value="Ajouter" class="btn btn-xs btn-primary btn-success" /></td>
								</tr>
							</form>
							<?php
						}
					}	
					?>
				</table>
				<?php
				echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
				for($i=1; $i<=$nb_pa; $i++) //On fait notre boucle
				{
				     //On va faire notre condition
				     if($i==$pageActuelle) {
				     	echo ' [ '.$i.' ] '; 
				     }	
				     else {
				     	echo ' <a href="?action=Admin&tab=pays&page='.$i.'">'.$i.'</a> ';
				     }
				 }
				 echo '</p>';
				?>
			</div>
		</div>

		<?php
	}

	if (isset($_GET["tab"]) && $_GET["tab"] =="droit" ) {
			if(isset($_GET['page'])) {
				$pageActuelle=intval($_GET['page']);
				if($pageActuelle>$nb_dr) {
     				$pageActuelle=$nb_dr;
     			}
     		} else {
     			$pageActuelle=1;
 			}
 			$premiereEntree=($pageActuelle-1)*10;
			?>
			<div class="container">
				<div class="row">
					<h2 class="text-center">Droits</h2>
					<a href="?action=Admin&tab=droit&page=1&Action2=ajout" class="btn btn-info" role="button">Ajouter</a>
				</div>
			</div>
			<br/>

			<div class="container">
				<div class="row">
					<table class="table table-striped" >
						<tr>
							<th>Id ENT</th>
							<th>Code Droit</th>
							<th>Mot de Passe</th>
							<th>Action</th>
						</tr>	
						<?php
						while($rec = $droit->fetch(PDO::FETCH_OBJ)){
							echo '<tr>';
							if(isset($_GET['Action2'])&&isset($_GET['id'])){
								if($_GET['Action2']=="modifierDroit" && $_GET['id']==$rec->id_droit){
									echo'
									<form action="index.php?action=modifierDroit&page=',$_GET['page'],'" method="post">
										<input value="',$rec->id_droit,'" name="id" type="hidden" id="id" />
										<td><input value="',$rec->id_ent,'" name="id_ent" id="id_ent" /></td>
										<td><input value="',$rec->code_droit,'" name="code_droit" type="text" id="code_droit" /></td>
										<td><input value="',$rec->mdp,'" name="mdp" type="text" id="mdp" /></td>	
										<td><input type="submit" value="Modifier" class="btn btn-xs btn-primary btn-success" /></td>
									</form>';
									}else{
										echo '<td>',$rec->id_ent,'</td>
											<td>',$rec->code_droit,'</td>
											<td>',$rec->mdp,'</td>
										<td><a href="index.php?action=Admin&tab=droit&page=',$_GET['page'],'&Action2=modifierDroit&id=',$rec->id_droit,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerDroit&page=',$_GET['page'],'&id=',$rec->id_droit,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
									}
								} else {
									echo '<td>',$rec->id_ent,'</td>
										<td>',$rec->code_droit,'</td>
										<td>',$rec->mdp,'</td>
										<td><a href="index.php?action=Admin&tab=droit&page=',$_GET['page'],'&Action2=modifierDroit&id=',$rec->id_droit,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerDroit&page=',$_GET['page'],'&id=',$rec->id_droit,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
								}
						}
					if (isset($_GET['Action2'])) {
						if ($_GET['Action2']=="ajout") {
							echo '<form action="index.php?action=ajoutDroit&page=',$_GET['page'],'" method="post">';
								?>
								<tr>
									<td><input name="id_ent" type="text" id="id_ent" /></td>
									<td><input name="code_droit" type="text" id="code_droit" /></td>	
									<td><input name="mdp" type="text" id="mdp" /></td>
									<td><input type="submit" value="Ajouter" class="btn btn-xs btn-primary btn-success" /></td>
								</tr>
							</form>
							<?php
						}
					}	
					?>
				</table>
				<?php
				echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
				for($i=1; $i<=$nb_dr; $i++) //On fait notre boucle
				{
				     //On va faire notre condition
				     if($i==$pageActuelle) {
				     	echo ' [ '.$i.' ] '; 
				     }	
				     else {
				     	echo ' <a href="?action=Admin&tab=droit&page='.$i.'">'.$i.'</a> ';
				     }
				 }
				 echo '</p>';
				?>
			</div>
		</div>

		<?php
	}




	if (isset($_GET["tab"]) && $_GET["tab"] =="diplome" ) {
			if(isset($_GET['page'])) {
				$pageActuelle=intval($_GET['page']);
				if($pageActuelle>$nb_di) {
     				$pageActuelle=$nb_di;
     			}
     		} else {
     			$pageActuelle=1;
 			}
 			$premiereEntree=($pageActuelle-1)*10;
			?>
			<div class="container">
				<div class="row">
					<h2 class="text-center">Diplômes</h2>
					<a href="?action=Admin&tab=diplome&page=1&Action2=ajout" class="btn btn-info" role="button">Ajouter</a>
				</div>
			</div>
			<br/>

			<div class="container">
				<div class="row">
					<table class="table table-striped" >
						<tr>
							<th>Libellé Diplome</th>
							<th>Action</th>
						</tr>	
						<?php
						while($rec = $diplome->fetch(PDO::FETCH_OBJ)){
							echo '<tr>';
							if(isset($_GET['Action2'])&&isset($_GET['id'])){
								if($_GET['Action2']=="modifierDiplome" && $_GET['id']==$rec->id_diplome){
									echo'
									<form action="index.php?action=modifierDiplome&page=',$_GET['page'],'" method="post">
										<input type="hidden" value="',$rec->id_diplome,'" name="id" id="id" />
										<td><input value="',$rec->libele_diplome,'" name="libele_diplome" type="text" id="libele_diplome" /></td>
										<td><input type="submit" value="Modifier" class="btn btn-xs btn-primary btn-success" /></td>
									</form>';
									}else{
										echo '<td>',$rec->libele_diplome,'</td>
										<td><a href="index.php?action=Admin&tab=diplome&page=',$_GET['page'],'&Action2=modifierDiplome&id=',$rec->id_diplome,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerDiplome&page=',$_GET['page'],'&id=',$rec->id_diplome,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
									}
								} else {
									echo '<td>',$rec->libele_diplome,'</td>
										<td><a href="index.php?action=Admin&tab=diplome&page=',$_GET['page'],'&Action2=modifierDiplome&id=',$rec->id_diplome,'" class="btn btn-xs btn-warning" role="button">Modifier</a>
											<a href="index.php?action=supprimerDiplome&page=',$_GET['page'],'&id=',$rec->id_diplome,'" class="btn btn-xs btn-danger" role="button">Supprimer</a>
										</td>
									</tr>';
								}
						}
					if (isset($_GET['Action2'])) {
						if ($_GET['Action2']=="ajout") {
							echo '<form action="index.php?action=ajoutDiplome&page=',$_GET['page'],'" method="post">';
								?>
								<tr>
									<td><input name="libele_diplome" type="text" id="libele_diplome" /></td>	
									<td><input type="submit" value="Ajouter" class="btn btn-xs btn-primary btn-success" /></td>
								</tr>
							</form>
							<?php
						}
					}	
					?>
				</table>
				<?php
				echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
				for($i=1; $i<=$nb_di; $i++) //On fait notre boucle
				{
				     //On va faire notre condition
				     if($i==$pageActuelle) {
				     	echo ' [ '.$i.' ] '; 
				     }	
				     else {
				     	echo ' <a href="?action=Admin&tab=diplome&page='.$i.'">'.$i.'</a> ';
				     }
				 }
				 echo '</p>';
				?>
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