<?php
require_once 'classes/db.php';
require_once 'classes/users.php';

$db = new DB();     $user = new User();

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $psw   = $_POST['password'];

    if($user->login($email, $psw, 'true') == 'logged'){
        if($_SESSION['role'] == 'root') Redirect::to('admin/dashboard.php?path=Home&cat=Moj DMD&what=Dashboard&icon=fa-home&desc=Kontrolna tabla aplikacije');
    }else{
        //Redirect::to('login.php');
        echo "False password";
    }

}
?>

<html>
<head>
    <title>Dobrodošli</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


    <!-- css styles -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/menu.css">
    <link rel="stylesheet" href="css/footer/footer.css">

    <link rel="stylesheet" href="swipe/dist/css/swiper.min.css">

    <link rel="stylesheet" href="css/user_part/login.css">

    <!-- javascript files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <script src="js/menu/menu.js"></script>
    <script src="js/cart/wish_list.js"></script>

</head>
<body>
<!-- MENU -->
<?php require_once 'parts/menu/menu.php'; ?>

<div class="login_part">
    <div class="login_shadow">
        <div class="login_wrapper">
            <div class="top_line"></div>
            <div class="login_image">
                <i class="fas fa-user-tag"></i>
            </div>
            <div class="right_line"></div>
            <form method="post">
                <div class="input_wrapper">
                    <input class="input_field" type="text" name="email" placeholder="Vaš email ..">
                </div>
                <div class="input_wrapper">
                    <input class="input_field" type="password" name="password" placeholder="Vaša šifra ..">
                </div>

                <div class="input_wrapper input_wrapper_zero">
                    <div class="submit_part">
                        <input type="submit" value="PRIJAVITE SE">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php require_once 'parts/footer/footer.php';?>
</body>
</html>