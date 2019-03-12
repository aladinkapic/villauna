<?php require_once '../classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<?php

if(isset($_POST['delete_item'])){
    $id = $_POST['delete_item'];
    $db->action("DELETE FROM `pages_content` WHERE id = $id");
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
    <link rel="stylesheet" href="../css/about/aboutus.css">
    <link rel="stylesheet" href="../swipe/dist/css/swiper.min.css">

    <link rel="stylesheet" href="css/pages/all_pages.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <div class="pages_w">
            <div class="single_page">
                <p><span>IZABERITE MODUL</span></p>
                <a href="all_pages_ht.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo Input::get('id'); ?>">
                    <div class="page_icon" title="Naslov sa tekstom">
                        <i class="fas fa-font"></i>
                    </div>
                </a>
                <a href="all_pages_2im.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo Input::get('id'); ?>&hash=<?php echo time(); ?>">
                    <div class="page_icon page_icon1" title="Dvije slike">
                        <i class="fas fa-images"></i>
                    </div>
                </a>
                <!--
                <a href="all_pages_sm.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo Input::get('id'); ?>">
                    <div class="page_icon page_icon2" title="Jedna slika">
                        <i class="fas fa-image"></i>
                    </div>
                </a> -->
                <a href="all_pages_h.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo Input::get('id'); ?>">
                    <div class="page_icon page_icon3" title="Veliki naslov">
                        <i class="fas fa-heading"></i>
                    </div>
                </a>
            </div>

            <?php
            $content_q = $db->query("pages_content"); $counter = 0;
            while($content = $content_q -> fetch()){
                if($content['post_id'] == Input::get('id')){
                    if($content['what'] == 'huge_header'){
                        ?>
                        <div class="header_module">
                            <h1><?php echo $content['title']; ?></h1>
                            <div class="module_shadow">
                                <form method="post">
                                    <label for="delete_item<?php echo $counter; ?>">
                                        <div class="delete_wrapper">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </label>
                                    <input type="hidden" name="delete_item" value="<?php echo $content['id']; ?>">
                                    <input type="submit" id="delete_item<?php echo $counter++; ?>" style="display:none;">
                                </form>

                                <a href="all_pages_edit.h.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo $content['id'] ?>">
                                    <div class="delete_wrapper edit_wrapper">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }else if($content['what'] == 'one_imageee'){
                        ?>
                        <div class="module_img">
                            <img src="uploaded_images/<?php echo $content['image_one']; ?>" alt="">
                            <div class="module_shadow">
                                <form method="post">
                                    <label for="delete_item<?php echo $counter; ?>">
                                        <div class="delete_wrapper">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </label>
                                    <input type="hidden" name="delete_item" value="<?php echo $content['id']; ?>">
                                    <input type="submit" id="delete_item<?php echo $counter++; ?>" style="display:none;">
                                </form>
                            </div>
                        </div>
                        <?php
                    }else if($content['what'] == 'two_images'){
                        ?>
                        <div class="slider">
                            <div class="swiper-container swiper1" style="width:100%;">
                                <div class="swiper-wrapper">
                        <?php


                        $images_q = $db->query("images"); $img_c = 0;
                        while($img = $images_q -> fetch()){
                            if($img['hash'] == $content['hash']){
                                ?>


                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="uploaded_images/<?php echo $img['title']; ?>" alt="">
                                    </a>
                                    <div class="module_shadow">
                                        <form method="post">
                                            <label for="delete_item<?php echo $counter; ?>">
                                                <div class="delete_wrapper">
                                                    <i class="fas fa-trash-alt"></i>
                                                </div>
                                            </label>
                                            <input type="hidden" name="delete_item" value="<?php echo $content['id']; ?>">
                                            <input type="submit" id="delete_item<?php echo $counter++; ?>" style="display:none;">
                                        </form>

                                        <a href="all_pages_2im.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&hash=<?php echo $content['hash']; ?>">
                                            <div class="delete_wrapper edit_wrapper">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                $img_c ++;
                            }
                        }

                        ?>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                        <?php
                    }else if($content['what'] == 'header_text'){
                        ?>
                        <div class="header_and_text" style="height:auto; left:15px; width:calc(100% - 30px);">
                            <h2><?php echo $content['title']; ?></h2>
                            <p>
                                <?php echo nl2br($content['text']); ?>
                            </p>
                            <div class="module_shadow">
                                <form method="post">
                                    <label for="delete_item<?php echo $counter; ?>">
                                        <div class="delete_wrapper">
                                            <i class="fas fa-trash-alt"></i>
                                        </div>
                                    </label>
                                    <input type="hidden" name="delete_item" value="<?php echo $content['id']; ?>">
                                    <input type="submit" id="delete_item<?php echo $counter++; ?>" style="display:none;">
                                </form>

                                <a href="all_pages_edit.hp.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled svih stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo $content['id'] ?>">
                                    <div class="delete_wrapper edit_wrapper">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            }

            ?>



            <!-- Swiper JS -->
            <script src="../swipe/dist/js/swiper.min.js"></script>

            <!-- Initialize Swiper -->
            <script>
                var swiper = new Swiper('.swiper1', {centeredSlides: true,
                    /* autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    }, */
                    zoom: true,
                    loop: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    }

                });
            </script>
        </div>
    </div>
</section>
</body>
</html>