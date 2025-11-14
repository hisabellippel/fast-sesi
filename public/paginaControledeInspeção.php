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
             <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
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
                <div class="red0">
                    <img src="../asets/imagens/meio/trilhos.png" alt="" height= "60px" width= "80px">
                    <a href="paginaTrilhos1.php"><p class="cormenu">Trilhos</p></a>
                </div>

                <div class="red11">
                    <img src="../asets/imagens/meio/alertasmec.png" alt="" height= "70px" width= "70px">
                    <a href="paginaAlertasMecanicos.php"><p class="cormenu">Alertas Mecânicos</p></a>
                </div>
            </div>
            <div class="lado">
                <div class="red22">
                    <img src="../asets/imagens/meio/sinalizacao.png" alt="" height= "50px" width= "50px">
                    <a href="paginaSistemasdeSinalizacao.php"><p class="cormenu">Sistema de sinalização</p></a>
                </div>

                <div class="red33">
                    <img src="../asets/imagens/meio/sensor.png" alt="" height= "60px" width= "80px">
                    <a href="paginaSensores1.php"><p class="cormenu">Sensores</p></a>
                </div>
            </div>
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