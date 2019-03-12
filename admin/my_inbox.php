<?php require_once 'classes/db.php'; $db = new DB(); require_once 'classes/users.php'; $user = new User($_SESSION['ID']); $user->set_active_time(); ?>

<!-- message class -->
<?php require_once 'classes/messages.php'; $mes_c = new Message();?>

<html>
<head>
    <title><?php echo $_GET['what']; ?></title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_icon.ico"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu/top_menu.css">
    <link rel="stylesheet" href="css/menu/left_menu.css">
    <link rel="stylesheet" href="css/support/inbox.css">

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
    <div class="section_body">
        <div class="inbox_part">
            <div class="inbox_left">
                <!--                <div class="small_header">-->
                <!--                    <h3> PREGLED SVIH PORUKA </h3>-->
                <!--                </div>-->
                <div class="small_header">
                    <h4>KORISNICI</h4>
                </div>

                <!-- check mailed users -->

                <?php

                /**** update seen status ****/

                $what = 1; $user_id = Input::get('user_id');
                $db->action("UPDATE `messages` SET `too_seen` = '{$what}' WHERE from_who = '$user_id'");




                $array_of_users = array('id' => array());

                $message_q = $db->DESCquery("messages");
                while($message = $message_q -> fetch()){
                    $found = 0;
                    if($message['from_who'] == $user->get_id()){
                        for($i=0; $i<count($array_of_users['id']); $i++){
                            if($message['to_who'] == $array_of_users['id'][$i]) $found = true;
                        }

                        if(!$found){
                            array_push($array_of_users['id'], $message['to_who']);
                        }
                    }else if($message['to_who'] == $user->get_id()){
                        for($i=0; $i<count($array_of_users['id']); $i++){
                            if($message['from_who'] == $array_of_users['id'][$i]) $found = true;
                        }

                        if(!$found){
                            array_push($array_of_users['id'], $message['from_who']);
                        }
                    }

                }
                ?>

                <?php
                for($i=0; $i<count($array_of_users['id']);$i++){
                    $admins_q = $db->query("users");
                    while($admin = $admins_q -> fetch()){
                        if($array_of_users['id'][$i] == $admin['id']){
                            ?>
                            <a href="my_inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu&user_id=<?php echo $admin['id']; ?>">
                                <div class="show_user <?php if(Input::get('user_id') == $admin['id']) echo 'current_user'; ?>">
                                    <div class="show_user_img">
                                        <img src="images/user.jpg" alt="">
                                    </div>
                                    <div class="singal_circle <?php if($admin['online']){echo 'singal_circle_on'; }else {echo 'singal_circle_off';} ?>"></div>
                                    <h5><?php echo $admin['name'].' '.$admin['surname']; ?></h5>
                                    <p><?php echo $mes_c->get_last_message($user->get_id(), $admin['id']); ?></p>
                                </div>
                            </a>
                            <?php
                        }
                    }
                }
                ?>

                <!--                <div class="show_user current_user">-->
                <!--                    <div class="show_user_img">-->
                <!--                        <img src="images/user.jpg" alt="">-->
                <!--                    </div>-->
                <!--                    <div class="singal_circle singal_circle_on"></div>-->
                <!--                    <h5>John Doe</h5>-->
                <!--                    <p>Ovo je bila zadnja poruk...</p>-->
                <!--                </div>-->

<!--                <div class="small_header">-->
<!--                    <h4>OFFLINE </h4>-->
<!--                </div>-->
                <?php
                $admins_q = $db->query("users");
                while($admin = $admins_q -> fetch()){
                    if($admin['role'] == 'root' || $admin['role'] == 'moderator'){
                        if($admin['online'] == 12){
                            ?>
                            <a href="inbox.php?path=Moj%20DMD&cat=Centar%20za%20podršku&what=Poruke&icon=fa-envelope-open&desc=Pošaljite%20Vaš%20upit%20de%20dobijte%20informacije%20u%20kratkom%20vremenu&user_id=<?php echo $admin['id']; ?>">
                                <div class="show_user <?php if(Input::get('user_id') == $admin['id']) echo 'current_user'; ?>">
                                    <div class="show_user_img">
                                        <img src="images/user.jpg" alt="">
                                    </div>
                                    <div class="singal_circle singal_circle_off"></div>
                                    <h5><?php echo $admin['name'].' '.$admin['surname']; ?></h5>
                                    <p>Ovo je bila zadnja poruk...</p>
                                </div>
                            </a>
                            <?php
                        }
                    }
                }
                ?>
                <!--                <div class="show_user">-->
                <!--                    <div class="show_user_img">-->
                <!--                        <img src="images/user.jpg" alt="">-->
                <!--                    </div>-->
                <!--                    <div class="singal_circle singal_circle_off"></div>-->
                <!--                    <h5>John Doe</h5>-->
                <!--                    <p>Ovo je bila zadnja poruk...</p>-->
                <!--                </div>-->
            </div>
            <div class="inbox_right">
                <div class="user_header">
                    <?php $message_user = new User(Input::get('user_id')); ?>
                    <div class="current_user_img">
                        <img src="uploaded_images/<?php echo $message_user->get_image(); ?>" alt="">
                    </div>
                    <h5><?php echo $message_user->get_name(); ?></h5>
                    <p><?php echo $message_user->user_online(Input::get('user_id')); ?></p>
                </div>
                <div class="message_part" id="all_messages">
                    <?php
                    $messages_q = $db->query("messages");
                    while($message = $messages_q -> fetch()){
                        if(($message['from_who'] == Input::get('user_id') and $message['to_who'] == $user->get_id()) || ($message['to_who'] == Input::get('user_id') and $message['from_who'] == $user->get_id())){
                            if($message['from_who'] == Input::get('user_id') and $message['to_who'] == $user->get_id()){
                                $image_user = new User($message['from_who']);
                                ?>
                                <div class="single_message">
                                    <div class="single_message_img">
                                        <img src="uploaded_images/<?php echo $image_user->get_image(); ?>" alt="">
                                    </div>
                                    <div class="message_text">
                                        <p><?php echo $message['message']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="single_message single_message_right">
                                    <div class="single_message_img">
                                        <img src="uploaded_images/<?php echo $user->get_image(); ?>" alt="">
                                    </div>
                                    <div class="message_text">
                                        <p><?php echo $message['message']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }

                    ?>
                    <!--
                    <div class="single_message">
                        <div class="single_message_img">
                            <img src="images/user.jpg" alt="">
                        </div>
                        <div class="message_text">
                            <p>Expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</p>
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                        </div>
                    </div>
                    <div class="single_message single_message_right">
                        <div class="single_message_img">
                            <img src="images/user.jpg" alt="">
                        </div>
                        <div class="message_text">
                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</p>
                            <p>Denouncing pleasure and praising pain was born and I will give you a complete account.</p>
                        </div>
                    </div> -->
                    <script> scroll_bottom(); reload_message = 1; </script>
                </div>
                <div class="send_message">
                    <input type="text" id="message_field" placeholder="Upišite poruku i pritisnite enter">
                    <input type="hidden" id="to_who" value="<?php echo Input::get('user_id') ?>">
                    <input type="hidden" id="from_who" value="<?php echo $user->get_id(); ?>">
                </div>

                <!-- include script -->
                <script src="js/support/send_message.js"></script>
            </div>
        </div>
    </div>
</section>
</body>
</html>