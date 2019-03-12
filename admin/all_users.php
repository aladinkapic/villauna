<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>

<!-- users query -->
<?php $users_q = $db->query("users"); ?>

<!-- get page number, next and previous -->

<?php
$page = Input::get('page');
$next = $page + 1;
if($page > 1){
    $previous = $page - 1;
}else $previous = 1;

require_once 'parts/user_part/number_of_pages.php';

echo $number_of = number_of_pages();


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
    <link rel="stylesheet" href="css/user_part/all_users.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
    <script src="js/user_part/search_users.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <!-- https://demo.architectui.com/default/#/tables/datatables-custom-components -->
        <div class="users_wrapper">
            <div class="search_users">
                <input type="text" id="search_users" placeholder="John Doe || Johns Company" value="<?php echo Input::get('search'); ?>">
                <input type="hidden" id="hidden_page" value="<?php echo Input::get('page'); ?>">
                <div class="input_button" onclick="search_users();">
                    <input type="submit" value="PRETRAŽITE">
                </div>
<!--                <div id="results">-->
<!--                    <div class="single_result">-->
<!--                        <p>Naziv kompanije</p>-->
<!--                    </div>-->
<!--                    <div class="single_result">-->
<!--                        <p>John Doe (Johns Company)</p>-->
<!--                    </div>-->
<!--                </div>-->
            </div>

            <div class="single_user">
                <div class="user_value user_value_2">
                    <p>NAZIV KORISNIKA</p>
                </div>
                <div class="user_value">
                    <p>NAZIV KOMPANIJE</p>
                </div>
                <div class="user_options">
                    <p>OPCIJE</p>
                </div>
            </div>
            <?php



            while($new_user = $users_q -> fetch()){
                if(!empty(Input::get('search'))){
                    $base   = mb_strtolower($new_user['name'].' '.$new_user['surname']);
                    $base_c = mb_strtolower($new_user['company']);
                    $key    = mb_strtolower(Input::get('search'));

                    if(strstr($base, $key) || strstr($base_c, $key)){
                        ?>
                        <div class="single_user single_user_2">
                            <div class="user_value user_value_2">
                                <p><?php echo $new_user['name'].' '.$new_user['surname']; ?></p>
                            </div>
                            <div class="user_value">
                                <p><?php echo $new_user['company']; ?></p>
                            </div>
                            <div class="user_options">
                                <p>
                                    <i class="fas fa-trash-alt" title="Obrišite korisnika"></i>
                                    <span>|</span>
                                    <a href="user_preview.php?path=Osobni podaci&cat=Korisnici&what=<?php echo $new_user['name'].' '.$new_user['surname']; ?>&icon=fa-users&desc=Pregled korisnika te njihovih faktura&user_id=<?php echo $new_user['id']; ?>">
                                        <i class="fas fa-street-view"></i>
                                    </a>
                                    <span>|</span>
                                    <a href="my_inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu&user_id=<?php echo $new_user['id']; ?>" title="Pošaljite poruku !!">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <span>|</span>
                                    <a href="">
                                        <i class="fas fa-code"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <?php
                    }

                }else{
                    if($new_user['role'] != 'root' && $new_user['role'] != 'moderator'){
                        ?>
                        <div class="single_user single_user_2">
                            <div class="user_value user_value_2">
                                <p><?php echo $new_user['name'].' '.$new_user['surname']; ?></p>
                            </div>
                            <div class="user_value">
                                <p><?php echo $new_user['company']; ?></p>
                            </div>
                            <div class="user_options">
                                <p>
                                    <i class="fas fa-trash-alt" title="Obrišite korisnika"></i>
                                    <span>|</span>
                                    <a href="user_preview.php?path=Osobni podaci&cat=Korisnici&what=<?php echo $new_user['name'].' '.$new_user['surname']; ?>&icon=fa-users&desc=Pregled korisnika te njihovih faktura&user_id=<?php echo $new_user['id']; ?>">
                                        <i class="fas fa-street-view"></i>
                                    </a>
                                    <span>|</span>
                                    <a href="my_inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu&user_id=<?php echo $new_user['id']; ?>" title="Pošaljite poruku !!">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <span>|</span>
                                    <a <a href="user_domains.php?path=Administracija&cat=Korisnici&what=Pregled korisničkih domena&icon=fa-users&desc=Izaberite domenu i kreirajte hash kod za integraciju&user_id=<?php echo $new_user['id']; ?>">
                                        <i class="fas fa-code"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                }
            }

            ?>

            <div class="page_numerator">
                <a href="all_users.php?path=Administracija&cat=Korisnici&what=Pregled%20korisnika&icon=fa-users&desc=Pregledajte%20sve%20registrovane%20korisnike&page=<?php echo $previous; ?>">
                    <div class="previous">
                        <p>Prethodna</p>
                    </div>
                </a>

                <div class="number_of_sites">
                    <?php
                    for($i=0; $i<$number_of; $i++){
                        ?>
                        <a href="all_users.php?path=Administracija&cat=Korisnici&what=Pregled%20korisnika&icon=fa-users&desc=Pregledajte%20sve%20registrovane%20korisnike&page=<?php echo $i+1; ?>">
                            <div class="single_number">
                                <p><?php echo $i+1; ?></p>
                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>

                <a href="all_users.php?path=Administracija&cat=Korisnici&what=Pregled%20korisnika&icon=fa-users&desc=Pregledajte%20sve%20registrovane%20korisnike&page=<?php echo $next; ?>">
                    <div class="previous next">
                        <p>Sljedeća</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>
</body>
</html>