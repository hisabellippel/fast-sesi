<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos4</title>

    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/styles.css">
  
    
</head>

<body>

    <header>
        <div id="barraescura">
            <a href="paginaGastos.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <img class="topo2" src="../asets/imagens/barraAcima/tradutor.png" alt="">
        </div>
    </header>

    <main>
        <div class="redonda">
            <p class="gastoss">Gastos</p>
        </div>

        <div class="informacao" id="dados-gastos">
            <h2 class="titulo">▼ Materiais</h2>
            <p data-func="Infraestrutura">Reposição de dormentes de concreto: R$2.500,00</p>
            <p data-func="Materiais de Lastro">Brita para nivelamento: R$300,00</p>
            <p data-func="Material Rodante">Rodas de aço novas: R$20.000,00</p>
            <p data-func="Combustível e Energia">Diesel: R$166.665,00</p>
            <p data-func="Engenharia">Salário dos Engenheiros Ferroviários: R$ 3600,00 p/pessoa</p>
            <p data-func="Lubrificação e Insumos">Óleo e graxas: R$8.333,50</p>
        </div>

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

