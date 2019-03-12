<?php
session_start();
error_reporting(E_ALL);
class Redirect{
    public static function to($location=null){
        if($location){
            exit(header('Location: ' .$location));
            //exit();
        }
    }
}
class Input {
    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }else if(isset($_GET[$item])){
            return $_GET[$item];
        }
    }
}
class Session{
    private $_username;

    public static function setUsername($username, $id, $role){
        $_SESSION['username'] = $username;
        $_SESSION['ID'] = $id;
        $_SESSION['role'] = $role;
    }

    public static function setCity($username){
        $_SESSION['city'] = $username;
        return true;
    }

    public static function getID(){
        if(isset($_SESSION['ID'])) return $_SESSION['ID'];
        return false;
    }

    public function getUsername(){
        if(isset($_SESSION['username'])) return $_SESSION['username'];
        return false;
    }
    public static function existUsername(){
        return (isset($_SESSION['username'])) ? true : "offline";
    }
    /** Images hash */
    public static function setImageHash(){ return $_SESSION['imageHash'] = md5($_SESSION['username'].time()); }
    public static function upadteImageHash($hash){return $_SESSION['imageHash'] = $hash; }
    public static function getImageHash(){return $_SESSION['imageHash'];}
}


class DB{
    private static $_instance = null;
    private $_pdo, $_query, $_sql_stock, $_sql_from_file;
    public  function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=eurobrand','root','');
            //$this->_pdo = new PDO('mysql:host=localhost;dbname=dmd2_app','dmd2_root','enciklopedija');
            $this->_sql_stock = "TRUNCATE TABLE `stock`";
            $this->_sql_from_file = "TRUNCATE TABLE `from_file`";
        }catch(PDOException $e){
            echo "Problem with connecting to database!!";
        }
    }
    public function getId(){
        return $this->_pdo->lastInsertId();
    }
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($table){
        return $this->_pdo ->query("SELECT * FROM ". $table);
    }
    public function clear_stock(){
        $statement = $this->_pdo->prepare($this->_sql_stock);
        return($statement->execute());
    }
    public function clear_from_file(){
        $statement = $this->_pdo->prepare($this->_sql_from_file);
        return($statement->execute());
    }
    public function querySpecific($table, $id){
        return $this->_pdo ->query("SELECT * FROM ". $table." WHERE id = ".$id);
    }
    public function DESCquery($table){
        return $this->_pdo ->query("SELECT * FROM ". $table." ORDER BY ID DESC");
    }
    public function DESCCustonQuery($table, $order){
        return $this->_pdo ->query("SELECT * FROM ". $table." ORDER BY ".$order." DESC");
    }
    public function insert($insert){
        $this->_pdo->query($insert);
    }
    public function action($action){
//         $this->_pdo->query($action);
//         $var = $this->_pdo -> errorInfo();
//         print_r($var);

        if($this->_pdo->query($action)){
            $var = $this->_pdo -> errorInfo();
            //print_r($var);
            return true;
        }
        else return false;
    }
}