
/*** chose year and open all warrianty ***/
var open_chose_year = -2;

function chose_year(index){
    var all_renews = document.getElementsByClassName("renew_s_alloptions");
    var arrow = document.getElementsByClassName("renew_arrow");

    if(index == open_chose_year){
        index = -1;
        open_chose_year = -2;
    }

    for(var i=0; i<all_renews.length; i++){
        if(i == index){
            var all_options = all_renews[i].getElementsByClassName("renew_s_all_option");

            all_renews[i].style.height = (all_options.length * 40) + 'px';
            open_chose_year = index;
            arrow[i].className = "fas renew_arrow fa-angle-up";
        }else{
            all_renews[i].style.height = '0px';
            arrow[i].className = "fas renew_arrow fa-angle-down";
        }
    }

    // if(!open_chose_year){
    //     document.getElementById("all_years").style.display = 'block';
    //     open_chose_year ++;
    // }else{
    //     document.getElementById("all_years").style.display = 'none';
    //     open_chose_year = 0;
    // }

}


function select_domain(index_value){

    console.log(index_value);
}

/** select specific domain for specific shit :D **/
function select_domain_exp(value, index_value, how_much = null){
    var specific_value = document.getElementsByClassName("specific_domain_value");

    console.log(index_value);

    for(var i=0; i<specific_value.length; i++){
        if(i == index_value){
            specific_value[i].innerHTML = value;
            chose_year(index_value);
            break;
        }
    }

    var specific_part = document.getElementById("domain_num_" + index_value);

    specific_part.value = how_much;
}


function add_domain_to_cart(index, user_id, price, icon, item_id, what, title, exists){
    var specific_part = document.getElementById("domain_num_" + index);

    console.log(title);

    add_to_cart(user_id, price, icon, item_id, what, specific_part.value, exists, title);
}