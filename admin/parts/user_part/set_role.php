<?php
require_once '../../classes/db.php';

$user_id = $_GET['user_id'];
$page    = $_GET['page'];
$role    = $_GET['role'];


/** @var  $db */
$db = new DB();


$db->action("UPDATE `users` SET `role` = '{$role}' WHERE id = '$user_id'");

Redirect::to('../../set_roles.php?path=Administracija&cat=Korisnici&what=Dodijelite%20uloge&icon=fa-users&desc=Dodijelite%20uloge%20korisnicima%20kao%20što%20je%20root%20ili%20moderator&page='.$page);