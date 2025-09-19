<?php
include "db.php";
session_start();

if (empty($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

// Always fetch user cargo from DB to ensure accuracy
$credencial = $_SESSION['credencial_funcionario'];
$sql = "SELECT cargo_funcionario FROM funcionario WHERE credencial_funcionario = '$credencial'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['cargo_funcionario'] = $row['cargo_funcionario'];
    // Debug: echo "Cargo: " . $_SESSION['cargo_funcionario'] . "<br>";
} else {
    echo "Erro ao verificar permissões.";
    exit;
}

// Check if user is admin
if ($_SESSION['cargo_funcionario'] !== 'ADM') {
    echo "<div class='card'><p>Acesso negado. Apenas administradores podem acessar esta página.</p><p><a href='paginaMenuPrincipal.php'>Voltar ao menu principal</a></p></div>";
    exit;
}

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
        <h1>Funcionários:</h1>
        <p><a href="?logout=1">Sair</a></p>
         <p><a href="paginaCriarConta.php">Cadastrar Novo Funcionário</a></p>

        <div class="pad6">
            <?php
            $credencial_admin = $_SESSION['credencial_funcionario'];

            // Fetch all employees
            $sql = "SELECT * FROM funcionario";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $admin_row = null;
                $other_rows = [];

                // Separate admin and others
                while ($row = $result->fetch_assoc()) {
                    if ($row['credencial_funcionario'] === $credencial_admin) {
                        $admin_row = $row;
                    } else {
                        $other_rows[] = $row;
                    }
                }

                echo '<div style="display:flex; flex-wrap: wrap;">';

                // Render admin profile first
                if ($admin_row) {
                    $cpf = $admin_row['cpf_funcionario'];
                    $senha_mascarada = str_repeat('*', 8);
                    $cpf_formatted = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

                    echo '<table border="1" style="margin-right: 20px; background-color: rgb(94, 156, 239); border-radius: 20px; color: aliceblue; width: 350px; height: 475px;">';
                    echo '<tr><td colspan="2" style="text-align:center;"><img src="../asets/imagens/meio/rostoAlterarPerfil.png" alt=""></td></tr>';
                    echo "<tr><td><strong>Nome:</strong></td><td>{$admin_row['nome_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Credencial:</strong></td><td>{$admin_row['credencial_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Telefone:</strong></td><td>{$admin_row['telefone_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Senha:</strong></td><td>{$senha_mascarada}</td></tr>";
                    echo "<tr><td><strong>E-mail:</strong></td><td>{$admin_row['email_funcionario']}</td></tr>";
                    echo "<tr><td><strong>CPF:</strong></td><td>{$cpf_formatted}</td></tr>";
                    echo "<tr><td><strong>Salário:</strong></td><td>{$admin_row['salario_funcionario']}</td></tr>";
                    echo '<tr><td colspan="2" style="text-align:center;">
                            <a href="paginaAlterarPerfil2.php?credencial_funcionario=' . $admin_row['credencial_funcionario'] . '">
                                <button type="button">Alterar Perfil:</button>
                            </a>
                          </td></tr>';
                    echo '</table>';
                }

                // Render other employees
                foreach ($other_rows as $row) {
                    $cpf = $row['cpf_funcionario'];
                    $senha_mascarada = str_repeat('*', 8);
                    $cpf_formatted = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);

                    echo '<table border="1" style="margin-right: 20px; background-color: rgb(94, 156, 239); border-radius: 20px; color: aliceblue; width: 350px; height: 475px;">';
                    echo '<tr><td colspan="2" style="text-align:center;"><img src="../asets/imagens/meio/rostoAlterarPerfil.png" alt=""></td></tr>';
                    echo "<tr><td><strong>Nome:</strong></td><td>{$row['nome_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Credencial:</strong></td><td>{$row['credencial_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Telefone:</strong></td><td>{$row['telefone_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Senha:</strong></td><td>{$senha_mascarada}</td></tr>";
                    echo "<tr><td><strong>E-mail:</strong></td><td>{$row['email_funcionario']}</td></tr>";
                    echo "<tr><td><strong>CPF:</strong></td><td>{$cpf_formatted}</td></tr>";
                    echo "<tr><td><strong>Salário:</strong></td><td>{$row['salario_funcionario']}</td></tr>";
                    echo '<tr><td colspan="2" style="text-align:center;">
                            <a href="paginaAlterarPerfil2.php?credencial_funcionario=' . $row['credencial_funcionario'] . '">
                                <button type="button">Alterar Perfil:</button>
                            </a>
                          </td></tr>';
                    echo '</table>';
                }

                echo '</div>';
            } else {
                echo "<p>Nenhum usuário encontrado.</p>";
            }
            ?>

            
            <div class="letras"></div>
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
