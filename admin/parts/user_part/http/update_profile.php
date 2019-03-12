<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';

$db = new DB();


$id              = $_POST['id'];
$name            = $_POST['name'];
$surname         = $_POST['surname'];
$email           = $_POST['email'];
$password        = $_POST['password'];
$address          = $_POST['adress'];
$phone           = $_POST['phone'];


$db->action("UPDATE `users` SET `email` = '{$email}', `password` = '{$password}', `name` = '{$name}', `surname` = '{$surname}', `adress` = '{$address}', `phone` = '{$phone}'  WHERE id = '$id'");

Redirect::to('../../../profile.php?path=Osobni%20podaci&cat='.$name.'%20'.$surname.'&what=Uredite%20Vaš%20profil&icon=fa-network-wired&desc=Izmijenite%20osobne%20podatke,%20kako%20vaše%20tako%20i%20vaše%20kompanije');