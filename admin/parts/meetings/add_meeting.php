<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';
require_once '../../parts/functions/get_month.php';

$db = new DB();

$user = new User($_SESSION['ID']);

$company_name     = $_POST['company_name'];
$company_adress   = $_POST['company_adress'];
$company_phone    = $_POST['company_phone'];
$d_c              = date('d');
$m_c              = date('m');
$y_c              = date('y');
$time_of_entry    = date('G').':'.date('i').'h';
$d_m              = $_POST['d_m'];
$m_m              = $_POST['m_m'];
$y_m              = $_POST['y_m'];
$time_of_meeting  = $_POST['time_of_meeting'];
$contact_person   = $_POST['contact_person'];
$email            = $_POST['email'];
$details          = $_POST['details'];
$hash             = md5($user->get_email().time());
$user_id          = $user->get_id();


$date_time = $d_c.'. '.get_month($m_c).' 20'.$y_c.' - '.$time_of_entry;


$db -> action("INSERT INTO `meetings` (`company_name`,`company_adress`,`company_phone`,`d_c`,`m_c`,`y_c`,`time_of_entry`,`d_m`,`m_m`,`y_m`,`time_of_meeting`,`contact_person`,`email`,`hash`,`user_id`) VALUES ('{$company_name}','{$company_adress}','{$company_phone}','{$d_c}','{$m_c}','{$y_c}','{$time_of_entry}','{$d_m}','{$m_m}','{$y_m}','{$time_of_meeting}','{$contact_person}','{$email}','{$hash}','{$user_id}') ");


$db -> action("INSERT INTO `meetings_details` (`hash`,`details`,`date_time`) VALUES ('{$hash}','{$details}','{$date_time}') ");


