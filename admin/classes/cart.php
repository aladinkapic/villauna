<?php
class Cart{
    private $_pdo, $_query, $_user_id, $_item_id, $_what, $_how_many, $_price, $_icon, $_boght;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("cart");

        if($id){
            while($service = $this->_query -> fetch()){
                if($service['id'] == $id){
                    $this->_user_id   = $service['user_id'];
                    $this->_item_id   = $service['item_id'];
                    $this->_what      = $service['what'];
                    $this->_how_many  = $service['how_many'];
                    $this->_price     = $service['price'];
                    $this->_icon      = $service['icon'];
                    $this->_boght     = $service['bought'];
                }
            }
        }
    }

    public function get_user_id(){return $this->_user_id;}
    public function get_item_id(){return $this->_item_id;}
    public function get_what(){return $this->_what;}
    public function get_how_many(){return $this->_how_many;}
    public function get_price(){return $this->_price;}
    public function get_icon(){return $this->_icon;}
    public function get_bought(){return $this->_boght;}


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
