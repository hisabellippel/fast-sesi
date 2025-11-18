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
    <title>Selecione Linhas</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
</head>
<body>
   <header>
        <div id="barraescura">
            <a href="paginaSelecioneLinhas.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
<br>
    <main>

        <div class="notificacao">
        Os dados da linha 1 foram atualizados!
        </div>

        <div id="azul">
            <h2>Linhas:</h2>
        </div>

        <div class="selecionar">

        <img src="../asets/imagens/meio/trem.png" height= "50px" width="70" alt="Trem" class="trem-animado" />

        <img src="../asets/imagens/meio/linha1.png" height= "150px" width="370" alt="">

            <div class="selecionar2">

                <div class="selecioneflecha">
                    <h3> Selecione a Linha: </h3>
                    <img src="../asets/imagens/meio/setaabaixar.png" alt="">
                </div>

                <div class="selecionar3">

                <a href="paginaSelecioneLinhas1.php"><p class="linhas2"> Linha 001</p></a>
                <a href="paginaSelecioneLinhas2.php"><p class="linhas2"> Linha 002</p></a>
                <a href="paginaSelecioneLinhas3.php"><p class="linhas2"> Linha 003</p></a>
                <a href="paginaSelecioneLinhas4.php"><p class="linhas2"> Linha 004</p></a>
                <a href="paginaSelecioneLinhas5.php"><p class="linhas2"> Linha 005</p></a>

                </div>

            </div>

            <div class="velocidade">
                <p> Velocidade: </p>
            </div>
            <div class="passageiros">
                <p>Passageiros em tempo real:  824 </p>
            </div>
            <div class="alertaseno">
                <p>Alertas e Notificações:  Nenhum </p>
            </div>


        </div>

        <script>
            window.addEventListener('load', function() {
            const notif = document.getElementById('notificacao');
            notif.classList.add('mostrar');

        setTimeout(() => {
            notif.classList.remove('mostrar');
            }, 4000);
            });
        </script>

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

</body>
</html>