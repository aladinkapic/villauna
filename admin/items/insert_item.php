<?php
require_once '../../classes/db.php'; $db = new DB();

$parent      = $_POST['parent'];
$cat_id      = $_POST['category'];
$what_action = $_POST['what_action']; // if true - UPDATE; else INSERT

$title       = $_POST['title'];
$availablity = $_POST['availablity'];
$hash        = $_POST['hash'];
$vpc         = $_POST['vpc'];
$mpc         = $_POST['mpc'];
$discount    = $_POST['discount'];
$producer    = $_POST['producer'];
$details     = $_POST['short_details'];

if($cat_id == 32 or $cat_id == 33){
    $specific_details = ' '.$_POST['processor'].';|;'.' '.$_POST['graphic_cart'].';|;'.' '.$_POST['ram'].';|;'.' '.$_POST['hard_disc'].';|;'.' '.$_POST['power'].';|;'.' '.$_POST['os'];
}else if($cat_id == 34){
    $specific_details = ' '.$_POST['screen_size'].';|;'.' '.$_POST['resolution'].';|;'.' '.$_POST['light'].';|;'.' '.$_POST['angle'].';|;'.' '.$_POST['response'].';|;'.' '.$_POST['connectors'];
}else if($cat_id == 36){
    $specific_details = ' '.$_POST['screen_size'].';|;'.' '.$_POST['processor'].';|;'.' '.$_POST['ram'].';|;'.' '.$_POST['hdd'].';|;'.' '.$_POST['graphic_card'].';|;'.' '.$_POST['os'];
}else if($cat_id == 70){
    $specific_details = ' '.$_POST['os'].';|;'.' '.$_POST['screen_size'].';|;'.' '.$_POST['cpu'].';|;'.' '.$_POST['screen_res'].';|;'.' '.$_POST['cam_back'].';|;'.' '.$_POST['cam_front'].';|;'.' '.$_POST['ram'].';|;'.' '.$_POST['internal_memory'].';|;'.' '.$_POST['battery'].';|;'.' '.$_POST['color'];
}else if($cat_id == 72){
    $specific_details = ' '.$_POST['os'].';|;'.' '.$_POST['screen_size'].';|;'.' '.$_POST['cpu'].';|;'.' '.$_POST['screen_res'].';|;'.' '.$_POST['cam_back'].';|;'.' '.$_POST['cam_front'].';|;'.' '.$_POST['ram'].';|;'.' '.$_POST['internal_memory'];
}else if($cat_id == 76){
    $specific_details = ' '.$_POST['screen_size'].';|;'.' '.$_POST['screen_res'].';|;'.' '.$_POST['network'].';|;'.' '.$_POST['tuners'].';|;'.' '.$_POST['os'];
}else if($cat_id == 79){
    $specific_details = ' '.$_POST['resolution'].';|;'.' '.$_POST['lcd'].';|;'.' '.$_POST['video'].';|;'.' '.$_POST['battery'];
}

if($what_action){
    $db->action("UPDATE `all_items` SET `title` = '{$title}',`availablity` = '{$availablity}',`vpc` = '{$vpc}',`mpc` = '{$mpc}',`discount` = '{$discount}',`producer` = '{$producer}',`specific_details` = '{$specific_details}',`short_details` = '{$details}' WHERE id = '$what_action'");

    Redirect::to('../preview_item.php?path=Moj%20app&cat=Kategorije%20artikala&what=Game%20Računari&icon=fa-home&desc=Pregled%20glavnih%20kategorija%20artikala%20..&id='.$what_action.'&category='.$cat_id);
}else{
    $db -> action("INSERT INTO `all_items` (`parent`,`category`,`title`,`availablity`,`hash`,`vpc`,`mpc`,`discount`,`producer`,`specific_details`,`short_details`) VALUES ('{$parent}', '{$cat_id}', '{$title}', '{$availablity}', '{$hash}', '{$vpc}', '{$mpc}', '{$discount}', '{$producer}', '{$specific_details}', '{$details}') ");

    Redirect::to('../insert_item.php?path=Moj%20app&cat=Kategorije%20artikala&what=Game%20Računari&icon=fa-home&desc=Pregled%20glavnih%20kategorija%20artikala%20..&id='.$cat_id."&parent=".$parent);
}