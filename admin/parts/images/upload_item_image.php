<?php
require_once '../../../classes/db.php';

$hash =  Session::getImageHash();

error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
ini_set("memory_limit","1024M");
//Ukupan broj slika (niz)

$count = count($_FILES['file']['name']);
$db = new DB();


//Iteriraj kroz niz i ispiši svaki od elemenata
for ($i = 0; $i < $count; $i++) {
    $ext = pathinfo($_FILES['file']['name'][$i],PATHINFO_EXTENSION);
    $name = md5($_FILES['file']['name'][$i].time()).'.'.$ext;
    //update image

    $what = 'one_image';
    $db -> action("INSERT INTO `images` (`title`,`hash`) VALUES ('{$name}','{$hash}') ");

    //$db->action("UPDATE `user_cover_images` SET `image` = '{$name}' WHERE hash = '$hash'");

    move_uploaded_file($_FILES['file']['tmp_name'][$i], '../../uploaded_images/'. $name);
    /** Set permission to 777 */
    chmod('../../uploaded_images/'.$name, 0777);
    //array_push($images, $name);
}
/* return hash of image for live update icon */



$img_q = $db->query("images"); $counter = 0;

while($img =  $img_q -> fetch()){
    if($img['hash'] == $hash){
        ?>
        <div class="single_image">
            <img src="uploaded_images/<?php echo $img['title']; ?>" alt="">
            <form action="" method="post">
                <label for="delete<?php echo $counter; ?>">
                    <div class="delete_image">
                        <i class="far fa-trash-alt"></i>
                    </div>
                </label>
                <input type="hidden" name="delete_it" value="<?php echo $img['id']; ?>">
                <input type="submit" class="hidden_input" id="delete<?php echo $counter++; ?>">
            </form>
        </div>
        <?php
    }
}
?>