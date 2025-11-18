<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Trens Ativados</title>
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="stylesheet" href="../style/style2.css">
  

   <style>
    body{
      color:#0f172a;
    }
</style>
</head>
<body>
  <header>
   <div id="barraescura">
            <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="">
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
  </header>

  <main><br>
  <div class="paddese">
   
     <div id="azul">
            <h2 id="hs">Trens ativados</h2>
        </div><BR>
        <br><br><br>

    <section class="linhasde">

   <article class="linhade2" data-line="1">
  <div class="nomede">
    <div class="titulolinhas">Altorre-Glaciari­s</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="true" data-target="1">▾</button>
    </div>
  </div>

  <div class="items" id="items-1">

    <div class="item">
      <span class="estado certo"></span>
      Localização: <strong>Orbitalis</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Distância percorrida: <strong>90 km</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Passageiros: <strong>15.000</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Motorista: <strong>Lucas Pacheco</strong>
    </div>

  </div>
</article>


    
   <article class="linhade2" data-line="2">
  <div class="nomede">
    <div class="titulolinhas">Ouro negro — Monte Claro</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="2">▸</button>
    </div>
  </div>

  <div class="items" id="items-2" style="display:none">

    <div class="item">
      <span class="estado certo"></span>
      Localização: <strong>Metrópolis Leste</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Distância percorrida: <strong>115 km</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Passageiros: <strong>22.500</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Maquinista: <strong>Fernanda Costa</strong>
    </div>

  </div>
</article>


<article class="linhade2" data-line="3">
  <div class="nomede">
    <div class="titulolinhas">Rio Verde Eldoria</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="3">▸</button>
    </div>
  </div>

  <div class="items" id="items-3" style="display:none">

    <div class="item">
      <span class="estado certo"></span>
      Localização: <strong>Corredor Sul</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Distância percorrida: <strong>80 km</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Passageiros: <strong>13.200</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Maquinista: <strong>Bruno Silva</strong>
    </div>

  </div>
</article>


<article class="linhade2" data-line="4">
  <div class="nomede">
    <div class="titulolinhas">Coralua — Maresia</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="4">▸</button>
    </div>
  </div>

  <div class="items" id="items-4" style="display:none">

    <div class="item">
      <span class="estado certo"></span>
      Localização: <strong>Vale dos Pinheiros</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Distância percorrida: <strong>100 km</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Passageiros: <strong>19.800</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Velocidade: <strong>65 km/h</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Maquinista: <strong>Camila Santos</strong>
    </div>

  </div>
</article>

    </section>
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

  
 <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlertaseNotificacoes1.php"><img class="im5" src="../asets/imagens/meio/configuracao.png" alt="" height= "35px" width= "35px"></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
  
 <script src="../scripts/desempenho.js"></script>
</body>
</html>