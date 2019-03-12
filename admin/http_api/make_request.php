<html>
    <head>
        <script>
            var hash = 'dbe1a8e90dc36f563ce964824dceede5';

            var xml = new XMLHttpRequest();
            xml.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            xml.open('GET', 'http://dmd.ba/http/update_date.php');
            xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xml.send("hash=" + hash);
        </script>
    </head>
    <body>

    </body>
</html>