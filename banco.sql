CREATE DATABASE fast_sesi_sa;
USE fast_sesi_sa;

CREATE TABLE funcionario(
    id_funcionario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    credencial_funcionario INT NOT NULL,
    nome_funcionario VARCHAR(120) NOT NULL,
    email_funcionario VARCHAR(45) NOT NULL,
    senha_funcionario VARCHAR(255) NOT NULL,
    cpf_funcionario VARCHAR(11) NOT NULL,
    telefone_funcionario VARCHAR(45) NOT NULL,
    cargo_funcionario ENUM('ADM', 'FUNCIONARIO') NOT NULL,
    funcao_funcionario VARCHAR(45) NOT NULL,
    salario_funcionario INT NOT NULL,
    foto_funcionario VARCHAR(255) DEFAULT 'default.jpg',
    cep_funcionario VARCHAR(9),
    logradouro_funcionario VARCHAR(120),
    numero_funcionario VARCHAR(10),
    complemento_funcionario VARCHAR(60),
    bairro_funcionario VARCHAR(60),
    cidade_funcionario VARCHAR(60),
    uf_funcionario CHAR(2)
);

CREATE TABLE trilhos(
    nome_trilho varchar(120) NOT NULL,
    id_trilho INT primary key AUTO_INCREMENT NOT NULL
);

CREATE TABLE gastos_gerais(
    id_gastos_gerais int primary key AUTO_INCREMENT NOT NULL,
    gastos_ferrovia int NOT NULL,
    gastos_materiais int NOT NULL,
    gastos_manutencoes int NOT NULL,
    gastos_funcionarios int NOT NULL
);

CREATE TABLE alertas_notificacoes(
    id_alertas_notficacoes int primary key AUTO_INCREMENT NOT NULL,
    observacoes_alertas_notificacoes varchar(45)
);

CREATE TABLE trens(
    id_trem INT primary key AUTO_INCREMENT NOT NULL,
    peso_trem int NOT NULL,
    temperatura_trem int NOT NULL
);

CREATE TABLE sensores(
    id_sensor INT primary key AUTO_INCREMENT NOT NULL,
    nome_sensor varchar(120) NOT NULL
);

CREATE TABLE linhas(
    id_linhas int primary key AUTO_INCREMENT NOT NULL ,
    nome_linhas varchar(45) NOT NULL,
    velocidade_linhas int(45) NOT NULL,
    passageiros_linhas int NOT NULL,
    avisos_linhas varchar(45) NOT NULL,
    distancia_linhas int NOT NULL,
    horario_linhas DATETIME NOT NULL, 
    eficiencia_eletrica_linhas varchar(45) NOT NULL,
    consumo_energia_linhas int NOT NULL,
    acidentes_linhas int NOT NULL,
    falhas_tecnicas_linhas varchar(45),
    motorista_linhas INT NOT NULL,
    FOREIGN KEY (motorista_linhas) REFERENCES funcionario(id_funcionario)
);

CREATE TABLE trilhos_manutencao(
    id_manutenção INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_trilho_manutencao INT,
    FOREIGN KEY (nome_trilho_manutencao) REFERENCES trilhos(id_trilho)
);

CREATE TABLE trilhos_risco(
    id_trilho_risco INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome_trilho_risco INT,
    FOREIGN KEY (nome_trilho_risco) REFERENCES trilhos(id_trilho)
);

CREATE TABLE botao_emergencia(
    id_linha_botao_emergencia INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    linha_botao_emergencia int(3),
    FOREIGN KEY (linha_botao_emergencia) REFERENCES linhas(id_linhas)
);

CREATE TABLE trens_descarrilhados(
    id_trem_descarrilhado INT primary key AUTO_INCREMENT NOT NULL,
    nome_trem_descarrilhado INT,
    FOREIGN KEY (nome_trem_descarrilhado) REFERENCES trens(id_trem)
);

CREATE TABLE temperaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor FLOAT NOT NULL,
    data_hora DATETIME NOT NULL
);

CREATE TABLE umidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor FLOAT NOT NULL,
    data_hora DATETIME NOT NULL
);


CREATE TABLE presenca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor FLOAT NOT NULL,
    data_hora DATETIME NOT NULL
);



INSERT INTO funcionario (credencial_funcionario, nome_funcionario, cpf_funcionario, email_funcionario, senha_funcionario,
    telefone_funcionario, cargo_funcionario, funcao_funcionario, salario_funcionario)
VALUES
('1234', 'João', '08068776931', 'adm_joao@gmail.com', '6768', '47997794533', 'ADM', 'Gerente', '10000'),
('2222', 'Pedro Almeida', '12345678901', 'pedro.almeida@gmail.com', 'pedro22', '47999880011', 'FUNCIONARIO', 'Motorista', '2800'),
('3333', 'José Carvalho', '98765432100', 'jose.carvalho@gmail.com', 'jose33', '47999776655', 'FUNCIONARIO', 'Motorista', '2600'),
('4444', 'Marcos Silva', '56789012345', 'marcos.silva@gmail.com', 'marcos44', '47999665544', 'FUNCIONARIO', 'Motorista', '3200'),
('5555', 'Rafael Santos', '10293847566', 'rafael.santos@gmail.com', 'rafa55', '47999554433', 'FUNCIONARIO', 'Motorista', '3000');

INSERT INTO linhas 
(nome_linhas, velocidade_linhas, passageiros_linhas, avisos_linhas, distancia_linhas, horario_linhas, eficiencia_eletrica_linhas, consumo_energia_linhas, acidentes_linhas, falhas_tecnicas_linhas, motorista_linhas)
VALUES
('Altorre-Glaciari­s', 80, 15000, 'Orbitalis', 90, '2025-11-18 08:30:00', 'Alta', 450, 0, 'Nenhuma', 2),
('Ouro negro — Monte Claro', 75, 22500, 'Metrópolis Leste', 115, '2025-11-18 09:15:00', 'Média', 500, 1, 'Freio revisado', 3),
('Rio Verde Eldoria', 90, 13200, 'Corredor Sul', 80, '2025-11-18 10:00:00', 'Alta', 520, 0, 'Nenhuma', 4),
('Coralua — Maresia', 70, 19800, 'Vale dos Pinheiros', 100, '2025-11-18 11:10:00', 'Média', 480, 2, 'Falha elétrica leve', 5),
('Linha Central', 85, 16000, 'Fluxo alto', 36, '2025-11-18 12:00:00', 'Alta', 560, 0, 'Nenhuma', 1); 

