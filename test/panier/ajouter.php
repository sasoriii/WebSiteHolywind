<?php
require('../functions.php');

$productId = $_GET['product_id'];

addToCart($productId);

header('Location: /panier/panier.php');
exit;
