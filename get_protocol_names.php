<?php
include("pdo.php");
include("fonctions.php");

$query = "SELECT protocol_name FROM res_trames";
$result = $pdo->query($query);
$data = array();
foreach($result as $row){
   $data[] = $row;
}
print(json_encode($data));
?>