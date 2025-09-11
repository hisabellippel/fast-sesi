<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['nome_funcionario'];
    $email = $_POST['email_funcionario'];

    $sql = " INSERT INTO funcionários (nome_funcionario,email_funcionario) VALUE ('$name','$email')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>


<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/styles.css">
    <script src="../scripts/cadastro.js"></script>


</head>

<body>
    <header>
        <div id="barraescura">
            <a href="paginaLogin.html"><img class="topo1" src="../asets/imagens/barraAcima/Flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
        </div>
    </header>
<main>
    <div class="pad12">
        <div class="branca">

                <img class="i" src="../asets/imagens/meio/perfil.png" alt="">
                <form id="meuFormulario">
 <form method="POST" action="create.php">
        <img class="imag" src="../asets/imagens/meio/nome.png" alt="">
        <label for="name"> Insira seu nome: </label>
        <input type="text" name="name" required>
        <br>
        <img class="imag" src="../asets/imagens/meio/email.png" alt="">
        <label for="email"> Insira seu email: </label>
        <input type="email" name="email" required>
        <br>
    

        <input type="submit" value="Adicionar">

    </form>
                  

                    <div class="c1">
                        <label for="cpf"></label><br>
                        <img class="imag" src="../asets/imagens/meio/cpf.png" alt="">
                        <input type="number" name="cpf" id="cpf" placeholder="Insira seu CPF:" required>
                        <div class="error" id="erroCPF"></div>
                    </div>

                    <br>

                   
                    <br>

                    <div class="c1">
                        <label for="email"></label><br>
                        <img class="imag" src="../asets/imagens/meio/email.png" alt="">
                        <input type="email" name="email" id="email" placeholder="Confirme seu e-mail:" required>
                        <div class="error" id="erroEmail"></div>
                    </div>

                    <br>

                    <div class="c1">
                        <label for="otp"></label><br>
                        <img class="imag" src="../asets/imagens/meio/otp.png" alt="">
                        <input type="number" name="otp" id="otp" placeholder="Insira o OTP:" required>
                        <div class="error" id="erroOTP"></div>
                    </div>

                    <br>

                    <div class="c1">
                        <label for="tel"></label><br>
                        <img class="imag" src="../asets/imagens/meio/telefone.png" alt="">
                        <input type="tel" name="tel" id="tel" placeholder="Insira seu telefone:" required>
                        <div class="error" id="erroTel"></div>
                    </div>

                    <br>

                    <div class="c1">
                        <label for="senha"></label><br>
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
                        <input type="password" name="senha" id="senha" placeholder="Insira sua senha:" required>
                        <div class="error" id="erroSenha"></div>
                    </div>

                    <br>

                    <div class="c1">
                        <label for="senha"></label><br>
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
                        <input type="password" name="senha" id="senha" placeholder="Confirme sua senha:" required>
                        <div class="error" id="erroSenha"></div>
                    </div>


                    <br>
                    <button type="submit">Criar conta</button>

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