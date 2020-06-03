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
    <link href="/css/header.css?<?php echo microtime() ?>" rel="stylesheet">
    <link href="/css/footer.css?<?php echo microtime() ?>" rel="stylesheet">
    <link href="/css/accueil.css? <?php echo microtime() ?>" rel="stylesheet">
</head>

<body>
<header>
    <?php include_once "/var/www/test/css/header.php";?>
</header>

<main>

    <h1 class="text-center">Holywind</h1>
    <h3 class="text-center">Bienvenue sur la boutique !</h3>

    <?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=holywind_db;charset=utf8', 'holywindtest', 'holywindmdp');
}
catch(Exception $e)
{
	// si error on affiche un message et arrête tout
        die('Erreur : '.$e->getMessage());
}

    $reponse = $bdd->query('SELECT * FROM product');

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
        ?>
        <div   class="w-25"

        <p>
            <strong> <?php echo $donnees['product_id']; ?> </strong> : <?php echo 'l\'aile est une ',$donnees['product_name']; ?><br />
          <?php echo '<a href="product.php"> <img src="/img/' . $donnees["product_img"] . '"></a>  '?>
            Le prix est de <?php echo $donnees['product_price']; ?> euros !<br />
            <a href="/panier/ajouter.php?product_id=<?= $donnees['product_id'] ?>">Ajouter au panier</a>
        </p>

        </div>
        <?php

    }

    $reponse->closeCursor(); // Termine le traitement de la requête




?>



</main>


    <?php include_once "/var/www/test/css/footer.php";

    ?>


<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
</body>
</html><?php
