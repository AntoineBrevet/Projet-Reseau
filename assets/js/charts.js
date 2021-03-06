$(document).ready(function () {

    var ctx0 = document.getElementById('chart_tramesParProtocol').getContext('2d');
    var ctx = document.getElementById('chart_lostTTLParProtocol').getContext('2d');
    var ctx2 = document.getElementById('chart_tramesParJour').getContext('2d');
    var ctx3 = document.getElementById('chart_status').getContext('2d');
    var ctx4 = document.getElementById('chart_failParProtocol').getContext('2d');
    var ctx5 = document.getElementById('chart_tramesParIpFrom').getContext('2d');
    var ctx6 = document.getElementById('chart_tramesParIpDest').getContext('2d');
    var ctx7 = document.getElementById('chart_failsParIpFrom').getContext('2d');
    var ctx8 = document.getElementById('chart_failsParIpDest').getContext('2d');
    var ctx9 = document.getElementById('chart_failsParJour').getContext('2d');

    var $sel = $("#IDchart-select");

    $sel.on("change",function() {
        $('.big-chart').css("display", "none");
        var value = $(this).val();
        switch(value) {
            case 'tramesParJour' : 
                $('#IDtramesParJour').css("display", "flex");
            break;
            case 'tramesParProtocol' : 
                $('#IDtramesParProtocol').css("display", "flex");
            break;
            case 'lostTTLParProtocol' : 
                $('#IDlostTTLParProtocol').css("display", "flex");
            break;
            case 'failParProtocol' : 
                $('#IDfailParProtocol').css("display", "flex");
            break;
            case 'failsParIpFrom' : 
                $('#IDfailsParIpFrom').css("display", "flex");
            break;
            case 'failsParIpDest' : 
                $('#IDfailsParIpDest').css("display", "flex");
            break;
            case 'failsParJour' : 
                $('#IDfailsParJour').css("display", "flex");
            break;
            case 'tramesParIpFrom' : 
                $('#IDtramesParIpFrom').css("display", "flex");
            break;
            case 'tramesParIpDest' : 
                $('#IDtramesParIpDest').css("display", "flex");
            break;
            case 'status' : 
                $('#IDstatus').css("display", "flex");
            break;
        }
    }).trigger("change"); // initial call
   

    

    $.ajax({
        type: 'POST',
        url: 'tramesParProtocol.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx0, {
                // The type of chart we want to create
                type: 'pie',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Number of frames',
                        backgroundColor: [
                            'rgb(255, 205, 86)',
                            'rgb(255, 99, 132)',
                            'rgb(0, 121, 156)',
                            'rgb(0, 156, 118)'
                        ],
                        data: Object.values(data),
                        hoverOffset: 4
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames / Protocole'
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
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Nombre de TTL perdues',
                        backgroundColor: '#fdcd3b',
                        borderColor: '#fdcd3b',
                        data: Object.values(data)
                    }]
                },

                // Configuration options go here
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'TTL perdus / Protocole'
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

    $.ajax({
        type: 'POST',
        url: 'tramesParJour.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            // console.log(data);
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
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames / Jour'
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
                            'rgb(245, 199, 47)',
                            'rgb(39, 42, 95)'
                        ],
                        data: Object.values(data),
                        hoverOffset: 4
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Statut global'
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

    
    $.ajax({
        type: 'POST',
        url: 'failParProtocol.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx4, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Trames d??sactiv??es',
                        backgroundColor: 'rgb(255, 99, 132)',
                        data: Object.values(data)
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames d??sactiv??es / Protocole'
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

    
    $.ajax({
        type: 'POST',
        url: 'tramesParIpDest.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx6, {
                // The type of chart we want to create
                type: 'pie',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 84, 15)',
                            'rgb(0, 45, 179)'
                        ],
                        data: Object.values(data),
                        hoverOffset: 4
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames / IP_dest'
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
                        label: 'Trames d??sactiv??es',
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
                            text: 'Trames d??sactiv??es / IP_from'
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

    
    $.ajax({
        type: 'POST',
        url: 'failsParIpDest.php',
        dataType: 'JSON',
        data: {},
        success: function (data) {
            var chart = new Chart(ctx8, {
                // The type of chart we want to create
                type: 'bar',

                // The data for our dataset
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Trames d??sactiv??es',
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)',
                            'rgb(255, 205, 86)',
                            'rgb(201, 84, 15)',
                            'rgb(0, 45, 179)'
                        ],
                        data: Object.values(data),
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames d??sactiv??es / IP_dest'
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
                        label: 'Trames d??sactiv??es',
                        backgroundColor: 'rgb(255, 99, 132)',
                        data: Object.values(data),
                    }]
                },

                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Trames d??sactiv??es / Jour'
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
    
    // DASHBOARD ===================================================================================
    
    $('#log_table').DataTable();
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