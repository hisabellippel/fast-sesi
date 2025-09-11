<?php
// Conexão com o banco de dados
$mysqli = new mysqli("localhost", "root", "root", "fast_sesi_sa");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

// Inicializar variáveis para armazenar dados do usuário
$nome = $credencial = $senha = $otp = "";

// Verificar se o formulário foi enviado para atualizar os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $credencial = $_POST['credencial'];
    $senha = $_POST['senha'];
    $otp = $_POST['otp'];

    // Atualizar os dados no banco
    $stmt = $mysqli->prepare("UPDATE funcionario SET nome_funcionario=?, senha_funcionario=? WHERE credencial_funcionario=?");
    $stmt->bind_param("sss", $nome, $senha, $credencial);
    $stmt->execute();
    $stmt->close();

    // Redirecionar ou mensagem de sucesso pode ser adicionada aqui
}

// Buscar dados atuais do usuário (credencial 1)
$sql = "SELECT * FROM funcionario WHERE credencial_funcionario = 1";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome_funcionario'];
    $credencial = $row['credencial_funcionario'];
    $senha = $row['senha_funcionario'];
    // OTP is not stored in DB, so keep empty or handle accordingly
} else {
    echo "<p>Nenhum usuário encontrado.</p>";
    exit;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
    <script src="../scripts/login.js"></script>
</head>
<body>
    <header>
        <div id="barraescura">
            <div  id="nav-itens">
                <img class="topoTradutor" src="../asets/imagens/barraAcima/tradutor.png" alt="">
            </div>
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
        </div>
    </header>
    <main>
        <div class="branca1">

            <img class="i" src="../asets/imagens/meio/perfil.png" alt="">
            <form id="seuFormulario" method="post" action="">

                <div class="c2">
                <label for="nome"></label><br>
                <img class="im" src="../asets/imagens/meio/nome.png" alt="">
                <input type="text" name="nome" id="nome" placeholder="Insira seu nome:" value="<?php echo htmlspecialchars($nome); ?>" required>
                <div class="error" id="erroNome"></div>
                </div>

                <br>

                <div class="c2">
                    <label for="credencial"></label><br>
                    <img class="im" src="../asets/imagens/meio/credencial.png" alt="">
                    <input type="text" name="credencial" id="credencial" placeholder="Insira sua credencial:" value="<?php echo htmlspecialchars($credencial); ?>" readonly required>
                    <div class="error" id="erroCredencial"></div> 
                </div>

                <br>

                <div class="c2">
                    <label for="senha"></label><br>
                    <img class="im" src="../asets/imagens/meio/senha.png" alt="">
                    <input type="password" name="senha" id="senha" placeholder="Insira sua senha:" value="<?php echo htmlspecialchars($senha); ?>" required> 
                    <div class="error" id="erroSenha"></div>
                </div>

                <br>

                <div class="c2">
                    <label for="otp"></label><br>
                    <img class="im" src="../asets/imagens/meio/otp.png" alt="">
                    <input type="number" name="otp" id="otp" placeholder="Insira o OTP:" required> 
                    <div class="error" id="erroOTP"></div>
                </div>

                <br>
             
                <br>
                <button type="submit">Finalizar</button>
            </form>
        </div>

        <footer>
            <div id="barra">
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
            </div>
        </footer>

    </main>
    
</body>
</html>
