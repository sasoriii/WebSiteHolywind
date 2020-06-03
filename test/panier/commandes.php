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
    <link href="../css/header.css?<?= microtime() ?>" rel="stylesheet">
    <link href="../css/footer.css?<?= microtime() ?>" rel="stylesheet">
    <link href="../css/accueil.css? <?= microtime() ?>" rel="stylesheet">
</head>

<body>
<header>
    <?php include_once "../css/header.php";?>
</header>

<main>
    <h1 class="text-center">Holyind</h1>
    <h3 class="text-center">Voici le recap de toutes les commande</h3>

    <?php
    countLines();
    ?>

    <table style="border: 1px solid black">
        <tr>
            <td style="border: 1px solid black">order id</td>
            <td style="border: 1px solid black">orderline quantity</td>
            <td style="border: 1px solid black">Prix total/ order</td>
            <td style="border: 1px solid black">Détails par commande</td>
        </tr>
        <form name="redirection" method="post" action="">
            <?php foreach (getOrders() as $line): ?>
            <tr>
                <td style="border: 1px solid black"><?= $line['order_id']; ?> </td>
                <td style="border: 1px solid black"><?= countOrderLines($line['order_id']); ?></td>
                <td style="border: 1px solid black"><?= getTotalOrder($line['order_id'])?></td>
                <td style="border: 1px solid black" ><a href="bonCommande.php?id=<?= $line['order_id']?>">details</a></td>
            <?php endforeach ?>
                <td style="border: 1px solid black"> </td>
             </tr>
        </form>
    </table>
</main>

<div style="text-align: center;">
    <?php include_once "../css/footer.php";?>
</div>

<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
</body>
</html>

