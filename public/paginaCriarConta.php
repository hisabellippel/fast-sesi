<?php
include 'db.php';

$erro = "";
$sucesso = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $credencial   = $_POST['credencial_funcionario'] ?? "";
    $name   = $_POST['nome_funcionario'] ?? "";
    $cpf    = $_POST['cpf_funcionario'] ?? "";
    $email  = $_POST['email_funcionario'] ?? "";
    $email2 = $_POST['email_confirmar'] ?? "";
    $pass   = $_POST['senha_funcionario'] ?? "";
    $pass2  = $_POST['senha_confirmar'] ?? "";
    $telefone  = $_POST['telefone_funcionario'] ?? "";
    $cargo  = $_POST['cargo_funcionario'] ?? "";
    $funcao  = $_POST['funcao_funcionario'] ?? "";
    $salario  = $_POST['salario_funcionario'] ?? "";
    $cep = $_POST['cep_funcionario'] ?? "";
    $logradouro = $_POST['logradouro_funcionario'] ?? "";
    $numero = $_POST['numero_funcionario'] ?? "";
    $bairro = $_POST['bairro_funcionario'] ?? "";
    $cidade = $_POST['cidade_funcionario'] ?? "";
    $uf = $_POST['uf_funcionario'] ?? "";

    if ($email !== $email2) {
        $erro = "Os e-mails não coincidem.";
    } elseif ($pass !== $pass2) {
        $erro = "As senhas não coincidem.";
    } elseif (strlen($cpf) !== 11) {
        $erro = "O CPF deve ter exatamente 11 dígitos.";
    } elseif (strlen($credencial) !== 4) {
        $erro = "A credencial deve ter exatamente 4 dígitos.";
    } elseif (strlen($telefone) < 10) {
        $erro = "O telefone deve ter pelo menos 10 dígitos.";
    } else {
        $senhaHash = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO funcionario 
                (credencial_funcionario, nome_funcionario, cpf_funcionario, email_funcionario, senha_funcionario, telefone_funcionario, cargo_funcionario, funcao_funcionario, salario_funcionario, cep_funcionario, logradouro_funcionario, numero_funcionario, bairro_funcionario, cidade_funcionario, uf_funcionario)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssssissssss", $credencial, $name, $cpf, $email, $senhaHash, $telefone, $cargo, $funcao, $salario, $cep, $logradouro, $numero, $bairro, $cidade, $uf);

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
    <title>Cadastro de Funcionário</title>
   <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/styles.css">

    <script>
        async function buscarCEP() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');
            if (cep.length === 8) {
                try {
                    const resposta = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const dados = await resposta.json();

                    if (!dados.erro) {
                        document.getElementById('logradouro').value = dados.logradouro;
                        document.getElementById('bairro').value = dados.bairro;
                        document.getElementById('cidade').value = dados.localidade;
                        document.getElementById('uf').value = dados.uf;
                    } else {
                        alert("CEP não encontrado!");
                    }
                } catch (e) {
                    alert("Erro ao buscar o CEP!");
                }
            }
        }
    </script>
</head>
<body>
    <header>
        <div id="barraescura">
            <a href="paginaAlterarPerfil.php"><img class="topo1" src="../asets/imagens/barraAcima/Flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt=""/>
        </div>
    </header>

    <main>
        <div class="pad22">
            <div class="branca">
                <img class="i" src="../asets/imagens/meio/perfil.png" alt=""/>

                <?php if (!empty($erro)) { ?>
                    <div class="erro"><?= $erro ?></div>
                <?php } ?>

                <?php if (!empty($sucesso)) { ?>
                    <div class="sucesso"><?= $sucesso ?></div>
                <?php } ?>

                <form method="POST">
                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/CredencialLogo.png" alt=""/>
                        <input type="text" name="credencial_funcionario" placeholder="Insira a credencial" required minlength="4" maxlength="4">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/nome.png" alt=""/>
                        <input type="text" name="nome_funcionario" placeholder="Insira o nome" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/email.png" alt=""/>
                        <input type="email" name="email_funcionario" placeholder="Insira o email" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/email.png" alt=""/>
                        <input type="email" name="email_confirmar" placeholder="Confirme o email" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt=""/>
                        <input type="password" name="senha_funcionario" placeholder="Insira a senha" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt=""/>
                        <input type="password" name="senha_confirmar" placeholder="Repita a senha" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/cpf.png" alt=""/>
                        <input type="text" name="cpf_funcionario" placeholder="Insira o CPF" required minlength="11" maxlength="11">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/TelefoneLogo.png" alt=""/>
                        <input type="text" name="telefone_funcionario" placeholder="Insira o telefone" required minlength="10">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/cargo.png" alt=""/>
                        <div>
                            <input type="radio" id="adm" name="cargo_funcionario" value="ADM" required>
                            <label for="adm"><p class="gastoss2">ADM</p></label>
                        </div>
                        <div>
                            <input type="radio" id="funcionario" name="cargo_funcionario" value="FUNCIONARIO" required>
                            <label for="funcionario">Funcionário</label>
                        </div>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Funcao.png" alt=""/>
                        <input type="text" name="funcao_funcionario" placeholder="Insira a função" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Salario.png" alt=""/>
                        <input type="text" name="salario_funcionario" placeholder="Insira o salário" required>
                    </div><br>

                   
                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/CEP.png" alt=""/>
                        <input type="text" id="cep" name="cep_funcionario" placeholder="CEP" required onblur="buscarCEP()">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Rua.png" alt=""/>
                        <input type="text" id="logradouro" name="logradouro_funcionario" placeholder="Rua" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Numero.png" alt=""/>
                        <input type="text" id="numero" name="numero_funcionario" placeholder="Número" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Bairro.png" alt=""/>
                        <input type="text" id="bairro" name="bairro_funcionario" placeholder="Bairro" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Cidade.png" alt=""/>
                        <input type="text" id="cidade" name="cidade_funcionario" placeholder="Cidade" required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Rua.png" alt=""/>
                        <input type="text" id="uf" name="uf_funcionario" placeholder="UF" maxlength="2" required>
                    </div><br>

                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </div>
    </main>
</body>
</html>
