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
        'linhas' => 'paginaSelecioneLinhas.php',
        'trens' => 'paginaTrensAtivados1.php',
        'inspecao' => 'paginaControledeInspeção.php',
        'relatorio' => 'paginaRelatorioeAnalises.php',
        'ouvidoria' => 'paginaOuvidoriaGeral.php',
        'alertas' => 'paginaAlertaseNotificacoes2.php',
        'notificacoes' => 'paginaAlertaseNotificacoes3.php',
        'gastos' => 'paginaGastos.php',
        'trens descarrilhados' =>'paginaTrensDescarrilhados.php'
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
