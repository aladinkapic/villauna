<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';
error_reporting(0);
$db = new DB(); $events_q = $db->query("calendar_events");

$user_id = $_POST['user_id'];
$d       = $_POST['d'];
$m       = $_POST['m'];
$y       = $_POST['y'];


$array_dates = array("d" => array(), "m" => array(), "y" => array(), "headers" => array());

while($event = $events_q -> fetch()){
    if($user_id == 'all'){
        $user = new User($event['user_id']);
        $company = $user->get_company();

        array_push($array_dates["d"], $event['d']);
        array_push($array_dates["m"], $event['m']);
        array_push($array_dates["y"], $event['y']);
        array_push($array_dates["headers"], $event['header'].'<span> - '.$company.'</span>');
    }else if($event['user_id'] == $user_id and $event['m'] == $m and $event['y'] == $y){
        array_push($array_dates["d"], $event['d']);
        array_push($array_dates["m"], $event['m']);
        array_push($array_dates["y"], $event['y']);
        array_push($array_dates["headers"], $event['header']);
    }
}


echo json_encode($array_dates);

