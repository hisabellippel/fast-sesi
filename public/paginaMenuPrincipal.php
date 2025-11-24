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

        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=fast_sesi_sa;charset=utf8","root","root");

        $stmt = $pdo->query("SELECT valor FROM temperaturas ORDER BY id DESC LIMIT 1");
        $temp = $stmt->fetchColumn();

        if (!$temp) {
            $temp = "";
        }
        ?>

    <header>
        <div id="barraescura">
            <a href="paginaLogin.php?logout=1"><img id="im6" class="im6" src="../asets/imagens/barraAcima/Saída.png" alt=""></a>
            <img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt="">
            <span class="temp" style="color:black; padding-top: 7px; margin-left:20px; font-size:25px; display:flex">
                    🌡️ <strong><?= $temp ?> °C</strong>
            </span>
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

            <div class="lado">
                <a href="paginaSelecioneLinhas.php">
                    <div class="red">
                    <img src="../asets/imagens/meio/linhas.png" alt="" height= "60px" width= "80px">
                    <p class="cormenu"><strong>Linhas</strong></p></a>
                </div>

                <div class="red1">
                    <a href="paginaTrensAtivados1.php">
                        <img src="../asets/imagens/meio/tremmenu.png" alt="" height= "60px" width= "80px">
                        <p class="cormenu"><strong>Trens</strong></p>
                    </a>
                </div>
            </div>
            <div class="lado">
                <div class="red2">
                    <a href="paginaControledeInspeção.php">
                        <img src="../asets/imagens/meio/analisemenu.png" alt="" height= "50px" width= "50px">
                        <p class="cormenu"><strong>Controle de inspeção</strong></p>
                    </a>
                </div>

                <div class="red3">
                    <a href="paginaRelatorioeAnalises.php">
                        <img src="../asets/imagens/meio/controledeinspecaomenu.png" alt="" height= "60px" width= "60px">
                        <p class="cormenu"><strong>Relatório e análises</strong></p>
                    </a>
                </div>
            </div>
            <div class="lado">
                <div class="red4">
                    <a href="paginaSensores1.php">
                        <img src="../asets/imagens/meio/sensor.png" alt="" height= "50px" width= "60px">
                        <p class="cormenu"><strong>Sensores</strong></p>
                    </a>
                </div>

                <div class="red5">
                    <a href="paginaFuncionarios.php">
                        <img src="../asets/imagens/meio/perfil2.png" alt="" height= "60px" width= "60px">
                        <p class="cormenu"><strong>Funcionários</strong></p>
                    </a>
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