<?php


$delta = $msg1 - $msg

$velocidade = $distancia / $delta

if(($message<>0) && ($message<>"")){

    $sql = "INSERT INTO presenca (valor, data_hora) VALUES (?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $message); 
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
    
}
?>