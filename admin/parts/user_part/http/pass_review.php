<?php
require_once '../../../classes/email.php';

$email = $_POST['email'];

$mail = new Mail();

//$mail->send()