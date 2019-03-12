/*** WOrk with choose month ***/

var open_g_months = 0; var open_g_years = 0;

function open_get_months(){
    var months = document.getElementById("choose_month");

    if(!open_g_months){
        open_g_months ++;
        months.style.display = 'block';
    }else{
        open_g_months = 0;
        months.style.display = 'none';
    }
}

function open_get_years(){
    var months = document.getElementById("choose_year");

    if(!open_g_years){
        open_g_years ++;
        months.style.display = 'block';
    }else{
        open_g_years = 0;
        months.style.display = 'none';
    }
}



function get_month(what, text){
    var months_value = document.getElementById("months_value");
    var first_month = document.getElementById("first_month");

    first_month.value = what;

    months_value.innerHTML = text;
    open_get_months();
}

function get_year(what, text){
    var first_month = document.getElementById("first_month");
    var hash = document.getElementById("hashed_value");

    var month  = first_month.value;
    var year   = what;
    var filter = "single_month";

    var link = "analytics.php?path=Analitika&cat=Analitika&what=Pregled%20posjeta%20na%20aplikacijama&icon=fa-chart-line&desc=Detaljne%20informacije%20o%20posjetama%20na%20Vašoim%20web%20stranicama%20i%20aplikacijama.&month=" + month + "&year=" + year + "&filter=" + filter + "&hash=" + hash;
    // go to location
    window.location = link;
}











/*** end of choose month ***/