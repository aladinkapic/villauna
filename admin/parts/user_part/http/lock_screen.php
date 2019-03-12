<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';


$psw = $_POST['psw'];

$user = new User($_SESSION['ID']);
$user->update_online_status();

echo $user->check_psw($psw);