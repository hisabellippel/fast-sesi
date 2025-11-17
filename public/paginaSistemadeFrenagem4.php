<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Frenagem</title>
    <link rel="stylesheet" href="../style/styles.css">
    <source src="login.js" type="">
</head>

<body>

    <header>
        <div id="barraescura">
             <a href="paginaSistemadeFrenagem1.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
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
        <div class="pad">
            <a href="paginaSistemadeFrenagem2.php">
                <div class="redonda">
                    <p class="cor">Vazamento de fluido de freio▼</p>
                </div>
            </a>

            <a href="paginaSistemadeFrenagem3.php">
                <div class="redonda">
                    <p class="cor">Ar no sistema</p><p class="red"><strong>°1</strong></p><p class="cor">▼</p>
                </div>
            </a>

            <div class="redonda">
                <p class="cor">Desgate de componentes <p class="red"><strong>°1</strong></p> <p class="cor">▼</p>
            </div>
            <div class="informacao">
                <p>Detectado desgaste em pastilhas e discos de freio durante inspeção. Recomenda-se substituição preventiva nas próximas 200 horas de operação.</p>
            </div>

            <a href="paginaSistemadeFrenagem5.php">
                <div class="redonda">
                    <p class="cor">Falhas operacionais e elétricas▼</p></p>
                </div>
            </a>
        </div>

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
        <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </main>


</body>

</html>