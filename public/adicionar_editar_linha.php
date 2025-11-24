<?php
session_start();
include "db.php";

if (!isset($_SESSION["credencial_funcionario"])) {
    header("Location: paginaLogin.php?msg=expired");
    exit;
}

$id_linha = null;
$linha = [
    'nome_linhas' => '', 
    'velocidade_linhas' => '', 
    'passageiros_linhas' => '',
    'avisos_linhas' => '', 
    'distancia_linhas' => '', 
    'motorista_linhas' => '',
    'horario_linhas' => date('Y-m-d H:i:s'), 
    'eficiencia_eletrica_linhas' => 'Alta',
    'consumo_energia_linhas' => 0, 
    'acidentes_linhas' => 0, 
    'falhas_tecnicas_linhas' => 'Nenhuma'
];

$titulo = "Adicionar Nova Linha";

$sql_motoristas = "SELECT id_funcionario, nome_funcionario FROM funcionario 
                   WHERE funcao_funcionario = 'Motorista' OR cargo_funcionario = 'ADM' 
                   ORDER BY nome_funcionario";
$result_motoristas = $conn->query($sql_motoristas);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_linha = $_GET['id'];
    $titulo = "Editar Linha";
    
    $stmt = $conn->prepare("SELECT * FROM linhas WHERE id_linhas = ?");
    $stmt->bind_param("i", $id_linha);
    $stmt->execute();
    $result_linha = $stmt->get_result();
    
    if ($result_linha->num_rows === 1) {
        $linha = $result_linha->fetch_assoc();
    } else {
        header("Location: paginaTrensAtivados1.php");
        exit;
    }
    $stmt->close();
}

$conn->close();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="../style/style2.css"> 
    
    <style>
        :root {
            --primary-color: #059669;
            --secondary-color: #2563eb;
            --cancel-color: #64748b;
            --bg-light: #f1f5f9;
            --input-border: #cbd5e1;
        }
        body { 
            background-color: var(--bg-light); 
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .page-container {
            max-width: 700px;
            margin: 40px auto;
            padding: 25px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .page-container {
                margin: 20px;
                padding: 15px;
            }
        }
        h2 {
            text-align: center;
            color: #1e293b;
            margin-bottom: 25px;
            font-size: 1.8rem;
            border-bottom: 2px solid var(--input-border);
            padding-bottom: 10px;
            font-weight: 700;
        }
        h2::before {
            content: "🚂 ";
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        @media (min-width: 600px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .full-width {
                grid-column: 1 / -1;
            }
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        .form-group input,
        .form-group select {
            padding: 12px;
            border: 1px solid var(--input-border);
            border-radius: 6px;
            background-color: #f8fafc;
            font-size: 1rem;
            width: 100%;
            box-sizing: border-box; 
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-group input:focus, 
        .form-group select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
            outline: none;
        }
        .button-group {
            grid-column: 1 / -1;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        .button-group button, 
        .button-group a {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.1s;
            color: white;
            text-align: center;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .button-group button:active, 
        .button-group a:active {
            transform: scale(0.98);
        }
        .btn-submit {
            background-color: <?php echo $id_linha ? 'var(--secondary-color)' : 'var(--primary-color)'; ?>;
        }
        .btn-submit:hover {
            background-color: <?php echo $id_linha ? '#1d4ed8' : '#047857'; ?>;
        }
        .btn-cancel {
            background-color: var(--cancel-color);
        }
        .btn-cancel:hover {
            background-color: #475569;
        }
    </style>
</head>
<body>
    <main>
        <div class="page-container">
            <h2><?php echo $titulo; ?></h2>
            
            <form action="processa_linha.php" method="POST">

                <?php if ($id_linha): ?>
                    <input type="hidden" name="id_linhas" value="<?php echo $id_linha; ?>">
                <?php endif; ?>

                <div class="form-grid">
                    
                    <div class="form-group full-width">
                        <label for="nome_linhas">Nome da Linha:</label>
                        <input type="text" id="nome_linhas" name="nome_linhas" value="<?php echo htmlspecialchars($linha['nome_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="motorista_linhas">Motorista:</label>
                        <select id="motorista_linhas" name="motorista_linhas" required>
                            <option value="">Selecione o Motorista</option>
                            <?php 
                            if (isset($result_motoristas) && $result_motoristas->num_rows > 0) {
                                $result_motoristas->data_seek(0); 
                                while ($motorista = $result_motoristas->fetch_assoc()): ?>
                                    <option value="<?php echo $motorista['id_funcionario']; ?>" 
                                        <?php echo ($linha['motorista_linhas'] == $motorista['id_funcionario']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($motorista['nome_funcionario']); ?>
                                    </option>
                                <?php endwhile;
                            } else { ?>
                                <option value="" disabled>Nenhum motorista encontrado</option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="avisos_linhas">Avisos:</label>
                        <input type="text" id="avisos_linhas" name="avisos_linhas" value="<?php echo htmlspecialchars($linha['avisos_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="distancia_linhas">Distância (km):</label>
                        <input type="number" id="distancia_linhas" name="distancia_linhas" value="<?php echo htmlspecialchars($linha['distancia_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="velocidade_linhas">Velocidade (km/h):</label>
                        <input type="number" id="velocidade_linhas" name="velocidade_linhas" value="<?php echo htmlspecialchars($linha['velocidade_linhas']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="passageiros_linhas">Passageiros:</label>
                        <input type="number" id="passageiros_linhas" name="passageiros_linhas" value="<?php echo htmlspecialchars($linha['passageiros_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="horario_linhas">Horário:</label>
                        <input type="text" id="horario_linhas" name="horario_linhas" value="<?php echo htmlspecialchars($linha['horario_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="eficiencia_eletrica_linhas">Eficiência Elétrica:</label>
                        <select id="eficiencia_eletrica_linhas" name="eficiencia_eletrica_linhas" required>
                            <?php $eficiencia = htmlspecialchars($linha['eficiencia_eletrica_linhas']); ?>
                            <option value="Alta" <?php echo ($eficiencia == 'Alta') ? 'selected' : ''; ?>>Alta</option>
                            <option value="Média" <?php echo ($eficiencia == 'Média') ? 'selected' : ''; ?>>Média</option>
                            <option value="Baixa" <?php echo ($eficiencia == 'Baixa') ? 'selected' : ''; ?>>Baixa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="consumo_energia_linhas">Consumo:</label>
                        <input type="number" id="consumo_energia_linhas" name="consumo_energia_linhas" value="<?php echo htmlspecialchars($linha['consumo_energia_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="acidentes_linhas">Acidentes:</label>
                        <input type="number" id="acidentes_linhas" name="acidentes_linhas" value="<?php echo htmlspecialchars($linha['acidentes_linhas']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="falhas_tecnicas_linhas">Falhas Técnicas:</label>
                        <input type="text" id="falhas_tecnicas_linhas" name="falhas_tecnicas_linhas" value="<?php echo htmlspecialchars($linha['falhas_tecnicas_linhas']); ?>">
                    </div>

                    <div class="button-group">
                        <a href="paginaTrensAtivados.php" class="btn-cancel">Cancelar</a>
                        <button type="submit" class="btn-submit">
                            <?php echo $id_linha ? '💾 Salvar Edição' : '➕ Adicionar Linha'; ?>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </main>
</body>
</html>
