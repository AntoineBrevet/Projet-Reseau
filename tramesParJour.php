<?php

include("inc/pdo.php");

$dates = array();
$datesFiltered = array();

$query = "SELECT date from res_trames";
$result = $pdo->query($query);
foreach($result as $row){ 
   $dates[] = $row["date"];
   if (in_array($row["date"], $datesFiltered) == false) {
       $datesFiltered[] = $row["date"];
   }
}

$data_final = array_fill_keys($datesFiltered, 0);

foreach($dates as $date) {
    if (array_key_exists($date, $data_final) == true) {
        $data_final[$date]++;
    }
}

ksort($data_final);

print(json_encode($data_final));

?>