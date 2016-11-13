<?php
		$title='Mon compte';
		$pageCSS='moncompte';
		ob_start(); //mise en tempon début

		echo '
        <div id="corpsMonCompte">

          <div id="boxInfoUser">
          <section>
            <img class="usr" src="./media/images/usr.png"/>
            <ul>

              <li><h2>Antonin Spontak</h2></li>
              <li>G1S3</li>
              <li>Kywiks</li>
              <li>06.52.32.65.96</li>
            </ul>
            </section>
            <p>jdsj</p>
          </div>

          <div id="coursTopics">

            <div class = "coursConsultes">
              <h3>Mes cours</h3>
            </div>

            <div class ="topicsConsultes">
              <h3>Mes topics</h3>
            </div>

          </div>

        </div>
			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
