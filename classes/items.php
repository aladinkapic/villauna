<?php
class Item{
    private $_pdo, $_query;
    public $_id, $_category, $_title, $_availablity, $_hash, $_vpc, $_mpc, $_discount, $_producer, $_specific_details, $_short_details;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("all_items");
        if($id){
            while($query = $this->_query -> fetch()){
                if($query['id'] == $id){
                    $this->_category         = $query['category'];
                    $this->_title            = $query['title'];
                    $this->_availablity      = $query['availablity'];
                    $this->_hash             = $query['hash'];
                    $this->_vpc              = $query['vpc'];
                    $this->_mpc              = $query['mpc'];
                    $this->_discount         = $query['discount'];
                    $this->_producer         = $query['producer'];
                    $this->_specific_details = $query['specific_details'];
                    $this->_short_details    = nl2br($query['short_details']);
                }
            }
        }
    }

    public function get_image(){
        $this->_query = $this->_pdo -> DESCquery("images");
        while($img = $this->_query -> fetch()){
            if($img['hash'] == $this->_hash){
                return $img['title'];
            }
        }
    }




}