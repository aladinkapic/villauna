function setkeydown(){
    var input = document.getElementById("message_input");
    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function(event) {
        // Cancel the default action, if needed
        event.preventDefault();
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            //Start searching
            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    document.getElementById("user_messages").innerHTML = this.responseText;
                    input.value = '';
                    scroll_bottom(1);
                }
            };
            xml.open('POST', "parts/messages/insert_message.php");

            xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xml.send("message=" + input.value + "&admin=0");
        }
    });
}


function go_search() {
    var input = document.getElementById("search_engine");
    window.location = "items.php?search="+ input.value +"&page=1&p_l=0&p_t=100000";

}


function scroll_bottom(first = null){
    var element = document.getElementById("messages_body");

    if(((element.scrollHeight - element.clientHeight) - element.scrollTop) < 100  || first){
        element.scrollTop = element.scrollHeight - element.clientHeight;
    }

    //element.scrollTop = element.scrollHeight - element.clientHeight;
}

setkeydown();

function get_messages(){
    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("user_messages").innerHTML = this.responseText;
            scroll_bottom(1);
        }
    };
    xml.open('POST', "parts/messages/insert_message.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("message=" + '' + "&admin=0");
}

function check_for_messages(){
    get_messages();
    setInterval(function(){
        var chat_open = parseInt(document.getElementById("is_chat_open").value);
        if(chat_open) get_messages();
    }, 3000);
}



//

function open_chat(){
    var chat_open = document.getElementById("is_chat_open");
    var user_ip = document.getElementById("user_ip").value;

    var value = 0;
    if(parseInt(chat_open.value)) value = 0;
    else value = 1;

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            chat_open.value = value;

            if(!value) document.getElementById("whole_chat").style.display = 'none';
            else document.getElementById("whole_chat").style.display = 'block';
        }
    };
    xml.open('POST', "parts/messages/update_online.php");

    xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xml.send("what=" + value + "&user_ip=" + user_ip);
}
