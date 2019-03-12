<?php require_once '../classes/db.php'; $db = new DB(); ?>

<?php
if(isset($_POST['delete_name'])){
    $id = $_POST['delete_name'];

    $db->action("DELETE FROM `slider` WHERE id = $id");
}

if(isset($_POST['slider_post'])){
    $post = $_POST['slider_post'];
    $hash = time();

    $db -> action("INSERT INTO `slider` (`title`, `hash`) VALUES ('{$post}', '{$hash}') ");
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
            <?php
            $posts_q = $db->query("slider"); $counter = 0;
            while($post = $posts_q -> fetch()){
                ?>
                <div class="single_post">
                    <p>
                        <?php echo $post['title']; ?>
                    </p>
                    <a href="slider_post_preview.php?path=Moj%20app&cat=Naslovna%20strana&what=Naslovna%20strana&icon=fa-home&desc=Dodajte%20i%20uredite%20slike%20za%20početni%20slider&hash=<?php echo $post['hash']; ?>">
                        <div class="single_post_i">
                            <i class="fas fa-eye"></i>
                        </div>
                    </a>
                    <form method="post">
                        <label for="delete_it<?php echo $counter; ?>">
                            <div class="single_post_i single_post_i2">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                        </label>
                        <input type="hidden" name="delete_name" value="<?php echo $post['id']; ?>">
                        <input type="submit" id="delete_it<?php echo $counter++; ?>" style="display:none;">
                    </form>
                </div>
                <?php
            }
            ?>

            <div class="image_part">
                <form method="post">
                    <img id="single_img" src="images/photo-camera.png" alt="">
                    <input type="text" name="slider_post" placeholder="Naziv - redni broj- posta">
                    <div class="insert_button">
                        <input type="submit" value="SPREMITE POST">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>