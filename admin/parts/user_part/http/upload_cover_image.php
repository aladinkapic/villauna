<?php
require_once '../../../classes/db.php';

$hash =  Session::getImageHash();

error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
//Ukupan broj slika (niz)

$count = count($_FILES['cover_img']['name']);
$db = new DB();

//Iteriraj kroz niz i ispiši svaki od elemenata
for ($i = 0; $i < $count; $i++) {
    $ext = pathinfo($_FILES['cover_img']['name'][$i],PATHINFO_EXTENSION);
    $name = md5($_FILES['cover_img']['name'][$i].time()).'.'.$ext;
    //update image

    $db->action("UPDATE `user_cover_images` SET `image` = '{$name}' WHERE hash = '$hash'");

    move_uploaded_file($_FILES['cover_img']['tmp_name'][$i], '../../../uploaded_images/'. $name);
    /** Set permission to 777 */
    chmod('../../../uploaded_images/'.$name, 0777);
    //array_push($images, $name);
}
/* return hash of image for live update icon */
echo $name;