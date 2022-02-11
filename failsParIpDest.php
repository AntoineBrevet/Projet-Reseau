<?php

include("inc/pdo.php");
include("fonctions.php");

$ip_dest = array();
$ip_destFiltered = array();

$query = "SELECT ip_dest from res_trames";
$result = $pdo->query($query);
foreach($result as $row){ 
   $ip_dest[] = $row["ip_dest"];
   if (in_array($row["ip_dest"], $ip_destFiltered) == false) {
       $ip_destFiltered[] = $row["ip_dest"];
   }
}

$data_final = array_fill_keys($ip_destFiltered, 0);

for($i = 0; $i < count($ip_destFiltered); $i++) {
    $query = "SELECT status FROM res_trames WHERE ip_dest = '$ip_destFiltered[$i]'";
    $result = $pdo->query($query);
    foreach($result as $row){         
        if ($row["status"] == 'disabled') {
            $data_final[$ip_destFiltered[$i]]++;
        }
    }
}

for($i = 0; $i < count($data_final); $i++) {
    $oldkey = key($data_final);
    $newkey = ipConvert($oldkey);          
    $data_final[$newkey] = $data_final[$oldkey];
    unset($data_final[$oldkey]);
}


print(json_encode($data_final));