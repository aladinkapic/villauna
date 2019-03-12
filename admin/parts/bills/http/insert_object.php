<?php
require_once '../../../classes/db.php';

// database variable //
$db = new DB();

$service_id = $_POST['service_id'];

array_push($_SESSION['services']['custom_id'],time());
array_push($_SESSION['services']['id'], $service_id);
array_push($_SESSION['services']['what'], 'service');

$services_q = $db->query('service_categories');
while($service = $services_q -> fetch()){
    if($service['id'] == $service_id){
        array_push($_SESSION['services']['title'], $service['title']);
        array_push($_SESSION['services']['price'], $service['price']);

        $hash = md5(time());
        array_push($_SESSION['services']['custom_hash'], $hash);
        break;
    }
}


//$_SESSION['services']['id'][6];

Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.$_POST['time']);