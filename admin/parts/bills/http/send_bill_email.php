<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';
require_once '../../../classes/services.php';
require_once '../../../classes/domains.php';
require_once '../../../classes/email.php';


$mail_not = new Mail();

$mail_not -> send_bill();
