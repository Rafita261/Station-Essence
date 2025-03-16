<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #myChart {
            margin-left: 55% !important;
            width: 45% !important;
            height: auto !important;
        }
    </style>
</head>

<body>
    <h1>Dashboard</h1>
    <canvas id="myChart" width="200" height="100"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['08/03/2025', '09/03/2025', '10/03/2025', '11/03/2025', '12/03/2025'],
                    datasets: [
                        {
                            label: 'Essence',
                            data: [15, 8, 10, 20, 50],
                            backgroundColor: 'rgba(255, 99, 132)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Gasoil',
                            data: [10, 5, 15, 25, 30],
                            backgroundColor: 'rgba(54, 162, 235)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Pétrole',
                            data: [5, 10, 20, 15, 25],
                            backgroundColor: 'rgba(75, 192, 192)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'white' // Set y-axis text color to white
                            }
                        },
                        x: {
                            ticks: {
                                color: 'white' // Set x-axis text color to white
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: 'white' // Set legend text color to white
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
