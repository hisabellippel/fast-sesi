<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecione Linhas</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
    <style>
  .container-trem {
    position: relative;
    width: 100%;
    height: 100px; /* altura da área onde o trem se move */
    overflow: hidden;
    pointer-events: none; /* não interfere com cliques em outros elementos */
  }

  .trem-animado {
    position: absolute;
    padding-bottom: 640px;
    width: 80px; /* ajuste conforme o tamanho da imagem */
    bottom: 0;
    animation: trem-mover 6s ease-in-out infinite alternate;
  }

  @keyframes trem-mover {
    0% {
      left: 50;
      transform: scaleX(1);
    }
    100% {
      left: calc(90% - 80px);
      transform: scaleX(1);
    }
  }
</style>

</head>
<body>
    <header>
        <div id="barraescura">
            <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
        </div>
    </header>
    
    <br>

    <main>
        <div id="azul">
            <h2>Linhas:</h2>
        </div>

        <div class="selecionar">

        <img src="../asets/imagens/meio/trem.png" height= "50px" width="70" alt="Trem" class="trem-animado" />

        <img src="../asets/imagens/meio/caminho.png" height= "150px" width="370" alt="">

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
                <p> Velocidade</p>
            </div>
            <div class="passageiros">
                <p>Passageiros em tempo real</p>
            </div>
            <div class="alertaseno">
                <p>Alertas e Notificações</p>
            </div>


        </div>

    </main>

    <footer> 
        <div id="barra">
            <a href="paginainformacoes.php"><img class="topo1" src="../asets/imagens/barraAbaixo/barras.png" alt=""></a>
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
    </footer>
</body>
</html>
