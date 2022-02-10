$(document).ready(function() {
var ctx3 = document.getElementById('chart_status').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'status.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx3, {
                // The type of chart we want to create
                type: 'doughnut',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Statut',
                        backgroundColor: [
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)'
                          ],
                        data: Object.values(data),
                        hoverOffset: 4
                    }]
                },

            });
        },
        error: function (xhr, textStatus, thrownError) {
            console.log(xhr);
            console.log(textStatus);
            console.log(thrownError);
        }
    })
});