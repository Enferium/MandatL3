<?php

$this->titre = "vue Scolarité";
if(isset($_SESSION)){
	if ($_SESSION['droit'] == 1) {		
		
		?>

			<div class="container">
				<div class="row">
					<h2 class="text-center">Etudiants</h2>
					<a href="?action=Scol&Action2=ajout&page=1" class="btn btn-info" role="button">Ajouter</a>
				</div>
			</div>
			<br/>

			<?php
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
					<table class="table table-striped" >
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
							<th>Identité Payeur</th>
							<th>Pays</th>
							<th>Diplôme</th>
							<th>Récépissé</th>
							<td>Action</td>
						</tr>	
						<?php
						while($rec = $etudiant->fetch(PDO::FETCH_OBJ)){
							echo '<tr>';
									echo '<td>',$rec->nom,'</td>
										<td>',$rec->prenom,'</td>
										<td>',$rec->identite_payeur,'</td>
										<td>',$rec->nom_fr_fr,'</td>
										<td>',$rec->libele_diplome,'</td>
										<td>
											<a href="/ProjetTuteureL3/index.php?action=Rece&id=',$rec->id_etudiant,'" data-target="#myModal" data-toggle="modal">Voir</a>
										</td>
										<td><button href="/ProjetTuteureL3/index.php" type="button" class="btn btn-xs btn-success" disabled="disabled">Ajouter</button></td>
							</tr>';
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
									<td><input name="recepisse" type="OnverraPlusTard" id="recepisse" /></td>
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


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Récipissé</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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