<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$db = new DB();
$user = new User($_SESSION['ID']);

$notify_q = $db->query("notifications");

$array = array('user_data' => array('user_id' => array(), 'user_name' => array()), 'counter' => array());

$counter = 0;
while($notify = $notify_q -> fetch()){
//    if($notify['user_id'] == $user->get_id() and !$notify['seen'] and !$notify['admin']){
//        $counter++;
//    }

    if($user->role() == 'user'){
        if($notify['user_id'] == $user->get_id() and !$notify['seen'] and !$notify['admin']){
            $counter++;
        }
    }else {
        if(!$notify['seen'] and $notify['admin']){
            /*** Obavijest za administraciju ***/

            if(!$notify['pop_up']){
                array_push($array['user_data']['user_id'], $notify['user_id']);

                $not_user = new User($notify['user_id']);
                array_push($array['user_data']['user_name'], $not_user->get_name());
            }

            $what = 1; $id = $notify['id'];

            $db->action("UPDATE `notifications` SET `pop_up` = '{$what}' WHERE id = '$id'");

            $counter++;
        }
    }
}

/** end of notifications **/

array_push($array['counter'], $counter);

/** ako je administrator pusti notifikacije */

if($user->role() == 'root' || $user->role() == 'moderator') array_push($array['counter'], 1);


echo json_encode($array);
//echo $counter;


