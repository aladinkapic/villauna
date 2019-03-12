<?php
require_once '../../classes/db.php';
require_once '../../classes/cart.php';
$db = new DB();

$user_id  = $_POST['user_id'];
$item_id  = $_POST['item_id'];
$what     = $_POST['what'];
$how_many = $_POST['how_many'];
$price    = $_POST['price'];
$icon     = $_POST['icon'];
$exists   = $_POST['exists'];
$title    = $_POST['title'];

if($what == 'domain'){
    $hash = md5(time());

    $db -> action("INSERT INTO `cart` (`user_id`,`how_many`,`item_id`,`title`,`what`,`price`,`icon`,`exist`,`domain_hash`) VALUES ('{$user_id}','{$how_many}','{$item_id}','{$title}','{$what}','{$price}','{$icon}','{$exists}','{$hash}') ");
}else{
    $db -> action("INSERT INTO `cart` (`user_id`,`how_many`,`item_id`,`title`,`what`,`price`,`icon`,`exist`) VALUES ('{$user_id}','{$how_many}','{$item_id}','{$title}','{$what}','{$price}','{$icon}','{$exists}') ");
}


$cart = new Cart($user_id );

echo $cart->number_of_articles($user_id);

