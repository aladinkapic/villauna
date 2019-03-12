<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$db = new DB();

$to_who   = $_POST['to_who'];
$from_who = $_POST['from_who'];


$messages_q = $db->query("messages");
while($message = $messages_q -> fetch()){
    if(($message['from_who'] == $to_who and $message['to_who'] == $from_who) || ($message['to_who'] == $to_who and $message['from_who'] == $from_who)){
        if($message['from_who'] == $to_who and $message['to_who'] == $from_who){
            $image_user = new User($to_who);
            ?>
            <div class="single_message">
                <div class="single_message_img">
                    <img src="uploaded_images/<?php echo $image_user->get_image(); ?>" alt="">
                </div>
                <div class="message_text">
                    <p><?php echo $message['message']; ?></p>
                </div>
            </div>
            <?php
        }else{
            $user = new User($from_who);
            ?>
            <div class="single_message single_message_right">
                <div class="single_message_img">
                    <img src="uploaded_images/<?php echo $user->get_image(); ?>" alt="">
                </div>
                <div class="message_text">
                    <p><?php echo $message['message']; ?></p>
                </div>
            </div>
            <?php
        }
    }
}

?>