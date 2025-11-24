<?php
//require("vendor/autoload.php");

//use PhpMqtt\Client\MqttClient;
//use PhpMqtt\Client\ConnectionSettings;

//$server   = '7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud';
//$port     = 8883;
//$clientId = 'php-mqtt-listener';
//$username = 'Placa-1-Gustavo';
//$password = '123456abX';

//$settings = (new ConnectionSettings)
    //->setUsername($username)
    //->setPassword($password)
    //->setUseTls(true)
    //->setTlsSelfSignedAllowed(true);

//$mqtt = new MqttClient($server, $port, $clientId);

//$mqtt->connect($settings, true);

//$mqtt->subscribe('S1/temperatura', function ($topic, $message) {

    //$pdo = new PDO("mysql:host=localhost;dbname=fast_sesi_sa;charset=utf8","root","root");

   // $stmt = $pdo->prepare("INSERT INTO temperaturas (valor, data_hora) VALUES (?, NOW())");
  //  $stmt->execute([$message]);

//}, 0);

// $mqtt->loop(true);



require("mqtt.php"); 

$server = '7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud';
$port = 8883;
$client_id = 'php-mqtt-listener-1234';
$username = 'Placa-4-Ana';
$password = '123456abX';
$topic = 'S1/temperatura';

// Opções para desativar a verificação SSL (Inseguro, mas resolve o erro "Failed to enable crypto" para testes)
$options = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ]
];

$mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);

// Tenta conectar, passando as opções SSL.
if (!$mqtt->connect(true, $options, $username, $password)) {
    echo "Erro: Não foi possível conectar ao broker";
    exit;
}

$ultimaMensagem = "";

// Assina o tópico e define a função de callback
$mqtt->subscribe([$topic => ["function" => function($topic, $msg) use (&$ultimaMensagem) {
    $ultimaMensagem = $msg;
}]], 0);

// Mantém a conexão ativa e processa mensagens por 2 segundos
$start = time();
while (time() - $start < 2) {
    $mqtt->proc();
}

$mqtt->close();

echo $ultimaMensagem;

?>