<?php 
if($this->titre != "Connexion" && $this->titre != "Récépissé"){
  include(dirname(__FILE__).'/../includes/menu.php');
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <link href="/ProjetTuteureL3/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/ProjetTuteureL3/style.css" rel="stylesheet">

  <title><?= $titre ?></title>   <!-- Élément spécifique -->
  <?php

  include(dirname(__FILE__).'/../includes/functions.php');
  include(dirname(__FILE__).'/../includes/constants.php');
  ?>
</head>
<body>
  <div id="contenu">
    <?= $contenu ?>   <!-- Élément spécifique -->
  </div>
</body>
</html>

