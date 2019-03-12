/*** add to cart function ***/


function add_to_cart(user_id, price, icon, item_id, what, how_many = 1, exists = 0, title = ''){

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            var response = this.responseText;

            document.getElementById("number_of_items_in_cart").innerHTML = response;

            // show notification
            show_notifiy_cart("Uspješno ste dodali artikal u košaricu !!");


        }
    };
    xml.open('POST', 'parts/cart/add_to_cart.php');
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("user_id=" + user_id + "&price=" + price + "&icon=" + icon + "&item_id=" + item_id + "&what=" + what + "&how_many=" + how_many + "&exists=" + exists + "&title=" + title);
}


/** increase and decrease number of items in cart **/
function change_in_cart(id, what){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("cart_wrappers").innerHTML = this.responseText;

        }
    };
    xml.open('POST', 'parts/cart/update_cart.php');
    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("id=" + id + "&what=" + what);
}


function finnisn_order(){
    var number_of_items = parseInt(document.getElementById("number_of_items").value);
    if(!number_of_items){
        show_notifiy_cart("Nemate artikala u košarici :(", "fas fa-times");
        return;
    }

    if(number_of_items){
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                document.getElementById("cart_wrappers").innerHTML = this.responseText;
                // show notification
                show_notifiy_cart("Narudžba uspješno završena !!");
            }
        };
        xml.open('POST', "parts/bills/http/from_cart_bill.php");
        xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xml.send();
    }
}






/*** show and hige huge notifications ***/

function hide_notifiy_cart(link = null){
    document.getElementById("huge_cart_success").style.display = 'none';

    /** if there is link, then go to this location **/
    if(link){
        window.location = link;
    }
}


function show_notifiy_cart(text, icon = null){
    var icons = document.getElementById("notification_icon").getElementsByClassName("fas");
    if(icon){
        icons[0].className = icon;
        icons[0].style.color = "#FF0D53";
    }else{
        icons[0].className = 'fas fa-check-circle';
        icons[0].style.color = "#00ecbc";
    }

    document.getElementById("huge_cart_success").style.display = 'block';
    document.getElementById("huge_notifiy_text").innerHTML = text;

}