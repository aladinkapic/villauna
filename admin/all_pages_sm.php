<?php require_once '../classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<?php Session::setImageHash_u(Input::get('id')); ?>

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
                    <input type="file" onchange="upload_image_one();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>