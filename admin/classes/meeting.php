<?php
class Meeting{
    private $_pdo, $_query;
    public $company_name, $company_address, $company_phone, $d_c, $m_c, $y_c, $time_of_entry, $d_m, $m_m, $y_m, $time_of_meeting, $contact_person, $_email, $hash, $user_id;

    public function __construct($hash){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("meetings");

        if($hash){
            while($meeting = $this->_query -> fetch()){
                if($meeting['hash'] == $hash){
                    $this->company_name     = $meeting['company_name'];
                    $this->company_address  = $meeting['company_adress'];
                    $this->company_phone    = $meeting['company_phone'];
                    $this->d_c              = $meeting['d_c'];
                    $this->m_c              = $meeting['m_c'];
                    $this->y_c              = $meeting['y_c'];
                    $this->time_of_entry    = $meeting['time_of_entry'];
                    $this->d_m              = $meeting['d_m'];
                    $this->m_m              = $meeting['m_m'];
                    $this->y_m              = $meeting['y_m'];
                    $this->time_of_meeting  = $meeting['time_of_meeting'];
                    $this->contact_person   = $meeting['contact_person'];
                    $this->_email           = $meeting['email'];
                    $this->hash             = $meeting['hash'];
                    $this->user_id          = $meeting['user_id'];
                }
            }
        }
    }

}