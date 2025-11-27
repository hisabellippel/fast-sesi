<?php
require("phpMQTT.php");
include "db.php";

$server = 'a1997d4dddb04e48946891c0ad3241ea.s1.eu.hivemq.cloud';
$port = 8883;
$topic = 'Projeto/S2/Distancia1';
$client_id = "phpmqtt-" . rand();

$username = "Placa-2-Julia";
$password = "123456abX";
$cafile = __DIR__ . "/cacert.pem";
$message = "";
$distancia = 0.5; 

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
$mqtt->cafile = $cafile;

if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo "Não foi possível conectar ao broker";
    exit;
}

$mqtt->subscribe([
    $topic => [
        "qos" => 0,
        "function" => function ($topic, $msg) use (&$message) {
            if (!empty($msg)) {
                $message = (int)$msg;
            
            }
        }
    ]
], 0);

$start = time();
while (time() - $start < 2) { 
    $mqtt->proc();
}

$mqtt->close();
?>