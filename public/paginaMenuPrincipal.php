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
    <title>Menu Principal</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style3.css">
    <style>
        body{
            background-color:  rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    

    <header>
        <div id="barraescura">
            <a href="paginaLogin.php?logout=1"><img id="im6" class="im6" src="../asets/imagens/barraAcima/Saída.png" alt="">
            <img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt="">
    </header>
    <br>
    <main>

            <div id="alertaNotificacao" class="alerta">
            Você não possui nenhuma notificação
            </div>
        <div id="azul">
            <h2> Menu Principal</h2>
        </div>

        <div class="fundo">

            <form action="pesquisa.php" method="get" class="form-pesquisa" autocomplete="off">
            <input
                type="text"
                id="c-pesquisa"
                name="q"
                placeholder="Digite (ex: linhas, trens, relatórios...)"
                list="sugestoes"
                required
            >
            <datalist id="sugestoes">
                <option value="linhas">
                <option value="trens">
                <option value="inspecao">
                <option value="relatorio">
                <option value="analises">
                <option value="ouvidoria">
                <option value="alertas">
                <option value="notificacoes">
                <option value="gastos">
            </datalist>
            <button type="submit">Buscar</button>
            </form>

            <div class="lado">
                <a href="paginaSelecioneLinhas.php">
                    <div class="red">
                    <img src="../asets/imagens/meio/linhas.png" alt="" height= "60px" width= "80px">
                    <p class="cormenu">Linhas</p></a>
                </div>

                <div class="red1">
                    <img src="../asets/imagens/meio/tremmenu.png" alt="" height= "60px" width= "80px">
                    <a href="paginaTrensAtivados1.php"><p class="cormenu">Trens</p></a>
                </div>
            </div>
            <div class="lado">
                <div class="red2">
                    <img src="../asets/imagens/meio/analisemenu.png" alt="" height= "50px" width= "50px">
                    <a href="paginaControledeInspeção.php"><p class="cormenu">Controle de inspeção</p></a>
                </div>

                <div class="red3">
                    <img src="../asets/imagens/meio/controledeinspecaomenu.png" alt="" height= "60px" width= "60px">
                    <a href="paginaRelatorioeAnalises.php"><p class="cormenu">Relatório e análises </p></a>
                </div>
            </div>
            <div class="lado">
                <div class="red4">
                    <img src="../asets/imagens/meio/sensor.png" alt="" height= "50px" width= "60px">
                    <a href="paginaSensores1.php"><p class="cormenu">Sensores</p></a>
                </div>

                <div class="red5">
                    <img src="../asets/imagens/meio/perfil2.png" alt="" height= "60px" width= "60px">
                    <a href="paginaFuncionarios.php.php"><p class="cormenu">Funcionários</p></a>
                </div>
                <br>
            </div>
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
    </main>
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