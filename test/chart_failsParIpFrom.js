$(document).ready(function() {
var ctx7 = document.getElementById('chart_failsParIpFrom').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'failsParIpFrom.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx7, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label : 'Disabled frames',
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(0, 45, 179)' 
                          ],
                        data: Object.values(data),                        
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Disabled frames / IP_from'
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