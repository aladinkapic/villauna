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
    <h2>Pregledajte naše apartmane i rezervišite Vama najugodniji</h2>
</div>


<div class="apartment_w">
    <div class="single_apart">
        <div class="apart_image">
            <img src="images/s1.png" alt="">
        </div>
        <div class="apart_text">
            <h3>APARTMAN - 1</h3>
            <h5>
                Površina apartmana - 91 m <div class="square"><span>2</span></div>
            </h5>
            <p>
                Apartman se sastoji od dvije  spavaće  sobe, dnevni  boravak, kuhinja - blagovaona, mikrovalna  pećnica,  kafe mašina,  wc,  tuš  kada,  perilica  rublja,  SAT -   TV,  klima,  internet – Wi Fi    i  tri  velike  terase  natkrivene  te  zaštićene  od  kiše  i  sunca  i  sa  predivnim  pogledom  na more. ( komplet  ručnici i  posteljina  su  na  raspolaganju  za  goste )
            </p>

            <a href="single_apartment.php?id=8">
                <p>Pogledajte više --></p>
            </a>
        </div>
    </div>


    <div class="single_apart">
        <div class="apart_image apart_image2">
            <img src="images/s2.png" alt="">
        </div>
        <div class="apart_text apart_text2">
            <h3>APARTMAN - 2</h3>
            <h5>Površina apartmana - 80 m <div class="square"><span>2</span></div></h5>

            <p>
                Apartman se sastoji od dvije  spavaće  sobe,  dnevni  boravak,  kuhinja -blagovaona,mikrovalna  pećnica,  kafe  mašina,   SAT  TV,klima,  internet – Wi Fi,   wc,   tuš  kabina  te  tri  velike  terase  za  sjedenje - odmaranje, zaštićene  od sunca  i  kiše,  i  sa  predivnim  pogledom  na more. ( komplet  ručnici i  posteljina  su  na  raspolaganju  za  goste )
            </p>

            <a href="single_apartment.php?id=9">
                <p>Pogledajte više --></p>
            </a>
        </div>
    </div>


    <div class="single_apart">
        <div class="apart_image ">
            <img src="images/s3.png" alt="">
        </div>
        <div class="apart_text ">
            <h3>STUDIO APARTMAN</h3>
            <h5>Površina apartmana - 25 m <div class="square"><span>2</span></div></h5>

            <p>
                Francuski  ležaj,  kuhinja,  wc – kupatilo,  SAT – TV,  internet – Wi Fi , terasa  natkrivena  i  zaštićena  od  sunaca  i  kiše,  i  sa  predivnim  pogledom  na more.
                ( komplet  ručnici i  posteljina  su  na  raspolaganju  za  goste )

            </p>

            <a href="single_apartment.php?id=10">
                <p>Pogledajte više --></p>
            </a>
        </div>
    </div>
</div>

<?php require_once 'parts/footer/footer.php'; ?>
</body>
</html>