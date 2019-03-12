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
            <div class="single_message">
                <div class="single_message_img">
                    <img src="images/customer-support.png" alt="">
                </div>
                <div class="message_text">
                    <p><?php echo $msg['message']; ?></p>
                </div>
            </div>

            <?php
        }else{
            ?>
            <div class="single_message single_message_right">
                <div class="single_message_img">
                    <img src="images/man-user.png" alt="">
                </div>
                <div class="message_text">
                    <p><?php echo $msg['message']; ?></p>
                </div>
            </div>
            <?php
        }
    }
}