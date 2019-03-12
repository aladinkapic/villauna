/** initialize calender with days **/


class myDate{
    // if constructor parameters are null, we are facing this current month
    constructor(y = null, m = null, d = null){
        if(y){
            this.date = new Date(y,m,d);
            console.log(this.date);
        }else this.date   = new Date();

        this.year   = this.date.getFullYear();
        this.month  = this.date.getMonth();
        this.day    = this.date.getDate();
        this.day_w  = this.date.getDay();


        this.months   = new Array("Januar", "Februar", "Mart", "April", "Maj", "Juni", "Juli", "August", "Septembar", "Oktobar", "Novembar", "Decembar");
        this.days_w   = new Array("Nedjelja", "Ponedjeljak", "Utorak", "Srijeda", "Četvrtak", "Petak", "Subota");
        this.months_d = new Array(31,28,31,30,31,30,31,31,30,31,30,31);
        if(this.year % 4 == 0) this.months_d[1] = 29; // leap year

        this.last_month_day = new Array();

        /** working with month table **/
        this.calendar = document.getElementsByClassName("calender_body")[0];
    }

    /** simple getters **/
    get_year(){return this.year; } // get current year instance
    get_month(){return this.month; } // get current month instance
    get_day(){return this.day; } // get current day instance

    // returns number of days for this month
    month_duration(){
        return this.months_d[this.month];
    }


    // returns last 7 days of previous month - or less than 7 days, depends on day current month starts
    last_month_days(){
        if(this.month == 0){
            // go back one day - we have 31 day
            return (31 - this.get_first_day() + 1);
        }else{
            return (this.months_d[this.month - 1] - this.get_first_day() + 1);
        }
    }

    // function for returning Month Name
    get_monthName(month = null){
        return this.months[this.month];
    }
    get_previous_month_name(){
        if(this.month == 0) return this.months[11];
        else return this.months[this.month - 1];
    }
    get_next_month_name(){
        if(this.month == 11) return this.months[0];
        else return this.months[this.month + 1];
    }


    // function for returnin Day Name
    get_dayName(day = null){
        if(day){
            return this.days_w[day];
        }else{
            return this.days_w[this.day_w];
        }
    }


    // get first day of specific month - initial this month
    get_first_day(){
        this.date.setDate(1);
        return this.date.getDay();
    }
}


/******************************** **********************************/

var main_date = new Date();

var c_day = main_date.getDate(), c_month = main_date.getMonth(), c_year = main_date.getFullYear();
var t_day = main_date.getDate(), t_month = main_date.getMonth(), t_year = main_date.getFullYear();

var f_day = main_date.getDate(), f_month = main_date.getMonth(), f_year = main_date.getFullYear();

/******************************** ***********************************/

function set_top_of_calendar(month, year){ // ** set month day and year at the top of calendar ** //
    var title = document.getElementById("current_month_title");
    title.innerHTML = month + ' ' + year;
}

function this_day(y, m, d, month_name){ // ** this is where magic happen ** //
    console.log("Datum : " + d + ' ' + month_name + ' ' + y);
    f_day = d; f_month = m; f_year = y;

    show_agenda(month_name);
}

function makeItHappenDelegate(y, m, d, month_name) { //make a function that returns function
    return function(){
        this_day(y, m, d, month_name) //call the real function
    }
}

/**** get onclick events for previous and next month -- > day and year ******/
function previous_month_click(y, m){
    if(m == -1) return new Array(y-1, 11);
    else return new Array(y, m);
}
function next_month_click(y, m){
    if(m == 12) return new Array(y+1, 0);
    else return new Array(y, m);
}

function init_calendar(){ // ** Update calendar ** //
    var calender = document.getElementsByClassName("calender_body");

    calender[0].innerHTML = ''; // reset calender

    var days_counter = 0; // for counting days

    var date = new myDate(c_year,c_month,c_day);
    var last_month_days = parseInt(date.last_month_days());
    var next_month_days = 1; // just counter for incerasing


    // ** Set title of calendar ** //
    set_top_of_calendar(date.get_monthName(), date.get_year());



    /*** WHAT WE ARE SEARCING FOR ***/
    console.log("User id : " + company_ajdi);

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);

            console.log(response);

            for(var i=0; i<6; i++){
                for(var j=0; j<7; j++){
                    var day = document.createElement("div");
                    var class_b_n = "single_day"; // start with base class
                    if(j < 6) class_b_n += ' single_day_r'; // add right border
                    if(i < 5) class_b_n += ' single_day_b'; // add bottom border



                    /* day number */
                    var day_n = document.createElement("p");
                    var num_class = "day_num";


                    // ** start clocking days ** //
                    if(i == 0 && j == date.get_first_day()) days_counter ++;


                    if(days_counter && days_counter < date.month_duration() + 1){ /*************** This month *****************/
                    day_n.innerHTML = days_counter;
                        num_class += ' day_num_b'; // black color

                        if(t_day == days_counter && date.get_month() == t_month && date.get_year() == t_year ){
                            class_b_n += ' single_day_back1';
                            document.getElementById("agenda_date").innerHTML = f_day + '. ' + date.get_monthName() + ' ' + f_year + '. godine'; // ** Set date on agenda ** //
                        }
                        // add title to object
                        var title = days_counter + ' ' + date.get_monthName() + ' ' + date.get_year() + '\n';

                        for(var k=0; k<response['d'].length; k++){
                            if(response['d'][k] == days_counter && response['m'][k] == date.get_month()){
                                var header = document.createElement("h5");
                                header.innerHTML = response['headers'][k];
                                day.appendChild(header);

                                response['headers'][k] = response['headers'][k].replace("<span>", "").replace("</span>", "");
                                //just_header += ();

                                title += (' \n ' + response['headers'][k]);
                            }
                        }

                        day.title = title;

                        // add onclick event listener
                        day.addEventListener("click", makeItHappenDelegate(date.get_year(), date.get_month(), days_counter, date.get_monthName()), false);
                        days_counter ++;
                    }


                    else if(days_counter > date.month_duration()){ /*************** Next month *****************/
                    day_n.innerHTML = next_month_days;
                        num_class += ' day_num_g'; // grey color

                        // add onclick event listener
                        day.addEventListener("click", makeItHappenDelegate(next_month_click(date.get_year(), date.get_month() + 1)[0], next_month_click(date.get_year(), date.get_month() + 1)[1], next_month_days, date.get_next_month_name()), false);
                        next_month_days++;
                    }



                    // ** PREVIOUS MONTH ** //
                    if(!days_counter ){ /************** Previous month month ***************/
                    day_n.innerHTML = last_month_days;
                        num_class += ' day_num_g'; // grey color

                        // add onclick event listener
                        day.addEventListener("click", makeItHappenDelegate(previous_month_click(date.get_year(), date.get_month() - 1)[0], previous_month_click(date.get_year(), date.get_month() - 1)[1], last_month_days, date.get_previous_month_name()), false);
                        last_month_days++;
                    }

                    day_n.className = num_class;
                    day.appendChild(day_n);
                    /* end of day number */



                    day.className = class_b_n; // assign class to object
                    calender[0].appendChild(day); // append object to calendar
                }
            }
        }
    };
    xml.open('POST', "parts/facebook/get_titles.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("user_id=" + company_ajdi + "&d=" + f_day + "&m=" + f_month + "&y=" + f_year);
}

/*********** SWITCH MONTHS ******************/

function this_month(){ /** go to this month **/
c_year = t_year; c_month = t_month; c_day = t_day;
    init_calendar();
}


function next_month(){ /** go to next month **/
    if(c_month == 11){
        c_month = 0; c_year += 1;
    }else c_month ++;
    init_calendar();
}


function previous_month(){ /** go to previous month **/
    if(c_month == 0){
        c_month = 11; c_year -= 1;
    }else c_month --;
    init_calendar();
}



/************ AGENDA - MONTH *****************/

function show_agenda(month_name = null){
    document.getElementsByClassName("calendar_agenda")[0].style.display = 'block';
    document.getElementsByClassName("calender_body")[0].style.display = 'none';

    // set month header
    if(month_name){
        document.getElementById("agenda_date").innerHTML = f_day + '. ' + month_name + ' ' + f_year + '. godine';
    }


    var user_id = document.getElementById("user_id_s").value;

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("all_previews").innerHTML = this.responseText;
        }
    };
    xml.open('POST', "parts/facebook/get_events.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("user_id=" + user_id + "&d=" + f_day + "&m=" + f_month + "&y=" + f_year);
}
function show_month(){
    document.getElementsByClassName("calendar_agenda")[0].style.display = 'none';
    document.getElementsByClassName("calender_body")[0].style.display = 'flex';

    init_calendar();
}




// ****************** *********************//

function get_company(){
    var company = document.getElementById("company_name").value;

    // show all of them //
    var all_companies = document.getElementById("all_companies");
    if(company == ''){
        all_companies.style.display = 'none';
        return;
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            all_companies.style.display = 'block';
            all_companies.innerHTML = this.responseText;
            console.log(this.responseText);
        }
    };
    xml.open('POST', "parts/facebook/get_companies.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("company=" + company);
}

function go_to_company(id, name){
    window.location = "calendar.php?path=Administracija&cat=Calendar&what=Kalendar%20objava&icon=fa-briefcase&desc=Pregledajte%20historiju%20reklamiranja%20na%20Facebook-u&id=" + id + "&name=" + name;
}


function save_day_event(){
    var header  = document.getElementById("agenda_head");
    var text    = document.getElementById("agenda_text");
    var user_id = document.getElementById("user_id_s").value;

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("all_previews").innerHTML = this.responseText;
            console.log(this.responseText);
            header.value = '';
            text.value   = '';
        }
    };
    xml.open('POST', "parts/facebook/insert_event.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("header=" + header.value + "&text=" + text.value + "&user_id=" + user_id + "&d=" + f_day + "&m=" + f_month + "&y=" + f_year);
}


function delete_it(id, user_id){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("all_previews").innerHTML = this.responseText;
        }
    };
    xml.open('POST', "parts/facebook/delete_event.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("id=" + id + "&user_id=" + user_id + "&d=" + f_day + "&m=" + f_month + "&y=" + f_year);
}