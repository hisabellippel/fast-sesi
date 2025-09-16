<?php
include 'db.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $name = $_POST['nome_funcionario']?? "";
    $email = $_POST['email_funcionario']?? "";
   
    $pass = $_POST['senha_funcionario'] ?? "";
    $CPF = $_POST['cpf_funcionario'] ?? "";
  




    $sql = " INSERT INTO funcionario (nome_funcionario,email_funcionario,senha_funcionario,cpf_funcionario) VALUES ('$name','$email','$pass','$CPF') ";


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
              


     
                       
    <form method="POST">


                    <div class="c1">
                        <label for="nome_funcionario"></label><br>
                        <img class="imag" src="../asets/imagens/meio/nome.png" alt="">
                        <input type="text" name="nome_funcionario" id="nome_funcionario" placeholder="Insira seu nome:" required>
                        <div class="error" id="erroNome"></div>
                    </div>
                    <br>


        <div class="c1">
        
        <label for="email_funcionario">  </label>
        <img class="imag" src="../asets/imagens/meio/email.png" alt="">
        <input type="email" name="email_funcionario" id="email_funcionario" placeholder="Insira seu email:" required>
       <div class="error" id="erroNome"></div>
        </div>
         <br>
            <div class="c1">
                        <label for="email_funcionario"></label><br>
                       <img class="imag" src="../asets/imagens/meio/email.png" alt="">
                        <input type="text" name="email_funcionario" id="email_funcionario" placeholder="Confirme seu email:" required>
                        <div class="error" id="erroNome"></div>
            </div>
                    <br>

        <div class="c1">
        
        <label for="senha_funcionario"> </label>
        <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
        <input type="password" name="senha_funcionario" id="senha_funcionario" placeholder="Insira sua senha:" required>
        <div class="error" id="erroNome"></div>
        </div>
         <br>
           <div class="c1">
        
        <label for="senha_funcionario"> </label>
        <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
        <input type="password" name="senha_funcionario" id="senha_funcionario" placeholder="Repita sua senha:" required>
        <div class="error" id="erroNome"></div>
        </div>
         <br>

        <div class="c1">
        
        <label for="cpf_funcionario"></label>
        <img class="imag" src="../asets/imagens/meio/cpf.png" alt="">
        <input type="text" name="cpf_funcionario" id="cpf_funcionario" placeholder=" Insira seu CPF: " required>
        <div class="error" id="erroNome"></div>
        </div>
         <br>
        
   


        <input type="submit">
            </div>
    </div>
    </form>

        <footer>
            <div id="barra">
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
            </div>
        </footer>
</main>


</body>


</html>
