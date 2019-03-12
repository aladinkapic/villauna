<?php
class Category{
    /** user->role(); 0 => standard user **/

    private $_pdo, $_query, $_id, $_hash, $_title, $_parent, $_child;
    public function __construct($id = null){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("categories");
    }

    public function get_grandparent_name($grandparent_id){
        $this->_query = $this->_pdo -> query("categories");
        while($gradpa = $this->_query -> fetch()){
            if($gradpa['id'] == $grandparent_id){
                return $gradpa['title'];
            }
        }
    }




}