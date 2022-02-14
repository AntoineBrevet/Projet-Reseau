<!--
    Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
    Nom de protocole unique => nombre de frames

    Cf. failParProtocol.php pour l'explication de code
-->

<?php
include("inc/pdo.php");
include("fonctions.php");

$query = "SELECT protocol_name FROM res_trames";
$result = $pdo->query($query);
$protocols = array();
foreach($result as $row){
   $protocols[] = $row['protocol_name'];
}
$protocolsFiltered = array_unique($protocols);
$data_final = array_fill_keys($protocolsFiltered, 0);

foreach($protocols as $protocol) {
   if (array_key_exists($protocol, $data_final) == true) {
       $data_final[$protocol]++;
   }
}

print(json_encode($data_final));
?>