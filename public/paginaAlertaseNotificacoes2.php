<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alertas e Notificações</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/style3.css">
</head>

<body>
    <header>
        <div id="barraescura">
            <a href="paginaAlertaseNotificacoes1.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Oque é a Fest-Sesi</h2>
        </div>

        <div class="fundo2">
            <br>
            <p class="preto"><strong>Nosso aplicativo foi criado para otimizar e modernizar a gestão ferroviária em Joinville, reunindo em um só lugar todas as informações necessárias para uma operação eficiente e segura.
                </strong><br><br>
                Com ele, profissionais e equipes têm acesso rápido a informações essenciais da operação, acompanhando em tempo real dados sobre 
                vias, ativos, manutenções, ocorrências e fluxos de trabalho.
                Com uma interface intuitiva, o sistema oferece monitoramento atualizado, registro de atividades, controle de manutenção, gestão de equipes e relatórios inteligentes, 
                garantindo mais eficiência, segurança e organização em toda a operação ferroviária.
                <br><br><strong>
                Prático, intuitivo e completo — tudo o que você precisa para gerenciar a ferrovia de forma mais ágil e confiável.</strong></p>

                <br>
                <br>
        </div>


        
    
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