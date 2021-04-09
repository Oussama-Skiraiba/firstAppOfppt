<?php include_once "inc/session.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="icon" href="icon/caduceus-symbol.png" sizes="32*32">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <title>Document</title>

</head>


<body>
    <?php
    include "header.php";
    ?>

    <?php
    include "menu.php";
    ?>

    <div class="chart">
        <canvas id="myChart"></canvas>
    </div>

</body>
<script src="js/toggle.js"></script>
<script>
fetch('http://localhost/proge/inc/handle_datetime.php')
    .then(response => response.json())
    .then(data => {
        let obj = {};
        data.response.forEach(_ => obj[_] = (obj[_] | 0) + 1);
        chartit(obj);
    });

function chartit(data) {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: 'statistique',
                data: Object.values(data),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}
</script>

</html>