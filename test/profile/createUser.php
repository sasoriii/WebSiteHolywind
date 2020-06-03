<?php
require('../functions.php');

$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);
$mail2 = htmlspecialchars($_POST['mail2']);
$mdp = sha1($_POST['mdp']);
$mdp2 = sha1($_POST['mdp2']);


if ( ! isset($_POST['forminscription']))
{
    throw new Exception("missing form");
}

if ( ! isPseudoValid($_POST['pseudo']))
{
    throw new Exception("Pseudo invalide");
}

if (empty($_POST['mail']))
{
    throw new Exception("mail vide");
}
if (! isEmailAvailable($_POST['mail'])) {
    throw new Exception("mail invalide");
}

if (empty($_POST['mail2']))
{
    throw new Exception("mail 2 vide");
}
if (! isEmailAvailable($_POST['mail2']))
{
    throw new Exception("mail2 invalide");
}

if (($_POST['mail']) != ($_POST['mail2']))
{
    throw new Exception("mail diff de mail2");
}

if ( empty($_POST['mdp']))
{
    throw new Exception("mdp vide");
}

if ( empty($_POST['mdp2']))
{
    throw new Exception("mdp vide2");
}

if (($_POST['mdp']) != ($_POST['mdp2']))
{
    throw new Exception("mdp diff mdp 2");
}

createUser($pseudo, $mail, $mdp);

header("Location: /profile/connexion.php");