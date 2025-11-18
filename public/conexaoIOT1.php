<?php
require("phpMQTT.php"); // ajuste o caminho

$server   = "7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud"; 
$port     = 8883;
$username = "Placa-1-Gustavo";
$password = "";
$topic    = "meu/topico/sensor";

$mysqli = new mysqli("localhost", "root", "", "seubanco");
if ($mysqli->connect_errno) {
    die("Erro MySQL: " . $mysqli->connect_error);
}

$mqtt = new Bluerhinos\phpMQTT($server, $port, "PHP_SUBSCRIBER");

if(!$mqtt->connect(true, NULL, $username, $password)) {
    exit("Erro ao conectar ao MQTT.");
}

$mqtt->subscribe([$topic => ["qos" => 0, "function" => "receberMensagem"]]);

while($mqtt->proc()) {}

$mqtt->close();

function receberMensagem($topic, $msg) {
    global $mysqli;

    echo "Recebido: $msg\n";

    $stmt = $mysqli->prepare("INSERT INTO dados_iot (mensagem, data_hora) VALUES (?, NOW())");
    $stmt->bind_param("s", $msg);
    $stmt->execute();
}
?>