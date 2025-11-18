<?php
include "db.php";
session_start();

if (empty($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}


$credencial = $_SESSION['credencial_funcionario'];
$sql = "SELECT nome_funcionario, cargo_funcionario FROM funcionario WHERE credencial_funcionario = '$credencial'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['cargo_funcionario'] = $row['cargo_funcionario'];
    $_SESSION['nome_funcionario'] = $row['nome_funcionario'];
} else {
    echo "Erro ao verificar permissões.";
    exit;
}




if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

$message = "";
if (isset($_GET['delete']) && isset($_GET['credencial_funcionario'])) {
    $credencial = $_GET['credencial_funcionario'];
    $sql = "SELECT * FROM funcionario WHERE credencial_funcionario = '$credencial'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql = "DELETE FROM funcionario WHERE credencial_funcionario = '$credencial'";
        if ($conn->query($sql) === TRUE) {
            $message = "Funcionário excluído com sucesso!";
        } else {
            $message = "Erro ao excluir: " . $conn->error;
        }
    } else {
        $message = "Funcionário não encontrado!";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
     <link rel="stylesheet" href="../style/style2.css">
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
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>

    <div id="fonte">
        <style></style>

        
        <h1>Funcionários:</h1>
        <?php if (!empty($message)) echo "<p style='color: red;'>$message</p>"; ?>
        <div id= "sair">
            <div class="botoes">
           
            </div>
            <div class="botoes">
            <h1 >
                <div class = "cinza">
            
            </div>
            </div>
         </div>

        <div id="botoes_novos">
            <button onclick="window.location.href='?logout=1'">Sair</button>
            <?php if ($_SESSION['cargo_funcionario'] === 'ADM'): ?>
            <button onclick="window.location.href='paginaCriarConta.php'">Cadastrar Novo Funcionário</button>
            <?php endif; ?>
         </div>
         

        <div id="padAlterar">
            <?php
            $credencial_user = $_SESSION['credencial_funcionario'];
            if ($_SESSION['cargo_funcionario'] === 'ADM') {
                $sql = "SELECT * FROM funcionario";
            } else {
                $sql = "SELECT * FROM funcionario WHERE credencial_funcionario = '$credencial_user'";
            }
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $rows = [];
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                }

                echo '<div style="display:flex; flex-wrap: wrap;">';
                foreach ($rows as $row) {
                    $cpf = $row['cpf_funcionario'];
                    $senha_mascarada = str_repeat('*', 8);
                    $cpf_formatted = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                    $img_src = ($row['foto_funcionario'] && $row['foto_funcionario'] != 'default.jpg') ? "../uploads/" . htmlspecialchars($row['foto_funcionario']) : "../asets/imagens/meio/rostoAlterarPerfil.png";

                    $bg_color = ($row['credencial_funcionario'] === $credencial_user) ? 'rgb(59, 226, 9)' : 'rgb(131, 168, 241)';

                    echo '<table border="1" style="margin-right: 20px; background-color: ' . $bg_color . '; border-radius: 20px; color: aliceblue; width: 350px; height: 475px;">';
                    echo '<tr><td colspan="2" style="text-align:center;"><img src="' . $img_src . '" alt="" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;"></td></tr>';
                    echo "<tr><td><strong>Credencial:</strong></td><td>{$row['credencial_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Nome:</strong></td><td>{$row['nome_funcionario']}</td></tr>";
                    echo "<tr><td><strong>E-mail:</strong></td><td>{$row['email_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Senha:</strong></td><td>{$senha_mascarada}</td></tr>";
                    echo "<tr><td><strong>CPF:</strong></td><td>{$cpf_formatted}</td></tr>";
                    echo "<tr><td><strong>Telefone:</strong></td><td>{$row['telefone_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Cargo:</strong></td><td>{$row['cargo_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Função:</strong></td><td>{$row['funcao_funcionario']}</td></tr>";
                    echo "<tr><td><strong>Salário:</strong></td><td>{$row['salario_funcionario']}</td></tr>";
                    echo '<tr><td colspan="2" style="text-align:center;">
                            <a href="paginaAlterarPerfil2.php?credencial_funcionario=' . $row['credencial_funcionario'] . '">
                                <button type="button">Alterar Perfil:</button>
                            </a>
                          </td></tr>';
                    if ($_SESSION['cargo_funcionario'] === 'ADM' && $row['credencial_funcionario'] !== $credencial_user) {
                        echo '<tr><td colspan="2" style="text-align:center;">
                                <a href="?delete=1&credencial_funcionario=' . $row['credencial_funcionario'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este funcionário?\')">
                                    <button type="button">Excluir Perfil</button>
                                </a>
                              </td></tr>';
                    }
                    echo '</table>';
                }
                echo '</div>';
            } else {
                echo "<p>Nenhum usuário encontrado.</p>";
            }
            ?>

            
            <div id="letrasAlterar2"></div>
        </div>
    </div>

    <script>
                document.getElementById("im2").addEventListener("click", function() {
                const alerta = document.getElementById("alertaNotificacao");
                
                alerta.classList.add("show");

                setTimeout(() => {
                    alerta.classList.remove("show");
                }, 2000);
            });
        </script>
    
    <footer>
        <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlertaseNotificacoes1.php"><img class="im5" src="../asets/imagens/meio/configuracao.png" alt="" height= "35px" width= "35px"></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>
    <?php endif; ?> 
</body>
</html>
