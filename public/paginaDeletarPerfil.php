<?php
include "db.php";

if (!isset($_GET['credencial_funcionario']) || empty($_GET['credencial_funcionario'])) {
    die("Credencial não fornecida!");
}

$credencial = $_GET['credencial_funcionario'];

$sql = "SELECT * FROM funcionario WHERE credencial_funcionario = '$credencial'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Funcionário não encontrado!");
}

$sql = "DELETE FROM funcionario WHERE credencial_funcionario = '$credencial'";

if ($conn->query($sql) === TRUE) {
    echo "Funcionário excluído com sucesso!
        <a href='paginaAlterarPerfil.php'>Voltar à lista de funcionários.</a>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}
$conn->close();
exit();
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
    
    

    

   

            
            <div class="letras"></div>
        </div>
    </div>
    
    
</body>
</html>

