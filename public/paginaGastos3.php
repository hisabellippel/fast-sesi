<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos3</title>

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
        <br>
        <div class="redonda">
            <p class="gastoss">Gastos</p>
        </div>

        <div class="informacao" id="dados-gastos">
            <h2 class="titulo">▼ Ferrovia</h2>
            <p data-func="Infraestrutura">Novo metro de ponte ferroiária: R$10.000,00</p>
            <p data-func="Sinalização">Troca da sinalização na linhas 2: R$15.000,00</p>
            <p data-func="Obras Ferroviárias">Nova passagem de nível com sinalização: R$30.000,00</p>
            
            <br>
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

