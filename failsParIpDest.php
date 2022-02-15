

<?php

    // Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
    // Adresse IP d'arrivée unique => nombre d'échecs

include("inc/pdo.php");
include("fonctions.php");

$ip_dest = array();
$ip_destFiltered = array();

$query = "SELECT ip_dest from res_trames";
$result = $pdo->query($query);

// Pour chaque IP...
foreach($result as $row){
    
   // On la push dans ip_dest, on vérifie si elle est présente dans ip_destFiltered
   // Si elle ne l'est pas, on l'y push 
   $ip_dest[] = $row["ip_dest"];
   if (in_array($row["ip_dest"], $ip_destFiltered) == false) {
       $ip_destFiltered[] = $row["ip_dest"];
   }
}

// On crée la base de notre json final, un tableau avec comme clés les valeurs du tableau
// ip_destFiltered, initialisé à 0 pour chaque clé
$data_final = array_fill_keys($ip_destFiltered, 0);

// Pour chaque IP différente...
for($i = 0; $i < count($ip_destFiltered); $i++) {

    // On sélectionne les statuts des trames correspondantes et on stocke tout dans result
    $query = "SELECT status FROM res_trames WHERE ip_dest = '$ip_destFiltered[$i]'";
    $result = $pdo->query($query);

    // Pour chaque élément de result...
    foreach($result as $row){         

        // Si le statut est disabled, on incrémente la valeur correspondante dans le json final
        if ($row["status"] == 'disabled') {
            $data_final[$ip_destFiltered[$i]]++;
        }
    }
}

// On parcourt le tableau final et on convertit ses clés 
for($i = 0; $i < count($data_final); $i++) {
    $oldkey = key($data_final);
    $newkey = ipConvert($oldkey);          
    $data_final[$newkey] = $data_final[$oldkey];
    unset($data_final[$oldkey]);
}


print(json_encode($data_final));
