<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Sinalização</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/styles2.css">
</head>

<body>
    <header>
        <div id="barraescura">
            <a href="paginaControledeInspeção.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="">
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Sistema de sinalização:</h2>
        </div>
        <br>
        <br>
        <div class="pad18">
            <div class="redonda">
                <a href="paginaSinaleiros.php">
            <p class="cor">Sinaleiros  <span class="numero-vermelho">°1</p></a> <p class="cor">▼</p>
            </div>

            <br>

            <div class="redonda">
                <a href="paginaPlacasSinalizar.php"> <p class="cor">Placas de sinalização▼</p> </a>
            </div>

            <br>

            <div class="redonda">
                <a href="paginaCBTC.php"> <p class="cor"><p class="cor">CBTC (Communication-Based Train Control)<span class="numero-vermelho">°1</p></a> </p></a><p class="cor">▼</p>
            </div>

            <br>

            <div class="redonda">
                <a href="paginaIntertravamento.php"><p class="cor">Intertravamento▼</p></a>
            </div>
        </div>
        <br> <br>

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
                <div class="red00">
                    <img src="../asets/imagens/meio/botaoemergencia.png" alt="" height= "60px" width= "60px">
                    <a href="paginaBotaodeEmergencia1.php"><p class="cormenu">Botão de Emergência</p></a>
                </div>

                <div class="red111">
                    <img src="../asets/imagens/meio/eixos.png" alt="" height= "70px" width= "70px">
                    <a href="paginaEixosFerroviarios1.php"><p class="cormenu">Eixos Ferroviários</p></a>
                </div>
            </div>
            <div class="lado">
                <div class="red222">
                    <img src="../asets/imagens/meio/frenagem.png" alt="" height= "50px" width= "60px">
                    <a href="paginaSistemadeFrenagem1.php"><p class="cormenu">Sistema de Frenagem</p></a>
                </div>

                <div class="red333">
                    <img src="../asets/imagens/meio/potencia.png" alt="" height= "60px" width= "70px">
                    <a href="paginaResistoresdePotencia.php"><p class="cormenu">Resitores de potência</p></a>
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