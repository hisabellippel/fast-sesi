<?php
require("vendor/autoload.php");

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

$server   = '7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud';
$port     = 8883;
$clientId = 'php-mqtt-listener';
$username = 'Placa-1-Gustavo';
$password = '123456abX';

// Configura SSL
$settings = (new ConnectionSettings)
    ->setUsername($username)
    ->setPassword($password)
    ->setUseTls(true)
    ->setTlsSelfSignedAllowed(true);

$mqtt = new MqttClient($server, $port, $clientId);

$mqtt->connect($settings, true);

// 🔥 Inscreve no tópico da temperatura
$mqtt->subscribe('S1/temperatura', function ($topic, $message) {

    // Conexão ao banco
    $pdo = new PDO("mysql:host=localhost;dbname=fast_sesi_sa;charset=utf8","root","root");

    // Insere no banco
    $stmt = $pdo->prepare("INSERT INTO temperaturas (valor, data_hora) VALUES (?, NOW())");
    $stmt->execute([$message]);

}, 0);

// Mantém o script rodando
$mqtt->loop(true);