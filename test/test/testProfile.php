<?php
require('../functions.php');

$pdo = getConnection();


if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $pdo->prepare('SELECT * FROM espace_membre WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    pre($userinfo['pseudo']);
    return $userinfo['pseudo'];
}