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
                    options: {}
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            });
    }

    updateProtocolNames();


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