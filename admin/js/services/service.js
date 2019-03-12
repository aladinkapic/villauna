var currently_open_s = -2;

function open_subcategory(index){
    var subcategories = document.getElementsByClassName("subcategories");
    var icons = document.getElementsByClassName("subcategory_angle");

    if(index == currently_open_s){
        index = -1;
        currently_open_s = -2;
    }

    for(var i=0; i<subcategories.length; i++){
        if(i == index){
            currently_open_s = index;
            subcategories[i].style.height = "auto";
            icons[i].className = "fas subcategory_angle fa-angle-up";
        }else{
            subcategories[i].style.height = "0px";
            icons[i].className = "fas subcategory_angle fa-angle-down";
        }
    }
}