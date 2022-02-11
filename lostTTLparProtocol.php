<?php
include("inc/pdo.php");
include("fonctions.php");

$protocols = array();
$protocolsFiltered = array();
$lostTTL = 0;
$base_TTL = 128;

$query = "SELECT protocol_name from res_trames";
$result = $pdo->query($query);
foreach($result as $row){ 
   $protocols[] = $row["protocol_name"];
   if (in_array($row["protocol_name"], $protocolsFiltered) == false) {
       $protocolsFiltered[] = $row["protocol_name"];
   }
}
$data_final = array_fill_keys($protocolsFiltered, 0);

for($i = 0; $i < count($protocolsFiltered); $i++) {
    $lostTTL = 0;
    $query = "SELECT ttl FROM res_trames WHERE protocol_name = '$protocolsFiltered[$i]'";
    $result = $pdo->query($query);
    foreach($result as $row){ 
        $lostTTL+=($base_TTL - $row['ttl']);
        $data_final[$protocolsFiltered[$i]]+=$lostTTL;
        $lostTTL = 0;
    }
}
print(json_encode($data_final));
?>