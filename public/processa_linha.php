<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: paginaTrensAtivados1.php");
    exit;
}

$id_linhas = isset($_POST['id_linhas']) ? (int)$_POST['id_linhas'] : null;

$required_fields = ['nome_linhas', 'velocidade_linhas', 'passageiros_linhas', 'avisos_linhas', 'distancia_linhas', 'motorista_linhas', 'horario_linhas', 'eficiencia_eletrica_linhas', 'consumo_energia_linhas', 'acidentes_linhas'];

foreach ($required_fields as $field) {
    if (!isset($_POST[$field]) || (empty(trim($_POST[$field])) && $_POST[$field] !== '0')) {
        header("Location: " . ($id_linhas ? "adicionar_editar_linha.php?id=$id_linhas&msg=missing_fields" : "adicionar_editar_linha.php?msg=missing_fields"));
        exit;
    }
}


$nome_linhas = trim($_POST['nome_linhas']);
$velocidade_linhas = (int)$_POST['velocidade_linhas'];
$passageiros_linhas = (int)$_POST['passageiros_linhas'];
$avisos_linhas = trim($_POST['avisos_linhas']);
$distancia_linhas = (float)$_POST['distancia_linhas'];
$motorista_linhas = (int)$_POST['motorista_linhas'];
$horario_linhas = trim($_POST['horario_linhas']);
$eficiencia_eletrica_linhas = trim($_POST['eficiencia_eletrica_linhas']);
$consumo_energia_linhas = (float)$_POST['consumo_energia_linhas'];
$acidentes_linhas = (int)$_POST['acidentes_linhas'];

$falhas_tecnicas_linhas = isset($_POST['falhas_tecnicas_linhas']) ? trim($_POST['falhas_tecnicas_linhas']) : null;


if ($id_linhas) {

  
    $sql = "UPDATE linhas SET
                nome_linhas = ?, 
                velocidade_linhas = ?, 
                passageiros_linhas = ?, 
                avisos_linhas = ?, 
                distancia_linhas = ?, 
                motorista_linhas = ?, 
                horario_linhas = ?, 
                eficiencia_eletrica_linhas = ?, 
                consumo_energia_linhas = ?, 
                acidentes_linhas = ?, 
                falhas_tecnicas_linhas = ?
            WHERE id_linhas = ?";
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
       
        $error_details = "Erro na preparação do UPDATE: " . $conn->error;
        $conn->close();
        $redirect_url = "adicionar_editar_linha.php?id=$id_linhas&msg=" . urlencode($error_details);
        header("Location: " . $redirect_url);
        exit;
    }

    $stmt->bind_param(
        "siidsisdsisi", 
        $nome_linhas, 
        $velocidade_linhas, 
        $passageiros_linhas, 
        $avisos_linhas, 
        $distancia_linhas, 
        $motorista_linhas, 
        $horario_linhas, 
        $eficiencia_eletrica_linhas, 
        $consumo_energia_linhas, 
        $acidentes_linhas, 
        $falhas_tecnicas_linhas, 
        $id_linhas
    );

    $success_msg = "Linha editada com sucesso!";
    $error_msg = "Erro ao editar a linha: ";

} else {

   
    $sql = "INSERT INTO linhas (
                nome_linhas, velocidade_linhas, passageiros_linhas, avisos_linhas, 
                distancia_linhas, motorista_linhas, horario_linhas, eficiencia_eletrica_linhas, 
                consumo_energia_linhas, acidentes_linhas, falhas_tecnicas_linhas
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
       
        $error_details = "Erro na preparação do INSERT: " . $conn->error;
        $conn->close();
        $redirect_url = "adicionar_editar_linha.php?msg=" . urlencode($error_details);
        header("Location: " . $redirect_url);
        exit;
    }

   
    $stmt->bind_param(
        "siidsisdsis", 
        $nome_linhas, 
        $velocidade_linhas, 
        $passageiros_linhas, 
        $avisos_linhas, 
        $distancia_linhas, 
        $motorista_linhas, 
        $horario_linhas, 
        $eficiencia_eletrica_linhas, 
        $consumo_energia_linhas, 
        $acidentes_linhas, 
        $falhas_tecnicas_linhas
    );

    $success_msg = "Nova linha adicionada com sucesso!";
    $error_msg = "Erro ao adicionar a linha: ";
}


if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: paginaTrensAtivados1.php?msg=" . urlencode($success_msg));
    exit;
} else {
    $error_details = $error_msg . $stmt->error;
    $stmt->close();
    $conn->close();
    
    
    $redirect_url = $id_linhas ? 
        "adicionar_editar_linha.php?id=$id_linhas&msg=" . urlencode($error_details) : 
        "adicionar_editar_linha.php?msg=" . urlencode($error_details);
        
    header("Location: " . $redirect_url);
    exit;
}
?>