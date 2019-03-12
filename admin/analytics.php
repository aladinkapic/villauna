<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); require_once 'classes/date.php'; ?>

<?php

$d = new Date();
$date = $d->days(Input::get('month'), Input::get('year'), Input::get('hash'));

require_once 'parts/functions/get_month.php';

?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/analytics/charts.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
    <script src="js/analytics/options.js"></script>
<!--    <script src="js/analytics/charts.js"></script>-->
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <div class="get_another_month">
            <div class="row first_row">
                <div class="col huge_coll">
                    <p>Pregledi po mjesecima</p>
                </div>
                <div class="col first_col" onclick="open_get_months();">
                    <p id="months_value"><?php echo get_month(Input::get('month')) ?></p>
                    <i class="fas fa-angle-down"></i>
                </div>
                <div class="col first_col last_col" onclick="open_get_years();">
                    <p><?php echo '20'.Input::get('year'); ?></p>
                    <i class="fas fa-angle-down"></i>
                </div>

                <input type="hidden" id="first_month" value="<?php echo Input::get('month'); ?>">
                <input type="hidden" id="first_year" value="<?php echo Input::get('year'); ?>">
                <input type="hidden" id="hashed_value" value="<?php echo Input::get('hash'); ?>">

                <!-- choose month -->
                <div class="chose_options" id="choose_month">
                    <div class="single_option" onclick="get_month('0', 'Svi mjeseci');">
                        <p>Svi mjeseci</p>
                    </div>
                    <div class="single_option" onclick="get_month('1', 'Januar');">
                        <p>Januar</p>
                    </div>
                    <div class="single_option" onclick="get_month('2', 'Februar');">
                        <p>Februar</p>
                    </div>
                    <div class="single_option" onclick="get_month('3', 'Mart');">
                        <p>Mart</p>
                    </div>
                    <div class="single_option" onclick="get_month('4', 'April');">
                        <p>April</p>
                    </div>
                    <div class="single_option" onclick="get_month('5', 'Maj');">
                        <p>Maj</p>
                    </div>
                    <div class="single_option" onclick="get_month('6', 'Juni');">
                        <p>Juni</p>
                    </div>
                    <div class="single_option" onclick="get_month('7', 'Juli');">
                        <p>Juli</p>
                    </div>
                    <div class="single_option" onclick="get_month('8', 'August');">
                        <p>August</p>
                    </div>
                    <div class="single_option" onclick="get_month('9', 'Septembar');">
                        <p>Septembar</p>
                    </div>
                    <div class="single_option" onclick="get_month('10', 'Oktobar');">
                        <p>Oktobar</p>
                    </div>
                    <div class="single_option" onclick="get_month('11', 'Novembar');">
                        <p>Novembar</p>
                    </div>
                    <div class="single_option" onclick="get_month('12', 'Decembar');">
                        <p>Decembar</p>
                    </div>
                </div>

                <!-- choose month -->
                <div class="chose_options" id="choose_year">
                    <div class="single_option" onclick="get_year('17', '2017');">
                        <p>2017</p>
                    </div>
                    <div class="single_option" onclick="get_year('18', '2018');">
                        <p>2018</p>
                    </div>
                    <div class="single_option" onclick="get_year('19', '2019');">
                        <p>2019</p>
                    </div>
                    <div class="single_option" onclick="get_year('20', '2020');">
                        <p>2020</p>
                    </div>
                </div>

            </div>
        </div>

        <div id="chart_div"></div>
        <?php require_once 'parts/analytics/single_chart.php'; ?>
    </div>
</section>
</body>
</html>