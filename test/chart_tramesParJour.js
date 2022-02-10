$(document).ready(function() {
var ctx = document.getElementById('chart_tramesParJour').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'tramesParJour.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            console.log(data);
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Nombre de trames',
                        backgroundColor: '#fdcd3b',
                        borderColor: '#fdcd3b',
                        data: Object.values(data)
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'TTL'
                    },
                    scales: {
                        y: {
                          beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function (xhr, textStatus, thrownError) {
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })
});