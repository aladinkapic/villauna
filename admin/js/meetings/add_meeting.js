/** get month ***/

function set_day(value){
    var par = document.getElementById("meeting_day_s");
    var inp = document.getElementById("meeting_day");

    par.innerHTML = value;
    inp.value     = value;

    open_days();
}

var open_day = 0, open_month = 0, open_year = 0;

function open_days(){
    var days = document.getElementById("meeting_days");
    if(!open_day){
        open_day++;
        days.style.display = 'block';
    }
    else{open_day = 0; days.style.display = 'none';}
}


/*** months ***/
function set_month(value, text){
    var par = document.getElementById("meeting_month_s");
    var inp = document.getElementById("meeting_month");

    par.innerHTML = text;
    inp.value     = value;

    open_months();
}

function open_months(){
    var months = document.getElementById("meeting_months");
    if(!open_month){
        open_month++;
        months.style.display = 'block';
    }
    else{open_month = 0; months.style.display = 'none';}
}


/*** years ***/

function set_year(value, text){
    var par = document.getElementById("meeting_year_s");
    var inp = document.getElementById("meeting_year");

    par.innerHTML = text;
    inp.value     = value;

    open_years();
}

function open_years(){
    var years = document.getElementById("meeting_years");
    if(!open_year){
        open_year++;
        years.style.display = 'block';
    }
    else{open_year = 0; years.style.display = 'none';}
}



/********************************** SAVE MEETING **********************************/

function save_meeting(){
    var company_name    = document.getElementById("company_name").value;
    var company_adress  = document.getElementById("company_adress").value;
    var company_phone   = document.getElementById("company_phone").value;
    var d_m             = document.getElementById("meeting_day").value;
    var m_m             = document.getElementById("meeting_month").value;
    var y_m             = document.getElementById("meeting_year").value;
    var time_of_meeting = document.getElementById("time_of_meeting").value;
    var contact_person  = document.getElementById("contact_person").value;
    var email           = document.getElementById("email").value;
    var details         = document.getElementById("details").value;


    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200){
            window.location = "add_meeting.php?path=Administracija&cat=Sastanci&what=Dodajte%20sastanak&icon=fa-briefcase&desc=Dodajte%20novi%20sastanak";
        }
    };
    xml.open('POST', "parts/meetings/add_meeting.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("company_name=" + company_name + "&company_adress=" + company_adress + "&company_phone=" + company_phone + "&d_m=" + d_m + "&m_m=" + m_m + "&y_m=" + y_m  + "&time_of_meeting=" + time_of_meeting + "&contact_person=" + contact_person + "&email=" + email + "&details=" + details);
}



/******************************* SEARCH FOR MEETING ******************************/

function search_meeting(){
    var search_keyword = document.getElementById("search_part").value;

    window.location = "preview_meetings.php?path=Administracija&cat=Sastanci&what=Pregled%20sastanaka&icon=fa-briefcase&desc=Pregledajte%20sve%20zakazane%20/%20nezakazane%20sastanke&page=1&search=" + search_keyword;
}
