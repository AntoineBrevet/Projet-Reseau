$(document).ready(function () {

    // CHARTS
    let protocolNames = [];
    let protocolNamesFiltered = [];
    let numberOf_UDP_Protocols = 0;
    let numberOf_TLS_Protocols = 0;
    let numberOf_ICMP_Protocols = 0;
    let numberOf_TCP_Protocols = 0;
    let numberOf_Others_Protocols = 0;

    const base_TTL = 128;

    let UDP_TTL = [];
    let TLS_TTL = [];
    let ICMP_TTL = [];
    let TCP_TTL = [];

    let numberOf_UDP_Frames = 0;
    let numberOf_TLS_Frames = 0;
    let numberOf_ICMP_Frames = 0;
    let numberOf_TCP_Frames = 0;

    let lost_UDP_TTL = 0;
    let lost_TLS_TTL = 0;
    let lost_ICMP_TTL = 0;
    let lost_TCP_TTL = 0;

    let actualTTL = 0;
    let expectedTTL = 0;


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




    function updateLost_TCP_TTL() {
        $.get("get_TCP_TTL.php", function (data) {
            $.each(JSON.parse(data), function (key, value) {
                TCP_TTL.push(value["ttl"]);
                numberOf_TCP_Frames++;
            });
        })
            .then(function () {
                lost_TCP_TTL = 0;
                actualTTL = 0;
                expectedTTL = numberOf_TCP_Frames * base_TTL;
                for (let i = 0; i < TCP_TTL.length; i++) {
                    actualTTL += TCP_TTL[i];
                }
                lost_TCP_TTL = expectedTTL - actualTTL;
                console.log("Lost TCP TTL = ", lost_TCP_TTL)
            });
        return $.ajax({
            url: "get_TCP_TTL.php",
            dataType: "json",
            data: JSON.parse(lost_TCP_TTL)
        });
    }

    function updateLost_ICMP_TTL() {
        $.get("get_ICMP_TTL.php", function (data) {
            $.each(JSON.parse(data), function (key, value) {
                ICMP_TTL.push(value["ttl"]);
                numberOf_ICMP_Frames++;
            });
        })
            .then(function () {
                lost_ICMP_TTL = 0;
                actualTTL = 0;
                expectedTTL = numberOf_ICMP_Frames * base_TTL;
                for (let i = 0; i < ICMP_TTL.length; i++) {
                    actualTTL += ICMP_TTL[i];
                }
                lost_ICMP_TTL = expectedTTL - actualTTL;
                console.log("Lost ICMP TTL = ", lost_ICMP_TTL)
            });
        return $.ajax({
            url: "get_ICMP_TTL.php",
            dataType: "json",
            data: JSON.parse(lost_ICMP_TTL)
        });
    }

    function updateLost_TLS_TTL() {
        $.get("get_TLS_TTL.php", function (data) {
            $.each(JSON.parse(data), function (key, value) {
                TLS_TTL.push(value["ttl"]);
                numberOf_TLS_Frames++;
            });
        })
            .then(function () {
                lost_TLS_TTL = 0;
                actualTTL = 0;
                expectedTTL = numberOf_TLS_Frames * base_TTL;
                for (let i = 0; i < TLS_TTL.length; i++) {
                    actualTTL += TLS_TTL[i];
                }
                lost_TLS_TTL = expectedTTL - actualTTL;
                console.log("Lost TLSv1.2 TTL = ", lost_TLS_TTL)
            });
        return $.ajax({
            url: "get_TLS_TTL.php",
            dataType: "json",
            data: JSON.parse(lost_TLS_TTL)
        });
    }

    function updateLost_UDP_TTL() {
        $.get("get_UDP_TTL.php", function (data) {
            $.each(JSON.parse(data), function (key, value) {
                UDP_TTL.push(value["ttl"]);
                numberOf_UDP_Frames++;
            });
        })
            .then(function () {
                lost_UDP_TTL = 0;
                actualTTL = 0;
                expectedTTL = numberOf_UDP_Frames * base_TTL;
                for (let i = 0; i < UDP_TTL.length; i++) {
                    actualTTL += UDP_TTL[i];
                }
                lost_UDP_TTL = expectedTTL - actualTTL;
                console.log("Lost UDP TTL = ", lost_UDP_TTL)
            });
        return $.ajax({
            url: "get_UDP_TTL.php",
            dataType: "json",
            data: JSON.parse(lost_UDP_TTL)
        });
    }

    $.when(updateLost_UDP_TTL(), updateLost_TLS_TTL(), updateLost_ICMP_TTL(), updateLost_TCP_TTL()).done(function (a1, a2, a3, a4) {
        // the code here will be executed when all four ajax requests resolve.
        // a1, a2, a3 and a4 are lists of length 3 containing the response text,
        // status, and jqXHR object for each of the four ajax calls respectively.
        console.log("ready", a1, a2, a3, a4);

        const labels = ["UDP", "TLSv1.2", "ICMP", "TCP"]

        const data = {
            labels: labels,
            datasets: [{
                label: "Lost TTL's per protocol",
                data: [lost_UDP_TTL, lost_TLS_TTL, lost_ICMP_TTL, lost_TCP_TTL],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('lostTTL'),
            config
        );
    });




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