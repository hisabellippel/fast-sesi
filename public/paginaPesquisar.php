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
    <title>Alertas e Notificações</title>
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>

    <header>
        <div id="barraescura">
            <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <br>
    <br>
    <main>
        <br><br>
       <div class="pesquisa5">
   
    <h1>Pesquisar 🔎</h1>


    <form action="pesquisa.php" method="get" class="form-pesquisa" autocomplete="off">
      <input
        type="text"
        id="c-pesquisa"
        name="q"
        placeholder="Digite (ex: linhas, trens, relatórios...)"
        list="sugestoes"
        required
      >
      <datalist id="sugestoes">
        <option value="Linhas">
            <option value="Trens">
            <option value="Inspecao">
            <option value="Relatorio">
            <option value="Alertas">
            <option value="Notificacoes">
            <option value="Gastos">
      </datalist>
      <button type="submit">Buscar</button>
    </form>


    <p class="secao">Digite exatamente o nome da seção desejada.</p>
  </div>


  <br>
  <br>
          
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
        <div class="pad1">
        <div class="barranova">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlertaseNotificacoes1.php"><img class="im5" src="../asets/imagens/meio/configuracao.png" alt="" height= "35px" width= "35px"></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
        </div>
    </footer>

</body>
</html>
