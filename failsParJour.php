<?php

include("inc/pdo.php");


$days = array();
$daysFiltered = array();

$query = "SELECT date from res_trames";
$result = $pdo->query($query);
foreach($result as $row){ 
   $days[] = $row["date"];
   if (in_array($row["date"], $daysFiltered) == false) {
       $daysFiltered[] = $row["date"];
   }
}

$data_final = array_fill_keys($daysFiltered, 0);

for($i = 0; $i < count($daysFiltered); $i++) {
    $query = "SELECT status FROM res_trames WHERE date = '$daysFiltered[$i]'";
    $result = $pdo->query($query);
    foreach($result as $row){ 
        
        if ($row["status"] == 'disabled') {
            $data_final[$daysFiltered[$i]]++;
        }
    }
}
ksort($data_final);

print(json_encode($data_final));

?>