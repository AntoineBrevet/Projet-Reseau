<?php

    // Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
    // Adresse IP d'arrivée unique => nombre de frames

    // Cf. failsParIpDest.php pour l'explication de code

    include("fonctions.php");
include("inc/pdo.php");

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

foreach($ip_dest as $ip_des) {
    if (array_key_exists($ip_des, $data_final) == true) {
        $data_final[$ip_des]++;
    }
}

for($i = 0; $i < count($data_final); $i++) {
    $oldkey = key($data_final);
    $newkey = ipConvert($oldkey);          
    $data_final[$newkey] = $data_final[$oldkey];
    unset($data_final[$oldkey]);
}

print(json_encode($data_final));

?>