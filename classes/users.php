<?php
class User{
    /** user->role(); 0 => standard user **/

    private $_pdo, $_query, $_id, $_hash, $_email, $_password, $_name, $_address, $_phone, $_company, $_city, $_code,  $_role, $_user_image, $_ip;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("users");


        if($id){
            while($user = $this->_query -> fetch()){
                if($user['id'] == $id){
                    $this->_id              = $user['id'];
                    $this->_email           = $user['email'];
                    $this->_password        = $user['password'];
                    $this->_name            = $user['name'];

                    $this->_address         = $user['address'];
                    $this->_phone           = $user['phone'];
                    $this->_company         = $user['company'];
                    $this->_city            = $user['city'];
                    $this->_code            = $user['postal_code'];
                    $this->_role            = $user['role'];

                    /* get user image */
                    $image_q = $this->_pdo -> query("images");
                    while($img = $image_q -> fetch()){
                        if($img['hash'] == $this->_hash){
                            $this->_user_image = $img['image'];
                            break;
                        }
                    }
                }
            }
        }else{

        }
    }

    public function get_ip(){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


    public function check_if_exists(){
        $query = $this->_pdo -> query("users");
        while($user = $query -> fetch()){
            if($user['ip'] == $this->get_ip()){
                return true;
            }
        }return false;
    }

    public function check_chat(){
        $query = $this->_pdo -> query("users");
        while($user = $query -> fetch()){
            if($user['ip'] == $this->get_ip()){
                return $user['open_chat'];
            }
        }return false;
    }

    public function open_chat($what, $ip){
        $this->_pdo -> action("UPDATE `users` SET `open_chat` = '{$what}' WHERE ip = '$ip'");
    }

    public function insert($name, $email){
        $this->_pdo -> action("INSERT INTO `users` (`name`,`email`,`ip`) VALUES ('{$name}','{$email}','{$this->get_ip()}') ");
    }

    public function get_id(){return $this->_id;}
    public function get_email(){return $this->_email;}
    public function get_password(){return $this->_password;}
    public function get_just_name(){return $this->_name;}
    public function get_address(){return $this->_address;}
    public function get_phone(){return $this->_phone;}
    public function get_company(){return $this->_company;}
    public function get_city(){ return $this->_city;}
    public function get_code(){ return $this->_code;}

    public function role(){return $this->_role; }

    public function set_active_time(){
        /*** Set online-offline status of user ***/
        $time = time();
        $d = date('d'); $m = date('m'); $y = date('y');
        $t = date("h:i:sa");
        $date = $d.'. '.$m.'. 20'.$y.' - '.$t;

        $this->_pdo -> action("UPDATE `users` SET `last_active_time` = '{$time}', `last_active_real_time` = '{$date}' WHERE id = '$this->_id'");

        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            $user_id = $user['id'];

            if(($time - $user['last_active_time']) <= 900){
                // user is online
                $what = 1;
                $this->_pdo -> action("UPDATE `users` SET `online` = '{$what}' WHERE id = '$user_id'");
            }else{
                // user is offline
                $what = 0;
                $this->_pdo -> action("UPDATE `users` SET `online` = '{$what}', `last_active_real_time` = '{$date}' WHERE id = '$user_id'");
            }
        }
    }


    function update_online_status(){
        /*** Set online-offline status of user ***/
        $time = time();
        $d = date('d'); $m = date('m'); $y = date('y');
        $t = date("h:i:sa");
        $date = $d.'. '.$m.'. 20'.$y.' - '.$t;

        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            $user_id = $user['id'];

            if(($time - $user['last_active_time']) <= 900){
                // user is online
                $what = 1;
                $this->_pdo -> action("UPDATE `users` SET `online` = '{$what}' WHERE id = '$user_id'");
            }else{
                // user is offline
                $what = 0;
                $this->_pdo -> action("UPDATE `users` SET `online` = '{$what}', `last_active_real_time` = '{$date}' WHERE id = '$user_id'");
            }
        }
    }

    /** check if user is online - by ID */
    public function user_online($id){
        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            if($user['id'] == $id){
                if($user['online']) return "Korisnik je online.";
                else return "Korisnik je zadnji put bio aktivan ".$user['last_active_real_time'];
            }
        }
    }

    public function login($email, $password, $check){
        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            if($user['email'] == $email){
                if($user['password'] == $password){
                    Session::setUsername($email, $user['id'], $user['role']);

                    $_SESSION['logged'] = true; // here we say okay, user is logged

                    return "logged";
                }else{
                    return "fail_password";
                }
            }
        }return "fail_email";
    }
    public function register($hash, $name, $email, $password, $role){

        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            if($user['email'] == $email){
                echo "already has";
                return;
            }
        }

        $company = "-"; $image = "avatar.png"; $cover = "cover.jpg"; $logo = "logo.jpeg";
        $this->_pdo -> action("INSERT INTO `user_images` (`hash`,`image`) VALUES ('{$hash}','{$image}') ");
        $this->_pdo -> action("INSERT INTO `user_cover_images` (`hash`,`image`) VALUES ('{$hash}','{$cover}') ");
        $this->_pdo -> action("INSERT INTO `user_company_images` (`hash`,`image`) VALUES ('{$hash}','{$logo}') ");

        echo $this->_pdo -> action("INSERT INTO `users` (`hash`,`email`,`password`,`name`,`role`,`company`) VALUES ('{$hash}','{$email}','{$password}','{$name}','{$role}','{$company}') ");
//        if() echo 'success';
//        else echo 'not success';
    }

    function get_first_admin(){
        $this->_query = $this->_pdo -> query("users");
        while($user = $this->_query -> fetch()){
            if($user['role'] == 'root')
                return $user['id'];
        }
    }

    public function check_psw($psw){
        if($psw == $this->_password) return true;
        else return "false";
    }

    public function number_of_users(){
        $this->_query = $this->_pdo -> query("users"); $counter = 0;
        while($user = $this->_query -> fetch()){
            if($user['role'] != 'root' and $user['role'] != 'moderator')
                $counter ++;
        }

        return $counter;
    }
}