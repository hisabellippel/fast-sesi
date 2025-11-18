<?php
session_start();

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
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
            <a href="paginaGastos.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>

    <main>
        <div class="redonda">
            <p class="gastoss">Gastos</p>
        </div>

        <div class="informacao" id="dados-gastos">
            <h2 class="titulo">▼ Funcionários</h2>
            <p data-func="Operacionais">Salário Operacionais: R$ 2200,00 p/pessoa</p>
            <p data-func="Limpeza">Salário da Limpeza: R$ 1600,00 p/pessoa</p>
            <p data-func="Maquinistas">Salário dos Maquinistas: R$ 1600,00 p/pessoa</p>
            <p data-func="Técnicos de Manutenção">Salário dos Técnicos de Manutenção: R$ 2300,00 p/pessoa</p>
            <p data-func="Engenheiros">Salário dos Engenheiros Ferroviários: R$ 3600,00 p/pessoa</p>
            <p data-func="Controlador de Tráfego">Controlador de Tráfego: R$ 1618,00 p/pessoa</p>
        </div>

        <div class="redonda">
            <p class="gastoss">Gráficos</p>
        </div>

        <div class="informacao">
            <br>
            <canvas id="graficoGastos"></canvas>
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

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script src="../scripts/grafico.js"></script>
    

</body>
</html>

