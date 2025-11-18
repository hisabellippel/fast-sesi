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
    <title>Ouvidoria Clientes</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>
<body>
    <header>
         <div id="barraescura">
             <a href="paginaOuvidoriaGeral.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt=""></a>
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>
    <main>
    <div class="redonda5">
        <div class="seta-baixo">
        <strong><p>Clientes</p></strong> </p><p>▼</p></p> 
    </div>
</div>

    <div class="pad19">
        <div  class="quadropadrao">
            <div class="quadrodescrita">
            <p>Nome do Ciente: Mariane Rodrigues</p>
            <p> A ferroviária é bem tecnológica, acho que poderia melhorar em pouco naeficiência e ter mais linhas e mais horários.</p>
            </div>

            <div class="quadrodescrita">
                <p>Nome do Cliente: Guilherme Costa </p>
                <p>Cometário: A limpeza do banheiro precisa urgentemente melhorar! quase impossível usar o banheiro.A limpeza do banheiro precisa urgentemente melhorar! quase impossível usar o banheiro.</p>

            </div>

            <div class="quadrodescrita">
                <p>Nome do Cliente: Laura Zimmerman</p>
                <p>Cometário:  A linha que eu uso (Altorre-Glaciaris) é muito eficiente, sempre no horário e sempre com pessoas gentis.  </p>

            </div>
        
        </div>
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

<footer>

</footer>

</body>
</html>