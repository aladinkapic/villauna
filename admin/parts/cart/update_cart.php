<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';
require_once '../../classes/services.php';
require_once '../../classes/domains.php';
$db = new DB(); $db_q = $db->query("cart");


$id = $_POST['id'];
$what = $_POST['what'];

while($cart = $db_q -> fetch()){
    if($cart['id'] == $id){
        if($what == 'increment'){
            $value = ($cart['how_many'] + 1);
            $db->action("UPDATE `cart` SET `how_many` = '{$value}' WHERE id = '$id'");
            break;
        }else if($what == 'decrement'){
            if(($cart['how_many'] - 1) >= 1){
                $value = ($cart['how_many'] - 1);
                $db->action("UPDATE `cart` SET `how_many` = '{$value}' WHERE id = '$id'");
                break;
            }
        }else if($what == 'delete'){
            $db->action("DELETE FROM `cart` WHERE id = $id ");
            break;
        }
    }
}

$user = new User($_SESSION['ID']);

$total_price = 0; $number_of_items = 0; $cart_q = $db->query("cart");

while($cart_items = $cart_q -> fetch()){
    if($cart_items['user_id'] == $user->get_id() and !$cart_items['bought']){
        $number_of_items ++;

        if($cart_items['what'] == "service"){
            $service = new Service($cart_items['item_id']);
            $total_price += $cart_items['price'] * $cart_items['how_many'];
            ?>
            <div class="single_cart_item">
                <div class="cart_h_name cart_h_huge">
                    <div class="cart_h_name_image">
                        <i class="fas <?php echo $cart_items['icon']; ?>"></i>
                    </div>
                    <div class="cart_h_article_name">
                        <h4><?php echo $service->get_title(); ?></h4>
                        <p></p>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p><?php echo $service->get_price(); ?> KM</p>
                </div>
                <div class="cart_h_name cart_h_middle">
                    <div class="input_wrapper input_wrapper_small" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'decrement');">
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="input_wrapper input_wrapper_huge">
                        <input type="text" value="<?php echo $cart_items['how_many']; ?> " readonly class="article_value">
                    </div>
                    <div class="input_wrapper input_wrapper_small input_wrapper_small2" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'increment');">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p><?php echo $cart_items['price'] * $cart_items['how_many']; ?> KM</p>
                </div>
                <div class="delete_item" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'delete');">
                    <p>OBRIŠITE</p>
                </div>
            </div>
            <?php
        }else if($cart_items['what'] == "domain"){
            $dom_n = new Domain($cart_items['item_id']);
            $total_price += $cart_items['price'] * $cart_items['how_many'];
            ?>
            <div class="single_cart_item">
                <div class="cart_h_name cart_h_huge">
                    <div class="cart_h_name_image">
                        <i class="fas <?php echo $cart_items['icon']; ?>"></i>
                    </div>
                    <div class="cart_h_article_name">
                        <h4><?php echo $cart_items['title']; ?></h4>
                        <p>Registracija domene <?php echo $cart_items['title']; ?> na period od <?php echo $cart_items['how_many']; ?> god.</p>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p><?php echo $cart_items['price']; ?> KM</p>
                </div>
                <div class="cart_h_name cart_h_middle">
                    <div class="input_wrapper input_wrapper_small" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'decrement');">
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="input_wrapper input_wrapper_huge">
                        <input type="text" value="<?php echo $cart_items['how_many']; ?> " readonly class="article_value">
                    </div>
                    <div class="input_wrapper input_wrapper_small input_wrapper_small2" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'increment');">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p><?php echo $cart_items['price'] * $cart_items['how_many']; ?> KM</p>
                </div>
                <div class="delete_item" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'delete');">
                    <p>OBRIŠITE</p>
                </div>
            </div>
            <?php
        }else if($cart_items['what'] == "host"){
            $host = new Hosting(($cart_items['item_id']));
            $total_price += $cart_items['price'] * $cart_items['how_many'];
            ?>
            <div class="single_cart_item">
                <div class="cart_h_name cart_h_huge">
                    <div class="cart_h_name_image">
                        <i class="fas <?php echo $cart_items['icon']; ?>"></i>
                    </div>
                    <div class="cart_h_article_name">
                        <h4><?php echo $cart_items['title']; ?></h4>
                        <p>Registracija hostinga <?php echo $cart_items['title']; ?> na period od <?php echo $cart_items['how_many']; ?> god.</p>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p><?php echo $cart_items['price']; ?> KM</p>
                </div>
                <div class="cart_h_name cart_h_middle">
                    <div class="input_wrapper input_wrapper_small" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'decrement');">
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="input_wrapper input_wrapper_huge">
                        <input type="text" value="<?php echo $cart_items['how_many']; ?> " readonly class="article_value">
                    </div>
                    <div class="input_wrapper input_wrapper_small input_wrapper_small2" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'increment');">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p><?php echo $cart_items['price'] * $cart_items['how_many']; ?> KM</p>
                </div>
                <div class="delete_item" onclick="change_in_cart('<?php echo $cart_items["id"]; ?>', 'delete');">
                    <p>OBRIŠITE</p>
                </div>
            </div>
            <?php
        }
    }
}
?>

<div class="pdv_part">
    <div class="pdv_value">
        <p>PDV @ 17.00% : <?php echo $total_price*0.17; ?> KM</p>
    </div>
</div>

<div class="finnish_order">
    <div class="finnis_button" onclick="finnisn_order();">
        <p>ZAVRŠITE NARUDŽBU</p>
    </div>
    <div class="total_amount">
        <p>UKUPNO <span><?php echo $total_price; ?> KM</span></p>
        <input type="hidden" id="number_of_items" value="<?php echo $number_of_items; ?>">
    </div>
    <div class="payment_method">
        <p>
            Uplata na žiro račun broj 0243358556788646
            <i class="fas fa-money-check-alt"></i>
        </p>
    </div>
</div>
