<?php

require_once '../classes/db.php';
require_once '../classes/users.php';
require_once '../classes/date.php';

$user = new User($_SESSION['ID']);

$hash = $_POST['hash'];

$date = new Date(date("d"),date("m"), date("y"), $hash);