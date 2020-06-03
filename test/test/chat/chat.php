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
<header>
    <?php include_once "../css/header.php";
    ?>
</header>
<style>
    form
    {
        text-align:center;
    }
</style>

<body>
<form action="chat_post.php" method="post">
    <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br/>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br/>
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=holywind_db;charset=utf8', 'holywindtest', 'holywindmdp');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


$reponse = $pdo->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT 0, 10');


while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
<button class="button"><a href="Message.php">Afficher tous les messages</a></button>
<div style="text-align: center;">
    <?php include_once "../css/footer.php";

    ?>
</div>
</body>
</html>