<?php
session_start();
include('inc/pdo.php');
include("fonctions.php");

$title = 'Mon espace';
include('inc/headerCharts.php');

if (isset($_SESSION['connected']) && $_SESSION['connected'] == true) : 


    $sql = "SELECT * FROM res_trames ORDER BY date DESC";
    $var = $pdo->prepare($sql);
    $var->execute();
    $trames = $var->fetchAll();
    // include('modal.php'); 
    
    
    
?>
    <div class="wrap-dashboard">

        <div class="container-dashboard">

            <div id="title-dashboard">
                <button class="btn-title-dashboard" id="btn-chart"><i class="fas fa-chart-pie"></i>
                    <p class="content-button">Graphiques</p>
                </button>


                <button class="btn-title-dashboard" id="btn-log"><i class="fas fa-database"></i>
                    <p class="content-button">Logs</p>
                </button>


                <div class="color-status" style="display:none;">
                    <div class="box-color">
                        <div class="circle-color timeout"></div>
                        <p>Timeout</p>
                    </div>
                    <div class="box-color">
                        <div class="circle-color success"></div>
                        <p>Success</p>
                    </div>
                </div>
            </div>

        <div class="body-dashboard">
            <!-- CONTAINER DES LOGS display none-->
            <div id="container-log" class="Table_Div">

                <table id="log_table" class="table User-Table flexy">
                    <thead>
                        <tr>
                            <th class="border border-left">Date</th>
                            <th>Identifiant</th>
                            <th>Version</th>
                            <th>Nom du protocole</th>
                            <th>Flag</th>
                            <th>TTL</th>
                            <th>Protocol checksum</th>
                            <th>Checksum header</th>
                            <th>Venant de (port)</th>
                            <th>à destination de (port)</th>
                            <th>Ip arrivant</th>
                            <th class="border border-right">Ip destination</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($trames as $trame) {
                            if ($trame['status'] == 'success') {
                                echo '<tr class="tr-good">';
                            } elseif ($trame['status'] == 'timeout') {
                                echo '<tr class="tr-notgood">';
                            } ?>
                            <td><?php echo $trame['date']; ?></td> <!-- bold -->
                            <td><?php echo $trame['identifiant']; ?></td>
                            <td><?php echo $trame['version']; ?></td>
                            <td><?php echo $trame['protocol_name']; ?></td>
                            <td><?php echo $trame['flags']; ?></td>
                            <td><?php echo $trame['ttl']; ?></td>
                            <td><?php echo $trame['protocol_checksum']; ?></td>
                            <td><?php echo $trame['header_checksum']; ?></td>
                            <td><?php echo $trame['port_from']; ?></td>
                            <td><?php echo $trame['port_dest']; ?></td>
                            <?php
                                $trame['ip_from'] = ipConvert($trame['ip_from']);
                                $trame['ip_dest'] = ipConvert($trame['ip_dest']);
                                ?>
                                <td><?php echo $trame['ip_from']; ?></td>
                                <td><?php echo $trame['ip_dest']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

                <div id="container-chart">
                    <div class="chart-top">

                        <div class="big-chart">
                            <canvas id="chart_tramesParJour"></canvas>
                        </div>
                        <div class="big-chart">
                            <canvas id="chart_lostTTLParProtocol"></canvas>
                        </div>
                        <div class="big-chart">
                            <canvas id="chart_failParProtocol"></canvas>
                        </div>
                        <div class="big-chart">
                            <canvas id="chart_failsParIpFrom"></canvas>
                        </div>
                        <div class="big-chart">
                            <canvas id="chart_failsParIpDest"></canvas>
                        </div>
                        <div class="big-chart">
                            <canvas id="chart_failsParJour"></canvas>
                        </div>

                    </div>

                <div class="chart-bottom">
                    <div class="big-chart rond">
                        <canvas id="chart_status"></canvas>
                    </div>
                    <div class="big-chart rond">
                        <canvas id="chart_tramesParProtocol"></canvas>
                    </div>
                    <div class="big-chart rond">
                        <canvas id="chart_tramesParIpFrom"></canvas>
                    </div>
                    <div class="big-chart rond">
                        <canvas id="chart_tramesParIpDest"></canvas>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php 
                    else :
                        header('Location:index.php');
                    endif;
                        include('inc/footerCharts.php'); 
?> 