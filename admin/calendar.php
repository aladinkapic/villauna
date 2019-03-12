<?php require_once 'classes/db.php'; $db = new DB(); require_once '../classes/users.php'; $user = new User($_SESSION['ID']); ?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">

    <link rel="stylesheet" href="css/facebook/calendar.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
    <script src="js/facebook/calendar.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <div id="calender_w">
            <div class="get_company">
                <form action="parts/bills/http/set_company.php" method="post">
                    <input type="text" id="company_name" name="title" placeholder="Naziv kompanije" autocomplete="off">
                </form>
                <div class="show_companies" id="all_companies">
                    <div class="single_company">
                        <p>Naziv kompanije</p>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>

                <script>
                    document.getElementById("company_name").onkeyup = function(evt) {
                        evt = evt || window.event;
                        if (evt.keyCode == 27) {
                            var all_companies = document.getElementById("all_companies");
                            all_companies.style.display = 'none';
                            return;
                        }
                        get_company();
                    };
                </script>
            </div>

            <!-- if company is set , display it -->
            <?php
            if(isset($_GET['name'])){
                $company_user = new User(Input::get('id'));
                ?>
                <div class="display_company">
                    <div class="company_name_s">
                        <p><?php echo $_GET['name'] ?></p>
                    </div>

                    <a href="user_preview.php?path=Osobni%20podaci&cat=Korisnici&what=John%20Doe&icon=fa-users&desc=Pregled%20korisnika%20te%20njihovih%20faktura&user_id=">
                        <div class="icon_go_to" title="Pregledajte korisnika">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                    </a>
                </div>
                <?php
                $company_id = $_GET['id'];
            }else $company_id = "all";
            ?>


            <div id="calender">
                <div class="calender_header">

                    <!-- control buttons -->

                    <div class="left_buttons">
                        <div class="single_link single_link0" onclick="this_month();">
                            <p>Danas</p>
                        </div>
                        <div class="single_link single_link1" onclick="previous_month();">
                            <p>Prijašnje</p>
                        </div>
                        <div class="single_link single_link2" onclick="next_month();">
                            <p>Sljedeće</p>
                        </div>
                    </div>


                    <div class="current_month">
                        <p id="current_month_title">Februar 2019</p>
                    </div>


                    <!-- agenda and month choose -->

                    <div class="left_buttons right_buttons">
                        <div class="single_link single_link0" onclick="show_month();">
                            <p>Cijeli mjesec</p>
                        </div>
                        <div class="single_link single_link1" onclick="show_agenda();">
                            <p>Agenta</p>
                        </div>
                    </div>
                </div>
                <div class="calender_days">
                    <div class="day_name day_name0">
                        <p>Nedjelja</p>
                    </div>
                    <div class="day_name">
                        <p>Ponedjeljak</p>
                    </div>
                    <div class="day_name">
                        <p>Utorak</p>
                    </div>
                    <div class="day_name">
                        <p>Srijeda</p>
                    </div>
                    <div class="day_name">
                        <p>Četvrtak</p>
                    </div>
                    <div class="day_name">
                        <p>Petak</p>
                    </div>
                    <div class="day_name">
                        <p>Subota</p>
                    </div>
                </div>
                <div class="calendar_agenda">
                    <div class="this_day_details">
                        <p id="agenda_date">14. Februar 2019. godine</p>
                    </div>

                    <div id="all_previews">

                    </div>
                    <div class="agenda_form <?php if($company_id == 'all'){echo 'agenda_form0';} ?>">
                        <div class="agenda_header">
                            <input type="text" placeholder="Naslov .." id="agenda_head">
                            <input type="hidden" value="<?php echo $company_id; ?>" id="user_id_s">
                        </div>
                        <div class="agenda_text">
                            <textarea id="agenda_text" placeholder="Tekst .."></textarea>
                        </div>
                        <div class="save_it" onclick="save_day_event();">
                            <p>SPREMITE </p>
                        </div>
                    </div>
                </div>
                <div class="calender_body">
                    <!--
                    <div class="single_day single_day_r single_day_b" title="Ovo je moj grad &#10; tu sam je sreoo">
                        <p class="day_num">12</p>
                        <h5>Ovo je prvi naslov</h5>
                        <h5>Drugi je također tu</h5>
                        <h5>Sa trećim se igramo</h5>
                        <h5>Četvrti dolazi uskoro</h5>
                    </div> -->
                </div>
            </div>
        </div>


        <script>
            var company_ajdi = '<?php echo $company_id; ?>';
            init_calendar();
        </script>
    </div>
</section>
</body>
</html>