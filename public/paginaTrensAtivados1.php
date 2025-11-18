<?php
session_start();

require_once 'db.php';

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}


$paginaDestino = ($_SESSION["cargo_funcionario"] === "ADM") 
    ? "paginaMenuPrincipal.php" 
    : "paginaMenuPrincipalFuncionario.php";
?>



$sql = "SELECT l.*, f.nome_funcionario 
        FROM linhas l 
        JOIN funcionario f ON l.motorista_linhas = f.id_funcionario";
$result = $conn->query($sql);
$linhas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $linhas[] = $row;
    }
}
$conn->close(); 
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Trens Ativados</title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css">
    <style>
        body { color: #0f172a; }
        .botoes-crud { margin-top: 10px; display: flex; gap: 10px; }
        .botoes-crud button, .btn-adicionar { 
            padding: 8px 12px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-weight: bold; 
            text-decoration: none; 
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-editar { background-color: #2563eb; color: white; }
        .btn-excluir { background-color: #dc2626; color: white; }
        .btn-adicionar { background-color: #059669; color: white; margin-bottom: 20px; }
        
        
        .items { 
            display: none; 
            flex-direction: column; 
            padding-top: 10px;
        }
    </style>
</head>
<body>
  <header>
   <div id="barraescura">

  
            <a href="paginaMenuPrincipal.php"><img class="topo1" src="../asets/imagens/barraAcima/flecha.png" alt="">
            <a href="paginaNotificacoes.php"><img id="im2" class="im2" src="../asets/imagens/barraAbaixo/sinoNotificacao.png" alt=""></a>
        </div>
    </header>

    <main><br>
        <div class="paddese">
            <div id="azul">
                <h2 id="hs">Trens Ativados</h2>
            </div>
            <br>
            
            <a href="adicionar_editar_linha.php" class="btn-adicionar">
                ➕ Adicionar Nova Linha
            </a>
            <br>

            <section class="linhasde">

                <?php 
                $contador = 1; 
                foreach ($linhas as $linha): 
                ?>
                <article class="linhade2" data-line="<?php echo $linha['id_linhas']; ?>">
                    <div class="nomede">
                        <div class="titulolinhas"><?php echo htmlspecialchars($linha['nome_linhas']); ?></div>
                        <div style="display:flex;align-items:center;gap:8px">
                            <button class="botaodese" aria-expanded="false" data-target="<?php echo $linha['id_linhas']; ?>">▸</button>
                        </div>
                    </div>

                    <div class="items" id="items-<?php echo $linha['id_linhas']; ?>" style="display:none">

                        <div class="item">
                            <span class="estado certo"></span>
                            Localização: <strong><?php echo htmlspecialchars($linha['avisos_linhas']); ?></strong>
                        </div>

                        <div class="item">
                            <span class="estado certo"></span>
                            Distância percorrida: <strong><?php echo htmlspecialchars($linha['distancia_linhas']); ?> km</strong>
                        </div>

                        <div class="item">
                            <span class="estado certo"></span>
                            Passageiros: <strong><?php echo number_format($linha['passageiros_linhas'], 0, ',', '.'); ?></strong>
                        </div>

                        <div class="item">
                            <span class="estado certo"></span>
                            Velocidade: <strong><?php echo htmlspecialchars($linha['velocidade_linhas']); ?> km/h</strong>
                        </div>
                        
                        <div class="item">
                            <span class="estado certo"></span>
                            Maquinista: <strong><?php echo htmlspecialchars($linha['nome_funcionario']); ?></strong>
                        </div>
                        
                        <div class="botoes-crud">
                            <a href="adicionar_editar_linha.php?id=<?php echo $linha['id_linhas']; ?>" class="btn-editar">
                                ✏️ Editar
                            </a>
                            <form action="excluir_linha.php" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir a linha: <?php echo htmlspecialchars($linha['nome_linhas']); ?>?');">
                                <input type="hidden" name="id_linha" value="<?php echo $linha['id_linhas']; ?>">
                                <button type="submit" class="btn-excluir">🗑️ Excluir</button>
                            </form>
                        </div>
                        
                    </div>
                </article>
                <?php 
                $contador++; 
                endforeach; 
                ?>

            </section>
        </div>
    </main>

 

    <div id="barra">
        <img class="logo" src="../asets/imagens/barraAbaixo/logo.png" alt="">
        <h3>Fast.sesi</h3>
        <a href="paginaAlertaseNotificacoes1.php"><img class="im5" src="../asets/imagens/meio/configuracao.png" alt="" height= "35px" width= "35px"></a>
        <a href="paginaAlterarPerfil.php"><img class="im3" src="../asets/imagens/meio/perfil.png" alt=""></a>
        <a href="paginaPesquisar.php"><img class="im4" src="../asets/imagens/barraAbaixo/Lupa1.png" alt=""></a>
    </div>

    <script src="../scripts/desempenho.js"></script>
    <script src="../scripts/notificacao.js"></script> 
    </body>
</html>