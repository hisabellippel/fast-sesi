<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION["credencial_funcionario"]) || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}


$id_linhas = filter_input(INPUT_POST, 'id_linhas', FILTER_SANITIZE_NUMBER_INT);
$nome_linhas = filter_input(INPUT_POST, 'nome_linhas', FILTER_SANITIZE_STRING);
$velocidade_linhas = filter_input(INPUT_POST, 'velocidade_linhas', FILTER_SANITIZE_NUMBER_INT);
$passageiros_linhas = filter_input(INPUT_POST, 'passageiros_linhas', FILTER_SANITIZE_NUMBER_INT);
$avisos_linhas = filter_input(INPUT_POST, 'avisos_linhas', FILTER_SANITIZE_STRING);
$distancia_linhas = filter_input(INPUT_POST, 'distancia_linhas', FILTER_SANITIZE_NUMBER_INT);
$motorista_linhas = filter_input(INPUT_POST, 'motorista_linhas', FILTER_SANITIZE_NUMBER_INT);
$horario_linhas = filter_input(INPUT_POST, 'horario_linhas', FILTER_SANITIZE_STRING);
$eficiencia_eletrica_linhas = filter_input(INPUT_POST, 'eficiencia_eletrica_linhas', FILTER_SANITIZE_STRING);
$consumo_energia_linhas = filter_input(INPUT_POST, 'consumo_energia_linhas', FILTER_SANITIZE_NUMBER_INT);
$acidentes_linhas = filter_input(INPUT_POST, 'acidentes_linhas', FILTER_SANITIZE_NUMBER_INT);
$falhas_tecnicas_linhas = filter_input(INPUT_POST, 'falhas_tecnicas_linhas', FILTER_SANITIZE_STRING);


if ($id_linhas) {
   
    $sql = "UPDATE linhas SET 
                nome_linhas = ?, 
                velocidade_linhas = ?, 
                passageiros_linhas = ?, 
                avisos_linhas = ?, 
                distancia_linhas = ?, 
                horario_linhas = ?,
                eficiencia_eletrica_linhas = ?,
                consumo_energia_linhas = ?,
                acidentes_linhas = ?,
                falhas_tecnicas_linhas = ?,
                motorista_linhas = ?
            WHERE id_linhas = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiisisisisi", 
        $nome_linhas, $velocidade_linhas, $passageiros_linhas, $avisos_linhas, $distancia_linhas, 
        $horario_linhas, $eficiencia_eletrica_linhas, $consumo_energia_linhas, $acidentes_linhas, 
        $falhas_tecnicas_linhas, $motorista_linhas, $id_linhas);
    
    $msg = $stmt->execute() ? "editado_sucesso" : "erro_edicao";

} else {
    
    $sql = "INSERT INTO linhas 
                (nome_linhas, velocidade_linhas, passageiros_linhas, avisos_linhas, distancia_linhas, horario_linhas, eficiencia_eletrica_linhas, consumo_energia_linhas, acidentes_linhas, falhas_tecnicas_linhas, motorista_linhas) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiisisisis", 
        $nome_linhas, $velocidade_linhas, $passageiros_linhas, $avisos_linhas, $distancia_linhas, 
        $horario_linhas, $eficiencia_eletrica_linhas, $consumo_energia_linhas, $acidentes_linhas, 
        $falhas_tecnicas_linhas, $motorista_linhas);

    $msg = $stmt->execute() ? "adicionado_sucesso" : "erro_adicao";
}

$conn->close();


header("Location: paginaTrensAtivados.php?msg=" . $msg);
exit;
?>