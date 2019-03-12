<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';

// database variable //
$db = new DB();

$company_user = new User($_SESSION['company_user']);

/** @var $user_id */
$user_id = $company_user->get_id();

/** @var  $hash */
$hash = Input::get('hash');

/* day month year */
$d = date('d'); $m = date('m'); $y = date('y');

/** get total price of bill */

$total = 0;
for($i=0; $i<count($_SESSION['services']['id']); $i++) {
    $total += $_SESSION['services']['price'][$i];
    if($_SESSION['services']['what'][$i] == 'domain' or $_SESSION['services']['what'][$i] == 'host'){
        $y_e = $y + 1; $active = 1;
        $db -> action("INSERT INTO `bills_parts` (`what`,`user_id`,`object_id`,`hash`,`title`,`price`,`active`,`d`,`m`,`y`,`d_e`,`m_e`,`y_e`,`domain_hash`) VALUES ('{$_SESSION['services']['what'][$i]}','{$user_id}','{$_SESSION['services']['id'][$i]}','{$hash}','{$_SESSION['services']['title'][$i]}','{$_SESSION['services']['price'][$i]}','{$active}','{$d}','{$m}','{$y}','{$d}','{$m}','{$y_e}','{$_SESSION['services']['custom_hash'][$i]}') ");
    }else $db -> action("INSERT INTO `bills_parts` (`what`,`user_id`,`object_id`,`hash`,`title`,`price`,`d`,`m`,`y`) VALUES ('{$_SESSION['services']['what'][$i]}','{$user_id}','{$_SESSION['services']['id'][$i]}','{$hash}','{$_SESSION['services']['title'][$i]}','{$_SESSION['services']['price'][$i]}','{$d}','{$m}','{$y}') ");
}

$neto = $total * 0.83;
$pdv  = $total * 0.17;

/** crate bill  **/
$db -> action("INSERT INTO `bills` (`user_id`,`hash`,`total_price`,`neto`,`pdv`,`d`,`m`,`y`) VALUES ('{$user_id}','{$hash}','{$total}','{$neto}','{$pdv}','{$d}','{$m}','{$y}') ");


/** unset all sessions  **/
unset($_SESSION["services"]);
unset($_SESSION["company"]);


/*** create notification ***/
$time   = date('G').':'.date('i');
$header = "FAKTURA";
$text   = "Obavijest o uspješnom kreiranju fakture";
$what   = "bill";


$db -> action("INSERT INTO `notifications` (`user_id`,`header`,`text`,`d`,`m`,`y`,`time`,`what`,`hash`) VALUES ('{$user_id}','{$header}','{$text}','{$d}','{$m}','{$y}','{$time}','{$what}','{$hash}') ");



Redirect::to('../../../bill_create.php?path=Administracija&cat=Fakture&what=Kreirajte%20fakturu&icon=fa-map&desc=Odaberite%20korisnika%20te%20kreirajte%20fakturu%20za%20njega&hash='.time());