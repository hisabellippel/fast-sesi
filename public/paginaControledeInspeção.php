<?php
session_start();

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Inspeção</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style3.css">
</head>

<body>
    <header>
        <div id="barraescura">
           
      <?php
                $voltar = "paginaMenuPrincipalFuncionario.php"; 

                if (isset($_SESSION["cargo_funcionario"]) && $_SESSION["cargo_funcionario"] === "ADM") {
                    $voltar = "paginaMenuPrincipal.php";
                }
               ?>
               <a href="<?php echo $voltar; ?>">
                   <img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="Voltar">
               </a>

            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Controle de Inspeção:</h2>
        </div>
        <div class="fundo">

        <br>
            
         <form action="pesquisa.php" method="get" class="form-pesquisa1" autocomplete="off">
            <input
                type="text"
                id="c-pesquisa"
                name="q"
                placeholder="Digite (ex: linhas, trens, relatórios...)"
                list="sugestoes"
                required
            >
            <datalist id="sugestoes">
                <option value="Linhas">
                <option value="Trens">
                <option value="Inspecao">
                <option value="Relatorio">
                <option value="Configuracao">
                <option value="Sensores">
                <option value="Gastos">
                <option value="Trilhos">
                <option value="Alertas">
                <option value="Sinalizacao">
            </datalist>
            <button type="submit">Buscar</button>
            </form>

            
                <div class="red6">
                    <a href="paginaTrilhos1.php">
                        <img src="../asets/imagens/meio/trilhos.png" alt="" height= "60px" width= "80px">
                        <p class="cormenu">Trilhos</p>
                    </a>
                </div>

                <div class="red6">
                    <a href="paginaAlertasMecanicos.php">
                        <img src="../asets/imagens/meio/alertasmec.png" alt="" height= "70px" width= "70px">
                        <p class="cormenu">Alertas Mecânicos</p>
                    </a>
                </div>
            
                <div class="red6">
                    <a href="paginaSistemasdeSinalizacao.php">
                        <img src="../asets/imagens/meio/sinalizacao.png" alt="" height= "50px" width= "50px">
                        <p class="cormenu">Sistema de sinalização</p>
                    </a>
                </div>
                <br><br>
            </div>
        </div>
    </main>

    <script>
                document.getElementById("im2").addEventListener("click", function() {
                const alerta = document.getElementById("alertaNotificacao");
                
                alerta.classList.add("show");

                setTimeout(() => {
                    alerta.classList.remove("show");
                }, 2000);
            });
        </script>
        
    <footer>
        <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlertaseNotificacoes1.php"><img class="im5" src="../asets/imagens/meio/configuracao.png" alt="" height= "35px" width= "35px"></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>

</body>

</html>