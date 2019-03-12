<?php require_once '../classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<?php

if(isset($_POST['page_title'])){
    $title = $_POST['page_title'];
    $category = Input::get('category');
    $db -> action("INSERT INTO `pages` (`title`, `category`) VALUES ('{$title}', '{$category}') ");
}else if(isset($_POST['delete_page'])){
    $id = $_POST['delete_page'];
    $db->action("DELETE FROM `pages` WHERE id = $id");
}

if(isset($_POST['title'])){
    $title    = $_POST['title'];
    $title_en = $_POST['title_en'];
    $title_de = $_POST['title_de'];

    $text     = $_POST['text'];
    $text_en  = $_POST['text_en'];
    $text_de  = $_POST['text_de'];

    echo $img      = $_POST['image'];

    $category = Input::get('category');

    $db -> action("INSERT INTO `pages` (`title`,`title_en`,`title_de`,`text`,`text_en`,`text_de`, `category`, `image`) VALUES ('{$title}','{$title_en}','{$title_de}','{$text}','{$text_en}','{$text_de}', '{$category}', '{$img}') ");
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
            <div class="single_page">
                <p><span>NAZIV PAGE-a</span></p>
                <div class="page_icon page_icon0">
                    <i class="fas fa-hashtag"></i>
                </div>
            </div>

            <?php
            $pages_q = $db->query("pages"); $counter = 0;
            while($page = $pages_q -> fetch()){
                if($page['category'] == Input::get('category')){
                    ?>
                    <div class="single_page single_page0">
                        <p><?php echo $page['title']; ?></p>
                        <a href="all_pages_edit.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled%20svih%20stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=<?php echo $page['id']; ?>">
                            <div class="page_icon" title="Pregled te uređivanje stranice <?php echo $page['title']; ?>.">
                                <i class="far fa-eye"></i>
                            </div>
                        </a>
                        <form method="post">
                            <label for="delete_page<?php echo $counter; ?>">
                                <div class="page_icon page_icon1" title="Obrišite stranicu <?php echo $page['title']; ?> u potpunosti !">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                            </label>
                            <input type="hidden" name="delete_page" value="<?php echo $page['id']; ?>">
                            <input type="submit" id="delete_page<?php echo $counter++; ?>" style="display:none;">
                        </form>
                    </div>
                    <?php
                }
            }
            ?>

            <?php
            if(Input::get('category') != 'news'){
                ?>
                <div class="single_page single_page2">
                    <form method="post">
                        <input type="text" name="page_title" placeholder="Naziv stranice .." autocomplete="off">
                        <div class="save_button">
                            <input type="submit" value="SPREMITE">
                        </div>
                    </form>
                </div>
                <?php
            }else{
                ?>
                <div class="insert_new">
                    <div class="new_image">
                        <img id="new_image" src="" alt="">
                        <form enctype="multipart/form-data">
                            <label for="file">
                                <div class="img_shadow">
                                    <p>430 x 260</p>
                                </div>
                            </label>
                            <input type="hidden" name="what_is" value="slider_image">
                            <input type="file" onchange="upload_image_news();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                        </form>

                    </div>
                    <form action="" method="post">
                        <div class="page_details">
                            <div class="single_input">
                                <input type="text" placeholder="Naslov .." name="title">
                                <input type="hidden" id="new_image_upload" name="image">
                            </div>
                            <div class="single_input">
                                <input type="text" placeholder="Naslov en .." name="title_en">
                            </div>
                            <div class="single_input">
                                <input type="text" placeholder="Naslov de .." name="title_de">
                            </div>
                            <div class="single_input">
                                <input type="text" placeholder="Kratki opis .." name="text">
                            </div>
                            <div class="single_input">
                                <input type="text" placeholder="Kartki opis en .." name="text_en">
                            </div>
                            <div class="single_input">
                                <input type="text" placeholder="Kratki opis de .." name="text_de">
                            </div>
                            <div class="single_input single_input2">
                                <input type="submit" value="SPREMITE">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</section>
</body>
</html>