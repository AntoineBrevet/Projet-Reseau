<!--
    Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
    Nom de protocole unique => nombre de TTL perdus
-->

<?php
include("inc/pdo.php");
include("fonctions.php");

$protocols = array();
$protocolsFiltered = array();
$lostTTL = 0;
$base_TTL = 128;

$query = "SELECT protocol_name from res_trames";
$result = $pdo->query($query);

// Pour chaque nom de protocole...
foreach($result as $row){ 

   // On push ce nom dans le tableau protocols, on vérifie s'il est présent dans protocolsFiltered
   // S'il l'est pas, on l'y push 
   $protocols[] = $row["protocol_name"];
   if (in_array($row["protocol_name"], $protocolsFiltered) == false) {
       $protocolsFiltered[] = $row["protocol_name"];
   }
}

// On crée la base de notre json final, un tableau avec comme clés les valeurs du tableau
// protocolsFiltered, initialisé à 0 pour chaque clé
$data_final = array_fill_keys($protocolsFiltered, 0);

// Pour chaque protocole différent...
for($i = 0; $i < count($protocolsFiltered); $i++) {
    $lostTTL = 0;

    // On sélectionne le TTL des frames correspondantes et on stocke tout dans result
    $query = "SELECT ttl FROM res_trames WHERE protocol_name = '$protocolsFiltered[$i]'";
    $result = $pdo->query($query);

    // Pour chaque élément de result...
    foreach($result as $row){ 

        // Calcul du TTL pour cette frame
        $lostTTL+=($base_TTL - $row['ttl']);

        // Mise à jour du json final
        $data_final[$protocolsFiltered[$i]]+=$lostTTL;
        
        // Réinitialisation
        $lostTTL = 0;
    }
}
print(json_encode($data_final));
?>