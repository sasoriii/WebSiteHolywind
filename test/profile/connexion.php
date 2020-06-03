<?php
require('../functions.php');?>
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

<div align="center">
    <h2>Connexion</h2>
    <br /><br />
    <form method="POST" action="makeConnexion.php">
        <table>
            <tr>
                <td align="right">
                    <input type="text" name="mailconnect" placeholder="Mail">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <input type="password" name="mdpconnect" placeholder="Mot de passe">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <input type="submit" name="formconnexion" value="Se connecter">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <br />
                    <a href="inscription.php">inscription</a>
                </td>
            </tr>
        </table>
    </form>
</div>

<div style="text-align: center;">
    <?php include_once "../css/footer.php";?>
</div>

</body>
</html>