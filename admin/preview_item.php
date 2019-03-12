<?php require_once '../classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']);  ?>

<?php require_once '../classes/categories.php';  $categiry = new Category(); ?>
<?php require_once '../classes/items.php'; $item = new Item(Input::get('id')); ?>


<?php $hash = Session::setImageHash_u($item->_hash); ?>

<!-- is it preview or not -->
<?php $preview = true; ?>

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
                    <img id="item_image" src="uploaded_images/<?php echo $item->get_image(); ?>" alt="">
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
                            <input type="hidden" name="category" value="<?php echo Input::get('category'); ?>">
                            <input type="hidden" name="hash" value="<?php echo md5(time()); ?>">
                            <input type="hidden" name="what_action" value="<?php echo Input::get('id'); ?>">
                            <input type="text" placeholder="Puni naziv objekta .." name="title" value="<?php echo $item->_title; ?>">
                        </div>
                        <div class="title_of_input">
                            <p>Dostupnost</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder=". . ." name="availablity"  value="<?php echo $item->_availablity; ?>">
                        </div>
                        <div class="title_of_input">
                            <p>Veleprodajna cijena</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder="100 BAM" id="" name="vpc" value="<?php echo $item->_vpc; ?>">
                        </div>
                        <div class="title_of_input">
                            <p>Maloprodajna cijena</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder="120 BAM" id="" name="mpc" value="<?php echo $item->_mpc; ?>">
                        </div>
                        <div class="title_of_input">
                            <p>Procentualni popust na gotovinsko plaćanje</p>
                        </div>
                        <div class="object_name">
                            <input type="text" placeholder="5 %" id="" name="discount" value="<?php echo $item->_discount; ?>">
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
                    if(Input::get('category') == 32 || Input::get('category') == 33 || Input::get('category') == 35){
                        // Game and Desktop PCs
                        require_once 'items/pc.php';
                    }else if(Input::get('category') == 34){
                        // Monitors
                        require_once 'items/monitors.php';
                    }else if(Input::get('category') == 36){
                        // Monitors
                        require_once 'items/laptops.php';
                    }else if(Input::get('category') == 70){
                        // Monitors
                        require_once 'items/mobile.php';
                    }else if(Input::get('category') == 72){
                        // Monitors
                        require_once 'items/tablets.php';
                    }else if(Input::get('category') == 76){
                        // Monitors
                        require_once 'items/tv.php';
                    }else if(Input::get('category') == 79){
                        // Monitors
                        require_once 'items/photo.php';
                    }
                    ?>

                    <div class="short_desc">
                        <textarea name="short_details" placeholder="Kratki opis .."><?php echo $item->_short_details; ?></textarea>
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