
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="language" content="fr" />
		<link href="./style/header.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/footer.css" media="all" rel="stylesheet " type="text/css" />
		<link href="./style/globalcss.css" media="all" rel="stylesheet " type="text/css" />
		<script type="text/javascript" src="./scripts/jquery-1.12.3.js"></script>


<!-- POUR LE DATEPICKER DE LA PAGE ajoutTutorat-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="./scripts/jquery.ui.datepicker-fr.js"></script>

		<script>
			$(function() {
				$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );			<!--TODO : griser les dates passées -->
			});
		</script>


		<!-- POUR LE TIMEPICKER -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

		<script>
			$(document).ready(function(){
			    $("#timepicker").timepicker({
					timeFormat: 'HH:mm',
			    interval: 60,
			    minTime: '08:00',
			    maxTime: '19:00',
			    defaultTime: '08:00',
			    startTime: '08:00',
			    dynamic: false,
			    dropdown: true,
			    scrollbar: true});
			});

		</script>



<!-- -->





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
						$('#coursS1').slideToggle("fast");
					});
				$("#s2").click(function(e)
					{
						$('#coursS2').slideToggle("fast");
					});
				$("#s3").click(function(e)
					{
						$('#coursS3').slideToggle("fast");
					});
				$("#s4").click(function(e)
					{
						$('#coursS4').slideToggle("fast");
					});

					$('#zoneClick').click(function(e)
						{
							$('#menuDeroulant').slideToggle("fast");
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
