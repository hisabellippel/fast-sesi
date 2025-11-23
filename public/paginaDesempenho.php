<?php
session_start();

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

if ($_SESSION['cargo_funcionario'] !== 'ADM') {
    header("Location: paginaMenuPrincipalFuncionario.php");
    exit;
}

?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Desemenho</title>
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="stylesheet" href="../style/style2.css">
  

   <style>
    html,body{height:100%}
    body{
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
            <a href="paginaRelatorioeAnalises.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="">
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
  </header>

  <main><br>
  <div class="paddese">
   
     <div id="azul">
            <h2 id="hs">Dados sobre desempenho e eficiência operacional</h2>
        </div><BR><br><br>

    <section class="linhasde">

      <article class="linhade2" data-line="1">
        <div class="nomede">
          <div class="titulolinhas">Linha 001</div>
          <div style="display:flex;align-items:center;gap:8px">
            <div class="titdes"><span style="font-size:12px">Operando</span></div>
            <button class="botaodese" aria-expanded="true" data-target="1">▾</button>
          </div>
        </div>
        <div class="items" id="items-1">
          <div class="item"><span class="estado certo"></span>Trilhos em ótimo estado</div>
          <div class="item"><span class="estado certo"></span>Fazendo ótima metragem</div>
          <div class="item"><span class="estado certo"></span>Sem acidentes</div>
          <div class="item"><span class="estado alerta"></span>Superlotação</div>
        </div>
      </article>

    
      <article class="linhade2" data-line="2">
        <div class="nomede">
          <div class="titulolinhas">Linha 002</div>
          <div style="display:flex;align-items:center;gap:8px">
            <div class="titdes"><span style="font-size:12px">Manutenção</span></div>
            <button class="botaodese" aria-expanded="false" data-target="2">▸</button>
          </div>
        </div>
        <div class="items" id="items-2" style="display:none">
          <div class="item"><span class="estado certo"></span>Trilhos em bom estado</div>
          <div class="item"><span class="estado alerta"></span>Paradas programadas</div>
          <div class="item"><span class="estado errado"></span>Peças pendentes</div>
        </div>
      </article>

      <article class="linhade2" data-line="3">
        <div class="nomede">
          <div class="titulolinhas">Linha 003</div>
          <div style="display:flex;align-items:center;gap:8px">
            <div class="titdes"><span style="font-size:12px">Inspeção</span></div>
            <button class="botaodese" aria-expanded="false" data-target="3">▸</button>
          </div>
        </div>
        <div class="items" id="items-3" style="display:none">
          <div class="item"><span class="estado certo"></span>Ritmo normal</div>
          <div class="item"><span class="estado certo"></span>Sinalização segura</div>
        </div>
      </article>

      
      <article class="linhade2" data-line="4">
        <div class="nomede">
          <div class="titulolinhas">Linha 004</div>
          <div style="display:flex;align-items:center;gap:8px">
            <div class="titdes"><span style="font-size:12px">Alerta</span></div>
            <button class="botaodese" aria-expanded="false" data-target="4">▸</button>
          </div>
        </div>
        <div class="items" id="items-4" style="display:none">
          <div class="item"><span class="estado alerta"></span>Operação reduzida</div>
          <div class="item"><span class="estado certo"></span>Equipe mobilizada</div>
        </div>
      </article>

      
      <article class="linhade2" data-line="5">
        <div class="nomede">
          <div class="titulolinhas">Linha 005</div>
          <div style="display:flex;align-items:center;gap:8px">
            <div class="titdes"><span style="font-size:12px">Normal</span></div>
            <button class="botaodese" aria-expanded="false" data-target="5">▸</button>
          </div>
        </div>
        <div class="items" id="items-5" style="display:none">
          <div class="item"><span class="estado certo"></span>Sem ocorrências</div>
          <div class="item"><span class="estado certo"></span>Fluxo regular</div>
        </div>
      </article>
      <br>

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