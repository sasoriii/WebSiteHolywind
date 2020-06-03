<?php
require('../functions.php');
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
    <link href="/css/accueil.css?<?= microtime() ?>" rel="stylesheet">
</head>

<body>
<header>
    <?php include_once "/var/www/test/css/header.php";?>
</header>

<main>
    <h1 class="text-center">Holywind</h1>
    <h3 class="text-center">Le kite shop de pornichet !</h3>

    <form name="inscription" method="post" action="createOrder.php">
    Entrez votre mail : <input type="text" name="email"/> <br/>
    Entrez votre code cb : <input type="text" name="codecb"/><br/>
    <input type="submit" name="valider" value="OK"/>
    </form>

    <div style="text-align: center;">
        <?= include_once "/var/www/test/css/footer.php"?>
    </div>


    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
</body>
</html>