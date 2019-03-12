<?php
require_once '../../../classes/db.php';
require_once '../../parts/functions/get_month.php';
require_once '../../classes/users.php';
error_reporting(0);
$db = new DB(); $events = $db->query("calendar_events");


$user_id = $_POST['user_id'];
$d       = $_POST['d'];
$m       = $_POST['m'];
$y       = $_POST['y'];



while($event = $events -> fetch()){
    if($user_id == 'all'){
        if($event['d'] == $d and $event['m'] == $m and $event['y'] == $y){
            $user = new User($event['user_id']);
            ?>
            <div class="single_agenda_d">
                <div class="line"></div> <div class="out_circle"><div class="inner_circle"></div></div>
                <div class="single_a_d_text">
                    <h4><?php echo $event['header']; ?> - <span><?php echo $user->get_company(); ?></span></h4>
                    <p>
                        <?php echo $event['text']; ?>
                        <span>
                        <br> <br>
                            <?php echo $event['d'].'. '.get_month($event['m']).' '.$event['y'].' - '.$event['time']; ?>
                            <br> <br>
                        </span>
                    </p>
                </div>
            </div>
            <?php
        }
    }else if($event['user_id'] == $user_id and $event['d'] == $d and $event['m'] == $m and $event['y'] == $y){
        ?>
        <div class="single_agenda_d">
            <div class="line"></div> <div class="out_circle"><div class="inner_circle"></div></div>
            <div class="single_a_d_text">
                <h4><?php echo $event['header']; ?></h4>
                <p>
                    <?php echo $event['text']; ?>
                    <span>
                    <br> <br>
                        <?php echo $event['d'].'. '.get_month($event['m']).' '.$event['y'].' - '.$event['time']; ?>
                        <a href="#" onclick="delete_it('<?php echo $event["id"]; ?>', '<?php echo $event["user_id"]; ?>');">
                            OBRIŠITE
                        </a>
                        <br> <br>
                    </span>
                </p>
            </div>
        </div>
        <?php
    }
}