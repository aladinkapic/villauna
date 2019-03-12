<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';
require_once '../../../classes/email.php';

$email = $_POST['email'];
$name = $_POST['name'];
$password = $_POST['password'];

$user = new User(); $hash = md5(time().$email);
$user->register($hash, $name, $email, $password, "user");




$mail = new Mail();
$mail -> send($email, "Potvrda o uspješnoj registraciji", "Uspješno ste se registrovali na naš servis www.dmd.ba. Vaši pristupni podaci su : <br> <br> - email : ".$email."<br> - šifra : ".$password." <br><br> Želimo Vam ugodno korištenje !", 'noreply@dmd.ba');

