

<?php

    // Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
    // Nom de protocole unique => nombre d'échecs

include("inc/pdo.php");

$protocols = array();
$protocolsFiltered = array();

$query = "SELECT protocol_name from res_trames";
$result = $pdo->query($query);

// Pour chaque nom de protocole...

foreach($result as $row){ 

   // On push ce nom dans le tableau protocols
   $protocols[] = $row["protocol_name"];

   // On vérifie si ce nom est présent dans le tableau protocolsFiltered
   // S'il ne l'est pas, on l'y push. 
   if (in_array($row["protocol_name"], $protocolsFiltered) == false) {
       $protocolsFiltered[] = $row["protocol_name"];
   }
}

// On crée la base de notre json final, un tableau avec comme clés les valeurs du tableau
// protocolsFiltered, initialisé à 0 pour chaque clé
$data_final = array_fill_keys($protocolsFiltered, 0);

// Pour chaque protocole différent...
for($i = 0; $i < count($protocolsFiltered); $i++) {

    // On sélectionne les statuts des trames correspondantes et on stocke tout dans result
    $query = "SELECT status FROM res_trames WHERE protocol_name = '$protocolsFiltered[$i]'";
    $result = $pdo->query($query);

    // Pour chaque élément de result...
    foreach($result as $row){  
        
        // Si le statut est disabled, on incrémente la valeur correspondante dans le json final
        if ($row["status"] == 'disabled') {
            $data_final[$protocolsFiltered[$i]]++;
        }
    }
}
print(json_encode($data_final));
