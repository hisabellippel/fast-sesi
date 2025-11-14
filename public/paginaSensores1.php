<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensores</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
    <script src="../scripts/script.js"></script>
    <source src="login.js" type="">

</head>


<body>

    <header>
        <div id="barraescura">
             <a href="paginaControledeInspeção.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>

        
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Sensores</h2>
        </div>
        <br>
        <br>
       
 
            <img class="caminho" src="../asets/imagens/meio/caminho.png" height= "170px" width="400" alt="" >

            <div id="notificacao" class="notificacao">
            Os dados dos sensores foram atualizados!
            </div>

            <div>
                <div class="sensor1"></div>
            </div>
            <div>
                <div class="sensor2"></div>
            </div>
            <div>
                <div class="sensor3"></div>
            </div>

            <br>

            <div class="verificacao">
                <p >Ultima verificação: <p id="data"></p></p>
            </div>

            <div class="sensores1">
                <p>Sensor 1: </p>
            </div>

            <div class="sensores2">
                <p>Sensor 2: </p>
            </div>

            <div class="sensores3">
                <p>Sensor 3: </p>
            </div>

    <br>
    <br>

    <script>
    window.addEventListener('load', function() {
      const notif = document.getElementById('notificacao');
      notif.classList.add('mostrar');

      setTimeout(() => {
        notif.classList.remove('mostrar');
      }, 4000);
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