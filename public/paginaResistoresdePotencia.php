<?php
session_start();

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Resistores de Potência </title>
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
            <a href="paginaAlertasMecanicos.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="">
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
  </header>

  <main><br>
  <div class="paddese">
   
     <div id="azul">
            <h2 id="hs">Resistores de Potência</h2>
        </div><BR>
        <br>

    <section class="linhasde">

   <article class="linhade2" data-line="1">
  <div class="nomede">
    <div class="titulolinhas">Falhas Térmicas</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="true" data-target="1">▾</button>
    </div>
  </div>

  <div class="items" id="items-1">

    <div class="item">
      <span class="estado errado"></span>
      Linha 009<strong>Risco de sobreaquicimento que pode ocasionar em deformação física</strong>
    </div>


  </div>
</article>

<br>
    
   <article class="linhade2" data-line="2">
  <div class="nomede">
    <div class="titulolinhas">Problemas estruturais</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="2">▸</button>
    </div>
  </div>

  <div class="items" id="items-2" style="display:none">

    <div class="item">
      <span class="estado errado"></span>
      Linha 001 <strong>Desgaste dos resitores de carbono</strong>
    </div>

     <div class="item">
      <span class="estado errado"></span>
      Linha 003 <strong>Falha na dissipação de calor está causando o acúmulo temperaturas elevadas</strong>
    </div>



  </div>
</article>

<br>
<article class="linhade2" data-line="3">
  <div class="nomede">
    <div class="titulolinhas">Erros de Projeto</div>
    <div style="display:flex;align-items:center;gap:8px">
      <button class="botaodese" aria-expanded="false" data-target="3">▸</button>
    </div>
  </div>

  <div class="items" id="items-3" style="display:none">

    <div class="item">
      <span class="estado errado"></span>
      Linha 004<strong>Foi identificado um uso de resistor com potência inferior ás necessidades do circuito</strong>
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