<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trens Ativados</title>
  <link rel="icon" href="../asets/imagens/barraAbaixo/logo.png">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: #f3f4f6;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Cabeçalho estilo app */
    header {
      background-color: #6b7280;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 15px;
      position: sticky;
      top: 0;
      z-index: 10;
    }

    header img {
      width: 28px;
      height: 28px;
      cursor: pointer;
    }

    /* Seção principal */
    main {
      flex: 1;
      padding: 20px;
      text-align: center;
    }

    h2 {
      color: #1e3a8a;
      font-size: 22px;
      margin-bottom: 25px;
    }

    /* Botões de trem */
    .redonda {
      background-color: #3b82f6;
      margin: 15px 0;
      padding: 18px;
      border-radius: 15px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.15);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .redonda:hover {
      transform: scale(1.03);
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .redonda a {
      text-decoration: none;
      color: white;
      font-weight: 500;
      font-size: 16px;
    }

    /* Rodapé fixo */
    footer {
      background-color: #6b7280;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 10px 0;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      box-shadow: 0 -2px 6px rgba(0,0,0,0.2);
      position: sticky;
      bottom: 0;
    }

    footer img.logo {
      width: 35px;
      height: 35px;
    }

    footer h3 {
      color: white;
      font-size: 16px;
      margin: 0;
      font-weight: 600;
    }

    footer a img {
      width: 30px;
      height: 30px;
    }

    /* Responsividade */
    @media (max-width: 480px) {
      h2 {
        font-size: 20px;
      }
      .redonda {
        padding: 15px;
      }
      footer h3 {
        font-size: 14px;
      }
    }
  </style>
</head>

<body>

  <header>
    <a href="paginaMenuPrincipal.php">
      <img src="../asets/imagens/barraAcima/flecha.png" alt="Voltar">
    </a>
    <a href="paginaNotificacoes.php">
      <img src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt="Notificações">
    </a>
  </header>

  <main>
    <h2>Trens ativados:</h2>

    <div class="redonda">
      <a href="paginaTrensativados2.php">Altorre - Glaciaris</a>
    </div>

    <div class="redonda">
      <a href="paginaTrensativados3.php">Ouro Negro - Monte Claro</a>
    </div>

    <div class="redonda">
      <a href="paginaTrensAtivados4.php">Rio Verde - Eldoria</a>
    </div>

    <div class="redonda">
      <a href="paginaTrensAtivados5.php">Coraluna - Marésia</a>
    </div>
  </main>

  <footer>
    <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="Logo">
    <h3>Fast.sesi</h3>
    <a href="paginaAlterarPerfil.php"><img src="../asets/imagens/meio/perfil.png" alt="Perfil"></a>
    <a href="paginaPesquisar.php"><img src="../asets/imagens/barraAbaixo/Lupa1.png" alt="Pesquisar"></a>
  </footer>

</body>
</html>