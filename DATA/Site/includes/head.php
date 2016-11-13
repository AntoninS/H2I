
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="language" content="fr" />
		<link href="./style/header.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/footer.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/globalcss.css" media="all" rel="stylesheet " type="text/css" />
		<script type="text/javascript" src="./scripts/jquery-1.12.3.js"></script>

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

				$("#s1").click(function(e)
					{
						$('#coursS1').toggle();
					});
				$("#s2").click(function(e)
					{
						$('#coursS2').toggle();
					});
				$("#s3").click(function(e)
					{
						$('#coursS3').toggle();
					});
				$("#s4").click(function(e)
					{
						$('#coursS4').toggle();
					});

					$('#zoneClick').click(function(e)
						{
							$('#menuDeroulant').slideToggle();
						});
					$('#header,#sousheader,#warpper').click(function(e)
						{
							var pos = document.getElementById('menuDeroulant').style.display ='none' ;
						});


		});

		//Gérer le scroll
		/*
		$(window).scroll(function (event) {
		    var scroll = $(window).scrollTop();
				if( scroll >20)
				{
					var pos = document.getElementById('header').style.top ='-40px' ;
					var pos = document.getElementById('header').style.opacity ='0.9' ;


				}else
				{
					var pos = document.getElementById('header').style.top ='0px' ;
					var pos = document.getElementById('header').style.opacity ='1' ;
				}
		});
		*/

		$(document).ready(function() {
		    var s = $("#sousheader");
		    var pos = s.position();

		    $(window).scroll(function() {
		        var windowpos = $(window).scrollTop();
						var bot = "margin-bottom";
		        if (windowpos >= pos.top) {
		            s.addClass("fixed");
								var sousHeader = document.getElementById('sousheader').style.position ='fixed' ;
								var sousHeader = document.getElementById('sousheader').style.top ='0px' ;
								var corpsAccueil = document.getElementById('warpper').style.marginTop ='40px' ;

		        } else {
							var sousHeader = document.getElementById('sousheader').style.position ='relative' ;
							var corpsAccueil = document.getElementById('warpper').style.marginTop ='00px' ;

		        }
		    });
		});






		</script>
