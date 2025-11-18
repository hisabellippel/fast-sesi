<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Frenagem</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>

    <header>
        <div id="barraescura">
             <a href="paginaAlertasMecanicos.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Sistema de frenagem:</h2>
        </div>
        <br>
        <br>

        <div class = "pad3">
            <a href="paginaSistemadeFrenagem2.php">
                <div class="redonda5">
                    <p class="gastoss">Vazamento de fluido de freio ▼</p>
                </div>
            </a>

            <a href="paginaSistemadeFrenagem3.php">
                <div class="redonda5">
                    <p class="gastoss">Ar no sistema</p><p class="red"><strong>°1 </strong></p> <p> ▼</p>
                </div>
            </a>

            <a href="paginaSistemadeFrenagem4.php">
                <div class="redonda5">
                    <p class="gastoss">Desgate de componentes</p><p class="red"><strong>°1</strong></p><p> ▼</p>
                </div>
            </a>

            <a href="paginaSistemadeFrenagem5.php">
                <div class="redonda5">
                    <p class="gastoss">Falhas operacionais e elétricas ▼</p></p>
                </div>
            </a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

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