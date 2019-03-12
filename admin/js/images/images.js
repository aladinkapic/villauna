/*** upload user image ***/

var image_src = '';

function upload_image(){
    var hash = document.getElementById("hash").value;

    var data = new FormData();
    var ins = document.getElementById('file').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file[]", document.getElementById('file').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            window.location = "slider_post_preview.php?path=Moj%20app&cat=Naslovna%20strana&what=Naslovna%20strana&icon=fa-home&desc=Dodajte%20i%20uredite%20slike%20za%20početni%20slider&hash=" + hash;
        }
    };
    xml.open('POST', 'parts/images/uploadimage.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}



function upload_image2(){
    var hash = document.getElementById("hash").value;

    var data = new FormData();
    var ins = document.getElementById('file2').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file2[]", document.getElementById('file2').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            window.location = "slider_post_preview.php?path=Moj%20app&cat=Naslovna%20strana&what=Naslovna%20strana&icon=fa-home&desc=Dodajte%20i%20uredite%20slike%20za%20početni%20slider&hash=" + hash;
        }
    };
    xml.open('POST', 'parts/images/uploadimage2.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}










/************************* MODULES IMAGE UPLOAD ***********************************/

function upload_image_one(){
    var hash = document.getElementById("hash").value;

    var data = new FormData();
    var ins = document.getElementById('file').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file[]", document.getElementById('file').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            window.location = "all_pages_edit.php?path=Moj%20app&cat=Dodatne%20stranice&what=Pregled%20svih%20stranica&icon=fa-home&desc=Pregledajte%20sve%20stranice,%20dodajte%20nove%20i%20uredite%20postojeće&id=" + hash;
        }
    };
    xml.open('POST', 'parts/images/uploadimage_one.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}


function upload_image_t_one(){
    var data = new FormData();
    var ins = document.getElementById('file').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file[]", document.getElementById('file').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);

        }
    };
    xml.open('POST', 'parts/images/uploadimage_t_one.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}


function upload_image_t_two(){
    var data = new FormData();
    var ins = document.getElementById('file2').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file2[]", document.getElementById('file2').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            var icon = document.getElementById("second_image");
            icon.setAttribute('src', 'uploaded_images/'+this.responseText);
        }
    };
    xml.open('POST', 'parts/images/uploadimage_t_two.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}




/******************************** ITEM IMAGES ****************************************/

function item_image(){
    var data = new FormData();
    var ins = document.getElementById('file').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file[]", document.getElementById('file').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            document.getElementById("oh_images").innerHTML = this.responseText;
        }
    };
    xml.open('POST', 'parts/images/upload_item_image.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}


function upload_image_news(){
    var data = new FormData();
    var ins = document.getElementById('file').files.length;
    for (var x = 0; x < ins; x++) {
        data.append("file[]", document.getElementById('file').files[x]);
    }

    var xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);

            document.getElementById("new_image_upload").value = this.responseText;

            var icon = document.getElementById("new_image");
            icon.setAttribute('src', 'uploaded_images/'+this.responseText);
        }
    };
    xml.open('POST', 'parts/images/upload_new_image.php');
    xml.setRequestHeader('Cache-Control', 'no-cache');
    xml.send(data);
}
