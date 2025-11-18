<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION["credencial_funcionario"]) || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}


$id_linha = filter_input(INPUT_POST, 'id_linha', FILTER_SANITIZE_NUMBER_INT);

if ($id_linha) {
    
    $sql = "DELETE FROM linhas WHERE id_linhas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_linha);
    
    $msg = $stmt->execute() ? "excluido_sucesso" : "erro_exclusao";
} else {
    $msg = "id_invalido";
}

$conn->close();


header("Location: paginaTrensAtivados.php?msg=" . $msg);
exit;
?>