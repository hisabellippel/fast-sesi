<?php
session_start();

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

if ($_SESSION['cargo_funcionario'] !== 'ADM') {
    header("Location: paginaMenuPrincipalFuncionario.php");
    exit;
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório e Análises</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style3.css">
</head>

<body>

    <header>
        <div id="barraescura">
            <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Relatório e Análises</h2>
        </div>
        <br>

         <div class="fundo">

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
                    <a href="paginaDesempenho.php">
                        <img src="../asets/imagens/meio/desempenho.png" alt="" height= "60px" width= "80px">
                        <p class="cormenu">Dados sobre Desempenho</p>
                    </a>
                </div>

                <div class="red6">
                    <a href="paginaGastos.php">
                        <img src="../asets/imagens/meio/gastos.png" alt="" height= "60px" width= "60px">
                        <p class="cormenu">Gastos</p>
                    </a>
                </div>

                <div class="red6">
                    <a href="paginaRelatoriodasLinhas1.php">
                        <img src="../asets/imagens/meio/relatorio.png" alt="" height= "50px" width= "50px">
                        <p class="cormenu">Relatório das Linhas</p>
                    </a>
                </div>

                <br>

        </div>

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
    </main>

</body>
</html>