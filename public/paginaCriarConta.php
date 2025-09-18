<?php
include 'db.php';

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name   = $_POST['nome_funcionario'] ?? "";
    $cpf    = $_POST['cpf_funcionario'] ?? "";
    $email  = $_POST['email_funcionario'] ?? "";
    $email2 = $_POST['email_confirmar'] ?? "";
    $pass   = $_POST['senha_funcionario'] ?? "";
    $pass2  = $_POST['senha_confirmar'] ?? "";

  
    if ($email !== $email2) {
        $erro = "Os e-mails não coincidem.";
    }

 
    elseif ($pass !== $pass2) {
        $erro = "As senhas não coincidem.";
    }

    else {
        
       

       
        $sql = "INSERT INTO funcionario 
                (nome_funcionario, cpf_funcionario, email_funcionario, senha_funcionario)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $cpf, $email, $pass);

        if ($stmt->execute()) {
            $sucesso = "Novo registro criado com sucesso!";
        } else {
            $erro = "Erro ao cadastrar: " . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>




<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
    <header>
        <div id="barraescura">
            <a href="paginaLogin.php"><img class="topo1" src="../asets/imagens/barraAcima/Flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
        </div>
    </header>

    <main>
        <div class="pad22">
            <div class="branca">
                <img class="i" src="../asets/imagens/meio/perfil.png" alt="">

                <?php if (!empty($erro)) { ?>
                    <div class="erro"><?= $erro ?></div>
                <?php } ?>

                <?php if (!empty($sucesso)) { ?>
                    <div class="sucesso"><?= $sucesso ?></div>
                <?php } ?>

                <form method="POST">
                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/nome.png" alt="">
                        <input type="text" name="nome_funcionario" placeholder="Insira seu nome:" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/email.png" alt="">
                        <input type="email" name="email_funcionario" placeholder="Insira seu email:" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/email.png" alt="">
                        <input type="email" name="email_confirmar" placeholder="Confirme seu email:" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
                        <input type="password" name="senha_funcionario" placeholder="Insira sua senha:" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
                        <input type="password" name="senha_confirmar" placeholder="Repita sua senha:" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/cpf.png" alt="">
                        <input type="text" name="cpf_funcionario" placeholder=" Insira seu CPF: " required>
                    </div><br>

                    <input type="submit" value="Cadastrar">
                </form>
            </div>
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