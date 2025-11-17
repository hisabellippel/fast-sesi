<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Eixos Ferroviarios</title>
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="stylesheet" href="../style/style2.css">
  

   <style>
    html,body{height:100%}
    body{
      margin:0;
      background:linear-gradient(180deg, #eef4ff 0%, var(--bg) 100%);
      color:#0f172a;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      padding-bottom:84px; 
    }
</style>
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
        <h2 id="hs">Eixos ferroviários</h2>
    </div>
    <br>
    <br>

    <div class="pad36">
        <div class ="redonda">
            <a href="paginaEixosFerroviarios2.php">
                <div class="letrabranca">
                    <p class="maq">Trincas por fadiga</p><p class="nova"><strong>°1</strong></p><p class="nova2">▼</p>
                </div>
            </a>    
        </div>

        <br>

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

  
 <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
  
 <script src="../scripts/desempenho.js"></script>
</body>
</html>