<?php

include("inc/pdo.php");


$ip_from = array();
$ip_fromFiltered = array();

$query = "SELECT ip_from from res_trames";
$result = $pdo->query($query);
foreach($result as $row){ 
   $ip_from[] = $row["ip_from"];
   if (in_array($row["ip_from"], $ip_fromFiltered) == false) {
       $ip_fromFiltered[] = $row["ip_from"];
   }
}

$data_final = array_fill_keys($ip_fromFiltered, 0);

for($i = 0; $i < count($ip_fromFiltered); $i++) {
    $query = "SELECT status FROM res_trames WHERE ip_from = '$ip_fromFiltered[$i]'";
    $result = $pdo->query($query);
    foreach($result as $row){ 
        
        if ($row["status"] == 'disabled') {
            $data_final[$ip_fromFiltered[$i]]++;
        }
    }
}
print(json_encode($data_final));

?>