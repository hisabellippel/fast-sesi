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
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
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
        <option value="linhas">
        <option value="trens">
        <option value="inspecao">
        <option value="relatorio">
        <option value="analises">
        <option value="ouvidoria">
        <option value="alertas">
        <option value="notificacoes">
        <option value="gastos">
      </datalist>
      <button type="submit">Buscar</button>
    </form>


    <p class="secao">Digite exatamente o nome da seção desejada.</p>
  </div>



          
    </main>

    <footer>
        <div class="pad1">
        <div class="barranova">
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
        </div>
    </footer>

</body>
</html>

/*.pesquisa5 {
  background: rgba(255, 255, 255, 0.15);
  padding-left: 3px;
  padding-right: 3px;
  padding-top: 33px;
  padding-bottom: 33px;
  border-radius: 20px;
  backdrop-filter: blur(8px);
  text-align: center;
  width: 90%;
  max-width: 400px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  margin-left: 20px;
}
.c-pesquisa h1 {
  margin-bottom: 25px;
  font-size: 1.8em;
  font-weight: 600;
}
.form-pesquisa {
  gap: 10px;
  justify-content: center;
}
.form-pesquisa input {
  flex: 1;
  padding: 10px 14px;
  border-radius: 25px;
  border: none;
  outline: none;
  font-size: 1em;
}
.form-pesquisa button {
  background: white;
  color: #1d4bd6;
  border: none;
  border-radius: 25px;
  padding: 10px 20px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.2s;
}
.form-pesquisa button:hover {
  background: #f2f2f2;
}*//