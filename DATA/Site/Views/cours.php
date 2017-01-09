<?php
		$title='Cours';
		$pageCSS='cours';
		ob_start(); //mise en tempon début

		echo '
		<nav id="boxCours">



				<h2 id="s1">Semestre 1</h2>

				<div id="coursS1">

					<a href=""><span class="cours">
						<div class="iconCours"><img src="./media/images/iconmaths.png" /></div>
						<div class="liencours">Mathématiques</div>
					</span></a>

					<a href=""><span class="cours">
						<div class="iconCours"><img src="./media/images/iconalgo.png" /></div>
						<div class="liencours">Algo</div>
					</span></a>

					<a href=""><span class="cours">
						<div class="iconCours"><img src="./media/images/iconc.png" /></div>
						<div class="liencours">C</div>
					</span></a>

					<a href=""><span class="cours">
						<div class="iconCours"><img src="./media/images/iconlinux.png" /></div>
						<div class="liencours">SE Linux</div>
					</span></a>

					<a href=""><span class="cours">
						<div class="iconCours"><img src="./media/images/iconenglish.png" /></div>
						<div class="liencours">Anglais</div>
					</span></a>

			</div>


			<h2 id="s2">Semestre 2</h2>
			<div id="coursS2">
				<a href=""><span class="cours">
					<div class="iconCours"><img src="./media/images/iconmaths.png" /></div>
					<div class="liencours">Mathématiques</div>
				</span></a>

				<a href=""><span class="cours">
					<div class="iconCours"><img src="./media/images/iconalgo.png" /></div>
					<div class="liencours">Algo</div>
				</span></a>

				<a href=""><span class="cours">
					<div class="iconCours"><img src="./media/images/iconc.png" /></div>
					<div class="liencours">C</div>
				</span></a>

				<a href=""><span class="cours">
					<div class="iconCours"><img src="./media/images/iconlinux.png" /></div>
					<div class="liencours">SE Linux</div>
				</span></a>

				<a href=""><span class="cours">
					<div class="iconCours"><img src="./media/images/iconenglish.png" /></div>
					<div class="liencours">Anglais</div>
				</span></a>
			</div>

			<h2 id="s3">Semestre 3</h2>
			<div id="coursS3" class="afficherCours">
			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconmaths.png" /></div>
				<div class="liencours">Mathématiques</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconalgo.png" /></div>
				<div class="liencours">Algo</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconc.png" /></div>
				<div class="liencours">C</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconlinux.png" /></div>
				<div class="liencours">SE Linux</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconenglish.png" /></div>
				<div class="liencours">Anglais</div>
			</span></a>
			</div>

			<h2 id="s4">Semestre 4</h2>
			<div id="coursS4">
			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconmaths.png" /></div>
				<div class="liencours">Mathématiques</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconalgo.png" /></div>
				<div class="liencours">Algo</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconc.png" /></div>
				<div class="liencours">C</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconlinux.png" /></div>
				<div class="liencours">SE Linux</div>
			</span></a>

			<a href=""><span class="cours">
				<div class="iconCours"><img src="./media/images/iconenglish.png" /></div>
				<div class="liencours">Anglais</div>
			</span></a>
			</div>

		</nav>

			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content



?>
