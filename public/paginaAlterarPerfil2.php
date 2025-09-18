<?php
include "db.php";
session_start();

if (empty($_SESSION["credencial_funcionario"])) {
    echo "Sua sessão expirou. Por favor, faça login novamente.";
    exit();
}

$credencial = $_SESSION['credencial_funcionario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_funcionario = $_POST['nome_funcionario'] ?? '';
    $cpf_funcionario = $_POST['cpf_funcionario'] ?? '';
    $email_funcionario = $_POST['email_funcionario'] ?? '';
    $telefone_funcionario = $_POST['telefone_funcionario'] ?? '';
    $salario_funcionario = $_POST['salario_funcionario'] ?? '';
    $funcao_funcionario = $_POST['funcao_funcionario'] ?? '';
    $nova_senha = $_POST['senha_funcionario'] ?? '';

    $sql = "UPDATE funcionario SET 
        nome_funcionario = ?,
        cpf_funcionario = ?,
        email_funcionario = ?,
        telefone_funcionario = ?,
        salario_funcionario = ?,
        funcao_funcionario = ?";
    
    if (!empty($nova_senha)) {
        $sql .= ", senha_funcionario = ?";
    }

    $sql .= " WHERE credencial_funcionario = ?";
    
    $stmt = $conn->prepare($sql);

    $senha_para_db = $nova_senha;
    
    if (!empty($nova_senha)) {
        $stmt->bind_param("ssssdss", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario, $salario_funcionario, $funcao_funcionario, $senha_para_db, $credencial);
    } else {
        $stmt->bind_param("ssssds", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario, $salario_funcionario, $funcao_funcionario, $credencial);
    }
    
    if ($stmt->execute()) {
        echo "Perfil atualizado com sucesso. <a href='paginaAlterarPerfil.php'>Ver Perfil.</a>";
    } else {
        echo "Erro ao atualizar perfil: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}

$sql = "SELECT * FROM funcionario WHERE credencial_funcionario = '$credencial'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome_funcionario = $row['nome_funcionario'];
    $cpf_funcionario = $row['cpf_funcionario'];
    $email_funcionario = $row['email_funcionario'];
    $telefone_funcionario = $row['telefone_funcionario'];
    $salario_funcionario = $row['salario_funconario'];
    $funcao_funcionario = $row['funcao_funcionario'];
    $senha_funcionario = $row['senha_funcionario']; // A senha é carregada do banco de dados
} else {
    echo "Funcionário não encontrado.";
    $conn->close();
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
    <header>
        <div id="barraescura">
            <div id="nav-itens">
                <img class="topoTradutor" src="../asets/imagens/barraAcima/tradutor.png" alt="">
            </div>
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
        </div>
    </header>
    <main>
        <div class="branca1">
            <img class="i" src="../asets/imagens/meio/perfil.png" alt="">
            <form method="post" action="">
                <input type="hidden" name="credencial_funcionario" value="<?php echo htmlspecialchars($credencial); ?>">

                <div class="c2">
                    <label for="nome_funcionario"></label><br>
                    <img class="im" src="../asets/imagens/meio/nome.png" alt="">
                    <input type="text" name="nome_funcionario" id="nome" placeholder="Insira seu nome:" value="<?php echo htmlspecialchars($nome_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="cpf_funcionario"></label><br>
                    <img class="im" src="../asets/imagens/meio/cpf.png" alt="">
                    <input type="text" name="cpf_funcionario" id="cpf" placeholder="Insira seu CPF:" value="<?php echo htmlspecialchars($cpf_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="email_funcionario"></label><br>
                    <img class="im" src="../asets/imagens/meio/email.png" alt="">
                    <input type="email" name="email_funcionario" id="email" placeholder="Insira seu email:" value="<?php echo htmlspecialchars($email_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="telefone_funcionario"></label><br>
                    <img class="im" src="../asets/imagens/meio/telefone.png" alt="">
                    <input type="text" name="telefone_funcionario" id="telefone" placeholder="Insira seu telefone:" value="<?php echo htmlspecialchars($telefone_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="salario_funcionario"></label><br>
                    <input type="number" step="0.01" name="salario_funcionario" id="salario" placeholder="Insira seu salário:" value="<?php echo htmlspecialchars($salario_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="senha_funcionario"></label><br>
                    <img class="im" src="../asets/imagens/meio/senha.png" alt="">
                    <input type="text" name="senha_funcionario" id="senha" placeholder="Insira sua senha:" value="<?php echo htmlspecialchars($senha_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="funcao_funcionario"></label><br>
                    <input type="text" name="funcao_funcionario" id="funcao" placeholder="Insira sua função:" value="<?php echo htmlspecialchars($funcao_funcionario); ?>" required>
                     </div>

                <br>

                <button type="submit">Finalizar</button>
            </form>
        </div>

        <footer>
            <div id="barra">
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
                <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
                <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
                <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
            </div>
        </footer>
    </main>
</body>
</html>