/*** open or close mobile menu ***/

var menu_open = false;

function mobile_menu(){
    var menu = document.getElementById("mobile_li");
    if(!menu_open){
        menu.style.display = 'block';
        menu_open = true;
    }else{
        menu.style.display = 'none';
        menu_open = false;
    }
}



var current_slide = 0;

function next_slide(current){
    var slider_images = document.getElementsByClassName("image_w");
    var slider_text   = document.getElementsByClassName("slider_text");
    var slider_line   = document.getElementsByClassName("slider_line");


    if(current){


        for(var i=0; i<slider_images.length; i++){
            if(i == current){
                slider_images[i].className = "image_w";
                slider_text[i].className   = "slider_text hidden_image";
                slider_line[i].className   = "slider_line slider_line_active";
            }else{
                slider_images[i].className = "image_w image_w_hidden";
                slider_text[i].className   = "slider_text slider_text_hidden";
                slider_line[i].className   = "slider_line";
            }
        }
    }else{
        for(var i=0; i<slider_images.length; i++){
            if(i == current_slide){
                slider_images[i].className = "image_w ";
                slider_text[i].className   = "slider_text";
                slider_line[i].className   = "slider_line slider_line_active";
            }else{
                slider_images[i].className = "image_w image_w_hidden";
                slider_text[i].className   = "slider_text slider_text_hidden";
                slider_line[i].className   = "slider_line";
            }
        }

        if(current_slide == (slider_images.length - 1)) current_slide = 0;
        else current_slide++;
    }
}



function set_slide(){
    setInterval(function(){
        next_slide();
    }, 3000);
}












/*** Messages ***/

function insert_user(){
    var name  = document.getElementById("name").value;
    var email = document.getElementById("email").value;

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            location.reload()
        }
    };
    xml.open('POST', "parts/messages/insert_user.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("name=" + name + "&email=" + email);
}




