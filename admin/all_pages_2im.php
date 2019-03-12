<?php require_once '../classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<?php Session::setImageHash_u(Input::get('hash')); ?>


<?php

if(isset($_POST['hash'])){
    $hash    = $_POST['hash'];
    $post_id = $_GET['id'];
    $what    = 'two_images';


    $db -> action("INSERT INTO `pages_content` (`post_id`,`what`,`hash`) VALUES ('{$post_id}','{$what}','{$hash}') ");
    Redirect::to('all_pages_edit.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled%20svih%20stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id='.$post_id);
}

if(isset($_POST['delete_it'])){
    $id = $_POST['delete_it'];
    $db->action("DELETE FROM `images` WHERE id = $id");
}

?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home/modules.css">

    <link rel="stylesheet" href="css/pages/all_pages.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
    <script src="js/images/images.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <div class="pages_w">
            <div class="single_image">
                <img src="" id="first_image" alt="">
                <input type="hidden" id="hash" value="<?php echo Input::get('id'); ?>">
                <form enctype="multipart/form-data">
                    <label for="file">
                        <div class="image_part">
                            <div class="image_shadow">
                                <i class="far fa-image"></i>
                            </div>
                        </div>
                    </label>
                    <input type="hidden" name="what_is" value="slider_image">
                    <input type="file" onchange="item_image();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                </form>
            </div>

            <div class="all_images" id="oh_images">
                <?php
                $img_q = $db->query("images"); $counter = 0;

                while($img =  $img_q -> fetch()){
                    if($img['hash'] == Input::get('hash')){
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
            </div>

            <div class="save_w">
                <form method="post">
                    <input type="hidden" name="hash" value="<?php echo Input::get('hash'); ?>">
                    <div class="button">
                        <input type="submit" value="SPREMITE">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>