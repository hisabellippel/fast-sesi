<?php

$mysqli = new mysqli("localhost", "root", "root", "fast_sesi_sa");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: paginaLogin.php");
    echo " Sua sessão foi encerrada!";
    exit;
}

$msg = "";
if (isset($_GET['msg']) && $_GET['msg'] == 'expired') {
    $msg = "Sua sessão foi expirada!";
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome_funcionario"] ?? "";
    $cred = $_POST["credencial_funcionario"] ?? "";
    $pass = $_POST["password"] ?? ""; 

    
    $stmt = $mysqli->prepare("SELECT nome_funcionario, credencial_funcionario, senha_funcionario, cargo_funcionario FROM funcionario WHERE nome_funcionario=? AND credencial_funcionario=?");
    $stmt->bind_param("ss", $nome, $cred);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados && $pass === $dados["senha_funcionario"]) {
        $_SESSION["nome_funcionario"] = $dados["nome_funcionario"];
        $_SESSION["credencial_funcionario"] = $dados["credencial_funcionario"];
        $_SESSION["cargo_funcionario"] = $dados["cargo_funcionario"];

        if ($dados["cargo_funcionario"] === "ADM") {
            header("Location: paginaMenuPrincipal.php");
        } elseif ($dados["cargo_funcionario"] === "FUNCIONARIO") {
            header("Location:paginaMenuPrincipalFuncionario.php");
        }
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
    <link rel="stylesheet" href="../style/styles2.css">

</head>
<header>
    <div id="barraescura">
        <div  id="nav-itens">
            <h3 class="barralogin">Login</h3>
        </div>
        <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
    </div>
</header>

<body>
    <?php if (empty($_SESSION["credencial_funcionario"])): ?>
       
        <div class="login">
            
                <form class="branca1" method="POST">
                <img class="i" src="../asets/imagens/meio/perfil.png" alt="">
    
                    <div class="c2">
                        <label for="nome"></label><br>
                        <img class="im" src="../asets/imagens/meio/nome.png" alt="">
                        <input type="text" name="nome_funcionario" id="nome" placeholder="Insira seu nome:" required>
                        <div class="error" id="erroNome"></div>
                    </div>
    
                    <br>
    
                    <div class="c2">
                        <label for="credencial"></label><br>
                        <img class="im" src="../asets/imagens/meio/credencial.png" alt="">
                        <input type="text" name="credencial_funcionario" id="credencial" placeholder="Insira sua credencial:" required>
                        <div class="error" id="erroCredencial"></div> 
                    </div>
    
                    <br>
    
                    <div class="c2">
                        <label for="senha"></label><br>
                        <img class="im" src="../asets/imagens/meio/senha.png" alt="">
                    <input type="password" name="password" id="senha" placeholder="Insira sua senha:" required> 
                        <div class="error" id="erroSenha"></div>
                    </div>
    
                    <br>
    
                    <button class = "sair" type="submit">Entrar</button>
                </form>
        </div>

    <?php else: ?>
        <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
        <p>Você já está logado. <a href="?logout=1">Sair</a></p>
    <?php endif; ?>

    <footer>
        <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
        </div>
    </footer>
</body>
</html>
