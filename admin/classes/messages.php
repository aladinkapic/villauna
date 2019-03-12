<?php
class Message{
    private $_pdo, $_query, $_message, $_from_who, $_to_who, $_from_seen, $_to_seen, $_time;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("messages");

        if($id){
            while($service = $this->_query -> fetch()){
                if($service['id'] == $id){
                    $this->_message    = $service['message'];
                    $this->_from_who   = $service['from_who'];
                    $this->_to_who     = $service['to_who'];
                    $this->_from_seen  = $service['from_seen'];
                    $this->_to_seen    = $service['to_seen'];
                    $this->_time       = $service['time'];
                }
            }
        }
    }

    public function get_last_message($from, $to){
        $this->_query = $this->_pdo -> DESCquery("messages"); $message = '';
        $return_m = ''; $counter = 0;

        while($mes = $this->_query -> fetch()){
            if(($mes['from_who'] == $from and $mes['to_who'] == $to) or ($mes['from_who'] == $to and $mes['to_who'] == $from)){
                $message = $mes['message'];
                break;
            }
        }

        for($i=0; $i<strlen($message); $i++, $counter++){
            if($counter >= 22){
                break;
            }

            $return_m.=$message[$i];
        }

        return ($return_m.='...');
    }


    function number_of_articles($user_id){
        $this->_query = $this->_pdo -> query("cart"); $counter = 0;

        while($item = $this->_query -> fetch()){
            if($item['user_id'] == $user_id and !$item['bought']){
                $counter ++;
            }
        }

        return $counter;
    }
}
