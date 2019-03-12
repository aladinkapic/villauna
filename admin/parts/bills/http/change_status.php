<?php
require_once '../../../classes/db.php';
/** @var  $id */
$id = $_GET['id'];

/** @var $db to upldate files*/
$db = new DB();
$what = $_GET['what'];

$db->action("UPDATE `bills` SET `paid` = '{$what}' WHERE id = '$id'");

$items_q = $db->query("bills");

while($item = $items_q -> fetch()){
    if($item['id'] == $id){
        $hash = $item['hash'];
        break;
    }
}

$d = date('d'); $m = date('m'); $y = date('y');
$db->action("UPDATE `bills_parts` SET `paid` = '{$what}',`d` = '{$d}',`m` = '{$m}',`y` = '{$y}' WHERE hash = '$hash'");


Redirect::to('../../../bill_preview.php?path=Administracija&cat=Fakture&what=Pregled%20faktura&icon=fa-map&desc=Pregled%20faktura%20te%20njihovog%20stanja&page='.$_GET['page']);