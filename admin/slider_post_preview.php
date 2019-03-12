<?php require_once '../classes/db.php'; $db = new DB(); ?>

<?php
Session::setImageHash_u(Input::get('hash'));


if(isset($_POST['slider_link'])){
    $title = $_POST['title'];
    $short = $_POST['short'];
    $link = $_POST['slider_link'];
    $hash = Input::get('hash');


    $db->action("UPDATE `slider` SET `link` = '{$link}', `header` = '{$title}', `short_details` = '{$short}' WHERE hash = '$hash'");
}

$posts_q = $db->query("slider");
while($post = $posts_q -> fetch()){
    if($post['hash'] == Input::get('hash')){
        $d_img = $post['image_d'];
        $m_img = $post['image_m'];
        $link  = $post['link'];
        $title = $post['header'];
        $short = $post['short_details'];
        break;
    }
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
    <link rel="stylesheet" href="css/homepage/slider.css">

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
        <div class="posts_wrapper">

            <div class="single_image">
                <img src="uploaded_images/<?php echo $d_img; ?>" alt="">
                <form enctype="multipart/form-data">
                    <label for="file">
                        <div class="image_shadow" title="Dekstop verzija slike">
                            <img src="images/photo-camera.png" alt="">
                        </div>
                    </label>
                    <input type="hidden" id="hash" value="<?php echo Input::get('hash'); ?>">
                    <input type="file" onchange="upload_image();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                </form>
            </div>
            <div class="single_image">
                <img src="uploaded_images/<?php echo $m_img; ?>" alt="">
                <form enctype="multipart/form-data">
                    <label for="file2">
                        <div class="image_shadow" title="Mobilna verzija slike">
                            <img src="images/photo-camera.png" alt="">
                        </div>
                    </label>
                    <input type="file" onchange="upload_image2();" id="file2" name="file2[]" multiple="multiple" class="hidden_input">
                </form>
            </div>

            <form action="" method="post">
                <div class="slider_form">
                    <div class="single_input">
                        <input type="text" placeholder="Naslov .. " name="title" value="<?php echo $title; ?>">
                    </div>
                    <div class="single_input">
                        <input type="text" placeholder="Kratki opis .." name="short" value="<?php echo $short; ?>">
                    </div>
                    <div class="single_input">
                        <input type="text" placeholder="Link .." name="slider_link"  value="<?php echo $link; ?>">
                    </div>
                    <div class="single_input single_input2">
                        <input class="save_it" type="submit" value="SPREMITE">
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
</body>
</html>