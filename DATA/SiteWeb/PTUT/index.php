<!doctype html >
<html >

	<?php include('./includes/head.php'); ?>

	<body>

		<!-- #header -->

		<?php include('./includes/header.php'); ?>

		<!-- body -->
		<div id="warpper" class="accueil">


		<nav id="corpsAccueil">


			<div id="box1">

			<div id="bandeau" >
			<h1>Derniers cours</h1>
			</div>

				<div id="boxCoursAccueil">
					<h2>Mathématiques</h2>
					<hr color="#dcdcdc">
					<p>Semestre 1 Chapitre 3:</p>
					<p>Les prédicas</p>
					<p>Monsieur Jaloux</p>
				</div>

				<hr width="70%" color="#dcdcdc">

				<div id="boxCoursAccueil">
					<h2>Java</h2>
					<hr color="#dcdcdc">
					<p>Semestre 2 Chapitre 7:</p>
					<p>Les notifications</p>
					<p>Monsieur Belkathir</p>
				</div>

				<hr width="70%" color="#dcdcdc">

				<div id="boxCoursAccueil">
					<h2>Architecture des ordiateurs</h2>
					<hr color="#dcdcdc">
					<p>Semestre 2 Chapitre 6:</p>
					<p>Les interuptions</p>
					<p>Monsieur Mrissa</p>
				</div>

				<a href=""><b>+</b>Demande de cours</a>

			</div>

			<div id="box2">

				<div id="bandeau" >
				<h1>Derniers topics</h1>
				</div>

				<div id="bulle">
				</div>

				<hr width="70%" color="#dcdcdc">

				<div id="bulle">
				</div>

				<hr width="70%" color="#dcdcdc">

				<div id="bulle">
				</div>

				<a href=""><b>+</b>Nouveau topic</a>

			</div>


			<div id="box3">

				<div id="bandeau" >
				<h1>Tutorat</h1>
				</div>

				<div id="boxTutoratAccueil">
				</div>

				<hr width="70%" color="#dcdcdc">

				<div id="boxTutoratAccueil">
				</div>

				<hr width="70%" color="#dcdcdc">

				<div id="boxTutoratAccueil">
				</div>

				<a href=""><b>+</b>Demande de tutorat</a>

			</div>

		</nav>

		<a  href="" >Calculer ma moyenne</a>

		<!-- #footer -->

		<?php include('./includes/footer.php'); ?>
		</div>

	</body>

</html>

<script type="text/javascript">

var $document = $(document),
    $element = $('header'),
    $className = 'hidden';

$document.scroll(function() {
  if ($document.scrollTop() >= 100) {

    $element.addClass(className);
  } else {
    $element.removeClass(className);
  }

</script>
