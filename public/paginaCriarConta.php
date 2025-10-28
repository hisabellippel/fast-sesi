
  <html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"></script>

   
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
             
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            /
            $("#cep").blur(function() {

                
                var cep = $(this).val().replace(/\D/g, '');

                
                if (cep != "") {

                    
                    var validacep = /^[0-9]{8}$/;

                    
                    if(validacep.test(cep)) {

                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } 
                            else {
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } /
                    else {
                        
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } /
                else {
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    </head>
</html>

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

    
    if ($email !== $email2) {
        $erro = "Os e-mails não coincidem.";
    }
 
    elseif ($pass !== $pass2) {
        $erro = "As senhas não coincidem.";
    }
    
    elseif (strlen($cpf) !== 11) {
        $erro = "O CPF deve ter exatamente 11 dígitos.";
    }
    elseif (strlen($credencial) !== 4) {
        $erro = "A credencial deve ter exatamente 4 dígitos.";
    }
    
    elseif (strlen($telefone) < 10) {
        $erro = "O telefone deve ter pelo menos 10 dígitos.";
    }
    else {
        $senhaHash = password_hash($pass, PASSWORD_DEFAULT);

       
        $sql = "INSERT INTO funcionario 
                (credencial_funcionario, nome_funcionario, cpf_funcionario, email_funcionario, senha_funcionario, telefone_funcionario, cargo_funcionario, funcao_funcionario, salario_funcionario)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssssi", $credencial, $name, $cpf, $email, $senhaHash, $telefone, $cargo, $funcao, $salario);

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
            <a href="paginaAlterarPerfil.php "><img class="topo1" src="../asets/imagens/barraAcima/Flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt=""/>
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
                        <input type="text" name="credencial_funcionario" placeholder="Insira a credencial " requiredrequired minlength="4" maxlength="4">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/nome.png" alt=""/>
                        <input type="text" name="nome_funcionario" placeholder="Insira o nome " required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/email.png" alt=""/>
                        <input type="email" name="email_funcionario" placeholder="Insira o email " required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/email.png" alt=""/>
                        <input type="email" name="email_confirmar" placeholder="Confirme o email " required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt=""/>
                        <input type="password" name="senha_funcionario" placeholder="Insira a senha " required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/senha.png" alt=""/>
                        <input type="password" name="senha_confirmar" placeholder="Repita a senha " required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/cpf.png" alt=""/>
                        <input type="text" name="cpf_funcionario" placeholder=" Insira o CPF " required minlength="11" maxlength="11">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/TelefoneLogo.png" alt=""/>
                        <input type="text" name="telefone_funcionario" placeholder=" Insira o telefone " required minlength="10">
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Cargo.png" alt=""/>
                         <div>
                        <input type="radio" id="adm" name="cargo_funcionario" value="ADM">
                        <label for="adm">ADM</label>
                    </div>
                          <label>Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" /></label><br />
        <label>Rua:
        <input name="rua" type="text" id="rua" size="60" /></label><br />
        <label>Bairro:
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
        <label>Cidade:
        <input name="cidade" type="text" id="cidade" size="40" /></label><br />
        <label>Estado:
        <input name="uf" type="text" id="uf" size="2" /></label><br />
        <label>IBGE:
        <input name="ibge" type="text" id="ibge" size="8" /></label><br />
        
        <div>
            <input type="radio" id="funcionario" name="cargo_funcionario" value="FUNCIONARIO">
            <label for="funcionario">Funcionário</label>
        </div>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/Funcao.png" alt=""/>
                        <input type="text" name="funcao_funcionario" placeholder=" Insira a função " required>
                    </div><br>

                    <div class="c1">
                        <img class="imag" src="../asets/imagens/meio/salario.png" alt=""/>
                        <input type="text" name="salario_funcionario" placeholder=" Insira o salário " required>
                    </div><br>

                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </div>
    </main>
</body>
</html>
