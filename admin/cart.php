<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>

<!-- cart query -->
<?php $cart_q = $db->query("cart"); ?>
<?php require_once 'classes/services.php'; ?>
<?php require_once 'classes/domains.php'; ?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/cart/cart.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
    <script src="js/cart/cart.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<?php require_once 'parts/cart/cart_notification.php'; ?>
<section>
    <div class="section_header">
        <div class="section_h_img">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="section_h_value">
            <h2>Artikli u košarici</h2>
            <p>Pogledajte sve vaše artikle dodane u košaricu na jednom mjestu</p>
        </div>
        <div class="section_h_path">
            <div class="home_img">
                <i class="fas fa-home"></i>
            </div>
            <p>Dashboard <span>/</span> Košarica</p>
        </div>
    </div>



    <div class="section_body">
        <div class="cart_header">
            <div class="cart_h_name cart_h_huge">
                <p>ARTIKAL</p>
            </div>
            <div class="cart_h_name cart_h_small">
                <p>CIJENA</p>
            </div>
            <div class="cart_h_name cart_h_middle">
                <p>KOLIČINA</p>
            </div>
            <div class="cart_h_name cart_h_small">
                <p>UKUPNO</p>
            </div>
        </div>
        <div class="cart_items" id="cart_wrappers">

            <div class="single_cart_item">
                <div class="cart_h_name cart_h_huge">
                    <div class="cart_h_name_image">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="cart_h_article_name">
                        <h4>Snimanje dronom</h4>
                        <p> Usluga snimanja dronom te uređivanje i montiranje videa.</p>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p>350.00 KM</p>
                </div>
                <div class="cart_h_name cart_h_middle">
                    <div class="input_wrapper input_wrapper_small">
                        <i class="fas fa-minus"></i>
                    </div>
                    <div class="input_wrapper input_wrapper_huge">
                        <input type="text" value="1" readonly class="article_value">
                    </div>
                    <div class="input_wrapper input_wrapper_small">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="cart_h_name cart_h_small">
                    <p>350.00 KM</p>
                </div>
            </div>


            <div class="pdv_part">
                <div class="pdv_value">
                    <p>PDV @ 17.00% : <span> 17 KM</span></p>
                </div>
            </div>

            <div class="finnish_order">
                <div class="finnis_button" onclick="">
                    <p>ZAVRŠITE NARUDŽBU</p>
                </div>
                <div class="total_amount">
                    <p>UKUPNO <span>100 KM</span></p>
                    <input type="hidden" id="number_of_items" value="55555">
                </div>
                <div class="payment_method">
                    <p>
                        Žiro račun br : 0243358556788646
                        <i class="fas fa-money-check-alt"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>