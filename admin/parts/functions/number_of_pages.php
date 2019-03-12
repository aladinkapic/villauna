<?php

function number_of_pages($table){
    $db = new DB();
    $data_q = $db->query($table);
    $num_of_pages = 0;

    while($data = $data_q -> fetch()){
        $num_of_pages ++;
    }

    $number = ($num_of_pages / 6);
    if($number > (int)($number)) return ((int)($number+1));
    else return (int)$number;
}



function number_of_pages_of($table, $input){
    $db = new DB();
    $data_q = $db->query($table);
    $num_of_pages = 0;

    while($data = $data_q -> fetch()){
        if(strstr(mb_strtolower($data['company_name']), $input)){
            $num_of_pages ++;
        }
    }

    $number = ($num_of_pages / 6);
    if($number > (int)($number)) return ((int)($number+1));
    else return (int)$number;
}