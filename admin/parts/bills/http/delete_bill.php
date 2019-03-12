<?php
require_once '../../../classes/db.php';
/** @var  $id */
$id = $_GET['id'];

/** @var $db to upldate files*/
$db = new DB();
$items_q = $db->query("bills");

while($item = $items_q -> fetch()){
    if($item['id'] == $id){
        $hash = $item['hash'];
        break;
    }
}


$db->action("DELETE FROM `bills_parts` WHERE hash = $hash ");
$db->action("DELETE FROM `bills` WHERE id = $id ");
$db->action("DELETE FROM `notifications` WHERE hash = $hash ");


Redirect::to('../../../bill_preview.php?path=Administracija&cat=Fakture&what=Pregled%20faktura&icon=fa-map&desc=Pregled%20faktura%20te%20njihovog%20stanja&page='.$_GET['page']);