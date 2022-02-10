$(document).ready(function() {
var ctx5 = document.getElementById('chart_tramesParIpFrom').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'tramesParIpFrom.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx5, {
                // The type of chart we want to create
                type: 'pie',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)'
                          ],
                        data: Object.values(data),                        
                        hoverOffset: 4
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames / IP_from'
                        }
                    },
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