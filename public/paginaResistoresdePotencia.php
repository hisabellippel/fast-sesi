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
    <title>Resistores de Potência</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
    <source src="login.js" type="">
</head>

<body>
    <header>
        <div id="barraescura">
            <a href="paginaControledeInspeção.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Resistores de Potência</h2>
        </div>
        <br>
        <br>

        <div class="pad36">
            <div class ="redonda">
                <a href="paginaResistoresdePotencia2.php">
                    <div class =  "letrabranca">
                        <p class="maq">Falhas térmicas</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                    </div>
                </a>    
            </div>

            <br>

            <div class ="redonda">
                <a href="paginaResistoresdePotencia3.php">
                    <div class =  "letrabranca">
                        <p class="maq">Problemas estruturais</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                    </div>
                </a>
            </div>

            <br>
        
            <div class ="redonda">
                <a href="paginaResistoresdePotencia4.php">
                    <div class =  "letrabranca">
                        <p class="maq">Erros de Projeto</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                    </div>
                </a>
            </div>
        </div>
        <br><br><br><br><br><br><br><br>
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