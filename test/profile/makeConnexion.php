<?php
require('../functions.php');
session_destroy();
session_start();
$mailconnect = htmlspecialchars($_POST['mailconnect']);
$mdpconnect = sha1($_POST['mdpconnect']);

if(! isset($_POST['formconnexion'])) {
    throw new Exception("missing form");
}

if(empty($_POST['mailconnect']) )
{
    throw new Exception("pas de mail");
}

if(empty($_POST['mdpconnect']) )
{
    throw new Exception("pas de mdp");
}

if(!empty($mailconnect) AND !empty($mdpconnect))
{
    $userexist = getConnect($mailconnect, $mdpconnect);
}
else{
    throw new Exception("missing form");
}

if($userexist == 1) {
    $userinfo = getInfoProfil($mailconnect, $mdpconnect);

    $_SESSION['id'] = $userinfo['id'];
    $_SESSION['pseudo'] = $userinfo['pseudo'];
    $_SESSION['mail'] = $userinfo['mail'];
    header("Location: profil.php?id=".$_SESSION['id']);
}
else{
    throw new Exception("missing form");
}
