<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Relatório</title>
  <link rel="stylesheet" href="../style/styles.css">
  <link rel="stylesheet" href="../style/style2.css">
  

   <style>
    html,body{height:100%}
    body{
      color:#0f172a;
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
            <h2 id="hs">Relatório das Linhas</h2>
        </div><BR><br><br>

    <section class="linhasde">

     <article class="linhade2" data-line="1">
  <div class="nomede">
    <div class="titulolinhas">Escola do Moinho centro</div>
    <div style="display:flex;align-items:center;gap:8px">
    
      <button class="botaodese" aria-expanded="true" data-target="1">▾</button>
    </div>
  </div>

  <div class="items" id="items-1">

    <div class="item">
      <span class="estado certo"></span>
      Quantidade de passageiros: <strong>1200</strong>
    </div>

    
    <div class="item">
      <span class="estado alerta"></span>
      Investimento em manutenção: <strong>R$ 7.333,79</strong>
    </div>

    <div class="item">
      <span class="estado alerta"></span>
      Número de acidentes: <strong>1</strong>
    </div>

  </div>
</article>

    
      <article class="linhade2" data-line="2">
  <div class="nomede">
    <div class="titulolinhas">Vila Industrial — Terminal Leste</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="2">▸</button>
    </div>
  </div>

  <div class="items" id="items-2" style="display:none">
    <div class="item">
      <span class="estado alerta"></span>
      Quantidade de passageiros: <strong>850</strong>
    </div>

    <div class="item">
      <span class="estado alerta"></span>
      Investimento em manutenção: <strong>R$ 12.890,50</strong>
    </div>

    <div class="item">
      <span class="estado errado"></span>
      Número de acidentes: <strong>3</strong>
    </div>
  </div>
</article>

 <article class="linhade2" data-line="3">
  <div class="nomede">
    <div class="titulolinhas">Parque Central — Estação Norte</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="3">▸</button>
    </div>
  </div>

  <div class="items" id="items-3" style="display:none">
    <div class="item">
      <span class="estado certo"></span>
      Quantidade de passageiros: <strong>540</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Investimento em manutenção: <strong>R$ 4.120,00</strong>
    </div>

    <div class="item">
      <span class="estado alerta"></span>
      Número de acidentes: <strong>1</strong>
    </div>
  </div>
</article>

      
      <article class="linhade2" data-line="4">
  <div class="nomede">
    <div class="titulolinhas">Jardim Horizonte — Centro Velho</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="4">▸</button>
    </div>
  </div>

  <div class="items" id="items-4" style="display:none">
    <div class="item">
      <span class="estado alerta"></span>
      Quantidade de passageiros: <strong>1.450</strong>
    </div>

    <div class="item">
      <span class="estado errado"></span>
      Investimento em manutenção: <strong>R$ 2.980,00</strong>
    </div>

    <div class="item">
      <span class="estado alerta"></span>
      Número de acidentes: <strong>2</strong>
    </div>
  </div>
</article>

      
   <article class="linhade2" data-line="5">
  <div class="nomede">
    <div class="titulolinhas">Piratininga — Bairro Novo</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="5">▸</button>
    </div>
  </div>

  <div class="items" id="items-5" style="display:none">
    <div class="item">
      <span class="estado certo"></span>
      Quantidade de passageiros: <strong>670</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Investimento em manutenção: <strong>R$ 5.730,40</strong>
    </div>

    <div class="item">
      <span class="estado certo"></span>
      Número de acidentes: <strong>0</strong>
    </div>
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