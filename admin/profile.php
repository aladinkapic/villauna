<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>

<!-- include domains class -->
<?php require_once 'classes/domains.php'; $domains = new Domain(); $domains_q = $db->query("domains"); ?>

<!-- set image hash -->
<?php Session::upadteImageHash($user->get_hash()); ?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/user_part/profile.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>

    <!-- upload files -->
    <script src="js/user_part/upload_files.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <div class="section_body">
        <div class="profile_details">
            <div class="cover_image">
                <img id="cover_image" src="uploaded_images/<?php echo $user->get_cover() ?>" alt="">
                <div class="cover_shaddow">
                    <form enctype="multipart/form-data">
                        <label for="cover_img">
                            <div class="upload_shadow" title="Promijenite sliku">
                                <i class="fas fa-image"></i>
                            </div>
                        </label>
                        <input type="file" onchange="upload_cover_image();" id="cover_img" name="cover_img[]" multiple="multiple" class="hidden_input">
                    </form>
                </div>

                <div id="profile_image">
                    <img id="main_profile_image" src="uploaded_images/<?php echo $user->get_image(); ?>" alt="">
                    <form enctype="multipart/form-data">
                        <label for="file">
                            <div class="upload_shadow" title="Promijenite sliku">
                                <i class="fas fa-image"></i>
                            </div>
                        </label>
                        <input type="file" onchange="upload_user_image();" id="file" name="file[]" multiple="multiple" class="hidden_input">
                    </form>
                </div>
            </div>

            <div class="mobile_name">
                <h4><?php echo $user->get_just_name() ?> <?php echo $user->get_just_surname() ?></h4>
            </div>

            <form action="parts/user_part/http/update_profile.php" method="post">
                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Vaše ime</p>
                    </div>
                    <div class="small_input small_input1 small_input_2">
                        <p>Vaše prezime</p>
                    </div>
                </div>
                <div class="form_w">
                    <div class="small_input small_input0">
                        <div class="small_input_img">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <input type="text" name="name" value="<?php echo $user->get_just_name() ?>" autocomplete="off">
                    </div>
                    <div class="small_input small_input1">
                        <div class="small_input_img">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <input type="text" name="surname" value="<?php echo $user->get_just_surname() ?>" autocomplete="off">
                        <input type="hidden" name="id" value="<?php echo $user->get_id(); ?>">
                    </div>
                </div>
                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Vaša email adresa</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-at"></i>
                    </div>
                    <input type="text" name="email" value="<?php echo $user->get_email() ?>" autocomplete="off">
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Vaša šifra</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-key"></i>
                    </div>
                    <input type="password" name="password" value="<?php echo $user->get_password() ?>"" autocomplete="off">
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Vaša adresa</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input type="text" name="adress" value="<?php echo $user->get_address() ?>" autocomplete="off">
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Vaša broj telefona</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-phone"></i>
                    </div>
                    <input type="text" name="phone" value="<?php echo $user->get_phone() ?>" autocomplete="off">
                </div>

                <!--
                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Vaša kompanija</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <input type="text" name="company" value="<?php echo $user->get_company() ?>" autocomplete="off">
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Broj telefona kompanije</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-phone"></i>
                    </div>
                    <input type="text" name="company_phone" value="<?php echo $user->get_company_phone() ?>" autocomplete="off">
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Adresa Vaše kompanije</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input type="text" name="company_address" value="<?php echo $user->get_company_address() ?>" autocomplete="off">
                </div> -->

                <div class="form_w form_w_button">
                    <div class="huge_button">
                        <input type="submit" value="SPREMITE">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>