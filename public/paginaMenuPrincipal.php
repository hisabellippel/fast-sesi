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
            <a href="paginaLogin.php?logout=1"><button class ="sair" type="submit">SAIR</button></a>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
    </header>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs"> Menu Principal</h2>
        </div>
        <div class="lado">
            <div class="red">
                <img src="../asets/imagens/meio/linhas.png" alt="" height= "80px" width= "100px">
                <a href="paginaSelecioneLinhas.php"><p class="cormenu">Linhas</p></a>
            </div>

            <div class="red1">
                <img src="../asets/imagens/meio/tremmenu.png" alt="" height= "80px" width= "100px">
                <a href="paginaTrensAtivados1.php"><p class="cormenu">Trens</p></a>
            </div>
        </div>
        <div class="lado">
            <div class="red2">
                <img src="../asets/imagens/meio/analisemenu.png" alt="" height= "70px" width= "70px">
                <a href="paginaControledeInspeção.php"><p class="cormenu">Controle de inspeção</p></a>
            </div>

            <div class="red3">
                <img src="../asets/imagens/meio/controledeinspecaomenu.png" alt="" height= "70px" width= "80px">
                <a href="paginaRelatorioeAnalises.php"><p class="cormenu">Relatório e análises </p></a>
            </div>
        </div>
        <div class="lado">
            <div class="red4">
                <img src="../asets/imagens/meio/ouvidoriamenu.png" alt="" height= "80px" width= "80px">
                <a href="paginaOuvidoriaGeral.php"><p class="cormenu">Ouvidoria</p></a>
            </div>

            <div class="red5">
                <img src="../asets/imagens/meio/alertamenu.png" alt="" height= "80px" width= "80px">
                <a href="paginaAlertaseNotificacoes1.php"><p class="cormenu">Alertas e Notificações</p></a>
            </div>
            <br>
        </div>
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