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
        }
    };
    xml.open('POST', "parts/bills/http/get_companies.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("company=" + company);
}


/**** Set company parameters ****/

function set_parameters(id, title){
    var all_companies = document.getElementById("all_companies");

    // hide rest of companies //
    all_companies.style.display = 'none';

    document.getElementById("company_name").value = title;
    document.getElementById("ajdi").value = id;

    console.log(title);
}







/******* work with categories *********/
var category_open = 0, subcategory_open = 0;

function open_categories(){
    var categories = document.getElementById("categories");

    if(!category_open){
        category_open++;
        categories.style.display = 'block';
    }else{
        category_open = 0;
        categories.style.display = 'none';
    }
}


function open_subcategories(){
    var subcategories = document.getElementById("subcategories");

    if(!subcategory_open){
        subcategory_open++;
        subcategories.style.display = 'block';
    }else{
        subcategory_open = 0;
        subcategories.style.display = 'none';
    }
}


function get_subcategories(id, title){
    document.getElementById("service_cat").innerHTML = title;

    open_categories();
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            open_subcategories();
            document.getElementById("subcategories").innerHTML = this.responseText;
        }
    };
    xml.open('POST', "parts/bills/http/get_subcategories.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("id=" + id);
}


/*** finish collecting informations ***/
function finnish_colecting(id, title){
    open_subcategories();

    document.getElementById("single_service").innerHTML = title;
    document.getElementById("service_id").value = id;
}








/****** open domains ******/
var open_domain = 0;

function open_domains(){
    var domains = document.getElementById("all_extensions_open");

    if(!open_domain){
        open_domain++;
        domains.style.display = 'block';
    }else{
        open_domain = 0;
        domains.style.display = 'none';
    }
}


function insert_domain(id, ext, price){
    var ext_show = document.getElementById("extension_name");
    var price_show = document.getElementById("all_extension_price");

    var id_input = document.getElementById("domain_id");
    var ext_input = document.getElementById("domain_ext");
    var price_input = document.getElementById("domain_price");

    ext_show.innerHTML = ext;
    price_show.innerHTML = price + " BAM";

    var domain_name = document.getElementById("domain_name");

    ext_input.value = "https://" + (domain_name.value + ext);
    price_input.value = price;
    id_input.value = id;

    open_domains();
}



/**** Open hosts ****/
var open_h = 0;

function open_hosts(){
    var host = document.getElementById("all_host_titles");

    if(!open_h){
        open_h++;
        host.style.display = 'block';
    }else{
        open_h = 0;
        host.style.display = 'none';
    }
}

function insert_host(id, title, value, price){
    var show_title = document.getElementById("host_choose");
    var show_value = document.getElementById("hosting_name");
    var show_price = document.getElementById("hosting_price");

    var input_id    = document.getElementById("host_id");
    var input_title = document.getElementById("host_title");
    var input_price = document.getElementById("host_price");

    input_id.value = id;
    input_title.value = title;
    input_price.value = price;

    show_title.innerHTML = title;
    show_value.innerHTML = value + " GB";
    show_price.innerHTML = price + " BAM";
}