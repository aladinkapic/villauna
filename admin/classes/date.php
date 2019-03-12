<?php
class Date{
    public $_pdo, $_query, $_day=null, $_month=null, $_year=null, $_numberOfViews;
    public function __construct($day = null, $month = null, $year = null, $hash = null){
        $this->_pdo = DB::getInstance();
        if($day == null) return;
        $this->_query = $this->_pdo -> query("views");
        while($dayy = $this->_query -> fetch()){
            if($dayy['day'] == $day and $dayy['month'] == $month and $dayy['year'] == $year and $dayy['hash'] == $hash){
                $this->_day = $day;
                $this->_month = $month;
                $this->_year = $year;
                $this->_numberOfViews = $dayy['numOfViews'];
                $this->_numberOfViews++;
                break;
            }
        }
        if(!$this->_day){
            $number = 1;
            $insert = "INSERT INTO `views`(`day`,`month`,`year`,`numOfViews`,`hash`) VALUES ('{$day}','{$month}','{$year}','{$number}','{$hash}')";
            $this->_pdo->insert($insert);
        }else{
            $update = "UPDATE `views` SET `numOfViews` = '{$this->_numberOfViews}' WHERE day = $this->_day AND month = $this->_month ";
            $this->_pdo->insert($update);
        }
    }
    public function days($month, $year, $hash){
        $date = array();
        $this->_query = $this->_pdo -> query("views");
        while($day = $this->_query -> fetch()){
            if($month){
                if($day['month'] == $month and $day['year'] == $year and $day['hash'] == $hash){
                    array_push($date, $day['day'], $day['numOfViews']);
                }
            }else{
                if($day['year'] == $year and $day['hash'] == $hash){
                    array_push($date, $day['day'], $day['numOfViews']);
                }
            }
        }
        return $date;
    }

    public function numOfViews(){
        $views = 0;
        $this->_query = $this->_pdo -> query("views");
        while($view = $this->_query -> fetch()){
            $views += $view['numOfViews'];
        }
        return $views;
    }

}