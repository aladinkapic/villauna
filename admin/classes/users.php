<?php
class User{
    /** user->role(); 0 => standard user **/

    private $_pdo, $_query, $_id, $_hash, $_email, $_password, $_name, $_surname, $_address, $_phone, $_company, $_company_phone, $_company_address, $_role, $_user_image, $_cover_image, $_company_logo;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("users");


        if($id){
            while($user = $this->_query -> fetch()){
                if($user['id'] == $id){
                    $this->_id              = $user['id'];
                    $this->_hash            = $user['hash'];
                    $this->_email           = $user['email'];
                    $this->_password        = $user['password'];
                    $this->_name            = $user['name'];
                    $this->_surname         = $user['surname'];
                    $this->_address         = $user['adress'];
                    $this->_phone           = $user['phone'];
                    $this->_company         = $user['company'];
                    $this->_company_phone   = $user['company_phone'];
                    $this->_company_address  = $user['company_adress'];

                    $this->_role     = $user['role'];

                    /* get user image */
                    $image_q = $this->_pdo -> query("user_images");
                    while($img = $image_q -> fetch()){
                        if($img['hash'] == $this->_hash){
                            $this->_user_image = $img['image'];
                            break;
                        }
                    }
                    /* get cover image */
                    $cover_q = $this->_pdo -> query("user_cover_images");
                    while($cover = $cover_q -> fetch()){
                        if($cover['hash'] == $this->_hash){
                            $this->_cover_image = $cover['image'];
                            break;
                        }
                    }

                    /* get company logo */
                    $logo_q = $this->_pdo -> query("user_company_images");
                    while($logo = $logo_q -> fetch()){
                        if($logo['hash'] == $this->_hash){
                            $this->_company_logo = $logo['image'];
                            break;
                        }
                    }
                }
            }
        }
    }
    public function get_id(){return $this->_id;}
    public function get_hash(){return $this->_hash;}
    public function get_email(){return $this->_email;}
    public function get_password(){return $this->_password;}
    public function get_name(){ return $this->_name.' '.$this->_surname; }
    public function get_just_name(){return $this->_name;}
    public function get_just_surname(){return $this->_surname;}
    public function get_address(){return $this->_address;}
    public function get_phone(){return $this->_phone;}
    public function get_company(){return $this->_company;}
    public function get_company_phone(){return $this->_company_phone;}
    public function get_company_address(){return $this->_company_address;}
    public function get_image(){return $this->_user_image;}
    public function get_cover(){return $this->_cover_image; }
    public function get_logo(){return $this->_company_logo; }

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
        while($user = $this->_query -> fetch()){
            if($user['email'] == $email){
                if($user['password'] == $password){
                    echo "logged";
                    Session::setUsername($email, $user['id'], $user['role']);
                    return;
                }else{
                    echo "fail_password";
                    return;
                }
            }
        }echo "fail_email";
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