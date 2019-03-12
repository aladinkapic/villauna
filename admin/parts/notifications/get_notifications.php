<?php
require_once '../../classes/db.php';
require_once '../../classes/users.php';
require_once '../../parts/functions/get_month.php';

$db = new DB();
$user = new User($_SESSION['ID']);

$notify_q = $db->query("notifications");

while($notify = $notify_q -> fetch()){
    if($user->role() == 'user'){
        if($notify['user_id'] == $user->get_id() and !$notify['seen'] and !$notify['admin']){
            ?>

            <div class="single_notify">
                <div class="line"></div>
                <div class="white_circle">
                    <div class="color_circle color_circle_blue"></div>
                </div>
                <h5><?php echo $notify['header']; ?></h5>
                <p><?php echo $notify['text']; ?>,<span class="blue_text"> <?php echo $notify['d']; ?>. <?php echo get_month($notify['m']); ?> 20<?php echo $notify['y']; ?> u <?php echo $notify['time']; ?> h.</span></p>
            </div>

            <?php
        }
    }else {
        if(!$notify['seen'] and $notify['admin']){
            /*** Obavijest za administraciju ***/


            ?>

            <div class="single_notify">
                <div class="line"></div>
                <div class="white_circle">
                    <div class="color_circle color_circle_blue"></div>
                </div>
                <h5><?php echo $notify['header']; ?></h5>
                <p><?php echo $notify['text']; ?>,<span class="blue_text"> <?php echo $notify['d']; ?>. <?php echo get_month($notify['m']); ?> 20<?php echo $notify['y']; ?> u <?php echo $notify['time']; ?> h.</span></p>
            </div>

            <?php
        }
    }
}


