CREATE DATABASE fast_sesi_sa;
USE fast_sesi_sa;

CREATE TABLE funcionario(
    id_funcionario INT primary key AUTO_INCREMENT NOT NULL,
    credencial_funcionario INT  NOT NULL,
    nome_funcionario varchar(120) NOT NULL,
    email_funcionario varchar(45) NOT NULL,
    senha_funcionario varchar(255) NOT NULL,
    cpf_funcionario varchar(11) NOT NULL,
    telefone_funcionario varchar(45) NOT NULL,
    cargo_funcionario ENUM ( 'ADM', 'FUNCIONARIO') NOT NULL,
    funcao_funcionario varchar(45) NOT NULL,
    salario_funcionario INT NOT NULL,
    foto_funcionario varchar(255) DEFAULT 'default.jpg'
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

CREATE TABLE ouvidoria(
    id_ouvidoria int primary key AUTO_INCREMENT NOT NULL,
    nome_cliente varchar (45),
    observacoes_ouvidoria varchar (45) NOT NULL,
    nome_funcionario INT,
    FOREIGN KEY (nome_funcionario) REFERENCES funcionario(id_funcionario)
);

CREATE TABLE trens_descarrilhados(
    id_trem_descarrilhado INT primary key AUTO_INCREMENT NOT NULL,
    nome_trem_descarrilhado INT,
    FOREIGN KEY (nome_trem_descarrilhado) REFERENCES trens(id_trem)
);

INSERT INTO funcionario ( credencial_funcionario, nome_funcionario, cpf_funcionario, email_funcionario, senha_funcionario,
    telefone_funcionario, cargo_funcionario, funcao_funcionario, salario_funcionario)
VALUES ('1234', 'João', '08068776931', 'adm_joao@gmail.com', '6768', '47997794533', 'ADM', 'Gerente', '10000')