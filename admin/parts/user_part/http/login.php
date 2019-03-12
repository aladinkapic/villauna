<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';


$email = $_POST['email'];
$password = $_POST['password'];
$check = $_POST['keep_me'];

$user = new User();
$user->login($email, $password, $check);

