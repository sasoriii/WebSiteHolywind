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
    <link href="/css/accueil.css? <?= microtime() ?>" rel="stylesheet">
</head>

<body>
<header>
    <?php include_once "../css/header.php";?>
</header>

    <table style="width: 400px">
        <tr>
            <td colspan="4">Votre panier</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>Quantite</td>
            <td>Prix unitaire</td>
        </tr>

        <?php  $nbArticles = getNbItemsInCart(); ?>
        <?php if ($nbArticles <= 0): ?>
            <tr>
                <td>Votre panier est vide </td>
            </tr>
        <?php endif ?>
        <?php foreach (getCartLines() as $line): ?>
            <tr>
                <td><?= getProductName($line['product_id']) ?></td>
                <td><?= $line['product_quantity'] ?></td>
                <td><?= getProductPrice($line['product_id'])?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <div>
        <a href="formulaire.php">Next </a>
    </div>

    <div style="text-align: center;">
        <?php include_once "../css/footer.php";?>
    </div>

</body>
</html>