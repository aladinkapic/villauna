<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$db = new DB(); $messages_q = $db->DESCquery('messages');
$user = new User($_SESSION['ID']);


if($user->role() == 'root' or $user->role() == 'moderator'){
    $array_of_users = array('id' => array());
    $unread_messages = array('id' => array());

    $message_q = $db->DESCquery("messages");
    while($message = $message_q -> fetch()){
        $found = 0; $found_unread = 0;
        if($message['from_who'] == $user->get_id()){
            for($i=0; $i<count($array_of_users['id']); $i++){
                if($message['to_who'] == $array_of_users['id'][$i]) $found = true;
            }

            if(!$found){
                array_push($array_of_users['id'], $message['to_who']);
            }
        }else if($message['to_who'] == $user->get_id()){
            for($i=0; $i<count($array_of_users['id']); $i++){
                if($message['from_who'] == $array_of_users['id'][$i]) $found = true;
            }

            if($message['too_seen'] == 0){
                for($i=0; $i<count($unread_messages['id']); $i++){
                    if($message['from_who'] == $unread_messages['id'][$i]){
                        $found_unread = true;
                    }
                }

                if(!$found_unread){
                    array_push($unread_messages['id'], $message['from_who']);
                }
            }

            if(!$found){
                array_push($array_of_users['id'], $message['from_who']);
            }
        }

    }

    for($i=0; $i<count($array_of_users['id']);$i++){
        if($i == 4) break;
        $admins_q = $db->query("users");
        while($admin = $admins_q -> fetch()){
            if($array_of_users['id'][$i] == $admin['id']){
                /** read last message **/

                $messages_q = $db->DESCquery("messages");
                $unread_mes = 1;

                for($j=0; $j<count($unread_messages['id']); $j++){
                    if($unread_messages['id'][$j] == $admin['id']){
                        $unread_mes = 0;
                    }
                }


                ?>
                <a href="my_inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu&user_id=<?php echo $admin['id']; ?>">
                    <div class="single_notify" style="<?php if(!$unread_mes) echo 'background:rgba(0,0,0,0.05);'; ?>" title="<?php if(!$unread_mes) echo 'Imate nepročitanu poruku od '.$admin['name'].' '.$admin['surname']; ?>">
                        <div class="line"></div>
                        <div class="white_circle">
                            <div class="color_circle <?php if(!$unread_mes){echo 'color_circle_red';} else echo 'color_circle_green'; ?> "></div>
                        </div>
                        <h5><?php echo $admin['name'].' '.$admin['surname']; ?></h5>
                        <p>Kliknite ovdje i pogledajte poruku..</p>
                    </div>
                </a>
                <?php
            }
        }
    }

}else if($user->role() == 'user'){
    $unread_messages = array('id' => array());

    $admins_q = $db->query("users");
    while($admin = $admins_q -> fetch()){
        if($admin['role'] == 'root' || $admin['role'] == 'moderator'){

            $messages_q = $db->DESCquery('messages');
            while($message = $messages_q -> fetch()){
                $found = 0;
                if($message['to_who'] == $user->get_id() and $message['from_who'] == $admin['id']){
                    if($message['too_seen'] == 0){
                        $found = true;
                        break;
                    }
                }
            }

            ?>
            <a href="inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu&user_id=<?php echo $admin['id']; ?>">
                <div class="single_notify" style="<?php if($found) echo 'background:rgba(0,0,0,0.05);'; ?>" title="<?php if($found) echo 'Imate nepročitanu poruku od '.$admin['name'].' '.$admin['surname']; ?>" >
                    <div class="line"></div>
                    <div class="white_circle">
                        <div class="color_circle <?php if($found){echo 'color_circle_red';} else echo 'color_circle_green'; ?> "></div>
                    </div>
                    <h5><?php echo $admin['name'].' '.$admin['surname']; ?></h5>
                    <p>Kliknite ovdje i pogledajte poruku..</p>
                </div>
            </a>
            <?php
        }
    }
}