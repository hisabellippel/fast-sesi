<?php
include "db.php";
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: paginaLogin.php?msg=expired");
    exit;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
    <?php if (empty($_SESSION["credencial_funcionario"])): ?>

    <div class="card">
        <p>Sua sessão foi encerrada! Clique aqui para logar novamente.</p>
        <p><a href="paginaLogin.php">Logar novamente</a></p>
    </div>

    <?php else: ?>
    
    <header>
        <div id="barraescura">
           <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
        </div>
    </header>

    <div id="fonte">
        <h1>Meu Perfil:</h1>
        <p><a href="?logout=1">Sair</a></p>

        <div class="pad6">
            <div class="alterarPerfil">
                <img src="../asets/imagens/meio/rostoAlterarPerfil.png" alt="">

                <?php
                $credencial = $_SESSION['credencial_funcionario'];
                $sql = "SELECT * FROM funcionario WHERE credencial_funcionario = '$credencial'";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $cpf = $row['cpf_funcionario'];
                    $senha_mascarada = str_repeat('*', 8);

                    $cpf_formatted = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                    
                    echo "<p><strong>Nome:</strong> {$row['nome_funcionario']}</p>";
                    echo "<p><strong>Credencial:</strong> {$row['credencial_funcionario']}</p>";
                    echo "<p><strong>Telefone:</strong> {$row['telefone_funcionario']}</p>";
                    echo "<p><strong>Senha:</strong> {$senha_mascarada}</p>";
                    echo "<p><strong>E-mail:</strong> {$row['email_funcionario']}</p>";
                    echo "<p><strong>CPF:</strong> {$cpf_formatted}</p>";
                    echo "<p><strong>Salário:</strong> {$row['salario_funcionario']}</p>";


                    echo '<div class="botao">
                            <a href="paginaAlterarPerfil2.php?credencial_funcionario=' . $row['credencial_funcionario'] . '">
                                <button type="button">Alterar Perfil:</button>
                            </a>
                          </div>';
                } else {
                    echo "<p>Nenhum usuário encontrado com esta credencial.</p>";
                }
                ?>
                <div class="letras"></div>
            </div>
        </div>
    </div>
    
    <footer>
        <div id="barra">
            <a href="paginainformacoes.php"><img class="topo1" src="../asets/imagens/barraAbaixo/barras.png" alt=""></a>
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>
    <?php endif; ?> 
</body>
</html>