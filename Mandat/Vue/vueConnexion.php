<?php
$this->titre = 'Connexion';
if (!isset($res)) //On est dans la page de formulaire
{
	?>
	<div style="padding-top:70px" class="row">
	<div class="col-md-4 col-md-offset-4">
		<form method="post" action="index.php?action=Connexion1" class="well">
			<legend>Connectez-vous</legend>
			<div class="form-group">
				<label for="pseudo" style="width:110px; display: inline-block; text-align:right">Identifiant:</label>
				<input name="pseudo" type="text" id="pseudo"/>
			</div>
			<div class="form-group">
				<label for="password" style="width:110px; display: inline-block; text-align:right">Mot de passe:</label>
				<input type="password" name="password" id="password" />
			</div>
			<div class="form-group">
				<label style="width:110px"></label>
				<input type="submit" value="Connexion" class="btn btn-primary btn-success"></input>
			</div>
		</form>

	</div>
</div>
</body>
</html>
<?php
}
else
{	
	if($res!=false){
		$message='';

		$_SESSION['pseudo'] = $res->id_ent;
		$_SESSION['droit'] = $res->code_droit;
		if($_SESSION['droit']==3) header('Location: index.php?action=Admin');
		elseif ($_SESSION['droit']==2)header('Location: index.php?action=Gestion');
		elseif ($_SESSION['droit']==1)header('Location: index.php?action=Scol');
		exit();
	}
	else // Acces pas OK !
	{
		$message = '<p>Une erreur s\'est produite 
		pendant votre identification.<br /> Le mot de passe ou le pseudo 
		entré n\'est pas correct.</p><p>
		Cliquez <a href="./index.php">ici</a> 
		pour revenir à la page d accueil</p>';
	}
	echo $message.'</div></body></html>';
}

?>