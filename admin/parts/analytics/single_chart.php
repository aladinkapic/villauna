<script>
    /** call function to draw **/

    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawLineStyles);


    var arr = JSON.parse('<?php echo JSON_encode($date);?>');

    function drawLineStyles() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'X');
        data.addColumn('number', 'Broj pregleda');

        for(var i = 0; i<arr.length; i++){
            data.addRows([
                [parseInt(arr[i]),parseInt(arr[++i]) /*, parseInt(arr[i]) * parseInt(arr[i]) */ ]
            ]);
        }
        var options = {
            hAxis: {
                title: 'Dani'
            },
            vAxis: {
                title: 'Pregledi po danima'
            },
            colors: ['#a52714'],
            // colors: ['#a52714', '#097138'],
            series: {
                0: {
                    lineWidth: 1,
                    /* lineDashStyle: [5, 1, 5] */
                }/* ,
                        1: {
                            lineWidth: 5,
                            lineDashStyle: [7, 2, 4, 3]
                        } */
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>