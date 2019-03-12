<?php
require_once '../../../classes/db.php';

$_SESSION['company'] = $_POST['title'];
$_SESSION['company_user'] = $_POST['ajdi'];

/** sessions of services **/
unset($_SESSION["services"]);
$_SESSION['services'] = array('custom_id' => array(),'title' => array(), 'what' => array(), 'id' => array(), 'price' => array(), 'custom_hash' => array());



Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.$_POST['time']);