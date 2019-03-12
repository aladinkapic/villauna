<?php
require_once '../../../classes/db.php';
require_once '../../../classes/users.php';

$db = new DB();


$id              = $_POST['id'];
$company         = $_POST['company'];
$company_phone   = $_POST['company_phone'];
$company_address  = $_POST['company_address'];


$db->action("UPDATE `users` SET `company` = '{$company}', `company_phone` = '{$company_phone}', `company_adress` = '{$company_address}'  WHERE id = '$id'");

Redirect::to('../../../my_company.php?path=Osobni%20podaci&cat=Moja%20kompanija&what=Vaša%20kompanija&icon=fa-place-of-worship&desc=Izmijenite%20osobne%20podatke,%20kako%20vaše%20tako%20i%20vaše%20kompanije');
