function search_for_domains(){
    var domain = document.getElementById("domain_name").value;
    var ext    = document.getElementById("domain_extension").value;
    var price  = document.getElementById("domain_price").value;

    domain = domain + ext;

    var main_domain_back = document.getElementById("main_domain_back");
    var domain_full_name = document.getElementById("domain_full_name");
    var domain_price     = document.getElementById("domain_full_price");

    // hide open extension
    var extension = document.getElementById("all_exts");
    extension.style.display = 'none';

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;
            console.log(response);
            domain_full_name.innerHTML = domain;
            domain_price.innerHTML = price + ' KM';


            if(response == 'Zauzeta'){
                main_domain_back.style.display = 'block';
                main_domain_back.style.background = '#FF0D53';

            }else if(response == 'Slobodna'){
                main_domain_back.style.display = 'block';
                main_domain_back.style.background = '#00ecbc';
            }
        }
    };
    xml.open('POST', 'parts/whois/example.cli.php');

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("domain=" + domain);
}


function add_domain_to_cart(){
    var main_domain_back = document.getElementById("main_domain_back");
    main_domain_back.style.display = 'none';

    var user_id  = document.getElementById("user_id").value;
    var price    = document.getElementById("domain_price").value;
    var item_id  = document.getElementById("item_id").value;

    var domain = document.getElementById("domain_name").value;
    var ext    = document.getElementById("domain_extension").value;

    if(domain == '') return;

    domain = 'https://' + domain + ext;

    add_to_cart(user_id, price, 'fa-network-wired', item_id, 'domain', 1,  0, domain);
}


function set_extension(ext, price_a, id){
    var main_domain_ext = document.getElementById("main_domain_ext");
    var domain_extension = document.getElementById("domain_extension");
    var price  = document.getElementById("domain_price");
    var item_id  = document.getElementById("item_id");

    /** id for adding to cart **/
    item_id.value = id;

    main_domain_ext.innerHTML = ext;
    domain_extension.value = ext;
    price.value = price_a;
    open_extension();
}


var open_exts = 0;

function open_extension(){
    var extension = document.getElementById("all_exts");

    if(!open_exts){
        open_exts++;
        extension.style.display = 'block';
    }else{
        open_exts = 0;
        extension.style.display = 'none';
    }
}