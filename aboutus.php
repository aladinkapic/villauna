<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User(); ?>


<html>
<head>
    <title>Dobrodošli na Villa-Una oficijalnu stranicu</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/menu.css">
    <link rel="stylesheet" href="css/footer/footer.css">

    <link rel="stylesheet" href="css/about/aboutus.css">
    <link rel="stylesheet" href="swipe/dist/css/swiper.min.css">

    <link rel="stylesheet" href="css/menu/mobile_menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <a href="https://icons8.com/icon/41152/speed"></a>

    <script src="js/menu/menu.js"></script>
    <script src="js/map.js"></script>
</head>
<body>
<?php require_once 'parts/menu/menu.php'; ?>


<?php require_once 'parts/about/about.php'; ?>

<?php require_once 'parts/footer/footer.php'; ?>
</body>
</html>