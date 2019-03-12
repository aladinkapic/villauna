<?php
class Domain{
    /** user->role(); 0 => standard user **/

    private $_pdo, $_query, $_ext, $_price, $_neto, $_pdv;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("domains");

        if($id){
            while($domains = $this->_query -> fetch()){
                if($domains['id'] == $id){
                    $this->_ext = $domains['ext'];
                    $this->_price = $domains['price'];
                    $this->_neto = $domains['neto'];
                    $this->_pdv = $domains['pdv'];
                }
            }
        }
    }

    public function get_ext(){return $this->_ext;}
    public function get_price(){return $this->_price;}

    public function number_of_domains(){
        $this->_query = $this->_pdo -> query("domains"); $counter = 0;
        while($domain = $this->_query -> fetch()){
            $counter ++;
        }

        return $counter;
    }
}


class Hosting{
    private $_pdo, $_query, $_title, $_value, $_price, $_neto, $_pdv;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("hostings");
        if($id){
            while($host = $this->_query -> fetch()){
                if($host['id'] == $id){

                    $this->_title = $host['title'];
                    $this->_value = $host['value'];
                    $this->_price = $host['price'];
                    $this->_neto  = $host['neto'];
                    $this->_pdv   = $host['pdv'];
                }
            }
        }
    }

    public function get_title(){return $this->_title;}
    public function get_value(){return $this->_value;}
    public function get_price(){return $this->_price;}

    public function number_of_domains(){
        $this->_query = $this->_pdo -> query("hostings"); $counter = 0;
        while($domain = $this->_query -> fetch()){
            $counter ++;
        }

        return $counter;
    }
}