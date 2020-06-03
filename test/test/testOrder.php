<?php
require('../functions.php');

addToCart(1);
addToCart(3);
addToCart(2);

$cart = getCart();
pre($cart);

$email = 'montest';

//pre($email);

$orderId = createOrder($cart, $email);
//var_dump($orderId);






