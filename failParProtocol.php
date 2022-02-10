<?php

include("inc/pdo.php");

$protocols = array();
$protocolsFiltered = array();

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
    $query = "SELECT status FROM res_trames WHERE protocol_name = '$protocolsFiltered[$i]'";
    $result = $pdo->query($query);
    foreach($result as $row){ 
        
        if ($row["status"] == 'disabled') {
            $data_final[$protocolsFiltered[$i]]++;
        }
    }
}
print(json_encode($data_final));
