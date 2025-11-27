<?php
session_start();

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

?>

<?php
if (isset($_GET['q'])) {
    $busca = strtolower(trim($_GET['q']));

    $busca = str_replace(
        ['á','à','ã','â','é','ê','í','ó','ô','õ','ú','ü','ç'],
        ['a','a','a','a','e','e','i','o','o','o','u','u','c'],
        $busca
    );

    
    $rotas = [
            'linha' => 'paginaSelecioneLinhas.php',        
        'trem' => 'paginaTrensAtivados1.php',           
        'inspecao' => 'paginaControledeInspeção.php',   
        'relatorio' => 'paginaRelatorioeAnalises.php', 
        'gasto' => 'paginaGastos.php',                   
        'alerta' => 'paginaAlertasMecanicos.php',        
        'notificacao' => 'paginaAlertaseNotificacoes1.php', 
        'sensor' => 'paginaSensores1.php',              
        'trilho' => 'paginaTrilhos1.php',               
        'sinalizacao' => 'paginaSistemasdeSinalizacao.php',
        'frenagem' => 'paginaSistemadeFrenagem1.php',    
        'eixof erroviario' => 'paginaEixosFerroviarios1.php',
        'resistor' => 'paginaResistoresdePotencia.php',   
        'perfil' => 'paginaAlterarPerfil.php',          
        'funcionario' => 'paginaFuncionarios.php',      
        'criaconta' => 'paginaCriarConta.php',           
        'login' => 'paginaLogin.php',                  
        'menu' => 'paginaMenuPrincipal.php',             
        'configuracao' => 'paginaAlertaseNotificacoes1.php',
    ];

    if (array_key_exists($busca, $rotas)) {
        header("Location: " . $rotas[$busca]);
        exit;
    } else {
        
        echo "
        <html lang='pt-br'>
        <head>
          <meta charset='UTF-8'>
          <title>Pesquisa</title>
          <link rel='stylesheet' href='../style/pesquisar.css'>
        </head>
        <body>
          <div class='container-pesquisa'>
            <h2>Nenhuma página encontrada para '<em>".htmlspecialchars($_GET['q'])."</em>'</h2>
            <p>Tente novamente usando o nome exato.</p>
            <br>
            <a href='paginaPesquisar.php' style='color:white;text-decoration:none;font-weight:bold;'>← Voltar</a>
          </div>
        </body>
        </html>";
    }
} else {
    header("Location: paginaPesquisar.php");
    exit;
}
?>
