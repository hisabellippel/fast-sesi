<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos5</title>

    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/styles.css">
  
    
</head>

<body>

    <header>
        <div id="barraescura">
            <a href="paginaGastos.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
<br>
    <main>
        <div class="redonda">
            <p class="gastoss">Gastos</p>
        </div>

        <div class="informacao" id="dados-gastos">
            <h2 class="titulo">▼ Manutenções</h2>
            <p data-func="Trns">Manutenções semanais dos trens: R$1.500,00</p>
            <p data-func="Vias">Manutenções das vias: R$11.000,00</p>
            <p data-func="Infraestrtura">Manutenções da infraestrutura auxiliar: R$10.000,00</p>
            <p data-func="Vandalização">Manuntenção por vandalização: R$R$4.000,00</p>
            
        </div>
<br>
        <div class="redonda">
            <p class="gastoss">Gráficos</p>
        </div>

        <div class="informacao">
            <br>
            <canvas id="graficoGastos"></canvas>
        </div>
    </main>

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="../scripts/grafico.js"></script>
    

</body>
</html>

