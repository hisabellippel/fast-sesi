<?php
include "db.php"
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>
    <body>
        <header>
            <div id="barraescura">
               <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a> 
                <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
            </div>
        </header>
        
         
    <div id="fonte">
        <h1>Meu Perfil:</h1>
    </div>
    
        <div class="pad6">

            <div class="alterarPerfil">

            <?php
            $sql = "SELECT * FROM funcionario";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cpf = $row['cpf_funcionario'];
              
                    $cpf_formatted = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                    $senha_masked = str_repeat('*', 8);

                    echo "<p><strong>Nome:</strong> {$row['nome_funcionario']}</p>";
                    echo "<p><strong>Credencial:</strong> {$row['credencial_funcionario']}</p>";
                    echo "<p><strong>Data de nascimento:</strong> {$row['data_nascimento_funcionario']}</p>";
                    echo "<p><strong>Telefone:</strong> {$row['telefone_funcionario']}</p>";
                    echo "<p><strong>Senha:</strong> {$senha_masked}</p>";
                    echo "<p><strong>E-mail:</strong> {$row['email_funcionario']}</p>";
                    echo "<p><strong>CPF:</strong> {$cpf_formatted}</p>";
                }
            } else {
                echo "<p>Nenhum usuário cadastrado.</p>";
            }
            ?>

                <img src="../asets/imagens/meio/rostoAlterarPerfil.png" alt="">

                <div class="letras">

                </div>

                <div class="botao"> 
                    <a href="paginaAlterarPerfil2.php">
                    <button type="button">Alterar Perfil:</button>
                    </a>
                </div>
            </div>
        </div>

        <footer>
            <div id="barra">
                <a href="paginainformacoes.php"><img class="topo1" src="../asets/imagens/barraAbaixo/barras.png" alt=""></a>
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
            </div>
        </footer>
    </body>
</html>
