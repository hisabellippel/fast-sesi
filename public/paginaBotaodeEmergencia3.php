<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trens Descarrilhados</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
</head>

<body>
    <header>
        <div id="barraescura">
            <a href="paginaBotaodeEmergencia1.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Botão de emergência</h2>
        </div>
        <br>
        <br>
        
        <div class="pad7">
            <div class ="redonda">
                <a href="paginaBotaodeEmergencia2.php">
                    <div class="letrabranca">
                        <p class="maq">Maquinista</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                    </div>
                </a>
            </div>

            <br>
            <br>
            <br>

            <div class ="redonda">
                <div class="letrabranca">
                    <p class="maq">Bagageiro</p><p class="nova"><p class="nova2">▼</p>
                </div>
            </div>
            <div class = "informacao5">
                <p>Nenhum acionamento relatado.</p>
            </div>
        </div>    
        <br>
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
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>

</body>
</html>

