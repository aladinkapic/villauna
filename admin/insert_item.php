<?php require_once '../classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']);  ?>

<?php require_once '../classes/categories.php';  $categiry = new Category(); ?>

<?php $hash = Session::setImageHash_u(md5(time())); ?>

<!-- is it preview or not -->
<?php $preview = false; ?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/categories/all_categories.css">
    <link rel="stylesheet" href="../css/style.css">
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
        <div class="categories_w">
            <div class="insert_object">
                <div class="object_image">
                    <img id="item_image" src="" alt="">
                    <form enctype="multipart/form-data">
                        <label for="file">
                            <div class="object_image_w" title="Izaberite fotografiju ..">
                                <i class="fas fa-magic"></i>
                            </div>
                        </label>
                        <input type="hidden" id="hash" value="<?php echo Input::get('hash'); ?>">
                        <input type="file" onchange="item_image();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                    </form>
                </div>
                <form method="post" action="items/insert_item.php">
                    <div class="object_name_price">
                        <div class="title_of_input">
                            <p>Naziv objekta</p>
                        </div>
                        <div class="object_name">
                            <input type="hidden" name="parent" value="<?php echo Input::get('parent'); ?>">
                            <input type="hidden" name="category" value="<?php echo Input::get('id'); ?>">
                            <input type="hidden" name="hash" value="<?php echo md5(time()); ?>">
                            <input type="hidden" name="what_action" value="0">
                            <input type="text" placeholder="Puni naziv objekta .." name="title">
                        </div>
                        <div class="title_of_input">
                            <p>Dostupnost</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder=". . ." name="availablity" value="Dostupno">
                        </div>
                        <div class="title_of_input">
                            <p>Veleprodajna cijena</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder="100 BAM" id="" name="vpc">
                        </div>
                        <div class="title_of_input">
                            <p>Maloprodajna cijena</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder="120 BAM" id="" name="mpc">
                        </div>
                        <div class="title_of_input">
                            <p>Procentualni popust na gotovinsko plaćanje</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder="5 %" id="" name="discount">
                        </div>
                    </div>

                    <div class="object_extra_details">
                        <div class="single_object_property_title">
                            <p>Proizvođač </p>
                        </div>
                        <div class="single_object_property">
                            <input type="text" placeholder=".. property" name="producer">
                        </div>
                    </div>

                    <?php
                    if(Input::get('id') == 32 || Input::get('id') == 33 || Input::get('id') == 35){
                        // Game and Desktop PCs
                        require_once 'items/pc.php';
                    }else if(Input::get('id') == 34){
                        // Monitors
                        require_once 'items/monitors.php';
                    }else if(Input::get('id') == 36){
                        // Laptops
                        require_once 'items/laptops.php';
                    }else if(Input::get('id') == 70){
                        // Mobile phones
                        require_once 'items/mobile.php';
                    }else if(Input::get('id') == 72){
                        // Tablets
                        require_once 'items/tablets.php';
                    }else if(Input::get('id') == 76){
                        // TVs
                        require_once 'items/tv.php';
                    }else if(Input::get('id') == 79){
                        // Cameras
                        require_once 'items/photo.php';
                    }
                    ?>

                    <div class="short_desc">
                        <textarea name="short_details" placeholder="Kratki opis .."></textarea>
                    </div>
                    <div class="save_button">
                        <div class="button">
                            <input type="submit" value="SPREMITE">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>