<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>
flybos_mailster_actions
<!-- include domains class -->
<?php require_once 'classes/domains.php'; $domains = new Domain(); $domains_q = $db->query("domains"); ?>

<!-- check all bills -->
<?php $bills_q = $db->DESCquery("bills"); ?>


<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/user_part/profile.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/bills/bills_preview.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- scripts -->
    <script src="js/menu/menu.js"></script>
</head>
<body>
<?php require_once 'parts/menu/top_menu.php'; ?>
<?php require_once 'parts/menu/left_menu.php'; ?>
<section>
    <?php require_once 'parts/section_header.php'; ?>
    <?php $user = new User(Input::get('user_id')); ?>

    <div class="section_body">
        <div class="profile_details" style="padding-bottom:20px;">
            <div class="cover_image">
                <img id="cover_image" src="uploaded_images/<?php echo $user->get_cover() ?>" alt="">

                <div id="profile_image">
                    <img id="main_profile_image" src="uploaded_images/<?php echo $user->get_image(); ?>" alt="">
                </div>
            </div>
            <form action="parts/user_part/http/update_profile.php" method="post">
                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Ime</p>
                    </div>
                    <div class="small_input small_input1 small_input_2">
                        <p>Prezime</p>
                    </div>
                </div>
                <div class="form_w">
                    <div class="small_input small_input0">
                        <div class="small_input_img">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <input type="text" name="name" value="<?php echo $user->get_just_name() ?>" autocomplete="off" readonly>
                    </div>
                    <div class="small_input small_input1">
                        <div class="small_input_img">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <input type="text" name="surname" value="<?php echo $user->get_just_surname() ?>" autocomplete="off" readonly>
                        <input type="hidden" name="id" value="<?php echo $user->get_id(); ?>">
                    </div>
                </div>
                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Email adresa</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-at"></i>
                    </div>
                    <input type="text" name="email" value="<?php echo $user->get_email() ?>" autocomplete="off" readonly>
                </div>



                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Adresa stanovanja</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input type="text" name="adress" value="<?php echo $user->get_address() ?>" autocomplete="off" readonly>
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Broj telefona</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-phone"></i>
                    </div>
                    <input type="text" name="phone" value="<?php echo $user->get_phone() ?>" autocomplete="off" readonly>
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Kompanija</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <input type="text" name="company" value="<?php echo $user->get_company() ?>" autocomplete="off" readonly>
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
                    <input type="text" name="company_phone" value="<?php echo $user->get_company_phone() ?>" autocomplete="off" readonly>
                </div>


                <div class="form_w">
                    <div class="small_input small_input0 small_input_2">
                        <p>Adresa kompanije</p>
                    </div>
                </div>
                <div class="classic_input">
                    <div class="small_input_img">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input type="text" name="company_address" value="<?php echo $user->get_company_address() ?>" autocomplete="off" readonly>
                </div>
            </form>
        </div>


        <div class="bills_wrapper">
            <div class="single_bill single_bill_h">
                <div class="single_bill_p single_bill_hash">
                    <p>BROJ NARUDŽBE</p>
                </div>
                <div class="single_bill_p single_bill_c">
                    <p>UKUPNA CIJENA</p>
                </div>
                <div class="single_bill_paid">
                    <p>PLAĆENO</p>
                </div>
                <div class="single_bill_action">
                    <p>#</p>
                </div>
            </div>
            <?php
            $counter = 0;
            while($bill = $bills_q -> fetch()){
                $user_b = new User($bill['user_id']);
                if($bill['user_id'] == $user->get_id()){
                    ?>
                    <div class="single_bill">
                        <div class="single_bill_p single_bill_hash">
                            <p><?php echo $bill['hash']; ?></p>
                        </div>
                        <div class="single_bill_p single_bill_c">
                            <p><?php echo $bill['total_price']; ?> BAM</p>
                        </div>
                        <div class="single_bill_paid" title="Do sad plaćeno <?php echo $bill['paid_money']; ?> BAM">
                            <?php
                            if($bill['full_paid']) echo '<p class="green">DA</p>';
                            else echo '<p class="red">NE </p>';
                            ?>
                        </div>
                        <div class="single_bill_action">
                            <p>
                                <a href="parts/bills/http/delete_bill.php?page=<?php echo Input::get('page'); ?>&id=<?php echo $bill['id']; ?>" title="Obrišite fakturu">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <span>|</span>
                                <a href="single_bill_preview.php?hash=<?php echo $bill['hash']; ?>" title="Pregled fakture">
                                    <i class="fas fa-street-view" title="Pregled fakture"></i>
                                </a>
                                <span>|</span>
                                <a href="bill_change.php?path=Administracija&cat=Fakture&what=<?php echo $bill['hash'].' - '.$bill['total_price'].' BAM'; ?>&icon=fa-map&desc=Pregled te izmjene stanja fakture&page=<?php echo Input::get('page'); ?>&hash=<?php echo $bill['hash']; ?>">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </a>
                                <?php
                                if($bill['paid']){
                                    ?>
                                    <!--                                <a href="parts/bills/http/change_status.php?page=--><?php //echo Input::get('page'); ?><!--&id=--><?php //echo $bill['id']; ?><!--&what=0" title="Označite kao neplaćeno">-->
                                    <!--                                    <i class="fas fa-times"></i>-->
                                    <!--                                </a>-->
                                    <?php
                                }
                                else{
                                    ?>
                                    <!--                                <a href="parts/bills/http/change_status.php?page=--><?php //echo Input::get('page'); ?><!--&id=--><?php //echo $bill['id']; ?><!--&what=1" title="Označite kao plaćeno">-->
                                    <!--                                    <i class="fas fa-check"></i>-->
                                    <!--                                </a>-->
                                    <?php
                                }
                                ?>
                                <span>|</span>
                                <a href="bill_services.php?path=Administracija&cat=Fakture&what=Pregled usluga iz fakture&icon=fa-map&desc=Pogledajte sve usluge iz fakture te ih modifikujte&page=<?php echo Input::get('page'); ?>&hash=<?php echo $bill['hash']; ?>" title="Pregled fakture">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>
</body>
</html>