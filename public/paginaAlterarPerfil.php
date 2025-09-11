<?php

$sql = "SELECT * FROM funcionario";
$result = $conn->query($sql);


  if ($result->num_rows > 0) {
                echo "<table border='1' cellpadding='8' cellspacing='0'>
                    <tr>
                        <th>Credencial </th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                      <th>Salario</th>
                        <th>Senha</th>
                        <th>Funcao</th>
                         <th>Data de nascimento</th>
                    </tr>";

                      while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['credencial_funcionario']}</td>
                            <td>{$row['nome_funcionario']}</td>
                            <td>{$row[' cpf_funcionario']}</td>
                             <td>{$row[' email_funcionario']}</td>
                            <td>{$row['  telefone_funcionario']}</td>
                            <td>{$row['  salario_funcionario']}</td>
                            <td>{$row['  senha_funcionario']}</td>
                            <td>{$row['  funcao_funcionario']}</td>
                            <td>{$row['   data_nascimento_funcionario']}</td>

                            <td>
<a href='update_jogador.php?id={$row['id']}'>Editar</a> | 

                            </td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Nenhum usuário cadastrado.</p>";
            }



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
        
                <img src="../asets/imagens/meio/rostoAlterarPerfil.png" alt="">
            
                <div class="letras">
                    
                </div>

                <div class="botao"> 
                    <a href="paginaLogin.php">
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