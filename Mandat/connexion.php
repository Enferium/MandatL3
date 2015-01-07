<?php
session_start();
include(dirname(__FILE__).'/includes/identifiants.php');
include(dirname(__FILE__).'/includes/header.php');
include(dirname(__FILE__).'/includes/menu.php');

?>

<?php
if (!isset($_POST['pseudo'])) //On est dans la page de formulaire
{
	?>
		<form method="post" action="connexion.php">
			<fieldset>
				<legend>Connexion</legend>
				<p>
					<label for="pseudo">Id ENT :</label><input name="pseudo" type="text" id="pseudo" /><br />
					<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
				</p>
			</fieldset>
				<p>
					<input type="submit" value="Connexion" />
				</p>
		</form>	 
		</div>
		</body>
		</html>
	<?php
}
else
{
    $message='';
    if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $query=$db->prepare('SELECT id_ent, code_droit, mdp
        FROM droits WHERE id_ent = :pseudo');
        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
	if ($data['mdp'] == $_POST['password']) // Acces OK !
	{
	    $_SESSION['pseudo'] = $data['id_ent'];
	    $_SESSION['droit'] = $data['code_droit'];
	    $message = '<p>Bienvenue '.$data['id_ent'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correct.</p><p>Cliquez <a href="./connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    $query->CloseCursor();
    }
    echo $message.'</div></body></html>';

}
?>