<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User(); ?>


<html>
<head>
    <title>Apartmani</title>
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



<?php
$query = $db->query("pages_content"); $counter = 0; $done = false;
while($data = $query -> fetch()){
    if($data['post_id'] == Input::get('id')){
        if($data['what'] == 'huge_header'){
            $counter ++;
            ?>
            <div class="about_header">
                <h2><?php echo $data['title']; ?></h2>
            </div>
            <?php
        }else if($data['what'] == 'header_text'){
            $counter ++;
            ?>
            <div class="some_text">
                <h3><?php echo $data['title']; ?></h3>

                <p>
                    <?php echo nl2br ($data['text']); ?>
                </p>
            </div>
            <?php
        }else if($data['what'] == 'two_images'){
            $counter ++;
            ?>
            <div class="slider" style="margin-top:50px;">
                <div class="swiper-container swiper1">
                    <div class="swiper-wrapper">
                        <?php
                        $img_q = $db->query("images");
                        while($img = $img_q -> fetch()){
                            if($img['hash'] == $data['hash']){
                                ?>
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="admin/uploaded_images/<?php echo $img['title']; ?>" alt="">
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <?php
        }

        if($counter > 1 and !$done){
            $done = true;
            ?>
            <div class="fancy_thing">
                <h3>Pozovite nas na <span>00387 33 444 555</span> ili javite nam se na email <span>info@villauna.net</span></h3>
                <p>Ugodan boravak Vam želi osoblje Villa Une !</p>
                <div class="button">
                    <p>POGLEDAJTE APARTMANE</p>
                </div>
            </div>
            <?php
        }
    }
}

?>

<!--<div id="slider_wrapper">-->
<!--    <img src="images/w1.jpg" alt="">-->
<!--</div>-->



<!-- Swiper JS -->
<script src="swipe/dist/js/swiper.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.swiper1', {centeredSlides: true,
        /* autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        }, */
        zoom: true,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }

    });
</script>








<?php require_once 'parts/footer/footer.php'; ?>
</body>
</html>