<?php
class Bill{
    /** user->role(); 0 => standard user **/

    private $_pdo, $_query, $_user_id, $_hash, $_total_price, $_neto, $_pdv, $_d, $_m, $_y, $_paid;
    public function __construct($hash = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("bills");
        if($hash){
            while($bill = $this->_query -> fetch()){
                if($bill['hash'] == $hash){
                    $this->_user_id     = $bill['user_id'];
                    $this->_hash        = $bill['hash'];
                    $this->_total_price = $bill['total_price'];
                    $this->_neto        = $bill['neto'];
                    $this->_pdv         = $bill['pdv'];
                    $this->_d           = $bill['d'];
                    $this->_m           = $bill['m'];
                    $this->_y           = $bill['y'];
                    $this->_paid        = $bill['paid'];
                }
            }
        }
    }


    public function get_user_id(){return $this->_user_id;}
    public function get_status(){return $this->_paid; }
}