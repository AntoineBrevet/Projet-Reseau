<!--
    Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
    Statut => nombre de frames

    Cf. failParProtocol.php pour l'explication de code
-->

<?php
include("inc/pdo.php");

$query = "SELECT status FROM res_trames";
$result = $pdo->query($query);
$statusFiltered = array();
$status = array();
foreach($result as $row){
   $status[] = $row["status"];
}

$statusFiltered = array_unique($status);

$data_final = array_fill_keys($statusFiltered, 0);

foreach($status as $statu) {
    if (array_key_exists($statu, $data_final) == true) {
        $data_final[$statu]++;
    }
}

print(json_encode($data_final));
?>