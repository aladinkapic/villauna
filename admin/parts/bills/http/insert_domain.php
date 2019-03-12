<?php
require_once '../../../classes/db.php';

// database variable //
$db = new DB();

$domain_id    = $_POST['domain_id'];
$domain_ext   = $_POST['domain_ext'];
$domain_price = $_POST['domain_price'];


array_push($_SESSION['services']['custom_id'],time());
array_push($_SESSION['services']['id'], $domain_id);
array_push($_SESSION['services']['what'], 'domain');


array_push($_SESSION['services']['title'], $domain_ext);
array_push($_SESSION['services']['price'], $domain_price);

$hash = md5(time());
array_push($_SESSION['services']['custom_hash'], $hash);

//$_SESSION['services']['id'][6];

Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.time());