<?php
require('../functions.php');

$pdo = getConnection();

$id = $_GET['id'];
$userinfo = getProfile($id);
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
    <table>
        <div align="center">
        <tr>
            <td align="center">
                Profil de <?= $userinfo['pseudo']?>
            </td>
        </tr>
        <tr>
            <td>
                Mail : <?= $userinfo['mail']?>
            </td>
        </tr>
        <tr>
            <td align="right">
                <a href="editProfil.php">Editer mon profil</a>
            </td>
        </tr>
        <tr>
                <td align="right">
                    <a href="deconnexion.php">Se déconnecter</a>
                </td>
        </tr>
        </div>
    </table>
<div style="text-align: center;">
    <?php include_once "../css/footer.php";?>
</div>
</body>
</html>
