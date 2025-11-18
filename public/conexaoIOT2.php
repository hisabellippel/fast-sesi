<?php
require("conexaoIOT3.php");

$server = "7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud";
$port = 8883;
$topic = "projeto/trem/velocidade";
$client_id = "phpmqtt-" . rand();

$username = "Placa-4-Ana";
$password = "";

header('Content-Type: application/json');

$messages = [];

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo json_encode(["error" => "Não foi possível conectar ao broker"]);
    exit;
}

$mqtt->subscribe([$topic => ["qos" => 0, "function" => function ($topic, $msg) use (&$messages) {
    $messages[] = ["topic" => $topic, "msg" => $msg, "time" => date("H:i:s")];
}]], 0);

$start = time();
while (time() - $start < 2) { 
    $mqtt->proc();
}

$mqtt->close();

echo json_encode($messages);