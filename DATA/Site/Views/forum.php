<<<<<<< HEAD

=======
>>>>>>> master
<?php
		$title='Forum';
		$pageCSS='forum';
		ob_start(); //mise en tempon début

		echo '

			';

		$content = ob_get_contents(); //récuprération du tempon dons une var
		ob_end_clean(); // vide le tempon
		require_once("Views/layout.php"); //appelle layout avec le nouveau content
?>
