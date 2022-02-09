<?php
include("pdo.php");
include("fonctions.php");

$json = json_decode(file_get_contents("http://51.255.160.47:8282/resources/frames.json"), true);

foreach ($json as $key => $value) {
    $date = date_create();
    date_timestamp_set($date, $value["date"]);
    $date2 = date_format($date, 'Y-m-d H:i:s') . "\n";
    $identification = $value["identification"];
    $status = $value["protocol"]["checksum"]["status"];
    $version = $value["version"];
    $protocol = $value["protocol"]["name"];
    $flags = $value["flags"]["code"];
    $ttl = $value["ttl"];
    $headerChecksum = $value["headerChecksum"];
    $portFrom = $value["protocol"]["ports"]["from"];
    $portDest = $value["protocol"]["ports"]["dest"];
    $ipFrom = $value["ip"]["from"];
    $ipDest = $value["ip"]["dest"];

    if (array_key_exists("code", $value["protocol"]["checksum"])) {
        $protocolChecksum = $value["protocol"]["checksum"]["code"];
        $sql = "INSERT INTO res_trames (date, identifiant, status, version, protocol_name, 
            flags, ttl, protocol_checksum, header_checksum, port_from, port_dest, ip_from, ip_dest) VALUES 
            ('$date2', 
            '$identification', 
            '$status', 
            '$version',
            '$protocol', 
            '$flags', 
            '$ttl', 
            '$protocolChecksum',
            '$headerChecksum', 
            '$portFrom', 
            '$portDest', 
            '$ipFrom', 
            '$ipDest')";

        $req = $pdo->query($sql);
    } else {
        $sql = "INSERT INTO res_trames (date, identifiant, status, version, protocol_name, 
            flags, ttl, header_checksum, port_from, port_dest, ip_from, ip_dest) VALUES 
            ('$date2', 
            '$identification', 
            '$status', 
            '$version',
            '$protocol', 
            '$flags', 
            '$ttl', 
            '$headerChecksum', 
            '$portFrom', 
            '$portDest', 
            '$ipFrom', 
            '$ipDest')";

        $req = $pdo->query($sql);
    }
}
