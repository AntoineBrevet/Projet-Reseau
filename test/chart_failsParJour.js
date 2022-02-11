$(document).ready(function(){
    var ctx9 = document.getElementById('chart_failsParJour').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'failsParJour.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx9, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label : 'Disabled frames',
                        backgroundColor: 'rgb(255, 99, 132)',
                        data: Object.values(data),                        
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Disabled frames / Day'
                        }
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