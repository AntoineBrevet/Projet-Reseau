$(document).ready(function () {

    // CHARTS
    let protocolNames = [];
    let protocolNamesFiltered = [];
    let numberOf_UDP_Protocols = 0;
    let numberOf_TLS_Protocols = 0;
    let numberOf_ICMP_Protocols = 0;
    let numberOf_TCP_Protocols = 0;
    let numberOf_Others_Protocols = 0;

    function updateProtocolNames() {

        // Appel AJAX 
        $.get("get_protocol_names.php", function (data) {
            $.each(JSON.parse(data), function (key, value) {
                protocolNames.push(value["protocol_name"]);
            });
        })

            // Suppression des doublons dans les noms de protocoles
            .then(function () {
                protocolNamesFiltered = protocolNames.filter(function (item, pos) {
                    return protocolNames.indexOf(item) == pos;
                })
            })

            // Proportion de protocoles fonction de leur nom
            .then(function () {

                for (let i = 0; i < protocolNames.length; i++) {
                    if (protocolNames[i] == "UDP") {
                        numberOf_UDP_Protocols++;
                    } else if (protocolNames[i] == "TLSv1.2") {
                        numberOf_TLS_Protocols++;
                    } else if (protocolNames[i] == "ICMP") {
                        numberOf_ICMP_Protocols++;
                    } else if (protocolNames[i] == "TCP") {
                        numberOf_TCP_Protocols++;
                    } else {
                        numberOf_Others_Protocols++;
                    }
                }
            })

            // Création du chart
            .then(function () {
                // Data Set
                const data = {
                    labels: protocolNamesFiltered,
                    datasets: [{
                        label: 'Protocols Ratio',
                        data: [numberOf_UDP_Protocols, numberOf_TLS_Protocols, numberOf_ICMP_Protocols, numberOf_TCP_Protocols],
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(88, 122, 34)'
                        ],
                        hoverOffset: 4,
                    }]
                };

                // Config
                const config = {
                    type: 'pie',
                    data: data,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Trames / Protocole'
                            }
                        }
                    }
                };

                const myChart = new Chart(
                    document.getElementById('trames'),
                    config
                );
            });
    }

    updateProtocolNames();




    var ctx = document.getElementById('chart_lostTTLParProtocol').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'lostTTLparProtocol.php',
        dataType: 'JSON',
        data: {},
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

    var ctx2 = document.getElementById('chart_tramesParJour').getContext('2d');
    $.ajax({
        type: 'POST',
        url: 'tramesParJour.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            console.log(data);
            var chart = new Chart(ctx2, {
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


    // DASHBOARD ===================================================================================
    //CLICK => LOG
    $('#btn-log').on('click', function (e) {
        e.preventDefault()

        $('#btn-log').css('background-color', '#b1aeae')
        $('#btn-chart').css('background-color', '#ececec')
        $('#container-log').css('display', 'block')
        $('#container-chart').css('display', 'none')
    })
    $('#btn-chart').on('click', function (e) {
        e.preventDefault()

        $('#btn-log').css('background-color', '#ececec')
        $('#btn-chart').css('background-color', '#b1aeae')
        $('#container-chart').css('display', 'block')
        $('#container-log').css('display', 'none')
    })
});