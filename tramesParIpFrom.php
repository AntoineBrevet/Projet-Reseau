<?php
include("fonctions.php");
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

foreach($ip_from as $ip_fro) {
    if (array_key_exists($ip_fro, $data_final) == true) {
        $data_final[$ip_fro]++;
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