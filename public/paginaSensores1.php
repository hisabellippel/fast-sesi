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
    <title>Sensores</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
    <script src="../scripts/script.js"></script>
    <source src="login.js" type="">

</head>


<body>

    <header>
        <div id="barraescura">
           <?php
                $voltar = "../paginaMenuPrincipalFuncionario.php"; 

                if (isset($_SESSION["cargo_funcionario"]) && $_SESSION["cargo_funcionario"] === "ADM") {
                    $voltar = "../paginaMenuPrincipal.php";
                }
               ?>
               <a href="<?php echo $voltar; ?>">
                   <img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="Voltar">
               </a>

            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>

        
    </header>
    <br>
    <br>
    <main>
        <div id="azul">
            <h2 id="hs">Sensores</h2>
        </div>
        <br>
        <br>
       
 
        <img class="caminho" src="../asets/imagens/meio/caminho.png" height= "170px" width="400" alt="" >

        <div id="notificacao" class="notificacao">
        Os dados dos sensores foram atualizados!
        </div>

        <div>
            <div class="sensor1"></div>
        </div>
        <div>
            <div class="sensor2"></div>
        </div>
        <div>
            <div class="sensor3"></div>
        </div>

        <br>

        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=fast_sesi_sa;charset=utf8","root","root");

        $stmt = $pdo->query("SELECT valor FROM temperaturas ORDER BY id DESC LIMIT 1");
        $temp1 = $stmt->fetchColumn();

        $stmt = $pdo->query("SELECT valor FROM presenca ORDER BY id DESC LIMIT 1");
        $temp2 = $stmt->fetchColumn();

        $stmt = $pdo->query("SELECT valor FROM umidade ORDER BY id DESC LIMIT 1");
        $temp3 = $stmt->fetchColumn();

        ?>

        <div class="verificacao">
            <p >Ultima verificação: <p id="data"></p></p>
        </div>

       <div class="sensores1">
            <p>Sensor 1: Temperatura:
                <span class="temp" style="color:black; padding-left: 20px; font-size:20px; display:flex">
                    <h3> 🌡️ </h3> <strong id="temp1"><?= $temp1 ?>°C</strong>
                </span>
            </p>
        </div>
        <script>
            function atualizarTemperatura() {
                fetch("get_messages.php")
                    .then(response => response.text())
                    .then(valor => {
                        if (valor.trim() !== "") {
                            document.getElementById("temp1").textContent = valor + "°C";
                        }
                    })
                    .catch(err => console.error("Erro ao buscar temperatura:", err));
            }

            setInterval(atualizarTemperatura, 2000);
        </script>

        <div class="sensores2">
            <p>Sensor 2: Presença: 
                <span class="temp" style="color:black; padding-left: 20px; font-size:20px; display:flex">
                <h3> 🚨 </h3><strong id="temp1"><?= $temp2 ?></strong>
                </span>
            <script>
            function atualizarTemperatura() {
                fetch("get_messages_presenca.php")
                    .then(response => response.text())
                    .then(valor => {
                        if (valor.trim() !== "") {
                            document.getElementById("temp1").textContent = valor + "°C";
                        }
                    })
                    .catch(err => console.error("Erro ao buscar temperatura:", err));
            }

            setInterval(atualizarTemperatura, 2000);
        </script>
        </div>

        <div class="sensores3">
            <p>Sensor 3: Umidade: 
                <span class="temp" style="color:black; padding-left: 20px; font-size:20px; display:flex">
                 <h3> 🌧️ </h3><strong id="temp1"><?= $temp3 ?></strong>
                </span>
            <script>
            function atualizarTemperatura() {
                fetch("get_messages_umidade.php")
                    .then(response => response.text())
                    .then(valor => {
                        if (valor.trim() !== "") {
                            document.getElementById("temp1").textContent = valor + "°C";
                        }
                    })
                    .catch(err => console.error("Erro ao buscar temperatura:", err));
            }

            setInterval(atualizarTemperatura, 2000);
        </script>
        </div>

    <br>

    <script>
    window.addEventListener('load', function() {
      const notif = document.getElementById('notificacao');
      notif.classList.add('mostrar');

      setTimeout(() => {
        notif.classList.remove('mostrar');
      }, 4000);
    });
  </script>
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
        
    </main>

 
</body>

</html>