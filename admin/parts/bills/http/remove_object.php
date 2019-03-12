<?php
require_once '../../../classes/db.php';

// database variable //
$db = new DB();

$service_id = $_POST['removed_object'];

//array_push($_SESSION['services']['id'], $service_id);

$new_array = array('custom_id' => array(),'title' => array(), 'what' => array(), 'id' => array(), 'price' => array());

for($i=0; $i<count($_SESSION['services']['id']); $i++){
    if($_SESSION['services']['custom_id'][$i] != $service_id){
        array_push($new_array['id'], $_SESSION['services']['id'][$i]);
        array_push($new_array['custom_id'], $_SESSION['services']['custom_id'][$i]);
        array_push($new_array['what'], $_SESSION['services']['what'][$i]);
        array_push($new_array['title'], $_SESSION['services']['title'][$i]);
        array_push($new_array['price'], $_SESSION['services']['price'][$i]);
    }
}

//for($i=0; $i<count($_SESSION['services']['id']); $i++){
//    if($_SESSION['services']['id'][$i] == $service_id){
//        echo $service_id;
//        array_splice($_SESSION['services']['id'], $i, 1);
//    }
//}

unset($_SESSION['services']);

$_SESSION['services'] = $new_array;


Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.$_POST['time']);