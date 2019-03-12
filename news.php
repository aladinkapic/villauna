<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User(); ?>

<html>
<head>
    <title>Dobrodošli na Villa-Una oficijalnu stranicu</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/menu.css">
    <link rel="stylesheet" href="css/footer/footer.css">

    <link rel="stylesheet" href="css/apartment/apartments.css">
    <link rel="stylesheet" href="swipe/dist/css/swiper.min.css">

    <link rel="stylesheet" href="css/menu/mobile_menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <a href="https://icons8.com/icon/41152/speed"></a>

    <script src="js/menu/menu.js"></script>
    <script src="js/map.js"></script>
</head>
<body>
<?php require_once 'parts/menu/menu.php'; ?>

<div class="about_header">
    <h2>Pregled najnovijih vijesti </h2>
</div>

<div class="news">
    <?php
    $news_q = $db->query("pages");
    while($new = $news_q -> fetch()){
        if($new['category'] == 'news'){
            ?>
            <div class="single_new">
                <div class="new_image">
                    <img src="admin/uploaded_images/<?php echo $new['image']; ?>" alt="">
                </div>
                <div class="new_text">
                    <h4><?php echo $new['title']; ?></h4>
                    <p><?php echo $new['text']; ?> </p>
                    <a href="single_apartment.php?id=<?php echo $new['id']; ?>">
                        <p>Pogledajte --></p>
                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>




<!--    <div class="single_new">-->
<!--        <div class="new_image">-->
<!--            <img src="images/w.jpg" alt="">-->
<!--        </div>-->
<!--        <div class="new_text">-->
<!--            <h4>Naziv novosti</h4>-->
<!--            <p>Kratki opis novosti, svega par riječi će biti prikazano, tako da nemaa potrebe z.. </p>-->
<!--            <a href="">-->
<!--                <p>Pogledajte </p>-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->



</div>

<?php require_once 'parts/footer/footer.php'; ?>
</body>
</html>