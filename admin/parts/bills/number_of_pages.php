<?php


function number_of_pages(){
    $db = new DB();
    $users_q = $db->query('bills');
    $number_of_pages = 0;

    while($user = $users_q -> fetch()){
        $number_of_pages ++;
    }

    $number = ($number_of_pages / 12);
    if($number > (int)($number)) return ((int)($number+1));
    else return (int)$number;
}