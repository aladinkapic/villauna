<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$user = new User(); $db = new DB();

$message = $_POST['message'];
$ip_addr = $user->get_ip();
$admin   = $_POST['admin'];

$date = date('d').'. '.date('m').'. '.date('y').' '.date('H').' : '.date('i');
if(!empty($message)) $db->action("INSERT INTO `messages` (`message`,`from_who`,`admin`,`time`) VALUES ('{$message}','{$ip_addr}','{$admin}','{$date}') ");

$message_q = $db->query("messages");

while($msg = $message_q -> fetch()){
    if($msg['from_who'] == $user->get_ip()){
        if($msg['admin']){
            ?>
            <div class="message left_message">
                <div class="img_w">
                    <img src="admin/images/customer-support.png" alt="">
                </div>
                <div class="message_p">
                    <p><?php echo $msg['message']; ?></p>
                </div>
            </div>
            <?php
        }else{
            ?>
            <div class="message right_message">
                <div class="message_p">
                    <p><?php echo $msg['message']; ?></p>
                </div>
            </div>
            <?php
        }
    }
}