<?php


function get_month($index){
    if($index == 0) return "Svi mjeseci";
    else if($index == 1) return "Januar";
    else if($index == 2) return "Februar";
    else if($index == 3) return "Mart";
    else if($index == 4) return "April";
    else if($index == 5) return "Maj";
    else if($index == 6) return "Juni";
    else if($index == 7) return "Juli";
    else if($index == 8) return "August";
    else if($index == 9) return "Septembar";
    else if($index == 10) return "Oktobar";
    else if($index == 11) return "Novembar";
    else if($index == 12) return "Decembar";
}



function days_left($d_e, $m_e, $y_e){
    $now = time(); // or your date as well
    $your_date = strtotime($y_e."-".$m_e."-".$d_e);
    $datediff = $your_date - $now;

    if(round($datediff / (60 * 60 * 24))){
        return round($datediff / (60 * 60 * 24));
    }else return 0;
}