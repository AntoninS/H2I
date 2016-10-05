
<!DOCTYPE HTML>
<html>

<head>
	<title>H2I</title>
	<?php include('./includes/head.php'); ?>
	<link href="./style/inscription.css" media="all" rel="stylesheet " type="text/css" />
</head>



<body>
  <!-- #header -->
  <?php include('./includes/header.php'); ?>

  <!-- body -->
  <div id="warpper" >






    <form method="post" action="envoieFormulaire.php">

        <p><label>Nom</label><input type="text" name="nom" id="nom"/></p>

        <p><label>Prenom</label><input type="text" name="prenom" id="prenom"/></p>

        <p>
        <input type="radio" name="Semestre" value="Semestre 1" id="Semestre 1"/> <label>Semestre 1</label></br>
        <input type="radio" name="Semestre" value="Semestre 2" id="Semestre 2"/> <label>Semestre 2</label></br>
        <input type="radio" name="Semestre" value="Semestre 3" id="Semestre 3"/> <label>Semestre 3</label></br>
        <input type="radio" name="Semestre" value="Semestre 4" id="Semestre 4"/> <label>Semestre 4</label></br>
        </p>
        <p><label>Matière</label>
          <select name="matiere" id="matiere">
          <option value="Mathématiques">Mathématiques</option>
          <option value="Algorithme">Algorithme</option>
          <option value="Anglais">Anglais</option>
          <option value="Linux">Linux</option>
          <option value="Windows">Windows</option>
          <option value="HTML/CSS">HTML/CSS</option>
          </select></p>
        <p><label>Titre</label><input type="text" name="titre" id="titre"/></p>
        <p><label>Cours</label><textarea name="cours" id="cours" /></textarea></p>
        <p><input type="submit" name="envoyer" id="envoyer"/></p>
    </form>





  <!-- #footer -->

  <?php include('./includes/footer.php'); ?>
  </div>

</body>

</html>
