<?php
// login.php

// 1) Conexão
$mysqli = new mysqli("localhost", "root", "root", "fast_sesi_sa");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

// 2) Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: paginaInicial.php");
    exit;
}

// 3) Login
$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome_funcionario"] ?? "";
    $cred = $_POST["credencial_funcionario"] ?? "";
    $pass = $_POST["password"] ?? "";
    $otp  = $_POST["otp_funcionario"] ?? "";

    $stmt = $mysqli->prepare("SELECT nome_funcionario, credencial_funcionario, senha_funcionario, otp_funcionario  FROM funcionario WHERE nome_funcionario=? AND credencial_funcionario=? AND senha_funcionario=? AND otp_funcionario=?");
    $stmt->bind_param("ss", $nome, $cred, $pass, $otp);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_credencial_funcionario"] = $dados["credencial_funcionario"];
        $_SESSION["credencial_funcionario"] = $dados["credencial_funcionario"];
        header("Location: paginaMenuPrincipal.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/styles.css">
    <script src="../scripts/login.js"></script>
    

   
</head>
    <header>
        <div id="barraescura">
            <div  id="nav-itens">
                <img class="topoTradutor" src="../asets/imagens/barraAcima/tradutor.png" alt="">
            </div>
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
        </div>
    </header>

<body>
    <?php if (!empty($_SESSION["user_credencial_funcionario"])): ?>
    <div class="card">
        <?= $_SESSION["credencial_funcionario"] ?>
        <p>Sua sessão foi encerrada! Clique aqui para logar novamente.</p>
        <p><a href="?logout=1">Sair</a></p>
    </div>

    <main>
        <div class="branca1">

            <img class="i" src="../asets/imagens/meio/perfil.png" alt="">
            <?php else: ?>
            <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
            <form id="seuFormulario">

                <div class="c2">
                <label for="nome"></label><br>
                <img class="im" src="../asets/imagens/meio/nome.png" alt="">
                <input type="text" name="nome" id = "nome" placeholder="Insira seu nome:" required>
                <div class="error" id="erroNome"></div>
                </div>

                <br>

                <div class="c2">
                    <label for="credencial"></label><br>
                    <img class="im" src="../asets/imagens/meio/credencial.png" alt="">
                    <input type="text" name="credencial"id = "credencial" placeholder="Insira sua credencial:" required>
                    <div class="error" id="erroCredencial"></div> 
                </div>

                <br>

                <div class="c2">
                    <label for="senha"></label><br>
                    <img class="im" src="../asets/imagens/meio/senha.png" alt="">
                    <input type="password" name="senha" id = "senha" placeholder="Insira sua senha:" required> 
                    <div class="error" id="erroSenha"></div>
                </div>

                <br>

                <div class="c2">
                    <label for="otp"></label><br>
                    <img class="im" src="../asets/imagens/meio/otp.png" alt="">
                    <input type="number" name="otp" id = "otp" placeholder="Insira o OTP:"required> 
                    <div class="error" id="erroOTP"></div>
                </div>

                <br>
                <a href="paginaCriarConta.php">Não tem uma conta? Clique aqui!</a>
                <br>
                <button type="submit">Entrar</button>
            </form>
            
        </div>
        <?php endif; ?>


        <footer>
            <div id="barra">
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
            </div>
        </footer>

    </main>
    
</body>
</html>