<?php require("/opt/lampp/htdocs/Station-Essence/Controllers/dashboard.php"); ?>
<?php require("/opt/lampp/htdocs/Station-Essence/Controllers/Entretien/list_entretien.php"); ?>
<script src="JS/chart.js"></script>
<style>
    #myChart {
        margin-left: 55% !important;
        width: 45% !important;
        height: auto !important;
        margin-top: -300px;
    }

    #myChart2 {
        margin-right: 55% !important;
        width: 45% !important;
        height: auto !important;
    }
</style>

<h1>Dashboard</h1>
<h2>
    Récette total accumulé par la station : <?php echo $recette; ?> Ar
</h2>
<canvas id="myChart2" width="200" height="100"></canvas>
<canvas id="myChart" width="200" height="100"></canvas>
<h3>Liste des clients les plus participatifs</h3>
<ol>
    <li><?php echo $best_clients[0][0] ?></li>
    <li><?php echo $best_clients[1][0] ?></li>
    <li><?php echo $best_clients[2][0] ?></li>
    <li><?php echo $best_clients[3][0] ?></li>
    <li><?php echo $best_clients[4][0] ?></li>
</ol>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data = <?php echo json_encode($data_chart); ?>;

        const labels = data.map(item => item.date_achat);
        const essenceData = data.map(item => item.essence);
        const gasoilData = data.map(item => item.gasoil);
        const petroleData = data.map(item => item.petrole);

        // Créer le graphique
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Essence',
                        data: essenceData,
                        backgroundColor: 'rgba(255, 99, 132)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Gasoil',
                        data: gasoilData,
                        backgroundColor: 'rgba(54, 162, 235)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Pétrole',
                        data: petroleData,
                        backgroundColor: 'rgba(75, 192, 192)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Ventes de carburant par date',
                        color: 'blue',
                        font: {
                            size: 18
                        }
                    },
                    legend: {
                        labels: {
                            color: 'blue'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'blue'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'blue'
                        }
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        d = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [d[<?php echo $recettes[0][0] ?> - 1], d[<?php echo $recettes[1][0] ?> - 1], d[<?php echo $recettes[2][0] ?> - 1], d[<?php echo $recettes[3][0] ?> - 1], d[<?php echo $recettes[0][4] ?> - 1]],
                datasets: [{
                    label: 'Recette (en Ar)',
                    data: [<?php echo $recettes[0][1] ?>, <?php echo $recettes[1][1] ?>, <?php echo $recettes[2][1] ?>, <?php echo $recettes[3][1] ?>, <?php echo $recettes[4][1] ?>],
                    backgroundColor: 'rgba(75, 192, 192)',
                    borderColor: 'rgba(75, 192, 192,1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Recettes mensuelles',
                        color: 'blue',
                        font: {
                            size: 18
                        }
                    },
                    legend: {
                        labels: {
                            color: 'blue'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'blue'
                        }
                    },
                    x: {
                        ticks: {
                            color: 'blue'
                        }
                    }
                }
            }
        });
    });
</script>