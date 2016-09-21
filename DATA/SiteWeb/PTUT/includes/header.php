<header id="header" class="hidden">


		<div class="bh1" > <a href=""> Se déconnecter </a> </div>
		<div class="bh2"> <a href=""> <img class="account"  alt="account" src="media/images/account.png" />  <p>Bienvenue  &nbsp; Antonin ! </p> <img class="flecheMonCompte"  alt="account" src="media/images/fleche.png" />   </a> </div>
		<a href="http://www.universite-lyon.fr/" title="Universités de Lyon"> <img class="univ"  alt="Universités de Lyon"  src="media/images/comue.png"/> </a>
		<a href="http://iut.univ-lyon1.fr/" title="IUT lyon 1"> <img title="IUT lyon 1" alt="IUT" class="iut"  src="media/images/lyon1.png"/> </a>

		<nav id="sousheader">
					<a title="Accueil" href="index.php"><img class='home'  alt="Accueil" src="media/images/home.png"/></a>
					<a class="bsh1" href="cours.php">Cours</a>
					<a class="bsh2" href="">Forum</a>
					<a class="bsh3" href="">Tutorats</a>


					<form id="search">
						<input  type="image"   id="loupe"  alt="recherche" class="loupe" src="media/images/loupe.png"/>
						<input class="bsh4" id="bsh4" type="search"  autocomplete="on" placeholder="rechercher"/>
					</form>
		</nav>

</header>


<script type="text/javascript">

$('document').ready(function(){

	$("#search").click(function(e)
		{
			$(this).addClass('anim1');
		});

	$("#bsh4").click(function(e)
		{
			$(this).addClass('anim2');
		});

	$("#warpper").click(function(e)
		{
			$("#bsh4").removeClass('anim2');
			$("#search").removeClass('anim1');
		});

});

//Gérer le scroll

$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
		if( scroll >150)
		{
			var pos = document.getElementById('header').style.top ='-40px' ;
			var pos = document.getElementById('header').style.opacity ='0.9' ;


		}else
		{
			var pos = document.getElementById('header').style.top ='0px' ;
			var pos = document.getElementById('header').style.opacity ='1' ;
		}
});

</script>
