<?php
require("phpMQTT.php");

$server = '7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud';
$port = 8883;
$topic = 'S1/temperatura';
$client_id = "phpmqtt-" . rand();

$username = "Placa-1-Gustavo";
$password = "123456abX";
$cafile = __DIR__ . "/cacert.pem";
$message = "";

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
$mqtt->cafile = $cafile;

if (!$mqtt->connect(true, NULL, $username, $password)) {
    echo "Não foi possível conectar ao broker";
    exit;
}

$mqtt->subscribe([
    $topic => [
        "qos" => 0,
        "function" => function ($topic, $msg) {

            if (!empty($msg)) {

                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "fast_sesi_sa";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexao falhou: " . $conn->connect_error);
                }
                $sql = "INSERT INTO temperaturas (valor, data_hora) VALUES (?, NOW())";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("d", $msg); 
                $stmt->execute();

                $stmt->close();
                $conn->close();

                echo "Temperatura salva no banco: $msg";
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