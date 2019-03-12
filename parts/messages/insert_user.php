<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';

$user = new User();

$name = $_POST['name'];
$email = $_POST['email'];

$user->insert($name, $email);