<?php
require('../functions.php');
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=holywind_db;charset=utf8', 'holywindtest', 'holywindmdp');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


$req = $pdo->prepare('INSERT INTO chat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));


header('Location: /chat/chat.php');
