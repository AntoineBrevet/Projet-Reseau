<?php
include("inc/pdo.php");
include("fonctions.php");

$base_ttl = 128;
$udp_ttl_lost = 0;
$tls_ttl_lost = 0;
$tcp_ttl_lost = 0;
$icmp_ttl_lost = 0;
$udp_ttl_total = 0;
$tls_ttl_total = 0;
$tcp_ttl_total = 0;
$icmp_ttl_total = 0;
$udp_numberOfFrames = 0;
$tls_numberOfFrames = 0;
$tcp_numberOfFrames = 0;
$icmp_numberOfFrames = 0;

$data_udp = ["UDP" => 0];
$data_tls = ["TLSv1.2" => 0];
$data_icmp = ["ICMP" => 0];
$data_tcp = ["TCP" => 0];
$data_final = ["UDP" => 0, "TLSv1.2" => 0, "ICMP" => 0, "TCP" => 0];


$query = "SELECT ttl FROM res_trames WHERE protocol_name = 'UDP'";
$result = $pdo->query($query);
foreach($result as $row){
   $udp_numberOfFrames++; 
   $udp_ttl_total+=$row["ttl"];
}
$udp_ttl_lost = $udp_numberOfFrames * $base_ttl - $udp_ttl_total;


$query = "SELECT ttl FROM res_trames WHERE protocol_name = 'TLSv1.2'";
$result = $pdo->query($query);
foreach($result as $row){
    $tls_numberOfFrames++; 
    $tls_ttl_total+=$row["ttl"];
}
$tls_ttl_lost = $tls_numberOfFrames * $base_ttl - $tls_ttl_total;


$query = "SELECT ttl FROM res_trames WHERE protocol_name = 'ICMP'";
$result = $pdo->query($query);
foreach($result as $row){
    $icmp_numberOfFrames++; 
    $icmp_ttl_total+=$row["ttl"];
}
$icmp_ttl_lost = $icmp_numberOfFrames * $base_ttl - $icmp_ttl_total;


$query = "SELECT ttl FROM res_trames WHERE protocol_name = 'TCP'";
$result = $pdo->query($query);
foreach($result as $row){
    $tcp_numberOfFrames++; 
    $tcp_ttl_total+=$row["ttl"];
}
$tcp_ttl_lost = $tcp_numberOfFrames * $base_ttl - $tcp_ttl_total;

$data_final["UDP"] = $udp_ttl_lost;
$data_final["TLSv1.2"] = $tls_ttl_lost;
$data_final["ICMP"] = $icmp_ttl_lost;
$data_final["TCP"] = $tcp_ttl_lost;

print(json_encode($data_final));
?>