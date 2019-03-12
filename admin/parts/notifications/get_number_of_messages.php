<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$array_of_users = array('id' => array());

$db = new DB(); $messages_q = $db->DESCquery('messages');
$user = new User($_SESSION['ID']);

/** number of unique users */
$number_of_messages = 0;

while($message = $messages_q -> fetch()){
    $found = 0;
    if($message['to_who'] == $user->get_id()){
        for($i=0; $i<count($array_of_users['id']); $i++){
            if($message['from_who'] == $array_of_users['id'][$i]) $found = true;
        }

        if(!$found){
            array_push($array_of_users['id'], $message['from_who']);
            if($message['too_seen'] == 0) $number_of_messages++;
        }



    }
}

//$messages_q = $db->query('messages');
//
//while($message = $messages_q -> fetch()){
//    for($i=0; $i<count($array_of_users['id']); $i++){
//
//    }
//}



echo $number_of_messages;