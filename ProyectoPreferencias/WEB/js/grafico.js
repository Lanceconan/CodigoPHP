//https://developers.google.com/chart/interactive/docs/gallery/piechart#donut


function mostrarPHP(){
    alert("<?php echo idMusica ?>");
}

google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChartEstiloMusical);
google.charts.setOnLoadCallback(drawChartGeneroCinematografico);

function drawChartEstiloMusical() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
        ]
    );

    var options = {
    title: 'Gustos Musicales',
    pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchartmusica'));
    chart.draw(data, options);
}

function drawChartGeneroCinematografico() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],       
        ['Sleep',    7]
        ]
    );

    var options = {
    title: 'Gustos Cinematográficos',
    pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchartpeliculas'));
    chart.draw(data, options);
}