$(document).ready(function() {
    var ctx = document.getElementById('chart_lostTTLParProtocol').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'lostTTLparProtocol.php',
        dataType: 'JSON',
        data: { },
        success: function (data) {
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: ["UDP", "TLSv1.2", "ICMP", "TCP"],
                    datasets: [{
                        label: 'Nombre de TTL perdues',
                        backgroundColor: '#fdcd3b',
                        borderColor: '#fdcd3b',
                        data: [data['UDP'], data['TLSv1.2'], data['ICMP'], data['TCP']]
                    }]
                },

                // Configuration options go here
                options: {
                    title: {
                        display: true,
                        text: 'TTL'
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
})