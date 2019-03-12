<div class="menu_top">
    <div class="menu_body">
        <!-- <h1>Villa Una</h1>
        <div class="menu_top">
            <p>
                <i class="fas fa-at"></i>
                info@villauna.net
            </p>
            <p>
                <i class="fas fa-phone"></i>
                (+387) 33 222 555
            </p>
        </div>
        <div class="menu_links">

        </div> -->
    </div>
    <a href="index.php">
        <div class="name_of_it">
            <h1>Villa Una</h1>
        </div>
    </a>
    <div class="mobile_menu" onclick="mobile_menu();">
        <i class="fas fa-bars"></i>
    </div>
    <div class="menu_links" id="mobile_li">
        <div class="just_mobile">
            <p>
                <a href="">HR</a> /
                <a href="">EN</a> /
                <a href="">DE</a>
            </p>
        </div>
        <div class="just_mobile">
            <a href="index.php">
                <p>NASLOVNA</p>
            </a>
        </div>
        <div class="just_mobile">
            <a href="apartments.php">
                <p>APARTMANI</p>
            </a>
        </div>
        <div class="just_mobile">
            <a href="prices.php">
                <p>CIJENE</p>
            </a>
        </div>
        <div class="just_mobile">
            <a href="news.php">
                <p>NOVOSTI</p>
            </a>
        </div>
        <div class="just_mobile">
            <a href="aboutus.php">
                <p>O NAMA</p>
            </a>
        </div>
        <div class="just_mobile">
            <a href="contactus.php">
                <p>KONTAKT</p>
            </a>
        </div>
    </div>
    <div class="menu_icons">
        <div class="icon_w icon_w_news" title="Pogledajte zadnje dodane novosti .">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="icon_w icon_mail" title="Pošaljite nam email - info@villauna.net">
            <a href="mailto:info@villauna.net?Subject=Hello%20again">
                <i class="fas fa-at"></i>
            </a>
        </div>
        <div class="icon_w" title="Pozovite nas na (00387) 33 555 444">
            <i class="fas fa-phone"></i>
        </div>
    </div>
</div>

<div class="chat_icon" title="Chat !" onclick="open_chat();">
    <i class="fas fa-comments"></i>
</div>

<div class="full_chat <?php if(!$user->check_chat()) echo "full_chat_hidden"; ?>" id="whole_chat">
    <div class="chat_header">
        <p>Villa Una - Podrška</p>
        <i class="fas fa-times" title="Close" onclick="open_chat();"></i>
    </div>
    <div class="chat_body" id="messages_body">
        <?php
        if(!$user -> check_if_exists()){
            ?>
            <div id="user_input">
                <div class="input_form">
                    <input type="text" placeholder="Vaše ime .." id="name" autocomplete="off">
                </div>
                <div class="input_form">
                    <input type="email" placeholder="Email .." id="email" autocomplete="off">
                </div>
                <div class="input_form input_form2" onclick="insert_user();">
                    <input type="submit" value="SPREMITE">
                </div>
            </div>
            <?php
        }else{
            ?>
            <div id="user_messages">
                <?php
                $message_q = $db->query("messages");

                while($msg = $message_q -> fetch()){
                    if($msg['from_who'] == $user->get_ip()){
                        if($msg['admin']){
                            ?>
                            <div class="message left_message">
                                <div class="img_w">
                                    <img src="admin/images/customer-support.png" alt="">
                                </div>
                                <div class="message_p">
                                    <p><?php echo $msg['message']; ?></p>
                                </div>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="message right_message">
                                <div class="message_p">
                                    <p><?php echo $msg['message']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
            <?php
        }
        ?>


        <!--
        <div class="message left_message">
            <div class="img_w">
                <img src="admin/images/customer-support.png" alt="">
            </div>
            <div class="message_p">
                <p>This is my first message ..</p>
            </div>
        </div>

        <div class="message right_message">
            <div class="message_p">
                <p>This is my first message and it can be long as much I want.</p>
            </div>
        </div>

        <div class="message left_message">
            <div class="img_w">
                <img src="admin/images/customer-support.png" alt="">
            </div>
            <div class="message_p">
                <p>This is my first message ..</p>
            </div>
        </div>

        <div class="message right_message">
            <div class="message_p">
                <p>This is my first message and it can be long as much I want.</p>
            </div>
        </div> -->
    </div>
    <div class="chat_send">
        <input type="text" placeholder="Poruka .." id="message_input">
        <input type="hidden" value="<?php echo $user->check_chat(); ?>" id="is_chat_open">
        <input type="hidden" value="<?php echo $user->get_ip(); ?>" id="user_ip">
        <div class="send_w">
            <i class="fas fa-location-arrow"></i>
        </div>
    </div>
</div>

<script src="js/menu/search.js"></script>
<script>check_for_messages();</script>