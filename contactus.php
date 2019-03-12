<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User(); ?>

<html>
<head>
    <title>Dobrodošli na Villa-Una oficijalnu stranicu</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/menu.css">
    <link rel="stylesheet" href="css/contact/contact.css">

    <link rel="stylesheet" href="css/footer/footer.css">

    <link rel="stylesheet" href="css/menu/mobile_menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <a href="https://icons8.com/icon/41152/speed"></a>

    <script src="js/menu/menu.js"></script>
    <script src="js/map.js"></script>
</head>
<body>
<?php require_once 'parts/menu/menu.php'; ?>


<div id="google_map"> </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAApiBLPehhhJkDFqzlfNGN99n18N4PZxA&callback=init" async defer></script>
<div class="contact_part">

    <!-- <div class="contact_form_header">
        <h1>Kontaktirajte nas</h1>
    </div> -->
    <div class="contact_form">
        <div class="contact_form_f contact_form_part">
            <h2>KONTAKTIRAJTE NAS</h2>
            <h4>Za sve ostale informacije, pošaljite nam poruku putem kontakt forme. </h4>
            <form method="post">
                <div class="contact_input">
                    <input type="text" placeholder="Vaše ime i prezime" name="name">
                </div>
                <div class="contact_input">
                    <input type="text" placeholder="Vaš broj telefona ili email" name="phone">
                </div>
                <div class="contact_input contact_input_2">
                    <textarea name="details" placeholder="Vaša poruka"></textarea>
                </div>
                <div class="contact_input contact_input_3" title="Pošaljite poruku  ">
                    <input type="submit" value="POŠALJITE">
                </div>
            </form>
        </div>
        <div class="contact_form_r contact_form_part">
            <h4>OSTANIMO U KONTAKTU</h4>
            <p>
                Kontaktirajte nas na telefone : <br>
                (+387) 33 444 555 <br>
                (+387) 61 666 777 <br>
            </p>

            <h4>Villa Una</h4>
            <p>Tina  Ujevića 11,  23450 Obrovac, Hrvatska</p>
        </div>
    </div>
</div>

<?php require_once 'parts/footer/footer.php'; ?>
</body>
</html>