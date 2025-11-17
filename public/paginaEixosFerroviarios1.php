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
            <a href="paginaAlertasMecanicos.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="">
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
  </header>

  <main><br>
  <div class="paddese">
   
     <div id="azul">
            <h2 id="hs">Eixos Ferroviarios</h2>
        </div><BR><br>

    <section class="linhasde">

   <article class="linhade2" data-line="1">
  <div class="nomede">
    <div class="titulolinhas">Trincas por Fadiga</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="true" data-target="1">▾</button>
    </div>
  </div>

  <div class="items" id="items-1">

    <div class="item">
      <span class="estado errado"></span>
      Linha 005: <strong>Trinca encontrada devido a tensões cíclicas</strong>
    </div>

     <div class="item">
      <span class="estado certo"></span>
      <strong>Restante das linhas sem trincas</strong>
    </div>

  </div>
</article>
<br>

    
   <article class="linhade2" data-line="2">
  <div class="nomede">
    <div class="titulolinhas">Desgaste Mecânico</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="2">▸</button>
    </div>
  </div>

  <div class="items" id="items-2" style="display:none">

    <div class="item">
      <span class="estado errado"></span>
      Linha 003: <strong>Necessita de troca de material devido ao contato excessivo com rolamentos</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      <strong>Restante das linhas sem desgate mecânico</strong>
    </div>

   
  </div>
</article>
<br>

<article class="linhade2" data-line="3">
  <div class="nomede">
    <div class="titulolinhas">Problemas de Manutenção</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="3">▸</button>
    </div>
  </div>

  <div class="items" id="items-3" style="display:none">

   <div class="item">
      <span class="estado errado"></span>
      Linha 001: <strong>Precisa de troca do eixo, foi encontrado uma deformação</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      <strong>Restante das linhas sem problemas de manutenção</strong>
    </div>

  </div>
</article>




    </section>
    </div>
  </main>

  
 <div id="barra">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
  
 <script src="../scripts/desempenho.js"></script>
</body>
</html>