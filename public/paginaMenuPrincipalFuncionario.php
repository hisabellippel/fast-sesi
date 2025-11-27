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
    <link rel="stylesheet" href="../style/style2.css">
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
            <a href="paginaLogin.php?logout=1"><img id="im6" class="im6" src="../asets/imagens/barraAcima/Saída.png" alt=""></a>
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

        <div class="fundo21">

        <form action="pesquisa.php" method="get" class="form-pesquisa2" autocomplete="off">
            <input
                type="text"
                id="c-pesquisa2"
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
            <br>
            <div class="lado">
                <a href="paginaSelecioneLinhas.php">
                    <div class="red">
                    <img src="../asets/imagens/meio/linhas.png" alt="" height= "60px" width= "80px">
                    <p class="cormenu">Linhas</p></a>
                </div>

                <div class="red1">
                    <a href="paginaTrensAtivados1.php">
                        <img src="../asets/imagens/meio/tremmenu.png" alt="" height= "60px" width= "80px">
                        <p class="cormenu">Trens</p>
                    </a>
                </div>
            </div>
            <div class="lado">
                <div class="red2">
                    <a href="paginaControledeInspeção.php">
                        <img src="../asets/imagens/meio/analisemenu.png" alt="" height= "50px" width= "50px">
                        <p class="cormenu">Controle de inspeção</p>
                    </a>
                </div>

              
            <div class="lado0_">
                <div class="red0_">
                    <a href="paginaSensores1.php">
                        <img src="../asets/imagens/meio/sensor.png" alt="" height= "50px" width= "60px">
                        <p class="cormenu">Sensores</p>
                    </a>
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
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>

</body>

</html>