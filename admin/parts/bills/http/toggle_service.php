<?php
require_once '../../../classes/db.php';
/** @var  $id */

/** @var $db to upldate files*/
$db = new DB();
$id = $_GET['id'];

$db_q = $db->query("bills_parts");
while($item = $db_q -> fetch()){
    if($item['id'] == $id){
        $what = $item['service_finnished'];
        break;
    }
}

if($what) $what = 0;
else $what = 1;

$d = date('d'); $m = date('m'); $y = date('y');
$db->action("UPDATE `bills_parts` SET `service_finnished` = '{$what}',`d_f` = '{$d}',`m_f` = '{$m}',`y_f` = '{$y}' WHERE id = '$id'");


Redirect::to('../../../bill_services.php?path=Administracija&cat=Fakture&what=Pregled%20usluga%20iz%20fakture&icon=fa-map&desc=Pogledajte%20sve%20usluge%20iz%20fakture%20te%20ih%20modifikujte&page='.$_GET["page"].'&hash='.$_GET["hash"]);