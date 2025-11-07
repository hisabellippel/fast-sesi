<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
    
    <header>
        <div id="barraescura">
            <a href="paginaRelatorioeAnalises.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
        </div>
    </header>
    <br>
    <br>
    <main>
        
        <div class="padGastos">
        <div class="redonda">
            <p>Gastos e gráficos</p>
        </div>
        <div class="informacao"><br>
     

         <div id="botoes_novos2">
            <form method="post">
        <button type="submit" name="btn">Funcionários</button>
        </form>

        <?php
        if (isset($_POST['btn'])) {
        header("Location: paginaGastos2.php");
        exit();
        }
        ?>
            <button onclick="window.location.href='paginaCriarConta.php'">Funcionários</button>
            <button onclick="window.location.href='paginaCriarConta.php'">▼ Ferrovia</button>
            <button onclick="window.location.href='paginaCriarConta.php'">▼ Materiais</button>
            <button onclick="window.location.href='paginaCriarConta.php'">▼ Manutenções</button>
            <button onclick="window.location.href='paginaCriarConta.php'">▼ Consumo de Energia</button>
          
            
            
         </div>

          
         
          
           
        </div>
        </div>
        <br>
   
        <div id="barra">
            <a href="paginainformacoes.php"><img class="topo1" src="../asets/imagens/barraAbaixo/barras.png" alt=""></a>
            <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
            <h3>Fast.sesi</h3>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
            <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
            <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
        </div>
      
    </main>


</body>

</html>