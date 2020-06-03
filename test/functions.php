<?php
session_start();

function addToCart(int $productId) {
    if ( ! isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    getProduct($productId, true);

    $line = [];
    $line['product_quantity'] = 1;
    $line['product_id'] = $productId;


    if (isset($_SESSION['panier'][$productId])) {
        $_SESSION['panier'][$productId]['product_quantity']++;
    } else {
        $_SESSION['panier'][$productId] = $line;
    }

    return true;
}

function getNbItemsInCart()
{
    return count($_SESSION['panier']);
}

function getCartLines(): array
{
    return getCart();
}

function getCart(): array
{
    return $_SESSION['panier'] ?? [];
}

function createOrder($cart, $email): int
{
    $bdd = getConnection();
    $sth = $bdd->prepare("
            INSERT INTO `order` (email)
            VALUES(:email)");
    $sth->bindParam(':email',$email);

    $sth->execute();
    $orderId = $bdd->lastInsertId();

    foreach ($cart as $cartLine) {

        $bdd = getConnection();
        $sth = $bdd->prepare("
            INSERT INTO `orderline` (product_id, quantity, order_id)
            VALUES(:product_id , :product_quantity, :last_id)");
        $sth->bindParam(':product_id',$cartLine['product_id']);
        $sth->bindParam(':product_quantity', $cartLine['product_quantity']);
        $sth->bindParam(':last_id', $orderId);
        $sth->execute();
    }

    return $orderId;

}

function getLines(int $orderId)
{
    $sql = "SELECT * FROM orderline WHERE order_id=$orderId";
    $lines = selectRows($sql);
    return $lines;
}

function getOrders()
{
    $sql = "SELECT * FROM `order` ORDER BY order_id";
    $lines = selectRows($sql);
    return $lines;
}

function countOrderLines(int $orderId): int
{
    $sql = "SELECT COUNT(orderline_id)  AS cnt FROM orderline WHERE order_id=$orderId";
    $line = selectOneRow($sql);
    return $line['cnt'];
}

function countLines()
{
    $sql = "SELECT order_id FROM `order` ";
    $lines = selectRows($sql);
    pre(count($lines));
    return (count($lines));
}

function getProduct($productId, $throw = false): ?array
{
    $sql = "SELECT * FROM product WHERE product_id = $productId";

    $product = selectOneRow($sql);

    if ($throw && ! $product) {
        throw new Exception("product $productId not exist");
    }

    return $product ?: null;
}

function getProductName(int $productId): ?string
{
    $row = getProduct($productId);

    return $row ? $row['product_name'] : null;
}

function getProductPrice(int $productId): ?int
{
    $row = getProduct($productId);

    return $row ? $row['product_price'] : null;
}

function getTotalOrder($orderId)
{
    $total = 0;
    $lines = getLines($orderId);

    foreach ($lines as $line)
    {
        $productPrice = getProductPrice($line['product_id']);
        $quantity = $line['quantity'];
        $totalLine = $productPrice * $quantity;
        $total = $total + $totalLine;
    }
    return $total;
}

function selectRows($sql): ?array
{
    $connection = getConnection();
    $sth = $connection->prepare($sql);
    $sth->execute();

    $rows = $sth->fetchAll();
    return $rows;
}

function selectOneRow($sql): ?array
{
    $connection = getConnection();
    $sth = $connection->prepare($sql);
    $sth->execute();

    $row =  $sth->fetch();

    return $row ?: null;
}

function getConnection()
{
    $pdo = new PDO('mysql:host=localhost;dbname=holywind_db;charset=utf8', 'holywindtest', 'holywindmdp');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
}

function pre($var)
{
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function resetCard()
{
    $_SESSION['panier'] = [];
}

function nombreVue()
{
    $monfichier = fopen('fichier.csv', 'r+');
    $pages = 0;
    $pages = fgets($monfichier);
    $pages += 1;
    fseek($monfichier, 0);
    fputs($monfichier, $pages);
    fclose($monfichier);
    pre($pages);
}

function getProfile($id)
{
    $pdo = getConnection();
    $requser = $pdo->prepare('SELECT * FROM espace_membre WHERE id = ?');
    $requser->execute(array($id));
    $userinfo = $requser->fetch();
    return $userinfo;

}

function getConnect($mailconnect, $mdpconnect)
{
    $pdo = getConnection();
    $requser = $pdo->prepare("SELECT * FROM espace_membre WHERE mail = ? AND motdepasse = ?");
    $requser->execute(array($mailconnect, $mdpconnect));
    $userexist = $requser->rowCount();
    return $userexist;
}

function getInfoProfil($mailconnect, $mdpconnect)
{
    $pdo = getConnection();
    $requser = $pdo->prepare("SELECT * FROM espace_membre WHERE mail = ? AND motdepasse = ?");
    $requser->execute(array($mailconnect, $mdpconnect));
    $userinfo = $requser->fetch();
    return $userinfo;
}

function isEmailAvailable($mail){
    $pdo = getConnection();
    $reqmail = $pdo->prepare("SELECT * FROM espace_membre WHERE mail = ?");
    $reqmail->execute(array($mail));
    $mailexist = $reqmail->rowCount();
    return $reqmail->rowCount() == 0;
}

function isPseudoValid($pseudo)
{
    $pseudolength = strlen($pseudo);
    if ($pseudolength == 0 ){
        return false;
    }
    if ($pseudolength > 255){
        return false;
    }
    else return true;
}

function createUser($pseudo, $mail, $mdp)
{
    $pdo = getConnection();
    $insertmbr = $pdo->prepare("INSERT INTO espace_membre(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
    $insertmbr->execute(array($pseudo, $mail, $mdp));
}