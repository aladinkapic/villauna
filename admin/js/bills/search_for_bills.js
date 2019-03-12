function search_bills(){
    var value = document.getElementById("search_users").value;
    var page  = document.getElementById("hidden_page").value;

    window.location = "bill_preview.php?path=Administracija&cat=Fakture&what=Pregled%20faktura&icon=fa-map&desc=Pregled%20faktura%20te%20njihovog%20stanja&page="+ page +"&search=" + value;
}