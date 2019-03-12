<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>

<?php
    if(isset($_POST['header'])){
        $header  = $_POST['header'];
        $image   = $_POST['image'];
        $details = $_POST['details'];
        for($i=0; $i<strlen($details); $i++){ if($details[$i] == "'") $details[$i] = ''; }

        $db -> action("INSERT INTO `front_images` (`title`,`header`,`details`) VALUES ('{$image}','{$header}','{$details}') ");

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
    <link rel="stylesheet" href="css/images/images.css">

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
        <div class="images_wrapper">
            <div class="insert_image">
                <form enctype="multipart/form-data">
                    <label for="file">
                        <div class="image_part">
                            <img id="single_img" src="images/photo-camera.png" alt="">
                        </div>
                    </label>
                    <input type="file" onchange="upload_image();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                </form>

                <form method="post">
                    <input type="text" name="header" placeholder="Naslov ..">
                    <input type="hidden" name="image" id="image_name">
                    <textarea name="details" placeholder="Kratki tekst .."></textarea>
                    <div class="save_button">
                        <input type="submit" value="SPREMITE">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>