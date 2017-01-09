<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title> <?php echo $title ?> </title>
    <?php require("./includes/head.php"); ?>
    <link rel="stylesheet" media="screen" type="text/css" title="Exemple"  <?php echo ' href="./style/'.$pageCSS.'.css"'; ?>/>
  </head>


  <body>
    <?php require("./includes/header.php"); ?>
    <div id="zoneClick"></div>
    <div id="menuDeroulant">
      <ul>
        <?php echo '<li><a href="index.php?page=monCompte&compte='.$utilisateurID.'">Mon compte</a></li>';?>
		<?php echo '<li><a href="index.php?page=groupe&compte='.$utilisateurID.'">Mon groupe</a></li>';?>
        <li><a href="">Paramètres</a></li>
        <li><a href="">Aide</a></li>
        <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
      </ul>
    </div>


    <div id="warpper">
          <?php echo $content;
          require("./includes/footer.php"); ?>

    </div>


  </body>


</html>
