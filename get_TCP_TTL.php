<?php
include("inc/pdo.php");
include("fonctions.php");

$query = "SELECT ttl FROM res_trames WHERE protocol_name = 'TCP'";
$result = $pdo->query($query);
$data = array();
foreach($result as $row){
   $data[] = $row;
}
print(json_encode($data));
?>