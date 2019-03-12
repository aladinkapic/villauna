<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$user = new User(); $db = new DB();

$user->open_chat($_POST['what'], $_POST['user_ip']);