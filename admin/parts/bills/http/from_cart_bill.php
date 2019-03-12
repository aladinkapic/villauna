<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';
require_once '../../../classes/services.php';
require_once '../../../classes/domains.php';

$db = new DB();
$user = new User($_SESSION['ID']);
$ajdi = $user->get_id();

$cart_q = $db->query("cart");

/* day month year */
$d = date('d'); $m = date('m'); $y = date('y');
$hash   = time();
$total  = 0;

while($item = $cart_q -> fetch()){
    if($item['user_id'] == $user->get_id() and !$item['bought']){
        $total += ($item['price'] * $item['how_many']);
        if(!$item['exist'] and $item['what'] == 'service'){
            $service = new Service($item['item_id']);

            $what      = $item['what'];
            $user_id   = $user->get_id();
            $object_id = $item['item_id'];
            $title     = $service->get_title();
            $price     = $item['price'];

            $db -> action("INSERT INTO `bills_parts` (`what`,`user_id`,`object_id`,`hash`,`title`,`price`,`d`,`m`,`y`) VALUES ('{$what}','{$user_id}','{$object_id}','{$hash}', '{$title}', '{$price}', '{$d}', '{$m}', '{$y}') ");
        }else if(!$item['exist'] and $item['what'] == 'domain'){
            $domain = new Domain($item['item_id']);

            $what      = $item['what'];
            $user_id   = $user->get_id();
            $object_id = $item['item_id'];
            $title     = $item['title'];
            $price     = $item['price'];
            $how_many  = $item['how_many'];
            $active    = 1;
            $y_e       = $y + $item['how_many'];

            $new_hash = $item['domain_hash'];

            $db -> action("INSERT INTO `bills_parts` (`what`,`user_id`,`object_id`,`hash`,`title`,`price`,`d`,`m`,`y`,`active`,`how_many`,`d_e`,`m_e`,`y_e`,`domain_hash`) VALUES ('{$what}','{$user_id}','{$object_id}','{$hash}', '{$title}', '{$price}', '{$d}', '{$m}', '{$y}', '{$active}', '{$how_many}', '{$d}', '{$m}', '{$y_e}', '{$new_hash}') ");
        }else if(!$item['exist'] and $item['what'] == 'host'){
            $host = new Hosting($item['item_id']);

            $what      = $item['what'];
            $user_id   = $user->get_id();
            $object_id = $item['item_id'];
            $title     = $host->get_title();
            $price     = $item['price'];
            $active    = 1;
            $how_many  = $item['how_many'];
            $y_e = $y + $how_many;

            $new_hash = $item['domain_hash'];

            $db -> action("INSERT INTO `bills_parts` (`what`,`user_id`,`object_id`,`hash`,`title`,`price`,`d`,`m`,`y`,`active`,`how_many`,`d_e`,`m_e`,`y_e`,`domain_hash`) VALUES ('{$what}','{$user_id}','{$object_id}','{$hash}', '{$title}', '{$price}', '{$d}', '{$m}', '{$y}', '{$active}', '{$how_many}', '{$d}', '{$m}', '{$y_e}', '{$new_hash}') ");

        }else if($item['exist'] and ($item['what'] == 'domain' or $item['what'] == 'host')){

            $what      = $item['what'];
            $user_id   = $user->get_id();
            $object_id = $item['item_id'];
            $title     = $item['title'];
            $price     = $item['price'];
            $how_many  = $item['how_many'];

            $old_id = $item['exist'];
            $bills_q = $db->query("bills_parts");
            while($bill = $bills_q -> fetch()){
                if($bill['id'] == $old_id){
                    $n_d = $bill['d'];
                    $n_m = $bill['m'];
                    $n_y = $bill['y'];
                    $n_b = $bill['y_e'];
                    $active = 0;

                    $db->action("UPDATE `bills_parts` SET `active` = '{$active}' WHERE id = '$old_id'");
                    break;
                }
            }

            $active = 1;
            $y_e = $n_b + $how_many;

            $db -> action("INSERT INTO `bills_parts` (`what`,`user_id`,`object_id`,`hash`,`title`,`price`,`d`,`m`,`y`,`active`,`how_many`,`d_e`,`m_e`,`y_e`) VALUES ('{$what}','{$user_id}','{$object_id}','{$hash}', '{$title}', '{$price}', '{$n_d}', '{$n_m}', '{$n_y}', '{$active}', '{$how_many}', '{$n_d}', '{$n_m}', '{$y_e}') ");

        }
    }
}

$neto = $total * 0.83;
$pdv  = $total * 0.17;


/** crate bill  **/
$db -> action("INSERT INTO `bills` (`user_id`,`hash`,`total_price`,`neto`,`pdv`,`d`,`m`,`y`) VALUES ('{$user_id}','{$hash}','{$total}','{$neto}','{$pdv}','{$d}','{$m}','{$y}') ");

/** delete from cart **/

$bought = 1;
$db->action("UPDATE `cart` SET `bought` = '{$bought}' WHERE user_id = '$ajdi'");


/*** create notification ***/
$time   = date('G').':'.date('i');
$header = "FAKTURA";
$text = 'Korisnik <a href="user_preview.php?path=Osobni%20podaci&cat=Korisnici&what=John%20Doe&icon=fa-users&desc=Pregled%20korisnika%20te%20njihovih%20faktura&user_id='.$user->get_id().'">'.$user->get_name().'</a> je kreirao fakturu !';
//$text   = 'Korisnik <a href="user_preview.php?path=Osobni%20podaci&cat=Korisnici&what=John%20Doe&icon=fa-users&desc=Pregled%20korisnika%20te%20njihovih%20faktura&user_id=".$user->get_id().'"'.$user->get_name().' je kreirao fakturu !';
$what   = "bill";
$admin  = 1;


$db -> action("INSERT INTO `notifications` (`user_id`,`admin`,`header`,`text`,`d`,`m`,`y`,`time`,`what`,`hash`) VALUES ('{$ajdi}','{$admin}','{$header}','{$text}','{$d}','{$m}','{$y}','{$time}','{$what}','{$hash}') ");




/**** change status of cart ****/

?>

<div class="pdv_part">
    <div class="pdv_value">
        <p>PDV @ 17.00% : 0 KM</p>
    </div>
</div>

<div class="finnish_order">
    <div class="finnis_button" onclick="finnisn_order();">
        <p>ZAVRŠITE NARUDŽBU</p>
    </div>
    <div class="total_amount">
        <p>UKUPNO <span>0 KM</span></p>
        <input type="hidden" id="number_of_items" value="0">
    </div>
    <div class="payment_method">
        <p>
            Uplata na žiro račun broj 0243358556788646
            <i class="fas fa-money-check-alt"></i>
        </p>
    </div>
</div>
