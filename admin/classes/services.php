<?php
class Service{
    private $_pdo, $_query, $_hash, $_title, $_parent, $_price, $_neto, $_pdv;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("service_categories");

        if($id){
            while($service = $this->_query -> fetch()){
                if($service['id'] == $id){
                    $this->_hash   = $service['hash'];
                    $this->_title  = $service['title'];
                    $this->_parent = $service['parent'];
                    $this->_price  = $service['price'];
                    $this->_neto   = $service['neto'];
                    $this->_pdv    = $service['pdv'];
                }
            }
        }
    }

    public function get_hash(){return $this->_hash;}
    public function get_title(){return $this->_title;}
    public function get_price(){return $this->_price;}
}
