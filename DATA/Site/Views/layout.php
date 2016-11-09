<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title> <?php echo $title ?> </title>
    <?php require("./includes/head.php"); ?>
    <link rel="stylesheet" media="screen" type="text/css" title="Exemple"  <?php echo ' href="./style/'.$pageCSS.'.css"'; ?>/>
  </head>


  <body>
    <?php require("includes/header.php"); ?>

    <div id="warpper">
          <section> <?php echo $content; ?> </section>
          <?php require("includes/footer.php"); ?>
    </div>




  </body>


</html>
