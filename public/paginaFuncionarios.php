<?php
include "db.php";
session_start();



if (empty($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}



if ($_SESSION['cargo_funcionario'] !== 'ADM') {
    header("Location: paginaMenuPrincipalFuncionario.php");
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
?>




<?php
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
    <title>Ver Funcionários</title>
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


        <div class="c2" style="display: flex; gap: 10px; align-items: center; border-radius: 30px; justify-content: center;">
    <button type="button"
        onclick="window.location.href='paginaCriarConta.php'"
        style="background: #18519d; color: #fff; border: none; border-radius: 10px;
               padding: 12px 32px; font-size: 15px; font-weight: bold;
               box-shadow: 0 2px 8px rgba(0,0,0,0.12); cursor: pointer;
               transition: background 0.2s; z-index: 9999; position: relative;
               height: 35px; display: flex; align-items: center;">
        Criar novo funcionário
    </button>
</div>

                    
            <div class="botoes">
           
            </div>
            <div class="botoes">
            <h1 >
                <div class = "cinza">
            
            </div>
            </div>
         </div>


         

        <div id="padAlterar">
            <?php
            $credencial_user = $_SESSION['credencial_funcionario'];
            $credencial_user = $_SESSION['credencial_funcionario'];
            if ($_SESSION['cargo_funcionario'] === 'ADM') {
                $sql = "SELECT * FROM funcionario WHERE cargo_funcionario != 'ADM'";
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

$bg_color = 'white';

echo '<table border="1" style="margin-right: 20px; margin-bottom: 20px; background-color: ' . $bg_color . '; border-radius: 20px; color: black; width: 350px; height: 475px; border-color: #ccc; border-style: solid; border-width: 1px; padding: 10px;">';
                    echo '<tr><td colspan="2" style="text-align:center; padding: 8px;"><img src="' . $img_src . '" alt="" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;"></td></tr>';
                    echo "<tr><td style=\"padding: 8px;\"><strong>Credencial:</strong></td><td style=\"padding: 8px;\">{$row['credencial_funcionario']}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>Nome:</strong></td><td style=\"padding: 8px;\">{$row['nome_funcionario']}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>E-mail:</strong></td><td style=\"padding: 8px;\">{$row['email_funcionario']}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>Senha:</strong></td><td style=\"padding: 8px;\">{$senha_mascarada}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>CPF:</strong></td><td style=\"padding: 8px;\">{$cpf_formatted}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>Telefone:</strong></td><td style=\"padding: 8px;\">{$row['telefone_funcionario']}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>Cargo:</strong></td><td style=\"padding: 8px;\">{$row['cargo_funcionario']}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>Função:</strong></td><td style=\"padding: 8px;\">{$row['funcao_funcionario']}</td></tr>";
                    echo "<tr><td style=\"padding: 8px;\"><strong>Salário:</strong></td><td style=\"padding: 8px;\">{$row['salario_funcionario']}</td></tr>";
                    echo '<tr><td colspan="2" style="text-align:center; padding: 8px;">
                        <div id="ladoai" style="display: flex; justify-content: center; gap: 10px; align-items: center;">
                         
                            <a href="paginaAlterarPerfil3.php?credencial_funcionario=' . $row['credencial_funcionario'] . '">
                                <button type="button">Alterar Perfil</button>
                            </a>';
                    
                    if ($_SESSION['cargo_funcionario'] === 'ADM' || $row['credencial_funcionario'] === $credencial_user) {
                        echo '<a href="?delete=1&credencial_funcionario=' . $row['credencial_funcionario'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este funcionário?\')">
                                <button type="button">Excluir Perfil</button>
                              </a>';
                    }
                    
                    echo '        </div>
                        </td></tr>';
                    echo '</table>';
                }
                echo '</div>';
            } else {
                echo "<p>Nenhum usuário encontrado.</p>";
            }
            ?>
            <br>

            
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
