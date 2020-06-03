<?php
require('functions.php');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Holywind</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link href="/css/header.css?<?= microtime() ?>" rel="stylesheet">
    <link href="/css/footer.css?<?= microtime() ?>" rel="stylesheet">
    <link href="/css/accueil.css? <?= microtime() ?>" rel="stylesheet">
  </head>

  <body>
  	<header>
  		<?php include_once "css/header.php";
  		nombreVue();
  		?>
  	</header>

  	<main>
        <h1 class="text-center">Holywind</h1>
        <h3 class="text-center">Le kite shop de pornichet !</h3>
        <div class="container">
            <iframe width="900" height="500" src="https://www.youtube.com/embed/JF3pLnjj2Qo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </main>

    <div style="text-align: center;">
	<?php include_once "css/footer.php";?>
    </div>

    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
  </body>
</html>