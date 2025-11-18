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
    <title>Trincas por Fadiga</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
</head>

<body>
    <header>
        <div id="barraescura">
            <a href="paginaEixosFerroviarios1.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Eixos ferroviários</h2>
        </div>
        <br>
        <br>
        
        <div class="pad36">
            <div class ="redonda">
                <div class="letrabranca">
                    <p class="maq">Trincas por Fadiga</p><p class="nova"><p class="nova2">▼</p>
                </div>
            </div>
            <div class = "informacao5">
                <p>Trinca encontrada na linha 7 devido a tensões cíclicas</p>
            </div>

            <div class ="redonda">
                <a href="paginaEixosFerroviarios3.php">
                    <div class="letrabranca">
                        <p class="maq">Desgaste mecânico</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                    </div>
                </a>    
            </div>

            <br>

            <div class ="redonda">
                <a href="paginaEixosFerroviarios4.php">
                    <div class="letrabranca">
                        <p class="maq">Problemas de manutenção</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                    </div>
                </a>    
            </div>
        </div>
        <br><br><br><br><br><br>        
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