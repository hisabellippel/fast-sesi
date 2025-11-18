<?php
include "db.php";

$credencial = "";
$credencial_funcionario = "";
$nome_funcionario = "";
$cpf_funcionario = "";
$email_funcionario = "";
$telefone_funcionario = "";
$salario_funcionario = "";
$senha_funcionario = "";
$funcao_funcionario = "";
$cargo_funcionario = "";
$foto_funcionario = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['credencial_funcionario'])) {
    $credencial = $_GET['credencial_funcionario'];

    $sql = "SELECT * FROM funcionario WHERE credencial_funcionario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $credencial);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $credencial_funcionario = $row['credencial_funcionario'];
        $nome_funcionario = $row['nome_funcionario'];
        $email_funcionario = $row['email_funcionario'];
        $senha_funcionario = $row['senha_funcionario'];
        $cpf_funcionario = $row['cpf_funcionario'];
        $telefone_funcionario = $row['telefone_funcionario'];
        $cargo_funcionario = $row['cargo_funcionario'];
        $funcao_funcionario = $row['funcao_funcionario'];
        $salario_funcionario = $row['salario_funcionario'];
        $foto_funcionario = $row['foto_funcionario'];
        
        
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['credencial_funcionario'])) {
    $credencial = $_POST['credencial_funcionario'];
    $credencial_funcionario = $credencial;
    $nome_funcionario = $_POST['nome_funcionario'];
    $email_funcionario = $_POST['email_funcionario'];
    $senha_funcionario = $_POST['senha_funcionario'];
    $cpf_funcionario = $_POST['cpf_funcionario'];
    $telefone_funcionario = $_POST['telefone_funcionario'];
    $salario_funcionario = $_POST['salario_funcionario'];
    $cargo_funcionario = $_POST['cargo_funcionario'];
    $funcao_funcionario = $_POST['funcao_funcionario'];

    // Fetch current foto_funcionario from database
    $sql_current = "SELECT foto_funcionario FROM funcionario WHERE credencial_funcionario = ?";
    $stmt_current = $conn->prepare($sql_current);
    $stmt_current->bind_param("s", $credencial);
    $stmt_current->execute();
    $result_current = $stmt_current->get_result();
    $current_foto = '';
    if ($result_current && $result_current->num_rows > 0) {
        $row_current = $result_current->fetch_assoc();
        $current_foto = $row_current['foto_funcionario'];
    }
    $stmt_current->close();

    $uploadOk = 1;
    $filename = $current_foto; // Default to current

    if (isset($_FILES["foto_funcionario"]) && !empty($_FILES["foto_funcionario"]["tmp_name"])) {
        $target_dir = __DIR__ . '/../uploads/';
        $original_name = basename($_FILES["foto_funcionario"]["name"]);
        $filename = time() . '_' . $original_name;
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($_FILES["foto_funcionario"]["tmp_name"], $target_file)) {
            // Success
        } else {
            echo "Erro no upload: " . $_FILES["foto_funcionario"]["error"];
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 1) {
        $sql = "UPDATE funcionario SET nome_funcionario=?, cpf_funcionario=?, email_funcionario=?, telefone_funcionario=?, salario_funcionario=?, senha_funcionario=?, funcao_funcionario=?, foto_funcionario=? WHERE credencial_funcionario=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdssss", $nome_funcionario, $cpf_funcionario, $email_funcionario, $telefone_funcionario, $salario_funcionario, $senha_funcionario, $funcao_funcionario, $filename, $credencial);

        if ($stmt->execute()) {
            echo "<script>alert('Perfil atualizado com sucesso!'); window.location.href='paginaAlterarPerfil.php';</script>";
            exit;
        } else {
            echo "Erro ao atualizar o perfil.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <link rel="stylesheet" href="../style/styles.css">
      <link rel="stylesheet" href="../style/style2.css">
</head>
<body>
    <header>
        <div id="barraescura">
            <div id="nav-itens">
                <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
            </div>
            <img class="imgtopo" src="../asets/imagens/meio/fotoFundoTrem.png" alt="">
        </div>
    </header>
    <main>
        <div class="brancaAlterarPerfil2">
            <?php
            $img_src = ($foto_funcionario && $foto_funcionario != 'default.jpg') ? "../uploads/" . htmlspecialchars($foto_funcionario) : "../asets/imagens/meio/rostoAlterarPerfil.png";
            echo '<div style="text-align:center; margin-bottom: 20px;"><img id="previewImg" src="' . $img_src . '" alt="Foto de Perfil" style="border-radius: 50%; width: 100px; height: 100px; object-fit: cover;"></div>';
            ?>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="credencial_funcionario" value="<?php echo htmlspecialchars($credencial); ?>">

                <div class="c2">
                    <label for="credencial_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/CredencialLogo.png" alt="">
                    <input type="text" name="credencial_funcionario" id="nome" placeholder="Insira sua credencial:" value="<?php echo htmlspecialchars($credencial_funcionario); ?>" required>
                </div>
                <br>


                <div class="c2">
                    <label for="nome_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/nome.png" alt="">
                    <input type="text" name="nome_funcionario" id="nome" placeholder="Insira seu nome:" value="<?php echo htmlspecialchars($nome_funcionario); ?>" required>
                </div>

                <br>

                  <div class="c2">
                    <label for="email_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/email.png" alt="">
                    <input type="email" name="email_funcionario" id="email" placeholder="Insira seu email:" value="<?php echo htmlspecialchars($email_funcionario); ?>" required>
                </div>

                <br>
                
                 <div class="c2">
                    <label for="senha_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/senha.png" alt="">
                    <input type="text" name="senha_funcionario" id="senha" placeholder="Insira sua senha:" value="<?php echo htmlspecialchars($senha_funcionario); ?>" required>
                </div>

                <br>

                <div class="c2">
                    <label for="cpf_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/cpf.png" alt="">
                    <input type="text" name="cpf_funcionario" id="cpf" placeholder="Insira seu CPF:" value="<?php echo htmlspecialchars($cpf_funcionario); ?>" required>
                </div>

                <br>

              

                <div class="c2">
                    <label for="telefone_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/TelefoneLogo.png" alt="">
                    <input type="text" name="telefone_funcionario" id="telefone" placeholder="Insira seu telefone:" value="<?php echo htmlspecialchars($telefone_funcionario); ?>" required>
                </div>

                <br>

                 <div class="c2">
                    <label for="cargo_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/Cargo.png" alt="">
                    <input type="text" name="cargo_funcionario" id="funcao" placeholder="Insira seu cargo:" value="<?php echo htmlspecialchars($cargo_funcionario); ?>" required>
                     </div>

                <br>

                 <div class="c2">
                    <label for="funcao_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/funcao.png" alt="">
                    <input type="text" name="funcao_funcionario" id="funcao" placeholder="Insira sua função:" value="<?php echo htmlspecialchars($funcao_funcionario); ?>" required>
                     </div>

                <br>

        

                <div class="c2">
                    <label for="salario_funcionario"></label><br>
                    <img class="imag" src="../asets/imagens/meio/salario.png" alt="">
                    <input type="number" step="0.01" name="salario_funcionario" id="salario_funcionario" placeholder="Insira seu salário:" value="<?php echo htmlspecialchars($salario_funcionario); ?>" required>
                </div>

                <div class="c2">
                <label for="foto_funcionario"></label><br>
                 <h2>Upload de Foto:</h2>
                <input type="file" id="fotoInput" name="foto_funcionario" accept="image/*">

                </div>
                <br>      

                <button type="submit">Finalizar</button>
            </form>
        </div>


        <footer>
            <div id="barra">
                <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
                <h3>Fast.sesi</h3>
                <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
                <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
            </div>
        </footer>
    </main>

    <script>
        document.getElementById('fotoInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
                document.getElementById("im2").addEventListener("click", function() {
                const alerta = document.getElementById("alertaNotificacao");
                
                alerta.classList.add("show");

                setTimeout(() => {
                    alerta.classList.remove("show");
                }, 2000);
            });
        </script>
</body>
</html>
