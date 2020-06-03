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
<div align="center">
    <h2>Inscription</h2>
    <br /><br />
    <form method="POST" action="createUser.php">
        <table>
            <tr>
                <td align="right">
                    <label for="pseudo">Pseudo :</label>
                </td>
                <td>
                    <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo"/>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail">Mail :</label>
                </td>
                <td>
                    <input type="email" placeholder="Votre mail" id="mail" name="mail"/>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mail2">Confirmation du mail :</label>
                </td>
                <td>
                    <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2"/>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp">Mot de passe :</label>
                </td>
                <td>
                    <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mdp2">Confirmation du mot de passe :</label>
                </td>
                <td>
                    <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center">
                    <br />
                    <input type="submit" name="forminscription" value="Je m'inscris"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center">
                    <br />
                    <a href="connexion.php">Me connecter</a>
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