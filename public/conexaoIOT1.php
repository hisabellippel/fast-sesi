<?php
require("conexaoIOT3.php");

$server = "7aecec580ecf4e5cbac2d52b35eb85b9.s1.eu.hivemq.cloud";
$port = 8883;
$topic = "projeto/trem/velocidade";

if (isset($_POST['msg']) && !empty($_POST['msg'])) {
    $client_id = "phpmqtt-pub-" . rand();
    $mqtt = new Bluerhinos\phpMQTT($server, $port, $client_id);
    if ($mqtt->connect(true, NULL, "", "")) {
        $mqtt->publish($topic, $_POST['msg'], 0);
        $mqtt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>MQTT Dashboard PHP</title>
    <style>
        .msg {
            margin-bottom: 5px;
        }

        form {
            margin-top: 10px;
        }
    </style>
    <script>
        let allMessages = [];

        function fetchMessages() {
            fetch('get_messages.php?t=' + new Date().getTime())
                .then(r => r.json())
                .then(data => {
                    if (data.error) {
                        console.error(data.error);
                        return;
                    }
                    if (data.length > 0) {
                        data.forEach(m => {
                            const key = m.time + m.msg;
                            if (!allMessages.includes(key)) {
                                allMessages.push(key);
                                const div = document.createElement('div');
                                div.className = 'msg';
                                div.textContent = `[${m.time}] ${m.topic}: ${m.msg}`;
                                document.getElementById('messages').appendChild(div);
                            }
                        });
                    }
                })
                .catch(e => console.error(e));
        }

        setInterval(fetchMessages, 1000);
        fetchMessages();
    </script>
</head>

<body>
    <h1>Mensagens MQTT</h1>

    <form method="post">
        <input>