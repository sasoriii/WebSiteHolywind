<?php
require('../functions.php');

$sql = "select * from `order`, `orderline` where order_id= orderline_id";

$products = selectRows($sql);

var_dump($products);
