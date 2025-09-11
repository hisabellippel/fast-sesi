<?php
// login.php

// 1) Conexão
$mysqli = new mysqli("localhost", "root", "root", "login_db");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

// 2) Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.html");
    exit;
}

// 3) Login
$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["username"] ?? "";
    $pass = $_POST["password"] ?? "";

    $stmt = $mysqli->prepare("SELECT pk, username, senha FROM usuarios WHERE username=? AND senha=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_pk"] = $dados["pk"];
        $_SESSION["username"] = $dados["username"];
        header("Location: index.html");
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


        <footer>
            <div id="barra">
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
            </div>
        </footer>

    </main>
    
</body>
</html>