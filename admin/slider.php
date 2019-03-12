<?php require_once '../classes/db.php'; $db = new DB(); ?>

<?php
if(isset($_POST['delete_name'])){
    $id = $_POST['delete_name'];

    $db->action("DELETE FROM `slider` WHERE id = $id");
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

        <?php
        $counter = 0;

        $img_q = $db->query("slider");
        while($img = $img_q -> fetch()){
            if($img['what'] == 'desktop'){
                ?>
                <div class="single_image ">
                    <img src="uploaded_images/<?php echo $img['image']; ?>" alt="">
                    <div class="delete_w">
                        <form action="" method="post">
                            <label for="delete_img<?php echo $counter; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </label>
                            <input type="hidden" name="delete_name" value="<?php echo $img['id']; ?>">
                            <input type="submit" id="delete_img<?php echo $counter++; ?>" class="delete_images">
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <!--        <div class="single_image">-->
        <!--            <img src="../images/w1.jpg" alt="">-->
        <!--            <div class="delete_w">-->
        <!--                <form action="" method="post">-->
        <!--                    <label for="delete_img">-->
        <!--                        <i class="fas fa-trash-alt"></i>-->
        <!--                    </label>-->
        <!--                    <input type="hidden" name="delete_name" value="">-->
        <!--                    <input type="submit" id="delete_img" class="delete_images">-->
        <!--                </form>-->
        <!--            </div>-->
        <!--        </div>-->

        <form enctype="multipart/form-data">
            <label for="file">
                <div class="image_part">
                    <img id="single_img" src="images/photo-camera.png" alt="">
                    <div class="insert_button">
                        <p>UNESITE SLIKU - DESKTOP</p>
                    </div>
                </div>
            </label>
            <input type="hidden" name="what_is" value="slider_image">
            <input type="file" onchange="upload_image();" id="file" name="file[]" multiple="multiple" class="hidden_input">
        </form>


        <?php
        $img_q = $db->query("slider");
        while($img = $img_q -> fetch()){
            if($img['what'] == 'mobile'){
                ?>
                <div class="single_image single_image2">
                    <img src="uploaded_images/<?php echo $img['image']; ?>" alt="">
                    <div class="delete_w">
                        <form action="" method="post">
                            <label for="delete_img<?php echo $counter; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </label>
                            <input type="hidden" name="delete_name" value="<?php echo $img['id']; ?>">
                            <input type="submit" id="delete_img<?php echo $counter++; ?>" class="delete_images">
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>

        <form enctype="multipart/form-data">
            <label for="file2">
                <div class="image_part">
                    <img id="single_img" src="images/photo-camera.png" alt="">
                    <div class="insert_button">
                        <p>UNESITE SLIKU - MOBILE</p>
                    </div>
                </div>
            </label>
            <input type="hidden" name="what_is" value="slider_image">
            <input type="file" onchange="upload_image2();" id="file2" name="file2[]" multiple="multiple" class="hidden_input">
        </form>
    </div>
</section>
</body>
</html>