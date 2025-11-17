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
            <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
<main>
    <div id="azul">
        <h2 id="hs">Configurações</h2>
    </div>
    <br>

    <div class="fundo2">
        <br>

            <div class="setting-item">
                <span>Notificações</span>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="setting-item">
                <span>Localização</span>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>

            <div class="setting-item">
                <span>Vibração</span>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

             <div class="setting-item">
                <span>Atualizações Automáticas</span>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="setting-item">
                <span>Idioma</span>
                <select>
                    <option>Português</option>
                    <option>Inglês</option>
                    <option>Espanhol</option>
                </select>
            </div>

            <div class="setting-item">
                <span>Permições ADM</span>
                <select>
                    <option>Todas</option>
                    <option>Personalizada</option>
                    <option>Nenhuma</option>
                </select>
            </div>

            <div class="setting-item">
                <span>Permições FUNC</span>
                <select>
                    <option>Todas</option>
                    <option>Personalizada</option>
                    <option>Nenhuma</option>
                </select>
            </div>

            <div class="setting-item">
                <span>Fast-Sesi</span>
                    <a href="paginaAlertaseNotificacoes2.php">
                        <p class="visu">Visualizar</p>
                    </a>
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
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>
</body>
</html>


