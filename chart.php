<?php
include('inc/pdo.php');



$sql = "SELECT * FROM res_trames ORDER BY date DESC";
$var = $pdo->prepare($sql);
$var->execute();
$trames = $var->fetchAll();
// debug($trames);

include('inc/headerCharts.php');
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
            <div id="container-log">

                <table class="table">
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
                            <td><?php echo $trame['ip_from']; ?></td>
                            <td><?php echo $trame['ip_dest']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <!-- <div class="charts-container">
                    <div class="charts">
                        <canvas id="myChart"></canvas>
                    </div>
                </div> -->
            <div id="container-chart">
                <div class="chart-top">

                    <div class="litte-chart">
                        <canvas id="chart_tramesParJour"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="chart_lostTTLParProtocol"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="chart_status"></canvas>
                    </div>
                    <div class="litte-chart">
                        <canvas id="chart_failsParIpFrom"></canvas>
                    </div>
                </div>

                <div class="chart-bottom">
                    <div class="big-chart">
                        <canvas id="chart_failParProtocol"></canvas>
                    </div>
                    <div class="big-chart">
                        <canvas id="trames"></canvas>
                    </div>
                    <div class="big-chart">
                        <canvas id="chart_tramesParIpFrom"></canvas>
                    </div>
                    <div class="big-chart">
                        <canvas id="chart_tramesParIpDest"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
include('inc/footer.php'); ?>