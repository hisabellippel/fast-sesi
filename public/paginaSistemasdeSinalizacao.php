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
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
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