<?php
require_once '../../../classes/db.php';

// database variable //
$db = new DB();

$host_id    = $_POST['host_id'];
$host_title = $_POST['host_title'];
$host_price = $_POST['host_price'];

array_push($_SESSION['services']['custom_id'],time());
array_push($_SESSION['services']['id'], $host_id);
array_push($_SESSION['services']['what'], 'host');



array_push($_SESSION['services']['title'], $host_title);
array_push($_SESSION['services']['price'], $host_price);

$hash = md5(time());
array_push($_SESSION['services']['custom_hash'], $hash);

//$_SESSION['services']['id'][6];

Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.time());