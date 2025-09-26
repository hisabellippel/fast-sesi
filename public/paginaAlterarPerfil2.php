

<?php
include "db.php";

$credencial = "";
$nome_funcionario = "";
$cpf_funcionario = "";
$email_funcionario = "";
$telefone_funcionario = "";
$salario_funcionario = "";
$senha_funcionario = "";
$funcao_funcionario = "";
$cargo_funcionario = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['credencial_funcionario'])) {
    $credencial = $_GET['credencial_funcionario'];

    $sql = "SELECT * FROM funcionario WHERE credencial_funcionario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $credencial);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $credencial_funcionario = $row['credencial_funcionario'];
        $nome_funcionario = $row['nome_funcionario'];
        $email_funcionario = $row['email_funcionario'];
        $senha_funcionario = $row['senha_funcionario'];
        $cpf_funcionario = $row['cpf_funcionario'];
        $telefone_funcionario = $row['telefone_funcionario'];
        $cargo_funcionario = $row['cargo_funcionario'];
        $funcao_funcionario = $row['funcao_funcionario'];
        $salario_funcionario = $row['salario_funcionario'];
        
        
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['credencial_funcionario'])) {
    $credencial = $_POST['credencial_funcionario'];
    $nome_funcionario = $_POST['nome_funcionario'];
    $email_funcionario = $_POST['email_funcionario'];
    $senha_funcionario = $_POST['senha_funcionario'];
    $cpf_funcionario = $_POST['cpf_funcionario'];
    $telefone_funcionario = $_POST['telefone_funcionario'];
    $salario_funcionario = $_POST['salario_funcionario'];
    $cargo_funcionario = $_POST['cargo_funcionario'];
    $funcao_funcionario = $_POST['funcao_funcionario'];

    $sql = "UPDATE funcionario SET nome_funcionario=?, cpf_funcionario=?, email_funcionario=?, telefone_funcionario=?, salario_funcionario=?, senha_funcionario=?, funcao_funcionario=? WHERE credencial_funcionario=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssdsss", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario, $salario_funcionario, $senha_funcionario, $funcao_funcionario, $credencial);

    if ($stmt->execute()) {
        echo "<script>alert('Perfil atualizado com sucesso!'); window.location.href='paginaAlterarPerfil.php';</script>";
        exit;
    } else {
        echo "<script>alert('Erro ao atualizar o perfil.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
      <link rel="stylesheet" href="../style/style2.css">
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
        <div class="brancaAlterarPerfil2">
            <img class="i" src="../asets/imagens/meio/perfil.png" alt="">
            <form method="post" action="">
                <input type="hidden" name="credencial_funcionario" value="<?php echo htmlspecialchars($credencial); ?>">

                <div class="c2">
                    <label for="credencial_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/CredencialLogo.png" alt="">
                    <input type="text" name="credencial_funcionario" id="nome" placeholder="Insira sua credencial:" value="<?php echo htmlspecialchars($credencial_funcionario); ?>" required>
                </div>
                <br>


                <div class="c2">
                    <label for="nome_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/nome.png" alt="">
                    <input type="text" name="nome_funcionario" id="nome" placeholder="Insira seu nome:" value="<?php echo htmlspecialchars($nome_funcionario); ?>" required>
                </div>

                <br>

                  <div class="c2">
                    <label for="email_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/email.png" alt="">
                    <input type="email" name="email_funcionario" id="email" placeholder="Insira seu email:" value="<?php echo htmlspecialchars($email_funcionario); ?>" required>
                </div>

                <br>
                
                 <div class="c2">
                    <label for="senha_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
                    <input type="text" name="senha_funcionario" id="senha" placeholder="Insira sua senha:" value="<?php echo htmlspecialchars($senha_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="cpf_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/cpf.png" alt="">
                    <input type="text" name="cpf_funcionario" id="cpf" placeholder="Insira seu CPF:" value="<?php echo htmlspecialchars($cpf_funcionario); ?>" required>
                </div>

                <br>

              

                <div class="c2">
                    <label for="telefone_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/TelefoneLogo.png" alt="">
                    <input type="text" name="telefone_funcionario" id="telefone" placeholder="Insira seu telefone:" value="<?php echo htmlspecialchars($telefone_funcionario); ?>" required>
                </div>

                <br>

                 <div class="c2">
                    <label for="cargo_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/Cargo.png" alt="">
                    <input type="text" name="cargo_funcionario" id="funcao" placeholder="Insira seu cargo:" value="<?php echo htmlspecialchars($cargo_funcionario); ?>" required>
                     </div>

                <br>

                 <div class="c2">
                    <label for="funcao_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/funcao.png" alt="">
                    <input type="text" name="funcao_funcionario" id="funcao" placeholder="Insira sua função:" value="<?php echo htmlspecialchars($funcao_funcionario); ?>" required>
                     </div>

                <br>

        

                <div class="c2">
                    <label for="salario_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/salario.png" alt="">
                    <input type="number" step="0.01" name="salario_funcionario" id="salario_funcionario" placeholder="Insira seu salário:" value="<?php echo htmlspecialchars($salario_funcionario); ?>" required>
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
