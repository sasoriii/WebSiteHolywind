<?php
require('../functions.php');
$orderId = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Holywind</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link href="../css/header.css?<?= microtime() ?>" rel="stylesheet">
    <link href="../css/footer.css?<?= microtime() ?>" rel="stylesheet">
    <link href="../css/accueil.css?<?= microtime() ?>" rel="stylesheet">
</head>

<body>
<header>
    <?php include_once "../css/header.php";?>
</header>

<main>
    <h1 class="text-center">Holyind</h1>
    <h3 class="text-center">Voici le recap de votre commande</h3>
    <table style="border: 1px solid black">
        <tr>
            <td style="border: 1px solid black">ordeline id</td>
            <td style="border: 1px solid black">order id</td>
            <td style="border: 1px solid black">name</td>
            <td style="border: 1px solid black">quantity</td>
            <td style="border: 1px solid black">prix unitaire</td>
            <td style="border: 1px solid black">prix total</td>
        </tr>
        <?php $monfichier = fopen('commande.csv', 'r+')?>
        <?php foreach (getLines($orderId) as $line): ?>
        <tr>
            <td style="border: 1px solid black"><?= $line['order_id']; fputs($monfichier, $line['order_id'])?> </td>
            <td style="border: 1px solid black"><?= $line['orderline_id']; fputs($monfichier, $line['orderline_id'])?> </td>
            <td style="border: 1px solid black"><?= getProductName($line['product_id']); fputs($monfichier, getProductName($line['product_id'])) ?> </td>
            <td style="border: 1px solid black"><?= $line['quantity']; fputs($monfichier, $line['quantity']) ?> </td>
            <td style="border: 1px solid black"><?= getProductPrice($line['product_id']); fputs($monfichier, getProductPrice($line['product_id']))?></td>
            <?php endforeach ?>
            <td style="border: 1px solid black"> </td>
        </tr>

        <tr>
            <td style="border: 1px solid black"> </td>
            <td style="border: 1px solid black"> </td>
            <td style="border: 1px solid black"> </td>
            <td style="border: 1px solid black"> </td>
            <td style="border: 1px solid black"> </td>
            <td style="border: 1px solid black"><?= getTotalOrder($orderId); fputs($monfichier, getTotalOrder($orderId))?> </td>
        </tr>
        <?php fclose($monfichier); ?>
    </table>
    <div>
        <a href="commandes.php">Next </a>
    </div>

</main>

<div style="text-align: center;">
    <?php include_once "../css/footer.php";?>
</div>

<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
</body>
</html>

